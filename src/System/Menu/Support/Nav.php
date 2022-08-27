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

      if( is_object( ($nav = $this->optimize($nav)) ) ) {

         if( !array_key_exists( $nav->slug, $this->taggs ) ) {
            $this->taggs[$this->slug] = $nav;
         }

         if( method_exists($nav, "slug") ) {
            // if( !array_key_exists(($slug = $nav->slug()), $this->taggs) ) {
            //    $this->taggs[$slug] = $nav;
            // }
         }

         // if( method_exists($nav, "area") ) {
         //    if( array_key_exists(($area = $nav->area()), $this->areas) ) {
         //       $this->areas[$area]->add($nav);
         //    }
         // }

      }
   }


   public function save($slug=null, $closure=null ) {
      if( !empty($slug) ) {
         if( is_array($slug) ) {

         }
         elseif ( is_object($slug) ) {
            $this->saveFromObject( $slug );
         }
         elseif( is_string($slug) && is_null($closure) ) {
            if( class_exists($slug) ) {
               $this->saveFromObject(new $slug);
            }
         }
         elseif( is_string($slug) && $closure instanceof  \Closure ){

         }
      }
   }

   public function saveFromObject( $menu ) {
      if( is_object($menu) ) {
         if( !array_key_exists($menu->slug, $this->taggs) ) {
            $this->taggs[$menu->slug] = $menu;
         }

         if( !empty($menu->area) ) {
            if( array_key_exists($menu->area, $this->areas) ) {
               $this->areas[$menu->area]->add($menu);
            }
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
   * Area Menu */
   public function area($slug=null) {
      if(!empty($slug) && is_string($slug) ) {
         if ( array_key_exists($slug, $this->areas) ) {
            return $this->areas[$slug];
         }
      }
   }

   /*
   * Crear area de menu */
   public function createArea($slug=null, $description="Empty Name Menu") {

      if(!empty($slug) && is_string($slug) ) {
         if( !array_key_exists($slug, $this->areas) ) {
            $this->areas[$slug] = new \Malla\Menu\Support\Area(
               $slug, $description
            );
         }
      }

   }

   /*
   * Desplegar menu etiquetado */
   public function tag( $slug=null, $index=4 ) {
      if( !empty($slug) && is_string($slug) ) {
         if( array_key_exists($slug, $this->taggs) ) {
            if( is_object( ($menu = $this->taggs[$slug]) ) ) {
               if( method_exists($menu, "deploy") ) {
                  return $menu->deploy($index);
               }
            }
         }
      }
   }

   /*
   * Desplegar menu dinamico */
   public function listen(){}
}
