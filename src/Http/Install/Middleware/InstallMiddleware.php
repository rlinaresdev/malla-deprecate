<?php
namespace Malla\Http\Install\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Closure;
use Malla\Core\Facade\Core;
use IlluminateSupportFacadesAuth;

class InstallMiddleware {

   protected $exerts = [];

   public function handle($request, Closure $next, $guard = "web") {
      if( Core::isRunning() == false && __segment(1) != "install" ) {
         return redirect("install");
      }
      return $next($request);
   }

}
