<?php
namespace Malla\Http\Admin\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Malla\Http\Admin\Support\HomeSupport;

class HomeController extends Controller {

  public function __construct( HomeSupport $app ) {
      $this->boot($app);
   }

  public function index() {
      return $this->render( "home", $this->app->data() );
   }

}
