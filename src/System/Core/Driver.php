<?php
namespace Malla\Core;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
  		return [
  			"name"			=> "Core",
  			"author"		   => "Ing. Ramón A Linares Febles",
  			"email"			=> "rlinares4381@gmail.com",
  			"license"		=> "MIT",
  			"support"		=> "http://www.iipec.net",
  			"version"		=> "V-1.0",
  			"description" 	=> "Core V-1.0",
  		];
  	}

  	public function app() {
  		return [
  			"type"			=> "core",
  			"slug"			=> "core",
  			"driver"			=> \Malla\Core\Driver::class,
  			"token"			=> NULL,
  			"activated" 	=> 1,
  		];
  	}

  	public function meta() {
  		return [
  		];
  	}

   public function install( $app ) {
      dd($app);
   }

  	public function handler($core) {
  		$core->create($this->app())->addInfo($this->info())->addMeta("type", $this->meta());
  	}
}
