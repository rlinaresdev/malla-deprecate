<?php
namespace Malla\Http\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
     return [
        "name"			   => "Admin",
        "author"		   => "Ing. Ramón A Linares Febles",
        "email"			=> "rlinares4381@gmail.com",
        "license"		   => "MIT",
        "support"		   => "http://www.iipec.net",
        "version"		   => "V-1.0",
        "description" 	=> "Admin V-1.0",
     ];
   }
   public function app() {
   	return [
   		"type"			=> "package",
   		"slug"			=> "admin",
   		"driver"		   => \Malla\Http\Admin\Driver::class,
   		"token"			=> NULL,
   		"activated" 	=> 1,
   	];
   }

   ## KERNEL
   public function providers() {
     return [
         \Malla\Http\Admin\Providers\AdminServiceProvider::class,
         \Malla\Http\Admin\Providers\RouteServiceProvider::class
     ];
   }

   public function alias() {
     return [];
   }

   public function install( $app ) {
      $app->create($this->app())->addInfo($this->info());
   }
   public function uninstall( $app ) {
   }
}
