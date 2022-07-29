<?php
namespace Malla\Http\Admin\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Auth;

class AuthSupport {

   protected $app;

   public function __construct( ) {
   }

   public function data() {
      return [
         "title" => "Identificate",
      ];
   }

   public function login( $request ) {

      $credential = $request->only("emial", "password");

      if( ($auth = Auth::guard("admin"))->attempt($credential) ) {

         $request->session()->regenerate();

         return redirect()->intended("/admin");
      }

      return back()->withErrors([
         'email' => 'Credenciales incorrectas.',
      ])->onlyInput('email');
   }

   public function logout() {
      
      Auth::guard("admin")->logout();

      return back();
   }
}
