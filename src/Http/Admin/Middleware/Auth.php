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

   protected $exerts;

   protected $prefix;

   public function __construct() {

      $this->prefix = config("admin.prefix");

      $this->exerts = [
         "$this->prefix/login",
         "$this->prefix/logout"
      ];
   }

   public function handle($request, Closure $next, $guard = "admin") {

      $auth = auth()->guard($guard);
      /*
      * VARIABLES LAS PLANTILLAS */

      $data["title"]    = "Empty";
      $data["charset"]  = "utf-8";
      $data["language"] = "es";
      $data['skin']     = new Skin(config("admin.skin", "rosy"));

      view()->share($data);

      if( $auth->guest($guard) && !in_array($request->path(), $this->exerts)) {
    		return __back("__admin/login");
    	}

      return $next($request);
   }

}
