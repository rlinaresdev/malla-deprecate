<?php
namespace Malla\Http\Admin\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Closure;
use Malla\Http\Admin\Support\Skin;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {

   protected $exerts = [];

   public function __construct() {
   }

   public function handle($request, Closure $next, $guard = "web" ) {

      $AUTH = Auth::guard($guard);

      if( $AUTH->guest() && !in_array($request->path(), $this->exerts) ) {
         return redirect()->to("login");
      }

      if( $AUTH->check() ) {
         require_once(__path("__http/Admin/Menu/Handler.php"));
      }

      /*
      * VARIABLES LAS PLANTILLAS */
      $data["title"]    = "Empty";
      $data["charset"]  = "utf-8";
      $data["language"] = "es";
      $data['skin']     = new Skin(config("admin.skin", "rosy"));
      $data["user"]     = $AUTH->user();

      view()->share($data);

      return $next($request);
   }

}
