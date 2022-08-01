<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

$this->app["core"]->addUrl([]);

$this->app["core"]->addPath([
   "__adminroute" => __DIR__."/Routes/"
]);

$this->loadConfigs([
   "admin.prefix"                => "admin",
   "admin.skin"                  => "rosy",
   "auth.guards.admin.driver"		=> "session",
   "auth.guards.admin.provider"	=> "admin",
   "auth.providers.admin.driver" => "eloquent",
   "auth.providers.admin.model" 	=> \Malla\User\Model\Store::class,
]);
