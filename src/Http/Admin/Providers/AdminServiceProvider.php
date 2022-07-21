<?php
namespace Malla\\Providers;

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
   }

   public function register() {
      
   }

   public function getGrammars( $locale="es" ) {

      if( $this->app["files"]->exists(__VENDORPATH__."App/Http/Langs/$locale.php") ) {
         return $this->app["files"]->getRequire(__VENDORPATH__."App/Http/Langs/$locale.php");
      }

      return NULL;
   }
}
