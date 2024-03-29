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

   protected $filters = [];

   public function __construct( ) {
      $this->menu = new ListUL;
   }

   public function addFilters($filters) {
      if( !empty($filters) && is_array($filters) ) {
         $this->filters = array_merge($this->filters, $filters);
      }
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
         ":node0" => "nav",
      ]);



      $this->menu->addFilterLink("active", function($style) {
         //dd($style);
         return null;
      });

      //dd($this->menu);

      return $this->menu->nav($index);
   }
}
