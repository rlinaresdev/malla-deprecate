<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/*
* URLS */
$this->app["core"]->addUrl([
   "__rosy" => "__base/theme/rosy"
]);

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'rosy');

/*
* PUBLISHED */
$this->publishes([
   __path("__http/Rosy/Assets") => __path("__public/theme/rosy")
], "rosy");
