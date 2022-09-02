<?php
namespace Malla\Http\Admin\Controllers\Users;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Malla\Http\Admin\Support\Users\HomeSupport;

class HomeController extends Controller {

   public function __construct( HomeSupport $app ) {
      $this->boot($app);
   }

   public function index() {
      return $this->render( "home", $this->app->data() );
   }

   public function register() {
      return $this->render( "register", $this->app->register() );
   }

   public function create() {
      return $this->app->create();
   }
}
