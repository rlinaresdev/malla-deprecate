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

   public function tag(){
     return "leftnav";
   }

   public function area(){
     return "";
   }

   public function filters(){
   }

   public function items() {
     return [];
   }
}
