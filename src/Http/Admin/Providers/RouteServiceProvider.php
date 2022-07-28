<?php
namespace Malla\Http\Admin\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

   protected $namespace = "Malla\Http\Admin\Controllers";

   public function boot() {
      parent::boot();
   }

   public function map() {
      
      Route::prefix(config("admin.prefix"))
            ->middleware("admin")
            ->namespace($this->namespace)
            ->group(__DIR__."/../Routes/app.php");
   }

}
