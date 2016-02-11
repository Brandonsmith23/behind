<?php
/*
Plugin Name: Behind the Quarter Core
Description: Core Plugin For Launchers
Version: 0.1
Author: newmedia
Author URI: http://newmediadenver.com/
Text Domain: launchers-core
Domain Path: /languages
*/

/**
 * Copyright (c) 2015 All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MElaunchers HANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'behindcore' ) ) {

/**
 * The main class.
 *
 * @since 1.0
 */
final class behindcore {

  public static $version = '0.1';
  public static $name = 'behind_core';

  protected static $_instance = null;

  public $plugin_basename;
  public $plugin_url;
  public $plugin_path;
  public $template_url;
  public $errors = array();
  public $messages = array();
  public $query;

  private $_body_classes = array();
  private $_inline_js = '';


  /**
   * Main behindcore Instance
   *
   * Ensures only one instance of behindcore is loaded or can be loaded.
   *
   * @static
   * @return behindcore - Main instance
   */
  public static function instance() {
    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  /**
   * Cloning is forbidden.
   * @since 2.1
   */
  public function __clone() {
    _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'woocommerce' ), '2.1' );
  }

  /**
   * Unserializing instances of this class is forbidden.
   * @since 2.1
   */
  public function __wakeup() {
    _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'woocommerce' ), '2.1' );
  }

  /**
   * Auto-load in-accessible properties on demand.
   * @param mixed $key
   * @return mixed
   */
  public function __get( $key ) {
    if ( in_array( $key, array() ) ) {
      return $this->$key();
    }
  }

  /**
   * behindcore Constructor.
   *
   * @access public
   * @return void
   */
  public function __construct() {
    // define constants
    $this->define_constants();
    // Include required files
    $this->includes();
    //
    $this->init_hooks();

    do_action( self::$name . '_loaded' );
  }


  /**
   * Hook into actions and filters
   * @since  2.3
   */
  private function init_hooks() {

    if ( is_admin() && ! defined('DOING_AJAX') ) $this->install();

    add_action( 'init', array( $this, 'init' ), 0 );

    // add ACF field groups export path
    add_filter( 'acfwpcli_fieldgroup_paths', array( $this, 'fieldgroup_paths' ) );

  }

  /**
   * Define Constants
   */
  private function define_constants() {
    $upload_dir = wp_upload_dir();
    $this->define( 'launchers_PLUGIN_FILE', __FILE__ );
    $this->define( 'launchers_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
    $this->define( 'launchers_VERSION', $this->version );
    $this->define( 'launchers_LOG_DIR', $upload_dir['basedir'] . '/'.self::$name.'-logs/' );
  }

  /**
   * Define constant if not already set
   * @param  string $name
   * @param  string|bool $value
   */
  private function define( $name, $value ) {
    if ( ! defined( $name ) ) {
      define( $name, $value );
    }
  }


  /**
   * What type of request is this?
   * string $type ajax, frontend or admin
   * @return bool
   */
  private function is_request( $type ) {
    switch ( $type ) {
      case 'admin' :
        return is_admin();
      case 'ajax' :
        return defined( 'DOING_AJAX' );
      case 'cron' :
        return defined( 'DOING_CRON' );
      case 'frontend' :
        return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
    }
  }


  /**
   * Include required core files used in admin and on the frontend.
   *
   * @access public
   * @return void
   */
  public function includes() {

    // taxonomies
    // include_once( trailingslashit( $this->plugin_path() ) . 'includes/taxonomies.php' );

    // post-types
    // include_once( trailingslashit( $this->plugin_path() ) . 'includes/post-types.php' );

    if ( $this->is_request( 'admin' ) ) {
      $this->admin_includes();
    }

    if ( $this->is_request( 'ajax' ) ) {
      $this->ajax_includes();
    }

    if ( $this->is_request( 'frontend' ) ) {
      $this->frontend_includes();
    }

  }


  /**
   * Include required admin files.
   *
   * @access public
   * @return void
   */
  public function admin_includes() {}


  /**
   * Include required ajax files - for admin and the front-end.
   *
   * @access public
   * @return void
   */
  public function ajax_includes() {}


  /**
   * Include required frontend files.
   *
   * @access public
   * @return void
   */
  public function frontend_includes() {}


  /**
   * Init behindcore when WordPress Initialises.
   *
   * @access public
   * @return void
   */
  public function init() {

    // Before init action
    do_action( 'before_' . self::$name . '_init' );

    // Load functions.
    add_action( 'init', array( &$this, 'functions' ) );

    // After init action
    do_action( 'after_' . self::$name . '_init' );

    add_filter('is_woocommerce', array( &$this, 'launchers_is_woocommerce' ));

  }

  /**
   * Ensure theme and server variable compatibility and setup image sizes.
   */
  public function setup_environment() {
    $this->add_thumbnail_support();
    $this->add_image_sizes();
  }

  /**
   * Ensure post thumbnail support is turned on
   */
  private function add_thumbnail_support() {
    if ( ! current_theme_supports( 'post-thumbnails' ) ) {
      add_theme_support( 'post-thumbnails' );
    }
  }

  /**
   * Add Image sizes to WP
   */
  private function add_image_sizes() {}


  // Register custom path for field-groups
  public function fieldgroup_paths( $paths ) {
    $paths['core_plugin'] = $this->plugin_path() . '/admin/field-groups/';
    return $paths;
  }

  /**
   * Loads the functions.
   */
  public function functions() {
    include_once( trailingslashit( $this->plugin_path() ) . 'functions.php' );
  }

  public function launchers_is_woocommerce($check){
    if (is_tax ('product_industry')|| is_page(103)) {
      return true;
    }
    return $check;
  }

  /** Lifecycle methods ******************************************************/

  /**
   * Set up the activation and deactivation hooks.
   *
   * @since 1.0
   **/
  public function install() {
    // activation
    add_action( 'admin_init', array( $this, 'activate' ) );
    #register_activation_hook( __FILE__, array( $this, 'activate' ) );

    // set default options on activation
    #add_action( self::$name . '_activated', array( $this, 'set_default_options' ), 0 );

    // de-activation
    register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
  }

  /**
   * Checks on each admin page load if plugin is activated.
   *
   * Apparently the official WP API is "lame" and it's far better to use an upgrade routine fired on admin_init: http://core.trac.wordpress.org/ticket/14170
   *
   * @since 1.1
   */
  public function activate(){

    $is_active = get_option( self::$name . '_is_active', false );
    if ( $is_active == false ) {
      add_option( self::$name . '_is_active', true );
      set_transient( self::$name . '_activated', true, 60 * 60 );
      // fire off an action when activated
      do_action( self::$name . '_activated' );
    }

    $installed_version = get_option( self::$name . '_db_version' );
    if ( $installed_version != self::$version ) {
      $this->version_change( $installed_version );
      // new version number
      update_option( self::$name . '_db_version', self::$version );

      // fire off an action when upgraded
      do_action( self::$name . '_upgraded' );
    }

  }

  /**
   * Run when plugin version number changes
   *
   * @since 1.0
   */
  public function version_change( $installed_version ) {
    // future upgrade/downgrade code goes here
  }

  /**
   * Called when the plugin is deactivated. Deletes the plugin data and fires an action.
   *
   * @since 1.0
   */
  public function deactivate() {

    // delete options
    delete_option( self::$name . '_is_active' );
    delete_option( self::$name . '_db_version' );

    // delete transient
    delete_transient( self::$name . '_activated' );

    // fire off an action to let things now we deactivated
    do_action( self::$name . '_deactivated' );
  }

  /**
   * Sets the default options.
   *
   * @since 1.0
   */
  public function set_default_options(){}


  /** Helper functions ******************************************************/

  /**
   * Get the plugin url.
   * @return string
   */
  public function plugin_url() {
    return untrailingslashit( plugins_url( '/', __FILE__ ) );
  }

  /**
   * Get the plugin path.
   * @return string
   */
  public function plugin_path() {
    return untrailingslashit( plugin_dir_path( __FILE__ ) );
  }

  /**
   * Get the template path.
   * @return string
   */
  public function template_path() {
    return apply_filters( self::$name . '_template_path', trailingslashit(self::$name) );
  }

  /**
   * Get Ajax URL.
   * @return string
   */
  public function ajax_url() {
    return admin_url( 'admin-ajax.php', 'relative' );
  }

}

/**
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @return behindcore
 */
function launchers() {
  return behindcore::instance();
}

// Global for backwards compatibility.
$GLOBALS['behindcore'] = launchers();

}
