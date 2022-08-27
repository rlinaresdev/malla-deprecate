<?php
namespace Malla\Menu\Template;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class ListUL {

   protected $items;

   protected $filters = [
      "style" => [],
      "label" => []
   ];

   public function __construct( $items ) {
      $this->items = $items;
   }

   /*
	* FILTERS */
   public function filter( $key=null, $data=[] ) {
      if( array_key_exists($key, $this->filters) ) {

         // FROM ARRAY
         if( is_array($data) ) {
            $this->filters[$key] = array_merge($this->filters[$key], $data);
         }
      }
   }

   /*
   * SET MENU */
   public function __filter( $key=null, $value=null, $filters=null ) {

      foreach ( $this->filters[$key] as $search => $args ) {
         // MATCH -> reemplazar
         if( $search == "match" && is_array( $args ) ) {
            foreach ( $args as $alia => $arg ) {
               $value = str_replace($alia, $arg, $value);
            }
         }

         // DRESS -> Vestir o revertir
         if( $search == "dress" && is_array( $args ) ) {
            foreach ( $args as $alia => $arg ) {
               $value = str_replace($alia, $arg, $value);
            }
         }
      }

      return $value;
   }

   /*
   * MAGI SUMMONER FILTER */
   public function __call($method, $args) {

      if( array_key_exists($method, $this->filters) && !empty($args) ) {

         $value = $args[0];
         
         foreach ($this->filters[$method] as $search => $store) {
            if( $search == "match" && is_array($store) ) {
               foreach ($store as $src => $replace) {
                  $value = str_replace($src, $replace, $value);
               }
            }

            if( $search == "label" && is_array($store) ) {
               dd($search);
               foreach ($store as $src => $replace) {
                  $value = str_replace($src, $replace, $value);
               }
            }
         }

         return $value;
      }

      if( preg_match( '/^addFilter/', $method ) ) {

         $key = strtolower(str_replace("addFilter", null, $method));

         if( count($args) == 2 ) {
            $filters[$args[0]] = $args[1];
            $this->filters[$key] = array_merge($this->filters[$key], $filters);
         }

         return null;
      }
   }

   /*
	* TABULADOR */
	public function tab($multiplier=0, $input=" ") {
		return str_repeat($input, $multiplier);
	}

   /*
	* HELPER DE ICONOS E IMAGENES */
	public function icon($icon=NULL) {
		if( empty($icon) ):
			return NULL;
		elseif($icon == "icon-toggle-nav"):
			return '<i class="mdi mdi-segment"></i> ';
		elseif( preg_match('/^mdi/', $icon) ) :
			return '<i class="mdi '.$icon.'"></i> ';
		elseif( preg_match('/^glyphicon/', $icon) ):
			return '<span class="'.$icon.'"></span> ';
		elseif ( preg_match('/[jpg|png|svg|gif]/i', $icon) ):
			return '<img src="'.__url($icon).'" class="navicon" alt="Image"> ';
		endif;

		return NULL;
	}

   /*
	* LINKS */
	public function link($item=null, $index=4 ) {
		$html = $this->tab($index+4);
      $html .= '<a href="'.$item['url'].'" class="nav-link">'."\n";

      $html .= $this->tab($index+8);
      $html .= $this->icon($item["icon"]);
      $html .= $item["label"];

      $html .= "\n";
      $html .= $this->tab($index+4);
      $html .= "</a>\n";

      return $html;
	}

   /*
	* DROPDOWN */
   public function dropdow( $items, $index ) {
      $html = $this->tab($index+4);
      $html .= '<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-bs-toggle="dropdown">'."\n";

      $html .= $this->tab($index+8);
      $html .= $this->icon($items["icon"]);
      $html .= $items["label"];

      $html .= "\n";
      $html .= $this->tab($index+4);
      $html .= "</a>\n";

      $html .= $this->tab($index+4);
      $html .= '<div class="'.$this->style(':node2').'">'."\n";

      foreach ( $items["url"] as $row => $item ) {
         $html .= $this->tab($index+8);
         $html .= '<a href="'.$item['url'].'" class="dropdown-item" >'."\n";

         $html .= $this->tab($index+12);
         $html .= $this->icon($item["icon"]);
         $html .= $this->label($item["label"]);

         $html .= "\n";
         $html .= $this->tab( $index+8 );
         $html .= "</a>\n";
      }

      $html .= $this->tab($index+4);
      $html .= "<div>\n";

      return $html;
   }

   public function render($index=4) {

      if( !empty($this->items) ) {

         $html = null;
         $html .= '<ul class"'.$this->style(":node0", "node1").'">'."\n";

         foreach ($this->items as $Y0 => $X0 ) {
            if( !is_array($X0["url"]) ) {
               $html .= $this->tab($index+4);
               $html .= '<li class="nav-item">'."\n";
               $html .= $this->link($X0, $index+8);
               $html .= $this->tab($index+4);
               $html .= "</li>\n";
            }
            elseif( is_array($X0["url"]) ) {
               $html .= $this->tab($index+4);
               $html .= '<li class="'.$this->style(":node1").'">'."\n";

               $html .= $this->dropdow($X0, $index+8);
               $html .= $this->tab($index+4);
               $html .= "</li>\n";
            }
         }

         $html .= $this->tab($index);
         $html .= "</ul>\n";

         return $html;
      }
   }


}
