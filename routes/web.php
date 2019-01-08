<?php


Route::group(['prefix'=>app()->getLocale()],function(){
        Route::redirect('/', 'home');
        Route::redirect('df-admin', 'df-admin/home');
        Route::get('home', 'HomeController')->name('home');

        Route::group(['middleware' => ['student.guest', 'professional.guest']], function(){
            Route::view('login', 'login')->name('login');
        });

// download
        Route::group(['middleware' => ['auth:student,professional', 'student', 'professional', 'confirmed', 'studentconfirmed']], function(){
            
            Route::post('docs/{paper}', 'DocumentsController@download')->name('papers.download');

// PAYMENT
            Route::group([
                "prefix" => "payment"
            ], function () {
                Route::post("/paypal", "Payment\PayPalController@payWithpaypal") -> name("payment.paypal");
                Route::get("/paypal/status", "Payment\PayPalController@getPaymentStatus") -> name("payment.paypal.status");
            });
        });

        Route::view('register', 'register')->name('register');
// search
        Route::get('search', 'SearchController')->name('search');

// show doc
        Route::get('docs/{paper}', 'DocumentsController@show')->name('papers.show');

// page home
        Route::get('page/{type}', 'HomeController@page')->name('page');
// plan
        Route::get('plans/{plan}/subscribe', 'PlansController@show')->name('plans.show');
        Route::post('subscribe', 'PlansController@subscribe')->name('plans.subscribe');
        Route::post('contact-us','ContactusController@sendMessage');

        Route::view('unconfirmed','unconfirmed')->name('needs-confirmation');


    });

Route::group(['middleware' => 'ajax'], function(){
    Route::get('keywords', function(){
        $keywords = \App\Models\Keyword::all();

        $keywords = $keywords->map(function($keyword){
            if (in_array($keyword->title, array_keys(config('education_types.en'))) || in_array($keyword->title, array_keys(config('education_types.ar')))) {
                return;
            }
            return ['text' => $keyword->title, 'value' => $keyword->title];
        })->toArray();

        return response()->json(array_values(array_filter($keywords)));
    })->name('keywords');

    Route::get('schools/{location}', function(\App\Models\Location $location){
        return $location->schools->pluck('title_' . app()->getLocale(), 'id')->all();
    });

Route::get('{lang}/schools', function($lang, \Illuminate\Http\Request $request) {
        $schools = \App\Models\School::query();
        if ($request -> has("location_id")) {
            $schools -> where("location_id", $request -> input("location_id"));
        }

        if ($request -> has("education_type_id")) {
            $schools -> where("education_type_id", $request -> input("education_type_id"));
        }

        return $schools->pluck('title_' . $lang, 'id')->all();
    });

    Route::get('cities/{country}', function($country_id){
        $cities = \App\Models\Location::select('title_' . app()->getLocale(),'id')->where('country_id',$country_id)->get()->pluck('title_' . app()->getLocale(), 'id');
        return $cities;
    });


    Route::get('{lang}/cities/{country}', function($lang, $country_id) {
        $cities = \App\Models\Location::select('title_' .$lang,'id')->where('country_id',$country_id)->get()->pluck('title_' . $lang, 'id');
        return $cities;
    });

    Route::get('authors', function(){
        $authors = \App\Models\Professional::all();
        $authors = $authors->map(function($author){
            return ['text' => $author->fullName, 'value' => $author->id];
        });

        return response()->json($authors);
    });
});

Route::get('{segment1?}/{segment2?}/{segment3?}',function(){
    $segments = request()->segments();
    $uri_locale = array_intersect($segments, config('app.locales'));

    if( count($uri_locale) == 0 ){
        array_unshift($segments,app()->getLocale());
        return redirect()->to(implode('/', $segments));
    }
    abort(404);

});