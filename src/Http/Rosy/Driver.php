<?php
namespace Malla\Http\Rosy;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
     return [
        "name"			  => "Rosy",
        "author"		  => "Ing. Ramón A Linares Febles",
        "email"		  => "rlinares4381@gmail.com",
        "license"		  => "MIT",
        "support"		  => "http://www.iipec.net",
        "version"		  => "V-1.0",
        "description"  => "Rosy V-1.0",
     ];
   }
   public function app() {
   	return [
   		"type"			=> "theme",
   		"slug"			=> "rosy",
   		"driver"		   => \Malla\Http\Rosy\Driver::class,
   		"token"			=> NULL,
   		"activated" 	=> 1,
   	];
   }

   ## HANDLER
   public function path() {
   	return __DIR__."/App.php";
   }

   ## FORGE
   public function install( $app ) {
      $app->create($this->app())->addInfo($this->info());
   }
   public function uninstall( $app ) {
   }
}
