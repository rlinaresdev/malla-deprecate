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
   "__admin" => config("admin.prefix"),
   "current" => request()->path(),
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
   * AREA MENU */
   Nav::createArea("mn-0", "Navegacion principal isquierda");
   Nav::createArea("mn-1", "Navegacion principal derecha");

   /*
   * MENU */
   Nav::save(new \Malla\Http\Admin\Menu\LeftNav);

   Nav::load("leftnav")->addItem(10, [
      "icon"   => "mdi-home",
      "label"  => "",
      "url"    => "/admin"
   ]);

   Nav::load("leftnav")->addItem(0, [
      "icon"   => "mdi-web",
      "label"  => "",
      "url"    => "/admin"
   ]);

   $nav[0]["icon"]    = "mdi-home";
   $nav[0]["label"]   = "";
   $nav[0]["url"]     = "/admin/website";

   $nav[10]["icon"]   = "mdi-web";
   $nav[10]["label"]  = "";
   $nav[10]["url"]    = "/admin/website";

   $nav[20]["icon"]   = "mdi-account-cog-outline";
   $nav[20]["label"]  = "";
   $nav[20]["url"]    = "/admin/users";

   //Nav::load("leftnav")->addItems($nav);

   //dd( Nav::load("leftnav") );
endif;

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'admin');

/*
* CDN */
// $this->publishes([
//    __path("__admin/Assets") => __path("__package/admin/assets")
// ], "admin");

if(!function_exists("__fiv") ) {
   function __fiv($name=null) {
      if(empty($name)) return null;
   }
}
