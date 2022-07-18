<?php
namespace Malla\Http\Install\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Malla\Http\Install\Support\Home;

class HomeController extends Controller {

   public function __construct( Home $app ) {
      $this->boot($app);
   }

   public function index() { 
      return $this->render( "home", $this->app->data() );
   }

}
