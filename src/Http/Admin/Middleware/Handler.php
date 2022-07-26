<?php
namespace Malla\Http\Admin\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Handler {

   public function init() {
      return [
      ];
   }

   public function route() {
      return [
      ];
   }
   public function groups() {
      return [
         "admin" => [
            \Malla\Http\Admin\Middleware\Auth::class
         ]
      ];
   }
}
