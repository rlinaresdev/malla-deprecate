<?php
namespace Malla\Http\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Database {

   protected $app;

   protected $store = [
      \Malla\Core\Driver::class,

      \Malla\Alert\Driver::class,
      \Malla\User\Driver::class,
      \Malla\Skin\Driver::class,

      \Malla\Http\Admin\Driver::class,

   ];

   public function __construct( ) {
   }

   public function data() {

      $data["title"]       = __("words.database");
      $data["engine"]      = $this->widgetDB();
      $data["isdb"]        = \Schema::hasTable("apps");

      return $data;
   }

   public function widgetDB() {

      return [
         __("words.engine")   => env("DB_CONNECTION"),
         __("words.host")     => env("DB_HOST"),
         __("words.port")     => env("DB_PORT"),
         __("words.database") => env("DB_DATABASE"),
         __("words.user")     => env("DB_USERNAME")
      ];
   }

   public function forge( $request ) {

      foreach ( $this->store as $component ) {
         if( class_exists($component) ) {
            if( method_exists(($app = new $component), "install") ) {
               $app->install(22);
            }
         }
      }

      // ## SCHEMA
      // foreach ( $this->components as $slug => $component ) {
      //    if( method_exists( ($module = new $component), "install" ) ) {
      //       $module->install( new Core );
      //    }
      // }
      //
      // ## ACCOUNT
      // $this->updateOrCreate(
      //    $request->input("email"), $request->input("pwd")
      // );
      //
      // return redirect()->to("install/end");
   }
}
