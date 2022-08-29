<?php
namespace Malla\Http\Admin\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\Menu\Template\ListUL;

class LeftNav {

   public $slug = "leftnav";

   public $area = "mn-0";

   protected $items = [];

   public function __construct( $auth=null ) {
   }

   public function addItem( $order=0, $item=null ) {
      if( is_numeric($order) && is_array($item) ) {
         $this->items[$order] = $item;
      }
   }

   public function addItems($items=null) {
      foreach ($items as $key => $item) {
         $this->items[$key] = $item;
      }
   }

   public function menu() {

     $nav[0]["icon"]    = "mdi-home";
     $nav[0]["label"]   = "";
     $nav[0]["url"]     = "/admin";

     $nav[10]["icon"]   = "mdi-web";
     $nav[10]["label"]  = "";
     $nav[10]["url"]    = "/admin/website";

     $nav[20]["icon"]   = "mdi-account-cog-outline";
     $nav[20]["label"]  = "";
     $nav[20]["url"]    = "/admin/users";

     return $nav;
   }

   public function deploy( $index=4 ) {      

      $html = new ListUL($this->items);

      $html->addFilterStyle("match", [
         ":node0" => "nav",
      ]);

      // $html->addFilterLabel("dress", [
      //    ":username" => '<span class="text-toggle">Ramon Linares </span>',
      // ]);

      return $html->nav($index);
   }
}
