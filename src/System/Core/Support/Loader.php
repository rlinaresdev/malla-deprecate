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
      "core"       => [],
      "library"    => [],
      "package"    => [],
   ];

	public function __construct( $app ) {
		self::$app = $app;
	}

   /*
   * VALIDATION */
	public function isAppStart( $type = null, $slug=null ) {
		if( (env("DB_HOST") == "127.0.0.1") && (env("DB_DATABASE") == "laravel") ) {
			return FALSE;
		}

		if( \Schema::hasTable( "apps" )) {

			if(self::$app["core"]->load("coredb")->has($type, $slug)) {
				return (self::$app["core"]->load("coredb")->get("core", "core")->activated == 1);
			}
		}

		return FALSE;
	}

   /*
   * MOUNTED */
   public function mount( $module ) {

      if( is_null($module) ) return null;

      if( array_key_exists($module, $this->modules) && $module == "core" ) {

         $app = $this->modules[$module];

         $this->mountConfig( $app );
         $this->mountKernel( $app );
      }

      if( array_key_exists($module, $this->modules) && $module != "core" ) {

         foreach ( $this->modules[$module] as $app ) {
            $this->mountConfig( $app );
            $this->mountKernel( $app );
         }
      }

      // $driver       = $this->optimize($driver);
      //
      // if( is_object($driver) ) {
      //    $app        = (object) $driver->app();
      //    $credential = (object) $driver->info();
      //
      //    /*
      //    * ADD MODULES DRIVERS */
      //    $this->addModule( array_merge($driver->info(), $driver->app()) );
      //
      //    /*
      //    * CONFIG */
      //    $this->mountConfig( $driver );
      //
      //    /*
      //    * KERNEL */
      //    $this->mountKernel( $driver );
      // }
   }

   public function mountComponents() {
      $modules = self::$app["core"]->load("coredb")->getActiveComponents();

      foreach ( $modules as $app ) {
         if($app->type == "core") {
            $this->modules[$app->type] = new $app->driver;
         }
         else {
            if( array_key_exists($app->type, $this->modules) ) {
               $this->modules[$app->type][] = new $app->driver;
            }
         }
      }
   }

   public function addModule( $app ) {
      if( array_key_exists(($app = (object) $app)->type, $this->modules) ) {
         $this->modules[$app->type][] = $app;
      }
   }

   public function mountConfig($info) {
      if( method_exists($info, "configs") ) {
         if( !empty( ($configs = $info->configs()) ) ) {
            foreach ($configs as $key => $value) {
               app("config")->set($key, $value);
            }
         }
      }
   }

   public function mountKernel( $driver ) {
      if( method_exists($driver, "kernel") ) {
         $this->run($driver->kernel());
      }
   }

   public function optimize($driver) {
      if( is_object($driver) ) {
         return $driver;
      }

      if( is_string($driver) ) {
         if( class_exists($driver) ) {
            return new $driver;
         }
      }

      abort(500, "Error Info Class", [
         "info"   => $driver
      ]);
   }

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
		if(empty($providers)) return NULL;

		if(!is_array($providers)) $providers = [$providers];

		foreach ($providers as $provider) {
			self::$app->register($provider);
		}
	}

	/*
	* KERNEL
	* Load Packages */
	public function run($kernel=NULL) {

		if( !empty($kernel) ) {

			$kernel = $this->optimize($kernel);

			## [0]
			if( method_exists($kernel, "handler") ) $kernel->handler( self::$app );

			## [1]
			if( method_exists($kernel, "providers") ) $this->loadProviders( $kernel->providers() );

			## [2]
			if( method_exists($kernel, "alias") ) $this->loadAlias( $kernel->alias() );

			return $kernel;
		}

		abort(500, "Error kernel packages");
	}

	public function register($type=null) {

		if( in_array($type, ["core", "library", "package", "plugin"]) ) {

         $DB = self::$app["core"]->load("coredb");

			if( !empty( $stors = $DB->getType($type) ) ) {
            $data = [];
				foreach ($stors as $app ) {

					if($app->activated == 1) {

						// /*
						// * LOAD APP RESOURCES */
						// if( !empty( ($configs = $DB->getConfig($type, $app)) ) ) {
						// 	foreach ( $configs as $config ) {
						// 		config()->set($config->key, $config->value);
						// 	}
						// }
                  //
						// /*
						// * LOAD APP KERNEL */
						// $this->run($app->kernel);
					}

				}
			}
		}
	}
}
