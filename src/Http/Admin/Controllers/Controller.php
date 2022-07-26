<?php
namespace Malla\Http\Admin\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   protected $app;

   protected $path = "admin::";

   protected $skin;

   public function boot( $app=null, $data=[] ) {

      $this->app        = $app;

      if( method_exists($app, "share") ) {
         $this->share($app->share());
      }

      if( method_exists($this, "parseData") ) {
         $this->parseData();
      }
   }

   public function share($data) {
      if(!empty($data) && is_array($data) ) {
         view()->share($data);
      }
   }

   public function render($view=NULL, $data=[], $mergeData=[]) {

      if(view()->exists(($path = $this->path.$view))) {
         return view($path, $data, $mergeData);
      }

      abort(500, "La vista {$path} no existe");
   }

}
