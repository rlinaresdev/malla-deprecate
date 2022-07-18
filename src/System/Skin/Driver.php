<?php
namespace Malla\Skin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
     return [
        "name"			   => "Skin",
        "author"		   => "Ing. Ramón A Linares Febles",
        "email"			=> "rlinares4381@gmail.com",
        "license"		   => "MIT",
        "support"		   => "http://www.iipec.net",
        "version"		   => "V-1.0",
        "description" 	=> "Skin V-1.0",
     ];
   }
   public function app() {
   	return [
   		"type"			=> "library",
   		"slug"			=> "skin",
   		"driver"		   => \Malla\Skin\Driver::class,
   		"token"			=> NULL,
   		"activated" 	=> 1,
   	];
   }

   ## KERNEL
   public function providers() {
     return [
     ];
   }

   public function alias() {
     return [];
   }

   public function install( $app ) {
   }
   public function uninstall( $app ) {
   }
}
