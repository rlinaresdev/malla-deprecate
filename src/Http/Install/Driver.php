<?php
namespace Malla\Http\Install;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   ### HEADER
   public function info() {

  		return [
  			"name"			=> "Install",
  			"author"		   => "Ing. Ramón A Linares Febles",
  			"email"			=> "rlinares4381@gmail.com",
  			"license"		=> "MIT",
  			"support"		=> "http://www.iipec.net",
  			"version"		=> "V-1.0",
  			"description" 	=> "Install V-1.0",
  		];
  	}

  	public function app() {
  		return [
  			"type"			=> "packages",
  			"slug"			=> "install",
  			"token"			=> NULL,
  			"activated" 	=> 1,
  		];
  	}

   ## KERNEL
   public function providers() {
      return [
         \Malla\Http\Install\Providers\InstallServiceProvider::class,
         \Malla\Http\Install\Providers\RouteServiceProvider::class,
      ];
   }

   public function alias() {
      return [];
   }

  	public function handler($core) {
  		$core->create($this->app())->addInfo($this->info())->addMeta("type", $this->meta());
  	}
}
