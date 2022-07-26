<?php
namespace Malla\Http\Admin\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Malla\Http\Admin\Support\Auth;

class AuthController extends Controller {

     public function __construct( Auth $app ) {
        $this->boot($app);
     }

     public function index() {
        return $this->render( "auth", $this->app->data() );
     }

}
