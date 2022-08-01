<?php
namespace Malla\Menu\Provider;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\Menu\Facade\Nav;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider {

   public function boot( Kernel $HTTP, Translator $LANG ) {
   }

   public function register() {
      $this->app->bind("Nav", function($app){
         return new \Malla\Menu\Support\Nav($app);
      });

      $this->app["menu"] = Nav::load();
   }
}
