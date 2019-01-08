<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Http\Requests\Professional\UploadDocumentRequest;
use App\Http\Requests\Professional\UpdateDocumentRequest;
use App\Models\Keyword;
use App\Models\Location;
use App\Models\Paper;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    // public function showUploadForm()
    // {
    //     $locations = Location::pluck('title_' . app()->getLocale(), 'id')->all();
    //     $schools = [];
        
    //     return response() -> json(compact('locations', 'papers'));
    
        // return view('professional.upload_document', compact('locations', 'schools'));
    // }

    public function upload(Request $request)
    {
        $inputs = $request->only('title', 'abstract', 'file', 'publication_date', 'school_id');
        // $inputs['file'] = ltrim($request->file('file')->move('public/docs'), 'public/'); // issue
        
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
        if (!in_array(auth()->id(), $authors)) {
            $authors[] = auth()->id();
        }
        
        $paper->professionals()->attach($authors);
        
        // ======================================== handle references
        $ref[] = $request->get('references');
        foreach ($ref as $reference) {
            if (is_array($reference) && isset($reference['title']) && isset($reference['link'])) {
                $paper->references()->create($reference);
                
            }
        }
        return response() -> json(["message" => "Document uploaded successfully!"], 201);
        
        

    }

    // public function showUpdateForm(Paper $paper)
    // {
    //     $education_type = [];

    //     $keywords = $paper->keywords->map(function($keyword) use (&$education_type) {
    //         if (in_array($keyword->title, array_keys(config('education_types.en'))) || in_array($keyword->title, array_keys(config('education_types.ar')))) {
    //             $education_type = $keyword->title;
    //         } else {
    //             return ['text' => $keyword->title, 'value' => $keyword->title];
    //         }
    //     })->toArray();

    //     $keywords = json_encode(array_filter($keywords));

    //     $authors = json_encode($paper->professionals->map(function($professional){
    //         return ['text' => $professional->fullName, 'value' => $professional->id];
    //     }));

    //     $locations = Location::pluck('title_' . app()->getLocale(), 'id')->all();

    //     $schools = School::where('location_id', $paper->location()->id)->pluck('title_' . app()->getLocale(), 'id')->all();

    //     return response() -> json(compact('education_type', 'authors', 'keywords', 'paper', 'locations', 'schools'));
        
    //     // return view('professional.edit_document', compact('education_type', 'authors', 'keywords', 'paper', 'locations', 'schools'));
    // }
    
    public function update(Request $request, Paper $paper)
    {
        $inputs = $request->only('title', 'abstract', 'file', 'publication_date', 'school_id');

        if ($request->file('file')) {
            Storage::delete("public/" . $paper->file);
            $inputs['file'] = $request->file('file'); // issue
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
        $authors = explode(',', $authors);
        if (!in_array(auth()->id(), $authors)) {
            $authors[] = auth()->id();
        }

        $paper->professionals()->sync($authors);

        // ======================================== handle references
        $paper->references()->delete();
        $ref[] = $request->get('references');
        foreach ($ref as $reference) {
            if (is_array($reference) && isset($reference['title']) && isset($reference['link'])) {
                $paper->references()->create($reference);
            }
        }

        return response() -> json(["message" => "Document uploaded successfully!"], 200);
        
        // return redirect()->back()->with('success', 'Document uploaded successfully!');
    }

    // public function view(Paper $paper)
    // {
    //     $paper->file(storage_path("app/public/{$paper->file}"));
        
    //     return response() -> json($paper);
        
    // }
    // return response()->file(storage_path("app/public/{$paper->file}"));
}
