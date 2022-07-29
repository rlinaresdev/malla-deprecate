<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


/*
* CONFIGS */


//dd(app("core")->module());

/*
* URLS */
$this->app["core"]->addUrl([
   "__admin" => config("admin.prefix"),
   "current" => request()->path(),
]);

/*
* GRAMMARIES */
//$this->loadGrammary("es_DO");

/*
* MIDDLEWARE */
$this->bootMiddleware(
   \Malla\Http\Admin\Middleware\Handler::class
);

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'admin');

/*
* CDN */
$this->publishes([
   __path(__DIR__."/Storage/Assets") => __path("__cdn")
], "admin");

if(!function_exists("__fiv") ) {
   function __fiv($name=null) {
      if(empty($name)) return null;
   }
}
