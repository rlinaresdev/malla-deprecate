<?php
namespace Malla\Http\Admin\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Auth {

   protected $app;

   public function __construct( ) {
   }

   public function data() {
      return [
         "title" => "Identificate",
      ];
   }

   public function login( $request ) {

      $data["email"]    = $request->email;
      $data["password"] = $request->password;

      if( ($auth = auth()->guard("admin"))->attempt($data) ) {
         return redirect()->intended("/");
      }

      return back()->withErrors([
         'email' => 'The provided credentials do not match our records.',
      ])->onlyInput('email');
   }

   public function logout() {
      auth()->guard("admin")->logout();
      return back();
   }
}
