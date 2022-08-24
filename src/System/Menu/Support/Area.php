<?php
namespace Malla\Menu\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Area {

   protected $slug;

   protected $description;

   protected $stors = [];

   public function __construct( $slug=null, $description="Empty" ) {

      $this->slug          = $slug;
      $this->description   = $description;

   }

   public function add( $menu=null ) {

      $this->stors[] = $menu;
   }

   public function info() {
      return $this->description;
   }

   public function __get($property) {
      return $this->getProperty($property);
   }

   public function getProperty($property) {
      if( isset($this->{$property}) ) {
         return $this->{$property};
      }
   }
}
