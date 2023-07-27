<?php


// Define theme directories and URIs
define( 'TEMPLATE_DIR', get_template_directory() );
define( 'TEMPLATE_URI', get_template_directory_uri() );
const TEMPLATE_CSS_DIR = TEMPLATE_URI . '/assets/css/';
const TEMPLATE_JS_DIR  = TEMPLATE_URI . '/assets/js/';
const TEMPLATE_CLASSES_DIR  = TEMPLATE_DIR . '/classes/';
const TEMPLATE_FONT_DIR = TEMPLATE_URI . '/assets/font/';
const TEMPLATE_IMAGES_DIR = TEMPLATE_URI . '/assets/images/';
const TEMPLATE_INC_DIR = TEMPLATE_DIR . '/inc/';
//</editor-fold>





if ( ! function_exists( 'template_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function template_setup() {

        setup_theme_supports();
        register_menus();
        register_required();
    }
endif;

add_action( 'after_setup_theme', 'template_setup' );

function setup_theme_supports(){

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'post-formats', array() );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'responsive-embeds' );

}
function register_menus(){
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'nomadartgroup' ),
    ) );
}
function register_required(){
    require_once TEMPLATE_CLASSES_DIR. 'bootstrap-5-wordpress-navbar-walker.php';
    require_once TEMPLATE_CLASSES_DIR. 'off_canvas_nav_walker.php';
    require_once TEMPLATE_INC_DIR . 'template-helper.php';
//    require_once TEMPLATE_INC_DIR. 'eawpt_customizer.php';

}

function nomadartgroup_enqueue_scripts() {
    // Enqueue your CSS and JS files here
    wp_enqueue_style('nomadartgroup-style', get_stylesheet_uri());
    // You can enqueue more styles and scripts as needed
}
add_action('wp_enqueue_scripts', 'nomadartgroup_enqueue_scripts');


function nomadartgroup_admin_notice() {
    $required_plugins = array(
        'Kirki Customizer' => 'kirki/kirki.php',
        'Elementor' => 'elementor/elementor.php',
    );

    $missing_plugins = array();

    foreach ($required_plugins as $plugin_name => $plugin_path) {
        if (!is_plugin_active($plugin_path)) {
            $missing_plugins[] = $plugin_name;
        }
    }

    if (!empty($missing_plugins)) {
        $message = 'The "Nomad Art Group" theme requires the following plugins to be installed and activated: ' . implode(', ', $missing_plugins);
        echo '<div class="notice notice-error is-dismissible"><p>' . esc_html($message) . '</p></div>';
    }
}
add_action('admin_notices', 'nomadartgroup_admin_notice');