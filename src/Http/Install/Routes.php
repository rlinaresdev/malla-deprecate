<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get("/", "HomeController@index");

Route::get("/env", "EnvController@index");
Route::post("/env", "EnvController@update");

Route::get("/env/published", "EnvController@published");

Route::prefix("database")->group( function($route) {

   Route::get("/", "DatabaseController@index");
   Route::post("/", "DatabaseController@forge");

   Route::get("/destroy", "DatabaseController@destroy");
});

Route::get("/end", "EndController@index");
Route::get("/close", "EndController@close");
