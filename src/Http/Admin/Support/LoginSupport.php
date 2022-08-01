<?php
namespace Malla\Http\Admin\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Auth;

class LoginSupport {

   protected $app;

   public function __construct( ) {
   }

   public function data() {

      $data["title"] = "Solicitar acceso";

      return $data;
   }

   public function attempt( $request ) {

      if( Auth::attempt($request->only("email", "password" )) ) {
         return redirect()->intended("/");
      }

      return back()->withErrors([
         'email' => 'Credenciales incorrectas.',
      ])->onlyInput('email');
   }

   public function logout() {

      Auth::logout();

      return back();
   }
}
