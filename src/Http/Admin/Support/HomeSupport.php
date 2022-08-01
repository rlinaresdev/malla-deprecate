<?php
namespace Malla\Http\Admin\Support;

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

      $data["title"] = "Administracion";

      return $data;
   }
}
