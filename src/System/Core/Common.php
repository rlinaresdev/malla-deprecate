<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/* CORE FACADE */
$this->app->bind( "Core", function($app) {
	return new \Malla\Core\Support\Core(
		new \Malla\Core\Support\Bootstrap($app)
	);
});

## INSTANCIA DEL CORE
$this->app["core"] = Core::load();

## FUNCIÓN CORE
if(!function_exists("core")) {
   function core( $key=null ) {
      return Core::load($key);
   }
}

## REGISTROS DE BIBLIOTECAS BÁSICAS
Core::load( "finder", new \Malla\Core\Support\Finder );
Core::load( "loader", new \Malla\Core\Support\Loader($this->app) );
Core::load( "coredb", new \Malla\Core\Support\StorDB( $this->app["db"] ) );
Core::load( "urls", new \Malla\Core\Support\Urls($this->app) );

## COMMON HELPER
require_once(__DIR__."/Support/Helper.php");

## URL ETIQUETADAS
Core::addUrl([
   "__base"    => Core::load("urls")->baseDir(),
   "__cdn"    => "__base/cdn/",
]);

## DIRECTORIOS ETIQUETADOS
Core::addPath([
   "__base"          => core("urls")->baseDir(),
   "__core"          => realpath(__DIR__."/../"),
   "__http"          => realpath(__DIR__."/../../Http"),
   "__cdn"           => public_path("__base/cdn/"),
   "__localmodule"   => realpath(__DIR__."/../../../")."/",
   "__locale"        => "__core/Http/Locale/",
   "__public"        => public_path("/__base")
]);

/* APP CONFIGS
* Archivo de configuracion */
$configs = $this->app["files"]->requireOnce(__DIR__."/app.php");

foreach ($configs as $key => $value) {
   $this->app['config']->set("app.$key", $value);
}

/* INIT
* Inicializando los modulos */
Core::init();

if( Core::isRunning() ) {
   /*
   * HANDLER AND LOAD STABLE CORE */
   $this->mount(Core::load());
}
else {
   Core::run(\Malla\Http\Install\Driver::class);
}
