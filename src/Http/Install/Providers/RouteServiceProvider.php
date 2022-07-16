<?php
namespace Malla\Http\Install\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

   public function boot() {
      parent::boot();
  }

  public function map() {
      //$this->index( NameSpace );
  }

  public function index($namespace) {
     Route::prefix("app")
        ->middleware('web')
          ->namespace($namespace)
          ->group('App/Http/Routes/apps.php');
  }
}
