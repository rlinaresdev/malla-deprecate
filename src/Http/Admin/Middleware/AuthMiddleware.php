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

class AuthMiddleware {

   protected $exerts;

   protected $prefix;

   public function __construct() {

      $this->prefix = config("admin.prefix");

      $this->exerts = [
         "login",
         "logout"
      ];
   }

   public function handle($request, Closure $next, $guard = "admin") {        

      /*
      * SKIN */
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
