<?php
namespace Malla\Http\Admin\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {

   protected $namespace = "Malla\Http\Admin\Controllers";

   public function boot() {

      $this->configureRateLimiting();

      Route::prefix(config("admin.prefix"))
            ->middleware("admin")
            ->namespace($this->namespace)
            ->group(__DIR__."/../Routes/app.php");
   }

   // public function map() {
   //
   //
   //
   //    Route::prefix(config("admin.prefix"))
   //          ->middleware("admin")
   //          ->namespace($this->namespace)
   //          ->group(__DIR__."/../Routes/app.php");
   // }

   protected function configureRateLimiting() {
      RateLimiter::for('api', function (Request $request) {
           return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
      });
   }

}
