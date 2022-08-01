<?php
namespace Malla\Http\Path\Support;

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
}
