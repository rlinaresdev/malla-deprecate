<?php
namespace Malla\Http\Admin\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

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
      $this->loadConfigs([
         "admin.prefix"                => "admin",
         "admin.skin"                  => "rosy",
         "auth.guards.admin.driver"		=> "session",
         "auth.guards.admin.provider"	=> "admin",
         "auth.providers.admin.driver" => "eloquent",
         "auth.providers.admin.model" 	=> \Malla\User\Model\Store::class,
      ]);
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
