<?php
namespace Malla\Menu\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

//Nav::tag("slug")
// Nav::listen("slug");

class Nav {

   protected $taggs = [];

   protected $areas = [];

   public function __construct( $app=null ) {
   }

   public function load($nav=null) {
      if(empty($nav)) return $this;

      $nav = $this->optimize($nav);

      if( method_exists($nav, "slug") ) {
         if( !array_key_exists(($slug = $nav->slug()), $this->taggs) ) {
            $this->taggs[$slug] = $nav;
         }
      }
   }

   public function optimize($nav, $args=null) {
      if( is_object($nav) ) return $nav;

      if( class_exists($nav) ) {
         return new $nav($args);
      }

      abort(500, "Error al tratar de optimizar el menu");
   }

   /*
   * Crear area de menu */
   public function area($slug=null, $description=null) {
      if( !array_key_exists($slug, $this->areas) ) {
         $this->areas[$slug] = new \Malla\Menu\Support\Area(
            $slug, $description
         );
      }
   }

   /*
   * Desplegar menu etiquetado */
   public function tag() {}

   /*
   * Desplegar menu dinamico */
   public function listen(){}
}
