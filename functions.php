<?php

// Start up the class
class TPLTheme{
	/**
	 * Class constructor for custom site wide functionality
	 *
	 * This will include all the necessary additional functions, hooks and includes.
	 */
	public function __construct(){
		// Add some constants
		$this->constants();

		// Include additional files
		$this->include_main();
	}

	/**
	 * Define some constants variables
	 */
	public function constants(){
		define( 'TPL_THEME_DIR', get_stylesheet_directory() );
		define( 'TPL_THEME_URI', get_stylesheet_directory_uri() );
	}


	/**
	 * Include additional files which contains core functionality
	 */
	public function include_main(){
		// Include the file which contains some custom functions
		require_once( TPL_THEME_DIR .'/core/frontend/tpl-frontend-engine.class.php' );

		// ILM Admin Related Files
		if ( is_admin() ) {
			require_once( TPL_THEME_DIR .'/core/admin/tpl-admin-engine.class.php' );
		}
	}
}

new TPLTheme();
