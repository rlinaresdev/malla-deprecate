<?php
namespace Malla\Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Illuminate\Foundation\AliasLoader;

class Loader {

	protected static $app;

   protected $modules = [
   ];

	public function __construct( $app ) {
		self::$app = $app;
	}

   /*
   * VALIDATION */
   public function isRunCore($table="apps") {

		if( (env("DB_HOST") == "127.0.0.1") && (env("DB_DATABASE") == "laravel") ) {
			return FALSE;
		}

		if( \Schema::hasTable( "apps" )) {

			if(self::$app["core"]->load("coredb")->has("core", "core")) {
				return (self::$app["core"]->load("coredb")->get("core", "core")->activated == 1);
			}
		}
		return FALSE;
	}

   /*
   * PROXY */
   public function httpProxy() {

      $DB = self::$app["core"]->load("coredb");

      $modules = config("app.modules");
      unset($modules['core']);
   
      // $modules = array_keys(config("app.modules"));
      //
      // foreach ( $modules as $module ) {
      //
      // }

   }

   /*
   * MODULE */
   public function module($key=null) {
      if( array_key_exists( $key, $this->modules ) ) {
         return $this->modules[$key];
      }

      return $this->modules;
   }

   public function moduleContainer($data=null, $value=null) {

      if( empty($data) ) return null;

      if( is_string($data) ) {
         if( !array_key_exists($data, $this->modules) ) {
            $this->modules[$data] = $value;
         }
      }
   }

   /*
   * QUERY
   * Consulta de los modulos */

   /*
   * MOUNT
   * Cargar Driver de los modulos */
   // public function mount( $driver=null ) {
   //
   //    if( !is_null($driver) ) {
   //
   //       if( is_string($driver) ) $driver = new $driver;
   //
   //       $app = $driver->app();
   //
   //       if( array_key_exists( $app["type"], $this->modules ) && $app["type"] == "core" ) {
   //          $this->modules[$app["type"]] = $driver;
   //       }
   //
   //       if( array_key_exists( $app["type"], $this->modules ) && $app["type"] != "core" ) {
   //          $this->modules[$app["type"]][] = $driver;
   //       }
   //    }
   //
   //    return $this;
   // }


   /*
   * MOUNTED */
   // public function mount( $module ) {
   //
   //    if( is_null($module) ) return null;
   //
   //    if( array_key_exists($module, $this->modules) && $module == "core" ) {
   //
   //       $app = $this->modules[$module];
   //
   //       $this->mountConfig( $app );
   //       $this->mountKernel( $app );
   //    }
   //
   //    if( array_key_exists($module, $this->modules) && $module != "core" ) {
   //
   //       foreach ( $this->modules[$module] as $app ) {
   //          $this->mountConfig( $app );
   //          $this->mountKernel( $app );
   //       }
   //    }
   //
   //    // $driver       = $this->optimize($driver);
   //    //
   //    // if( is_object($driver) ) {
   //    //    $app        = (object) $driver->app();
   //    //    $credential = (object) $driver->info();
   //    //
   //    //    /*
   //    //    * ADD MODULES DRIVERS */
   //    //    $this->addModule( array_merge($driver->info(), $driver->app()) );
   //    //
   //    //    /*
   //    //    * CONFIG */
   //    //    $this->mountConfig( $driver );
   //    //
   //    //    /*
   //    //    * KERNEL */
   //    //    $this->mountKernel( $driver );
   //    // }
   // }

   // public function mountComponents() {
   //    $modules = self::$app["core"]->load("coredb")->getActiveComponents();
   //
   //    foreach ( $modules as $app ) {
   //       if($app->type == "core") {
   //          $this->modules[$app->type] = new $app->driver;
   //       }
   //       else {
   //          if( array_key_exists($app->type, $this->modules) ) {
   //             $this->modules[$app->type][] = new $app->driver;
   //          }
   //       }
   //    }
   // }



   // public function mountConfig($info) {
   //    if( method_exists($info, "configs") ) {
   //       if( !empty( ($configs = $info->configs()) ) ) {
   //          foreach ($configs as $key => $value) {
   //             app("config")->set($key, $value);
   //          }
   //       }
   //    }
   // }

   // public function mountKernel( $driver ) {
   //    if( method_exists($driver, "kernel") ) {
   //       $this->run($driver->kernel());
   //    }
   // }

   // public function optimize($driver) {
   //    if( is_object($driver) ) {
   //       return $driver;
   //    }
   //
   //    if( is_string($driver) ) {
   //       if( class_exists($driver) ) {
   //          return new $driver;
   //       }
   //    }
   //
   //    abort(500, "Error Info Class", [
   //       "info"   => $driver
   //    ]);
   // }

	/*
	* ALIASES
	* Load Alias */
	public function loadAlias($alias=NULL) {

		if(!empty($alias) && is_array($alias)) {
			foreach ($alias as $alia => $class) {
				AliasLoader::getInstance()->alias($alia, $class);
			}
		}
	}

	/*
	* PROVIDERS
	* Load ServiceProvider */
	public function loadProviders($providers=[]) {
		if( !empty($providers) ) {
         if(!is_array($providers)) $providers = [$providers];

         foreach ($providers as $provider) {
            self::$app->register($provider);
         }
      }
	}

   /*
   * RUN
   * Iniciar modulo de forma manual */
	public function run($driver=NULL) {

      if( !empty($driver) ) {

         if(is_string($driver)) $driver = new $driver;

         if( method_exists($driver, "providers") ) {
            if( !empty( ($providers = $driver->providers()) ) ) {
               $this->loadProviders( $providers );
            }
         }

         if( method_exists($driver, "alias") ) {
            $this->loadAlias( $driver->alias() );
         }
      }
	}

	// public function register($type=null) {
   //
	// 	if( in_array($type, ["core", "library", "package", "plugin"]) ) {
   //
   //       $DB = self::$app["core"]->load("coredb");
   //
	// 		if( !empty( $stors = $DB->getType($type) ) ) {
   //          $data = [];
	// 			foreach ($stors as $app ) {
   //
	// 				if($app->activated == 1) {
   //
	// 					// /*
	// 					// * LOAD APP RESOURCES */
	// 					// if( !empty( ($configs = $DB->getConfig($type, $app)) ) ) {
	// 					// 	foreach ( $configs as $config ) {
	// 					// 		config()->set($config->key, $config->value);
	// 					// 	}
	// 					// }
   //                //
	// 					// /*
	// 					// * LOAD APP KERNEL */
	// 					// $this->run($app->kernel);
	// 				}
   //
	// 			}
	// 		}
	// 	}
	// }
}
