<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ays-pro.com
 * @since             1.0.0
 * @package           Quiz_Maker_Pdfapi
 *
 * @wordpress-plugin
 * Plugin Name:       Quiz Maker Add-on - PDF API
 * Plugin URI:        https://ays-pro.com/index.php/wordpress/quiz-maker
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.1.1
 * Author:            Quiz Maker team
 * Author URI:        https://ays-pro.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       quiz-maker-pdfapi
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Detect plugin. For use on Front End only.
 */
// check for plugin using plugin name
if( in_array('quiz-maker/quiz-maker.php', apply_filters('active_plugins', get_option('active_plugins'))) || is_multisite() ){

	if ( is_multisite() ) {
		// First, I define a constant to see if site is network activated
		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
		    // Makes sure the plugin is defined before trying to use it
		    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}

		if (is_plugin_active_for_network('quiz-maker/quiz-maker.php')) {  // path to plugin folder and main file
		    define("QUIZ_MAKER_PDFAPI_NETWORK_ACTIVATED", true);
		} elseif ( in_array('quiz-maker/quiz-maker.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
		    define("QUIZ_MAKER_PDFAPI_NETWORK_ACTIVATED", true);
		} elseif ( class_exists( "Quiz_Maker" ) ){
		    define("QUIZ_MAKER_PDFAPI_NETWORK_ACTIVATED", true);
		}
		else {
		    define("QUIZ_MAKER_PDFAPI_NETWORK_ACTIVATED", false);
		}
	}

	$ays_quiz_maker_network_flag = true;

	if ( defined( "QUIZ_MAKER_PDFAPI_NETWORK_ACTIVATED" ) ) {
		$ays_quiz_maker_network_flag = QUIZ_MAKER_PDFAPI_NETWORK_ACTIVATED;
	}

	if ( $ays_quiz_maker_network_flag ) {

		if ( ! defined( 'PARENT_QUIZ_MAKER_VERSION' ) ) {
			$quiz_db_version = get_option('ays_quiz_db_version', null);
			if($quiz_db_version !== null){
				$quiz_version_parts = explode('.', $quiz_db_version);
				if(!empty($quiz_version_parts)){
					$quiz_version = intval($quiz_version_parts[0]);
				}
				if($quiz_version < 7){
					define( 'PARENT_QUIZ_MAKER_VERSION', 'free' );
				}else if($quiz_version >= 7 && $quiz_version < 20){
					define( 'PARENT_QUIZ_MAKER_VERSION', 'pro' );
				}else if($quiz_version >= 20){
					define( 'PARENT_QUIZ_MAKER_VERSION', 'dev' );
				}
			}
		}

		/**
		 * Currently plugin version.
		 * Start at version 1.0.0 and use SemVer - https://semver.org
		 * Rename this for your plugin and update it as you release new versions.
		 */
		define( 'QUIZ_MAKER_PDFAPI_VERSION', '1.1.1' );
		define( 'QUIZ_MAKER_PDFAPI_NAME_VERSION', '1.0.0' );
		define( 'QUIZ_MAKER_PDFAPI_NAME', 'quiz-maker-pdfapi' );
		
		if( ! defined( 'PARENT_QUIZ_MAKER_NAME' ) )
			define( 'PARENT_QUIZ_MAKER_NAME', 'quiz-maker' );

		if( ! defined( 'PARENT_QUIZ_MAKER_PDF_DIR' ) )
		    define( 'PARENT_QUIZ_MAKER_PDF_DIR', plugin_dir_path( dirname( __FILE__ ) ) . PARENT_QUIZ_MAKER_NAME );
		
		if( ! defined( 'QUIZ_MAKER_PDFAPI_DIR' ) )
		    define( 'QUIZ_MAKER_PDFAPI_DIR', plugin_dir_path( __FILE__ ) );

		if( ! defined( 'QUIZ_MAKER_PDFAPI_BASE_URL' ) ) {
		    define( 'QUIZ_MAKER_PDFAPI_BASE_URL', plugin_dir_url(__FILE__ ) );
		}
	    
		if( ! defined( 'QUIZ_MAKER_PDFAPI_API_URL' ) ) {
		    define( 'QUIZ_MAKER_PDFAPI_API_URL', plugin_dir_url(__FILE__ ) . 'pdfapi/' );
		}
	    
		if( ! defined( 'QUIZ_MAKER_PDFAPI_API_REPORT_URL' ) ) {
		    define( 'QUIZ_MAKER_PDFAPI_API_REPORT_URL', plugin_dir_url(__FILE__ ) . 'pdfapi/export-report/' );
		}

		if( ! defined( 'QUIZ_MAKER_PDFAPI_API_REPORT_PUBLIC_URL' ) ) {
		    define( 'QUIZ_MAKER_PDFAPI_API_REPORT_PUBLIC_URL', plugin_dir_url(__FILE__ ) . 'pdfapi/export-report-public/' );
		}

		if( ! defined( 'QUIZ_MAKER_PDFAPI_API_REPORT_PUBLIC_USER_URL' ) ) {
		    define( 'QUIZ_MAKER_PDFAPI_API_REPORT_PUBLIC_USER_URL', plugin_dir_url(__FILE__ ) . 'pdfapi/export-quiz-public-user/' );
		}
	    
	    add_filter( 'ays_quiz_pdfapi_api_url', 'ays_quiz_pdfapi_api_url' );
	    
	    function ays_quiz_pdfapi_api_url($url){
	        return QUIZ_MAKER_PDFAPI_API_URL;
	    }

	    add_filter( 'ays_quiz_pdfapi_api_report_url', 'ays_quiz_pdfapi_api_report_url' );
	    
	    function ays_quiz_pdfapi_api_report_url($url){
	        return QUIZ_MAKER_PDFAPI_API_REPORT_URL;
	    }

	    add_filter( 'ays_quiz_pdfapi_api_report_public_url', 'ays_quiz_pdfapi_api_report_public_url' );
	    
	    function ays_quiz_pdfapi_api_report_public_url($url){
	        return QUIZ_MAKER_PDFAPI_API_REPORT_PUBLIC_URL;
	    }

	    add_filter( 'ays_quiz_pdfapi_api_report_public_user_url', 'ays_quiz_pdfapi_api_report_public_user_url' );
    
	    function ays_quiz_pdfapi_api_report_public_user_url($url){
	        return QUIZ_MAKER_PDFAPI_API_REPORT_PUBLIC_USER_URL;
	    }

		/**
		 * The code that runs during plugin activation.
		 * This action is documented in includes/class-quiz-maker-pdfapi-activator.php
		 */
		function activate_quiz_maker_pdfapi() {
			require_once plugin_dir_path( __FILE__ ) . 'includes/class-quiz-maker-pdfapi-activator.php';
			Quiz_Maker_Pdfapi_Activator::activate();
		}

		/**
		 * The code that runs during plugin deactivation.
		 * This action is documented in includes/class-quiz-maker-pdfapi-deactivator.php
		 */
		function deactivate_quiz_maker_pdfapi() {
			require_once plugin_dir_path( __FILE__ ) . 'includes/class-quiz-maker-pdfapi-deactivator.php';
			Quiz_Maker_Pdfapi_Deactivator::deactivate();
		}

		register_activation_hook( __FILE__, 'activate_quiz_maker_pdfapi' );
		register_deactivation_hook( __FILE__, 'deactivate_quiz_maker_pdfapi' );
	}
	
}