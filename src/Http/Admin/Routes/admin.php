<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get("/", "HomeController@index");

Route::prefix("users")->group( function($route) {
   Route::get("/", "HomeController@index");
});
