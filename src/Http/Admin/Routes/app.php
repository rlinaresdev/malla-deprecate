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

Route::get("/", "AuthController@index");
