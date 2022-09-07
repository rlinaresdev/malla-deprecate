<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
 * Admin
*/


/*
* CONFIGS */


//dd(app("core")->module());

/*
* URLS */
$this->app["core"]->addUrl([
   "__admin"   => config("admin.prefix"),
   "current"   => request()->path(),
   "__avapath" => "__base/cdn/images"
]);

/*
* PATH */
$this->app["core"]->addPath([
   "__admin" => __DIR__,
   "__package" => "__public/package"
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
* START IF ADMIN */
if(__segment("1", "admin") ):
   /*
   * COMPONENTES */
   Blade::component("cursor-navigator", \Malla\Http\Admin\Component\Cursor::class);

   /*
   * AREA MENU */
   Nav::createArea("mn-0", "Navegacion principal isquierda");
   Nav::createArea("mn-1", "Navegacion principal derecha");

   /*
   * REGISTER MENU */
   Nav::save(new \Malla\Http\Admin\Menu\LeftNav);
   Nav::save(new \Malla\Http\Admin\Menu\RightNav);



endif;

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'admin');

/*
* CDN */
$this->publishes([
   __path("__http/Install/Storage/Assets/") => __path("__cdn"),
   __path("__admin/Assets") => __path("__package/admin/assets")
], "admin");

if(!function_exists("__fiv") ) {
   function __fiv($name=null) {
      if(empty($name)) return null;
   }
}
