<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::middleware("blog")->namespace("Admin\Controllers")->group(function(){
   Route::get("/login", "LoginController@index");
   Route::post("/login", "LoginController@login");

   Route::get("/logout", "LoginController@logout");
});

Route::prefix("admin")
      ->middleware("admin")
      ->namespace("Admin\Controllers")
      ->group(__DIR__."/admin.php");
