<?php
namespace Malla\Http\Admin\Support\Users;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\User\Model\Store;

class HomeSupport {

   protected $app;

   public function __construct( Store $user ) {
      $this->user = $user;
   }

   public function data() {

      $data["title"] = "Usuarios";

      return $data;
   }

   public function register() {

      $data["title"] = "Nuevo usuarios";

      return $data;
   }

   public function create( $request ) {

      $this->user->fullname   = $request->firstname." ".$request->lastname;
      $this->user->shortname  = $request->firstname;
      $this->user->email      = $request->email;
      $this->user->password   = $request->password;

      if( $this->user->save() ){
         return  __back("admin/users");
      }

      return back();
   }
}
