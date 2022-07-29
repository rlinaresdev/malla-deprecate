<?php
namespace Malla\Http\Admin\Request;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest {

   public function authorize() {
      return true;
  }

  public function rules() {
      return [
         "email"     => "required",
         "password"  => "required",
      ];
  }
}
