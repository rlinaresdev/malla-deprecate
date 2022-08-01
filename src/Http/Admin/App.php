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
* MENU */
if(__segment("1", "admin") ):

   Nav::area("mn-0", "Navegacion principal isquierda");
   Nav::area("mn-1", "Navegacion principal derecha");

   Nav::load(\Malla\Http\Admin\Menu\LeftNav::class);

   //dd(Nav::load());

endif;

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
