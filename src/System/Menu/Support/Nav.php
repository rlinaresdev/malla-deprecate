<?php
namespace Malla\Menu\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Nav {

   protected $app;

   public function __construct( $app=null ) {
      $this->app = $app;
   }

   public function load() {
      return $this;
   }
}
