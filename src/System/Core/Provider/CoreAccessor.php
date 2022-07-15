<?php
namespace Malla\Core\Provider;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\Core\Facade\Core;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class CoreAccessor extends ServiceProvider {

   public function boot( Kernel $HTTP, Translator $LANG ) {
   }

   public function register() {
      require_once(__DIR__."/../Common.php");
   }

   public function getGrammars( $locale="es" ) {

      if( $this->app["files"]->exists(__VENDORPATH__."App/Http/Langs/$locale.php") ) {
         return $this->app["files"]->getRequire(__VENDORPATH__."App/Http/Langs/$locale.php");
      }

      return NULL;
   }
}
