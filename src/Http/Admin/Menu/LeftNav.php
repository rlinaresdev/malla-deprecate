<?php
namespace Malla\Http\Admin\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

//use Malla\Menu\Support\NavAccessor;

class LeftNav {

   public function __construct( $auth ) {
   }

   public function slug(){
     return "leftnav";
   }

   public function area(){
     return "mn-0";
   }

   public function filters(){
   }

   public function items() {

     $nav[0]["icon"]    = "mdi mdi-home";
     $nav[0]["lab"]     = "words.home";
     $nav[0]["url"]     = "/";

     $nav[10]["icon"]   = "mdi mdi-web";
     $nav[10]["lab"]    = "";
     $nav[10]["url"]    = "/admin/website";

     $nav[10]["icon"]   = "mdi mdi-account-cog-outline";
     $nav[10]["lab"]    = "";
     $nav[10]["url"]    = "/admin/users";

     return $data;
   }
}
