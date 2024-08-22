<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {


            Route::middleware('api')
            ->prefix('api')
            ->group(function () {


                Route::prefix('employee')
                    ->group(base_path('routes/api/employee.php'));

                Route::prefix('user')
                    ->group(base_path('routes/api/user.php'));

                Route::prefix('department')
                    ->group(base_path('routes/api/department.php'));
                   
                Route::prefix('candidate')
                    ->group(base_path('routes/api/candidate.php'));
                
                Route::prefix('JobOffer')
                    ->group(base_path('routes/api/JobOffer.php'));
          
          
          
                });

 


 

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
