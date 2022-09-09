<?php
namespace Malla\Http\Admin\Component;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\View\Component;

class Cursor extends Component {

   protected $index;

   protected $segments;

   public function __construct( $index ) {
      $this->index      = $index;
      $this->segments   = count(__segment()) - 1;
   }

   public function tab($multiplier=0, $arg=" ") {
      return str_repeat($arg, $multiplier + $this->index);
   }

   public function parse($value) {
      $value = ucwords($value);
      return $value;
   }

   public function render( $tag=null ) {

      $tag .= $this->tab(0);
      $tag .= '<div class="" aria-label="breadcrumb">'."\n";
      $tag .= $this->tab(8);
      $tag .= '<ol class="breadcrumb">'."\n";

      $uri = null;

      foreach (__segment() as $key => $value) {
         $uri .= "$value/";
         $tag .= $this->tab(12);
         $tag .= '<li class="breadcrumb-item">'."\n";

         if( $key == $this->segments) {
            $tag .= $this->tab(16);
            $tag .= $this->parse($value)."\n";
         }
         else {
            $tag .= $this->tab(16);
            $tag .= '<a href="'.__url($uri).'">'."\n";

            $tag .= $this->tab(20);
            $tag .= $this->parse($value)."\n";

            $tag .= $this->tab(16);
            $tag .= '</a>'."\n";
         }

         $tag .= $this->tab(12);
         $tag .= "</li>\n";
      }

      $tag .= $this->tab(8);
      $tag .= "</ol>\n";
      $tag .= $this->tab(4);
      $tag .= "</div>\n";

      return $tag;
   }
}
