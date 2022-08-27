<?php
namespace Malla\Http\Admin\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\Menu\Template\ListUL;

class LeftNav {

   public $slug = "leftnav";

   public $area = "mn-0";

   public function __construct( $auth=null ) {
   }

   public function items() {

     $nav[0]["icon"]    = "mdi-home";
     $nav[0]["label"]   = "";
     $nav[0]["url"]     = "/";

     $nav[10]["icon"]   = "mdi-web";
     $nav[10]["label"]  = "";
     $nav[10]["url"]    = "/admin/website";

     $nav[20]["icon"]   = "mdi-account-cog-outline";
     $nav[20]["label"]  = "";
     $nav[20]["url"][10]["icon"] = "mdi-cogs";
     $nav[20]["url"][10]["label"] = ":username";
     $nav[20]["url"][10]["url"] = "admin/users/profile";

     return $nav;
   }

   public function deploy( $index=4 ) {

      /*
      * Etiquetas Personalizadas */
      //$label["dress"][]

      $html = new ListUL($this->items());

      /*
      * Estilos Twitter Bootstrap */
      $styles["match"][':node0'] = "nav";
      $styles["match"][':node1'] = "dropdown";
      $styles["match"][':node2'] = "dropdown-menu";

      //$html->filter("style", $styles);

      $html->addFilterStyle("match", [
         ":node0" => "nav",
         ":node1" => "dropdown",
         ":node2" => "dropdown-menu",
      ]);

      $html->addFilterLabel("dress", [
         ":username" => "Usuarios"
      ]);

      //dd($html);
      return $html->render($index);
   }
}
