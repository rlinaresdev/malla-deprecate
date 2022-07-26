<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/*
* CONFIG */
config([
   "admin.skin"   => "rosy"
]);

//dd(app("core")->module());

/*
* URLS */
$this->app["core"]->addUrl([
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
