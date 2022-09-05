<?php
namespace Malla\Http\Admin\Request;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class UserRegister extends FormRequest {

   public function authorize() {
      return true;
  }

  public function rules() {
      return [
         "firstname" => "required",
         "lastname"  => "required",
         "email"     => "required|email|unique:users,email",
         "password"  => "required"
      ];
  }
}
