<?php
namespace Malla\Http\Admin\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\Menu\Template\ListUL;

class RightNav {

   public $slug = "rightnav";

   public $area = "mn-0";

   protected $items = [];

   protected $filters = [];

   public function __construct( ) {
      $this->menu = new ListUL;
   }

   public function addItem( $order=0, $item=null ) {
      if( is_numeric($order) && is_array($item) ) {
         $this->items[$order] = $item;
      }
   }

   public function deploy( $index=4 ) {

      ksort($this->items);

      $this->menu->addItems($this->items);

      $this->menu->addFilterStyle("match", [
         ":node0" => "nav flex-column",
      ]);

      return $this->menu->nav($index);
   }
}
