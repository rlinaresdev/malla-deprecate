<?php
namespace Malla\Http\Admin\Menu\Items;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/
use Malla\Menu\Facade\Nav;

class User {

   protected $auth;

   protected $menu;

   public function __construct( $auth=null ) {
      $this->auth = $auth;
   }

   public function items() {

      if(__segment(2, "users") ) {

         Nav::load("rightnav")->addItem(0, [
            "icon"   => "mdi-account-circle",
            "label"  => "Inicio",
            "url"    => "/admin/users",
            "isOn"   => (request()->path() == "admin/users")
         ]);

         Nav::load("rightnav")->addItem(10, [
            "icon"   => "mdi-account-plus",
            "label"  => "Nuevo",
            "url"    => "/admin/users/add",
            "isOn"   => __segment(3, "add")
         ]);

         Nav::load("rightnav")->addItem(20, [
            "icon"   => "mdi-account-group",
            "label"  => "Grupos",
            "url"    => "/admin/users/groups",
            "isOn"   => (request()->path() == "admin/users/groups")
         ]);
      }
   }
}
