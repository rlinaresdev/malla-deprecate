<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get("/", function(){
   return "Admin Web";
});

Route::get("/login", "AuthController@index");
Route::post("/login", "AuthController@login");

Route::get("/logout", "AuthController@logout");
