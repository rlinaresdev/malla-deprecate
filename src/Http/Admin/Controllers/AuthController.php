<?php
namespace Malla\Http\Admin\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Malla\Http\Admin\Support\Auth;
use Malla\Http\Admin\Request\Auth as Request;

class AuthController extends Controller {

     public function __construct( Auth $app ) {
        $this->boot($app);
     }

     public function index() {
        return $this->render( "auth", $this->app->data() );
     }

     public function login( Request $request ) {
        return $this->app->login($request);
     }

     public function logout() {
        return $this->app->logout();
     }

}
