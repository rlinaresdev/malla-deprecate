<?php
namespace Malla\Http\Admin\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Malla\Http\Admin\Support\AuthSupport;
use Malla\Http\Admin\Request\AuthRequest;

class AuthController extends Controller {

     public function __construct( AuthSupport $app ) {
        $this->boot($app);
     }

     public function index() {
        return $this->render( "auth", $this->app->data() );
     }

     public function login( AuthRequest $request ) {
        return $this->app->login($request);
     }

     public function logout() {
        return $this->app->logout();
     }

}
