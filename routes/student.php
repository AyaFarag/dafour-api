<?php

/* 
* ===========================================================================
* All the routes names here are preceded by 'student.' .
* All the routes here are under the namespace 'App\Http\Controllers\Student'.
* All the routes hre are prefixed by 's/'.
* ===========================================================================
*/

            // Unauthenticated {
                // Register {
                    Route::post('register', 'Auth\RegisterController@register')->name('register');
                // }

                // Login {
                    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
                    Route::post('login', 'Auth\LoginController@login');
                // }
                
                // Logout {
                    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
                // }

                // Password {
                    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
                    Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm');
                    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.email');
                    Route::post('password/email', 'Auth\ResetPasswordController@sendResetLinkEmail')->name('password.request');
                // }
            // }

            // Authenticated {
                Route::group(['middleware' => ['student', 'auth:student']], function(){

                    Route::get('confirm/{token}','ProfileController@confirm')->name('confirmation');
                    Route::group(['middleware' => ['confirmed']], function(){
                        Route::group(['middleware' => ['confirmed']], function(){
                            // Authenticated user routes.
                            Route::get('home', 'HomeController@showHomePage')->name('home');

                            // Profile {
                                Route::post('profile/update', 'ProfileController@update')->name('profile.update');
                            // }
                        });
                    });
                });
            // }
