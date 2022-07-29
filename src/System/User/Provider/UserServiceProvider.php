<?php
namespace Malla\User\Provider;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

   public function boot( Kernel $HTTP, Translator $LANG ) {
   }

   public function register() {
   }
}
