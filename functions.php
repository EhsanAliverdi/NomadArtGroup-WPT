<?php


// Define theme directories and URIs
define( 'TEMPLATE_DIR', get_template_directory() );
define( 'TEMPLATE_URI', get_template_directory_uri() );
define( 'TEMPLATE_VERSION', wp_get_theme()->get('Version') );
const TEMPLATE_CSS_DIR = TEMPLATE_URI . '/assets/css/';
const TEMPLATE_JS_DIR  = TEMPLATE_DIR . '/assets/js/';
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
    add_theme_support('page-templates');

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

function enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    // Enqueue jQuery from CDN
    wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.js', array('jquery'), '5.1.0', true );
//    wp_enqueue_script( 'fontawesome-min', get_stylesheet_directory_uri() . '/assets/js/fontawesome.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'popper-min', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'owl-carousel-min', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery-sticky', get_stylesheet_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), '', true );
    wp_enqueue_script( 'eawpt-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), TEMPLATE_VERSION, true );
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
function enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', TEMPLATE_CSS_DIR . 'bootstrap.min.css', array(), '', 'all' );
    wp_enqueue_style( 'fontawesome.min.css', TEMPLATE_CSS_DIR . 'fontawesome.min.css', array(), '', 'all' );
    wp_enqueue_style( 'style.css', TEMPLATE_CSS_DIR . 'style.css', array(), TEMPLATE_VERSION, 'all' );
    wp_enqueue_style('main.css', TEMPLATE_CSS_DIR . 'main.css');


}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function enqueue_google_fonts() {

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
    } elseif ($current_template === 'template-parts/content-page-light.php') {
        return 'light';
    }elseif ($current_template === 'template-parts/content-page-dark.php') {
        return 'dark';
    }
    else {
        // Default data for other templates
        return 'unknown';
    }
}


function theme_custom_css() {


    $background_default_colors = array(
        'home' => '#000000',
        'light' => '#ffffff',
        'dark' => '#000000',
    );
    $default_colors = array(
        'home' => '#ffffff',
        'light' => '#000000',
        'dark' => '#ffffff',
    );

    $default_font_settings = array(
        'font-family'=> '\'Cutive Mono\', sans-serif',
        'color'=> '',
        'font-size'=> '',
        'line-height'=> '',
        'letter-spacing'=> '',
    );

    $page_type = get_page_type();
    $background_color = get_theme_mod('theme_'.$page_type.'_background_color', $background_default_colors[$page_type]);
    $color = get_theme_mod('text_color_'.$page_type, $default_colors[$page_type]);
    $footer_background_color = get_theme_mod('theme_'.$page_type.'_background_color', 'transparent');
    $footer_border_color = get_theme_mod('theme_'.$page_type.'_footer_border_color', 'transparent');


    // Typography settings
    $body_font = get_theme_mod('typography_body_setting_'.$page_type.'_page', '\'Cutive Mono\', sans-serif');
    $h1_font = get_theme_mod('typography_h_setting_'.$page_type.'_page');
    $h2_font = get_theme_mod('typography_h2_setting_'.$page_type.'_page');
    $h3_font = get_theme_mod('typography_h3_setting_'.$page_type.'_page');
    $h4_font = get_theme_mod('typography_h4_setting_'.$page_type.'_page');
    $h5_font = get_theme_mod('typography_h5_setting_'.$page_type.'_page');
    $h6_font = get_theme_mod('typography_h6_setting_'.$page_type.'_page');


    ?>
    <h1><?php echo esc_attr($h1_font['font-family']); ?><h1>
    <style>
        :root {
            --background-color: <?php echo esc_attr($background_color); ?>;
            --text-color:<?php echo esc_attr($color); ?>;
            --footer-background-color:<?php echo esc_attr($footer_background_color); ?>;
            --footer-border-color:<?php echo esc_attr($footer_border_color); ?>;
        }

        body {
        <?php echo 'font-family: '.$body_font['font-family'].';'; ?>
        <?php echo 'font-size: '.$body_font['font-size'].';'; ?>
        <?php echo 'line-height: '.$body_font['line-height'].';'; ?>
        <?php echo 'letter-spacing: '.$body_font['letter-spacing'].';'; ?>
        <?php echo 'color: '.$body_font['color'].';'; ?>
            /*font-family: 'Cutive Mono', sans-serif;*/
        }

        body {
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

        h3 {
        <?php echo 'font-family: '.$h3_font['font-family'].';'; ?>
        <?php echo 'font-size: '.$h3_font['font-size'].';'; ?>
        <?php echo 'line-height: '.$h3_font['line-height'].';'; ?>
        <?php echo 'letter-spacing: '.$h3_font['letter-spacing'].';'; ?>
        <?php echo 'color: '.$h3_font['color'].';'; ?>
        }

        h4 {
        <?php echo 'font-family: '.$h4_font['font-family'].';'; ?>
        <?php echo 'font-size: '.$h4_font['font-size'].';'; ?>
        <?php echo 'line-height: '.$h4_font['line-height'].';'; ?>
        <?php echo 'letter-spacing: '.$h4_font['letter-spacing'].';'; ?>
        <?php echo 'color: '.$h4_font['color'].';'; ?>
        }

        h5 {
        <?php echo 'font-family: '.$h5_font['font-family'].';'; ?>
        <?php echo 'font-size: '.$h5_font['font-size'].';'; ?>
        <?php echo 'line-height: '.$h5_font['line-height'].';'; ?>
        <?php echo 'letter-spacing: '.$h5_font['letter-spacing'].';'; ?>
        <?php echo 'color: '.$h5_font['color'].';'; ?>
        }

        h6 {
        <?php echo 'font-family: '.$h6_font['font-family'].';'; ?>
        <?php echo 'font-size: '.$h6_font['font-size'].';'; ?>
        <?php echo 'line-height: '.$h6_font['line-height'].';'; ?>
        <?php echo 'letter-spacing: '.$h6_font['letter-spacing'].';'; ?>
        <?php echo 'color: '.$h6_font['color'].';'; ?>
        }



    </style>
    <?php
}
add_action('wp_head', 'theme_custom_css');


// Add a filter to customize the excerpt length
function custom_excerpt_length($length) {
    return 20; // Set your desired length here (e.g., 20 words)
}
add_filter('excerpt_length', 'custom_excerpt_length');

function custom_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( $query->is_archive() ) { // You can customize this condition based on where you want to apply the change (e.g., is_home(), is_category(), is_tag(), etc.)
        $query->set( 'posts_per_page', 9 ); // Set the number of posts per page (e.g., 12 in this case)
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

function register_footer_widget_areas() {
    register_sidebar(array(
        'name' => 'Footer Column 1',
        'id' => 'footer-column-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'name' => 'Footer Column 2',
        'id' => 'footer-column-2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer Column 3',
        'id' => 'footer-column-3',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer Column 4',
        'id' => 'footer-column-4',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
    ));


}
add_action('widgets_init', 'register_footer_widget_areas');