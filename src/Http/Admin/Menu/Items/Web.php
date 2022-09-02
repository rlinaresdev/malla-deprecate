<?php
namespace Malla\Http\Admin\Menu\Items;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\Menu\Facade\Nav;

class Web {

   protected $auth;

   public function __construct( $auth=null ) {
      $this->auth = $auth;
   }

   public function items() {
      if( __segment(2, "website") ) {
         Nav::load("rightnav")->addItem(0, [
            "icon"   => "mdi-web",
            "label"  => "Inicio",
            "url"    => "/admin/website/entry",
            "isOn"   => __isUrl("admin/website")
         ]);

         Nav::load("rightnav")->addItem(10, [
            "icon"   => "mdi-text-short",
            "label"  => "Entradas",
            "url"    => "/admin/website/entry",
            "isOn"   => __isUrl("admin/website/entry")
         ]);
         Nav::load("rightnav")->addItem(20, [
            "icon"   => "mdi-text-long",
            "label"  => "Paginas",
            "url"    => "/admin/website/pages",
            "isOn"   => __isUrl("admin/website/pages")
         ]);
         Nav::load("rightnav")->addItem(30, [
            "icon"   => "mdi-multimedia",
            "label"  => "Media",
            "url"    => "/admin/website/media",
            "isOn"   => __isUrl("admin/website/media")
         ]);
      }
   }
}
