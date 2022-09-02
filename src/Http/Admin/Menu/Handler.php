<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

$user = $AUTH->user();


Nav::load("leftnav")->addItem(0, [
   "icon"   => "mdi-home",
   "label"  => "",
   "url"    => "/admin",
   "isOn"   => (request()->path() == "admin")
]);

Nav::load("leftnav")->addItem(10, [
   "icon"   => "mdi-web",
   "label"  => "",
   "url"    => "/admin/website",
   "isOn"   => __segment(2, "website")
]);

Nav::load("leftnav")->addItem(20, [
   "icon"   => "mdi-account-cog-outline",
   "label"  => "",
   "url"    => "/admin/users",
   "isOn"   => __segment(2, "users")
]);

Nav::load("leftnav")->addItem(100, [
   "icon"   => "mdi-shape-plus",
   "label"  => "",
   "url"    => "/admin/components",
   "isOn"   => (request()->path() == "admin/components")
]);

Nav::load("leftnav")->addItem(150, [
   "icon"   => "mdi-cogs",
   "label"  => "",
   "url"    => "/admin/settings",
   "isOn"   => (request()->path() == "admin/settings")
]);


## RIGHT MENU
(new \Malla\Http\Admin\Menu\Items\Web($AUTH))->items();
(new \Malla\Http\Admin\Menu\Items\User($AUTH))->items();
