<?php
namespace Malla\Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\Core\Support\Bootstrap;

class Core {

	protected static $app;

   protected $installed = false;

	public function __construct( Bootstrap $app ) {
		self::$app = $app;
	}

	public function load( $key=NULL, $args=[], $params=[] ) {
		return self::$app->load( $this, $key, $args, $params );
	}

   public function hypervisor() {

      ## CORE ENVIRONMENT
      if( $this->isAppStart("core", "core") ) {
         $this->installed = TRUE;

         $this->load("loader")->mountComponents();
      }
   }

   public function start() {
      return $this->installed;
   }

   /*
   * MOUNT */
   public function mount($info=null) {
      $this->load("loader")->mount( $info );
   }

   public function monitor( $default=null ) {
      if( $this->installed ) {

      }
      else {
         $this->mount(\Core\Info::class);
      }
   }

	/*
	* LANGUAGE */
	public function loadGrammars() {
		$this->load("locale")->loadGrammars();
	}

	/*
	* URLS */
	public function publicUrl($path=null, $parameters=[], $secure=null ) {
		return $this->load("url")->url($path, $parameters, $secure);
	}

	public function addUrl($taggs=[]) {
		return $this->load("urls")->addTag("urls", $taggs);
	}

	/*
	* PATH */
	// public function path($path=null) {
	// 	return $this->load("urls")->path($path);
	// }

	public function addPath($taggs=[]) {
		return $this->load("urls")->addTag("paths", $taggs);
	}

	/*
	* FINDER */
	public function find($source, $segment=1) {
		return $this->load("finder")->map($source, $segment);
	}

	/*
	* VALIDATION */
   public function hasModule($slug=null, $path=__MODULE__) {
		return in_array($slug, $this->load("finder")->map($path));
	}

	public function isAppStart( $type=null, $slug=null ) {
		return $this->load("loader")->isAppStart($type, $slug);
	}

	public function stable() {
		return $this->isAppStart("core", "core");
	}

}
