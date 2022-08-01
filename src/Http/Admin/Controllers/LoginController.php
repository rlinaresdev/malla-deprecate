<?php
namespace Malla\Http\Admin\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Malla\Http\Admin\Request\LoginRequest;
use Malla\Http\Admin\Support\LoginSupport;

class LoginController extends Controller {

   public function __construct( LoginSupport $app ) {
      $this->boot($app);
   }

   public function index() {
      return $this->render( "login", $this->app->data() );
   }

   public function login( LoginRequest $request ) {
      return $this->app->attempt($request);
   }

   public function logout() {
      return $this->app->logout();
   }

}
