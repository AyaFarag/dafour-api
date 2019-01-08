<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Location;
use App\Models\Paper;
use App\Models\School;
use App\Models\EducationType;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Paper::query()->where('deleted_at', null);

        // Handle school_id
        if (!empty($request->get('school_id')) || !empty($request -> get('education_type_id'))) {
            $query->whereHas('school', function($query) use ($request){
                if (!empty($request -> get('school_id'))) {
                    $query->where('id', $request->get('school_id'));
                }
                if (!empty($request -> get('education_type_id'))) {
                    $query->where('education_type_id', $request->get('education_type_id'));
                }
            });
        }

        // Handle keywords
        $keywords = [];

        if (!empty($request -> get('keywords'))) {
            $keywords = trim(trim($request->get('keywords')), ',');
            $keywords = explode(',', $keywords);
            $keywords = array_map(function($el){
                return mb_strtolower($el);
            }, $keywords);

            $query -> where(function ($query) use ($keywords) {
                $query->whereHas('keywords', function($query) use ($keywords){
                    $query->whereIn('title', $keywords);
                });
                $query->orWhere(function ($query) use ($keywords){
                    $query->whereIn('title',$keywords);
                });
            });
        }
        // dd($query->toSql());
        $papers = $query->paginate(12);
        $locations = Location::pluck('title_' . app()->getLocale(), 'id')->all();
        $education_types = EducationType::all();
        $request->flash();
        return view('search_results', compact('locations', 'papers', 'education_types'));
    }
}
