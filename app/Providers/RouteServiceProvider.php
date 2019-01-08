<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        if( in_array(request()->segment(1),config('app.locales'))){
            app()->setLocale(request()->segment(1));
        }

        $this->mapApiRoutes();

        $this->mapProfessionalRoutes();

        $this->mapStudentRoutes();

        $this->mapAdminRoutes();

        $this->mapWebRoutes();
        //
    }

    protected function mapApiRoutes()
    {
        Route::prefix("api")
            -> middleware("api")
            -> namespace($this ->namespace .'')
            -> group(base_path("routes/api.php"));
    }
    /**
     * Define the "professional" routes for the application.
     *
     * @return void
     */
    protected function mapProfessionalRoutes()
    {
        Route::group([
            'middleware' => ['web', ],
            'as' => 'professional.',
             'prefix' => app()->getLocale().'/p',
            'namespace' => $this->namespace . '\Professional',
        ], function(){
            require base_path('routes/professional.php');
        });
    }

    /**
     * Define the "Student" routes for the application.
     *
     * @return void
     */
    public function mapStudentRoutes()
    {
        Route::group([
            'middleware' => ['web', 'blocked'],
            'as' => 'student.',
             'prefix' => app()->getLocale().'/s',
            'namespace' => $this->namespace . '\Student',
        ], function(){
            require base_path('routes/student.php');
        });
    }

    /**
     * Define the "Admin" routes for the application.
     *
     * @return void
     */
    public function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web'],
            'as' => 'admin.',
            'prefix' => 'df-admin',
            'namespace' => $this->namespace . '\Admin',
        ], function(){
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "Web" routes for the application.
     *
     * @return void
     */
    public function mapWebRoutes()
    {
        Route::group([
            'middleware' => ['web'],
            'namespace' => $this->namespace
        ], function(){
            require base_path('routes/web.php');
        });
    }
}
