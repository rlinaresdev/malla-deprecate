<?php
namespace Malla\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
     return [
        "name"			   => "Menu",
        "author"		   => "Ing. Ramón A Linares Febles",
        "email"			=> "rlinares4381@gmail.com",
        "license"		   => "MIT",
        "support"		   => "http://www.iipec.net",
        "version"		   => "V-1.0",
        "description" 	=> "Menu V-1.0",
     ];
   }

   public function app() {
   	return [
   		"type"			=> "library",
   		"slug"			=> "menu",
   		"driver"		   => \Malla\Menu\Driver::class,
   		"token"			=> NULL,
   		"activated" 	=> 1,
   	];
   }

   ## KERNEL
   public function providers() {
     return [
        \Malla\Menu\Provider\MenuServiceProvider::class,
     ];
   }

   public function alias() {
     return [
        "Nav" => \Malla\Menu\Facade\Nav::class,
     ];
   }

   public function install( $app ) {
      $app->create($this->app())->addInfo($this->info());
   }

   public function uninstall( $app ) {
   }
}
