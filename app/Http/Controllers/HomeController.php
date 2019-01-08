<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Page;
use App\Models\Paper;
use App\Models\Plan;
use App\Models\Slider;
use App\Models\EducationType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $locations = Location::pluck('title_' . app()->getLocale(), 'id')->all();
        $plans = Plan::all();
        $education_types = EducationType::all();


        // $general_education = Paper::with('professionals')->whereHas('keywords', function($query){
        //     $query
        //         ->where('title', 'تعليم عام')
        //         ->orWhere('title', 'general education');
        // })->take(12)->get();

        // $vocational_education = Paper::with('professionals')->whereHas('keywords', function($query){
        //     $query
        //         ->where('title', 'تعليم مهني')
        //         ->orWhere('title', 'vocational education');
        // })->take(12)->get();

        // $university_education = Paper::with('professionals')->whereHas('keywords', function($query){
        //     $query
        //         ->where('title', 'تعليم جامعي')
        //         ->orWhere('title', 'university education');
        // })->take(12)->get();

        $sliders = Slider::all();

        return view('index', compact('plans', 'locations', 'education_types','sliders'));
    }

    public function page($type)
    {
        $page = Page::where('type',$type)->first();
        return view('page',compact('page'));
    }
}
