<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\UpdateDocumentRequest;
use App\Http\Requests\Professional\UploadDocumentRequest;
use App\Models\Location;
use App\Models\Paper;
use App\Models\Keyword;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PapersController extends Controller
{
    public function index()
    {
        $papers = Paper::withCount('downloads')->with('school')->get();
        return view('admin.papers.index', compact('papers'));
    }

    public function create()
    {
        $locations = Location::pluck('title_' . app()->getLocale(), 'id')->all();
        $schools = [];
        return view('admin.papers.create', compact('locations', 'schools'));
    }



    public function store(UploadDocumentRequest $request)
    {
        $inputs = $request->only('title', 'abstract', 'file', 'publication_date', 'school_id');
        $inputs['file'] = ltrim($request->file('file')->store('public/docs'), 'public/');

        $paper = Paper::create($inputs);

        // ======================================== handle keywords

        $keywords = trim(trim($request->get('keywords')), ',');
        $keywords = explode(',', $keywords);
        $keywords = array_map(function($el){
            return ['title' => strtolower($el)];
        }, $keywords);

        $keywords[] = ['title' => strtolower($request->get('education_type'))];

        $keys = [];
        foreach ($keywords as $keyword) {
            $keys[] = Keyword::firstOrCreate($keyword)->id;
        }

        $paper->keywords()->attach($keys);

        // ======================================== handle authors

        $authors = trim(trim($request->get('authors')), ',');
        $authors = explode(',', $authors);

        $paper->professionals()->attach($authors);

        // ======================================== handle references
        foreach ($request->get('references') as $reference) {
            if (is_array($reference) && isset($reference['title']) && isset($reference['link'])) {
                $paper->references()->create($reference);
            }
        }

        return redirect()->route('admin.papers.index')->with('success', 'Document created successully!');
    }

    public function edit($id)
    {
        $paper = Paper::findOrFail($id);
        $education_type = [];
        $keywords = $paper->keywords->map(function($keyword) use (&$education_type) {
            if (in_array($keyword->title, array_keys(config('education_types.en'))) || in_array($keyword->title, array_keys(config('education_types.ar')))) {
                $education_type = $keyword->title;
            } else {
                return ['text' => $keyword->title, 'value' => $keyword->title];
            }
        })->toArray();

        $keywords = json_encode(array_values(array_filter($keywords)));

        $authors = json_encode($paper->professionals->map(function($professional){
            return ['text' => $professional->fullName, 'value' => $professional->id];
        }));

        $locations = Location::pluck('title_' . app()->getLocale(), 'id')->all();

        $schools = School::where('location_id', $paper->location()->id)->pluck('title_' . app()->getLocale(), 'id')->all();

        return view('admin.papers.edit', compact('education_type', 'authors', 'keywords', 'paper', 'locations', 'schools'));
    }

    public function update(UpdateDocumentRequest $request,  $id)
    {
        $paper = Paper::findOrFail($id);

        $inputs = $request->only('title', 'abstract', 'file', 'publication_date', 'school_id');

        if ($request->file('file')) {
            Storage::delete("public/" . $paper->file);
            $inputs['file'] = ltrim($request->file('file')->store('public/docs'), 'public/');
        }
        $paper->update($inputs);
        
        // ======================================== handle keywords

        $keywords = trim(trim($request->get('keywords')), ',');
        $keywords = explode(',', $keywords);
        $keywords = array_map(function($el){
            return ['title' => strtolower($el)];
        }, $keywords);

        $keywords[] = ['title' => strtolower($request->get('education_type'))];

        $keys = [];
        foreach ($keywords as $keyword) {
            $keys[] = Keyword::firstOrCreate($keyword)->id;
        }
        $paper->keywords()->sync($keys);

        // ======================================== handle authors
        
        $authors = trim(trim($request->get('authors')), ',');
        $authors = array_filter(explode(',', $authors));
        
        $paper->professionals()->sync($authors);

        // ======================================== handle references
        $paper->references()->delete();
        foreach ($request->get('references') as $reference) {
            if (is_array($reference) && isset($reference['title']) && isset($reference['link'])) {
                $paper->references()->create($reference);
            }
        }

        return redirect()->route('admin.papers.index')->with('success', 'Document updated successully!');
    }

    public function destroy($id)
    {
        $paper = Paper::findOrFail($id);
        
        $paper->delete();

        return redirect()->back()->with('success', 'Deleted successfully!');
    }


    public function view(Paper $paper)
    {
        return response()->file(storage_path("app/public/{$paper->file}"));
    }

    public function download(Paper $paper)
    {
        return response()->download(storage_path("app/public/{$paper->file}"), substr($paper->title, 0, 30));

    }
}