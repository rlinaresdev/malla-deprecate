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
//use Illuminate\Support\Facades\Auth;

class Auth {

   protected $exerts = [];

   public function __construct() {
   }

   public function handle($request, Closure $next, $guard = "admin") {

      /*
      * VARIABLES LAS PLANTILLAS */

      $data["title"]    = "Empty";
      $data["charset"]  = "utf-8";
      $data["language"] = "es";
      $data['skin']     = new Skin(config("admin.skin", "rosy"));

      view()->share($data);

      return $next($request);
   }

}
