<?php
namespace Malla\Http\Admin\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Skin {

   protected $slug;

   public function __construct( $slug=null ) {
      $this->slug = $slug;

      $themes  = app("core")->module("theme");

      if( array_key_exists($slug, $themes) ) {
         $theme = $themes[$slug];
      }


   }

   public function setOrCreateVar( $key, $value ) {
      $this->{$key} = $value;
   }

   public function layout( $key=null, $default=null) {
      if( array_key_exists( $key, $this->layouts) ){
         return $this->layouts[$key];
      }

      return $default;
   }

   public function path($uri="master") {
      return "$this->slug::$uri";
   }

   public function view($view=NULL, $data=[], $mergeData=[]) {

		if( view()->exists( ($path = $this->path($view)) ) ) {
			return view($path, $data, $mergeData);
		}

		return "ERROR 404 :: La vista {$path} no existe.";
	}
}
