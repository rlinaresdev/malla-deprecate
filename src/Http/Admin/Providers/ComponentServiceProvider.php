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

class ComponentServiceProvider extends ServiceProvider {

   public function boot( Kernel $http, Translator $lang ) {

      $this->http = $http;
      $this->lang = $lang;

      ## LOAD THEME
      $this->load("theme");

      ## LOAD WIDGETS
      $this->load("widget");
   }

   public function load( $slug=null ) {

      if( !empty( ($modules = $this->app["core"]->module($slug)) ) ) {
         foreach ($modules as $module) {
            if( method_exists($module, "path") ) {
               if( $this->app["files"]->exists( ($path = $module->path()) ) ) {
                  require_once($path);
               }
            }
         }
      }
   }
}
