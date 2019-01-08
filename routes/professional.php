<?php

/* 
* ===========================================================================
* All the routes names here are preceded by 'professional.' .
* All the routes here are under the namespace 'App\Http\Controllers\Professional'.
* All the routes hre are prefixed by 'p/'.
* ===========================================================================
*/


            // Unauthenticated {
                // Register {
                    Route::post('register', 'Auth\RegisterController@register')->name('register');
                // }

                // Login {
                    // Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
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
                Route::group(['middleware' => ['auth:professional', 'professional']], function(){

                    Route::get('confirm/{token}','ProfileController@confirm')->name('confirmation');

                        Route::group(['middleware' => ['confirmed']], function(){
                            // Authenticated user routes.
                            Route::get('home', 'HomeController@showHomePage')->name('home');
                            // Profile {
                                Route::post('profile/update', 'ProfileController@update')->name('profile.update');
                            // }


                        // Documents {
                            Route::get('docs/upload', 'DocumentsController@showUploadForm')->name('docs.upload');
                            Route::post('docs/upload', 'DocumentsController@upload');
                            Route::get('docs/{paper}/update', 'DocumentsController@showUpdateForm')->name('docs.update');
                            Route::post('docs/{paper}/update', 'DocumentsController@update');
                            Route::get('docs/{paper}', 'DocumentsController@view')->name('docs.view');
                        // }
                    });
                });
            // }
