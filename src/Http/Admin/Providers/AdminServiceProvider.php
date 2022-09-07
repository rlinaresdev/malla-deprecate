<?php
namespace Malla\Http\Admin\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\User\Facade\User;
use Malla\Menu\Facade\Nav;
use Illuminate\Support\Facades\Blade;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider {

   public function boot( Kernel $HTTP, Translator $LANG ) {

      $this->HTTP = $HTTP;
      $this->LANG = $LANG;

      require_once(__DIR__."/../App.php");
   }

   public function register() {
      require_once(__DIR__."/../Common.php");
   }

   public function loadConfigs($data=[]) {
      if( empty($data) ) return null;

      foreach ($data as $key => $value) {
         $this->app["config"]->set($key, $value);
      }
   }

   public function bootMiddleware($handler) {

      if(!is_object($handler)) {
         $handler = new $handler;
      }

      ## INIT
      if( !empty( ( $initialzer = $handler->init()) ) ) {
         foreach ($initialzer as $middleware ) {
            $this->HTTP->pushMiddleware($middleware);
         }
      }

      ## GROUPS
      if( !empty( ( $groups = $handler->groups()) ) ) {
         foreach ( $groups as $group => $middlewares ) {
            $this->app["router"]->middlewareGroup($group, $middlewares);
         }
      }
   }

   public function getGrammars( $locale="es" ) {

      if( $this->app["files"]->exists(__VENDORPATH__."App/Http/Langs/$locale.php") ) {
         return $this->app["files"]->getRequire(__VENDORPATH__."App/Http/Langs/$locale.php");
      }

      return NULL;
   }
}
