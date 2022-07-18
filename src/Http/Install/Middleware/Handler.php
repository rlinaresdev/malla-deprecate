<?php
namespace Malla\Http\Install\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Handler {

   public function init() {
      return [
         \Malla\Http\Install\Middleware\InstallMiddleware::class,
      ];
   }

   public function route() {
      return [];
   }
   public function groups() {
      return [
         "install" => [
         ]
      ];
   }
}
