<?php
namespace Malla\Http\Admin\Controllers\Website;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Malla\Http\Controllers\Support\HomeSupport;

class HomeController extends Controller {

     public function __construct( HomeSupport $app ) {
        $this->boot($app);
     }

     public function index() {
        return $this->render( "home", $this->app->data() );
     }

}
