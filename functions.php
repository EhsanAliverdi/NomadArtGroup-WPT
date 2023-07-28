<?php


// Define theme directories and URIs
define( 'TEMPLATE_DIR', get_template_directory() );
define( 'TEMPLATE_URI', get_template_directory_uri() );
define( 'TEMPLATE_VERSION', wp_get_theme()->get('Version') );
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
    require_once TEMPLATE_INC_DIR. 'template_customizer.php';

}
function enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', TEMPLATE_CSS_DIR . 'bootstrap.min.css', array(), '', 'all' );
    wp_enqueue_style( 'fontawesome.min.css', TEMPLATE_CSS_DIR . 'fontawesome.min.css', array(), '', 'all' );
    wp_enqueue_style( 'style.css', TEMPLATE_CSS_DIR . 'style.css', array(), TEMPLATE_VERSION, 'all' );
    wp_enqueue_style('main.css', TEMPLATE_CSS_DIR . 'main.css');

}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );


function enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    // Enqueue jQuery from CDN
    wp_enqueue_script( 'bootstrap-js', TEMPLATE_JS_DIR . 'bootstrap.bundle.js', array('jquery'), '5.1.0', true );
    wp_enqueue_script( 'fontawesome.min.js', TEMPLATE_JS_DIR . 'fontawesome.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'popper.min.js', TEMPLATE_JS_DIR . 'popper.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'owl.carousel.min.js', TEMPLATE_JS_DIR . 'owl.carousel.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery.sticky.js', TEMPLATE_JS_DIR . 'jquery.sticky.js', array('jquery'), '', true );
    wp_enqueue_script( 'eawpt-script.js', TEMPLATE_JS_DIR . 'script.js', array('jquery'), TEMPLATE_VERSION, true );


    wp_enqueue_script('main', TEMPLATE_JS_DIR . 'main.js', array('jquery'), '', true);


}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

function enqueue_google_fonts() {
    // Replace 'Cutive+Mono' and 'sans-serif' with the desired Google Fonts you want to load.
    // You can add multiple fonts by separating them with '|' character.
    $font_families = 'family=Cutive+Mono';

    // Generate the Google Fonts URL with the specified font families.
    $font_url = 'https://fonts.googleapis.com/css2?'. $font_families;

    // Enqueue the Google Fonts stylesheet.
    wp_enqueue_style( 'google-fonts', $font_url, array(), null );
}
add_action( 'wp_enqueue_scripts', 'enqueue_google_fonts' );

function template_require_plugins() {
    $plugins = array(
        array(
            'name' => 'Kirki Customizer Framework',
            'slug' => 'kirki',
            'required' => true,
        ),
        array(
            'name' => 'Elementor',
            'slug' => 'elementor',
            'required' => true,
        ),
        // Add more plugins as needed
    );

    $missing_plugins = array();

    foreach ($plugins as $plugin) {
        if (!is_plugin_active($plugin['slug'] . '/' . $plugin['slug'] . '.php')) {
            $missing_plugins[] = $plugin;
        }
    }

    if (!empty($missing_plugins)) {
        $message = 'The following plugins are recommended or required for this theme:';
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p><strong>' . $message . '</strong></p>';
        echo '<ul>';
        foreach ($missing_plugins as $plugin) {
            echo '<li><a href="' . esc_url(admin_url('plugins.php')) . '">' . esc_html($plugin['name']) . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}
add_action('admin_notices', 'template_require_plugins');


function get_page_type() {
    // Check the current page template
    $current_template = get_page_template_slug();

    // Set custom data based on the page template
    if (is_home()) {
        return 'home';
    } elseif ($current_template === 'template-light.php') {
        return 'light';
    } else {
        // Default data for other templates
        return 'dark';
    }
}
add_action('wp', 'get_page_type');

function theme_custom_css() {
    $page_type = get_page_type();
    $background_color = get_theme_mod('background_color_'.$page_type);
    $color = get_theme_mod('text_color_'.$page_type);

    // Typography settings
    $body_font = get_theme_mod('typography_body_setting');
    $h1_font = get_theme_mod('typography_h_setting');
    $h2_font = get_theme_mod('typography_h2_setting');
    // Add more variables for h3, h4, h5, and h6 fonts as needed

    ?>
    <style>
        :root {
            --background-color: <?php echo esc_attr($background_color); ?>;
        }

        body {
            background-color: var(--background-color);
        <?php echo 'font-family: '.$body_font['font-family'].';'; ?>
        <?php echo 'color: '.$color.';'; ?>
        <?php echo 'font-size: '.$body_font['font-size'].';'; ?>
        <?php echo 'line-height: '.$body_font['line-height'].';'; ?>
        <?php echo 'letter-spacing: '.$body_font['letter-spacing'].';'; ?>
        <?php echo 'color: '.$body_font['color'].';'; ?>
        }

        h1 {
        <?php echo 'font-family: '.$h1_font['font-family'].';'; ?>
        <?php echo 'font-size: '.$h1_font['font-size'].';'; ?>
        <?php echo 'line-height: '.$h1_font['line-height'].';'; ?>
        <?php echo 'letter-spacing: '.$h1_font['letter-spacing'].';'; ?>
        <?php echo 'color: '.$h1_font['color'].';'; ?>
        }

        h2 {
        <?php echo 'font-family: '.$h2_font['font-family'].';'; ?>
        <?php echo 'font-size: '.$h2_font['font-size'].';'; ?>
        <?php echo 'line-height: '.$h2_font['line-height'].';'; ?>
        <?php echo 'letter-spacing: '.$h2_font['letter-spacing'].';'; ?>
        <?php echo 'color: '.$h2_font['color'].';'; ?>
        }

        /* Add styles for h3, h4, h5, and h6 as needed */

    </style>
    <?php
}
add_action('wp_head', 'theme_custom_css');

