<?php
namespace Malla\Http\Admin\Support\Users;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class HomeSupport {

   protected $app;

   public function __construct( ) {
   }

   public function data() {

      $data["title"] = "Usuarios";

      return $data;
   }

   public function register() {

      $data["title"] = "Nuevo usuarios";

      return $data;
   }

   public function create() {
      return "POST";
   }
}
