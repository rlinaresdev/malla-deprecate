<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get( "/", "HomeController@index" );

Route::prefix("website")->group( function($route) {
   Route::get( "/", "HomeController@index" );
});

Route::prefix("users")->namespace("Users")->group( function($route) {
   Route::get( "/", "HomeController@index" );
   Route::get( "/add", "HomeController@register" );
   Route::post( "/add", "HomeController@create" );
});
