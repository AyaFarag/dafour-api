<?php

/* 
* ===========================================================================
* All the routes names here are preceded by 'admin.' .
* All the routes here are under the namespace 'App\Http\Controllers\Admin'.
* All the routes hre are prefixed by 'df-admin/'.
* ===========================================================================
*/ 

// Unauthenticated {
    // Login {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
    // }
    
    // Logout {
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    // }
// }

// Authenticated {
    Route::group(['middleware' => ['admin', 'auth:admin']], function(){        
        Route::get('home', 'HomeController@showHomePage');

        // Professionals {
            Route::get('professionals', 'ProfessionalsController@index')->name('professionals.index');
            Route::get('professionals/create', 'ProfessionalsController@create')->name('professionals.create');
            Route::post('professionals', 'ProfessionalsController@store')->name('professionals.store');
            Route::get('professionals/{professional}/edit', 'ProfessionalsController@edit')->name('professionals.edit');
            Route::post('professionals/{professional}', 'ProfessionalsController@update')->name('professionals.update');
            Route::post('professionals/destroy/{professional}', 'ProfessionalsController@destroy')->name('professionals.destroy');

            Route::group(['middleware' => 'ajax'], function(){
                Route::post('professionals/toggle-block', 'ProfessionalsController@toggleBlock')->name('professionals.toggle_block');
            });
        // }
        
        // Students {
            Route::get('students', 'StudentsController@index')->name('students.index');
            Route::get('students/create', 'StudentsController@create')->name('students.create');
            Route::post('students', 'StudentsController@store')->name('students.store');
            Route::get('students/{student}/edit', 'StudentsController@edit')->name('students.edit');
            Route::post('students/{student}', 'StudentsController@update')->name('students.update');
            Route::post('students/destroy/{student}', 'StudentsController@destroy')->name('students.destroy');

            Route::group(['middleware' => 'ajax'], function(){
                Route::post('students/toggle_block', 'StudentsController@toggleBlock')->name('students.toggle_block');
            });
        // }
        
        // Plans {
            Route::get('plans', 'PlansController@index')->name('plans.index');
            Route::get('plans/create', 'PlansController@create')->name('plans.create');
            Route::post('plans', 'PlansController@store')->name('plans.store');
            Route::get('plans/{plan}/edit', 'PlansController@edit')->name('plans.edit');
            Route::post('plans/{plan}', 'PlansController@update')->name('plans.update');
            Route::post('plans/destroy/{plan}', 'PlansController@destroy')->name('plans.destroy');
        // }

            // Plans {
            Route::post('papers/docs/{paper}', 'PapersController@download')->name('papers.download');
            Route::get('papers', 'PapersController@index')->name('papers.index');
            Route::get('papers/create', 'PapersController@create')->name('papers.create');
            Route::post('papers', 'PapersController@store')->name('papers.store');
            Route::get('papers/{plan}/edit', 'PapersController@edit')->name('papers.edit');
            Route::post('papers/{plan}', 'PapersController@update')->name('papers.update');
            Route::post('papers/destroy/{plan}', 'PapersController@destroy')->name('papers.destroy');
            // }

        //  Sliders {
            Route::get('sliders', 'SlidersController@index')->name('sliders.index');
            Route::get('sliders/create', 'SlidersController@create')->name('sliders.create');
            Route::post('sliders', 'SlidersController@store')->name('sliders.store');
            Route::get('sliders/{slider}/edit', 'SlidersController@edit')->name('sliders.edit');
            Route::post('sliders/{slider}', 'SlidersController@update')->name('sliders.update');
            Route::post('sliders/destroy/{slider}', 'SlidersController@destroy')->name('sliders.destroy');
        //  }
         
        //  Papers {
            Route::get('papers', 'PapersController@index')->name('papers.index');
            Route::get('papers/create', 'PapersController@create')->name('papers.create');
            Route::post('papers', 'PapersController@store')->name('papers.store');
            Route::get('papers/{paper}/edit', 'PapersController@edit')->name('papers.edit');
            Route::post('papers/{paper}', 'PapersController@update')->name('papers.update');
            Route::post('papers/destroy/{paper}', 'PapersController@destroy')->name('papers.destroy');
            Route::get('papers/{paper}/view', 'PapersController@view')->name('papers.view');
        //  }
         
        // Locations {
            Route::get('locations', 'LocationsController@index')->name('locations.index');
            Route::get('locations/create', 'LocationsController@create')->name('locations.create');
            Route::post('locations', 'LocationsController@store')->name('locations.store');
            Route::get('locations/{location}/edit', 'LocationsController@edit')->name('locations.edit');
            Route::post('locations/{location}', 'LocationsController@update')->name('locations.update');
            Route::post('locations/destroy/{paper}', 'LocationsController@destroy')->name('locations.destroy');
            Route::get('locations/{location}/view', 'LocationsController@view')->name('locations.view');
        // }
        
        // Schools {
            Route::get('schools', 'SchoolsController@index')->name('schools.index');
            Route::get('schools/create', 'SchoolsController@create')->name('schools.create');
            Route::post('schools', 'SchoolsController@store')->name('schools.store');
            Route::get('schools/{school}/edit', 'SchoolsController@edit')->name('schools.edit');
            Route::post('schools/{school}', 'SchoolsController@update')->name('schools.update');
            Route::post('schools/destroy/{school}', 'SchoolsController@destroy')->name('schools.destroy');
            Route::get('schools/{school}/view', 'SchoolsController@view')->name('schools.view');
        // }
    });
// }