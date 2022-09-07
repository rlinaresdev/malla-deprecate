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

      $data["title"]       = "Usuarios";
      $data["users"]       = $this->getUsers(10);

      return $data;
   }

   public function register() {

      $data["title"]       = "Nuevo usuarios";
      $data["container"]   = "col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12";

      return $data;
   }

   public function create( $request ) {

      $this->user->fullname   = $request->firstname." ".$request->lastname;
      $this->user->shortname  = $request->firstname;
      $this->user->email      = $request->email;
      $this->user->password   = $request->password;
      $this->user->type       = $request->type;

      if( $this->user->save() ){
         return  __back("admin/users");
      }

      return back();
   }

   public function getUsers($paginate=10) {

      $users = $this->user;

      return $users->paginate($paginate);
   }
}
