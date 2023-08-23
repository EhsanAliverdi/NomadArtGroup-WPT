<?php
function render_header()
{
    ?>
    <div id="nomadHeader" class="d-flex">
        <div class="d-flex flex-grow-1 align-self-center ms-2">
            <?php render_navbar_logo(); ?>
        </div>
        <div class="d-flex align-self-center">
            <?php render_navbar(); ?>
        </div>
    </div>
    <?php
}

function render_footer()
{
    ?>
    <?php $page_type = get_page_type(); ?>
    <footer class="footer-bs text-center text-lg-start ">
        <!-- Section: Hot Links -->
        <?php if (get_theme_mod('footer_'.$page_type.'_show_hotlinks_section', true)): ?>
            <section class="footer-custom-links">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $donation_url = esc_url(get_theme_mod('footer_'.$page_type.'_donation_url', '#'));
                        $tickets_url = esc_url(get_theme_mod('footer_'.$page_type.'_tickets_url', '#'));
                        ?>
                        <div class="col-md-6 text-md-start mb-3 text-uppercase">
                            <h1><a href="<?php echo $donation_url; ?>"
                                   class="custom-link"><?php esc_html_e('Donation', 'nomad'); ?></a></h1>
                        </div>
                        <div class="col-md-6 text-md-end text-uppercase">
                            <h1><a href="<?php echo $tickets_url; ?>"
                                   class="custom-link"><?php esc_html_e('Tickets', 'nomad'); ?></a></h1>
                        </div>

                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- Section: Hot Links -->

        <!-- Section: contact -->
        <?php if (get_theme_mod('footer_'.$page_type.'_show_contact_section', true)): ?>
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-md-block">
                    <?php render_footer_logo(); ?>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <?php print get_social_media_links(); ?>
                </div>
                <!-- Right -->
            </section>
        <?php endif; ?>
        <!-- Section: contact -->

        <!-- Section: custom Widgets  -->
        <?php if (get_theme_mod('footer_'.$page_type.'_show_custom_widgets', true)): ?>
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">

                        <?php
                        $selected_columns = get_theme_mod('footer_custom-widgets_col', 'col-4');
                        $num_columns = intval(substr($selected_columns, -1));
                        $column_class = 'col-md-' . (12 / $num_columns) . ' mx-auto mb-4';

                        for ($i = 1; $i <= $num_columns; $i++) {
                            $sidebar_id = 'footer-column-' . $i;
                            ?>

                            <div class="<?php echo $column_class; ?>">
                                <?php dynamic_sidebar($sidebar_id); ?>
                            </div>

                        <?php } ?>

                        <!-- Add more columns as needed -->
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- Section: custom Widgets  -->
        <!-- Copyright -->
        <?php if (get_theme_mod('footer_'.$page_type.'_show_copyright_section', true)): ?>
            <section class="text-center p-4">
                <?php echo esc_html(get_theme_mod('footer_copyright_text', '© 2023 Copyright: NomadArtGroup')); ?>
            </section>
        <?php endif; ?>
        <!-- Copyright -->
    </footer>
    <?php
}


function render_navbar_logo()
{
    $page_type = get_page_type();
    // Check if the toggle option is true
    $show_logo = get_theme_mod('template_' . $page_type . '_header_show_logo_navbar', false);
    // If the toggle option is true, display the logo
    if ($show_logo) {
        // Get the URL of the logo image based on the input $page_type
        if ($page_type == 'home') {
            $logo_url = get_theme_mod('template_' . $page_type . '_header_navbar_logo', TEMPLATE_IMAGES_DIR . '/logos/nomad_logo_white.png');
        }
        if ($page_type == 'dark') {
            $logo_url = get_theme_mod('template_' . $page_type . '_header_navbar_logo', TEMPLATE_IMAGES_DIR . '/logos/nomad_logo_white.png');
        }
        if ($page_type == 'light') {
            $logo_url = get_theme_mod('template_' . $page_type . '_header_navbar_logo', TEMPLATE_IMAGES_DIR . '/logos/nomad_logo_black.png');
        }
        // Display the logo
        echo '<img class="navbar-logo" src="' . esc_url($logo_url) . '" alt="' . esc_attr__('Navbar Logo', 'nomadartgroup') . '">';

    }

}

function render_footer_logo()
{
    $page_type = get_page_type();
    // Check if the toggle option is true
    $show_logo = get_theme_mod('footer' . $page_type . '_show_logo', true);
    $logo_url = "";
    // If the toggle option is true, display the logo
    if ($show_logo) {
        // Get the URL of the logo image based on the input $page_type
        if ($page_type == 'home') {
            $logo_url = get_theme_mod('footer' . $page_type . '_logo', TEMPLATE_IMAGES_DIR . '/logos/nomad_logo_white.png');
        } else if ($page_type == 'dark') {
            $logo_url = get_theme_mod('footer' . $page_type . '_logo', TEMPLATE_IMAGES_DIR . '/logos/nomad_logo_white.png');
        } else if ($page_type == 'light') {
            $logo_url = get_theme_mod('footer' . $page_type . '_logo', TEMPLATE_IMAGES_DIR . '/logos/nomad_logo_black.png');
        }
        // Display the logo
        echo '<img class="navbar-logo" src="' . esc_url($logo_url) . '" alt="' . esc_attr__('Navbar Logo', 'nomadartgroup') . '">';
    }

}


function render_navbar()
{
    ?>
    <div class="me-2 ">
        <a id="menuOpenBtn"><i class="fa fa-bars fa-2xl "></i></a>
    </div>
    <div class="overlay"></div>
    <div id="menuHolder" class="">
        <i id="menuCloseBtn" class="fas fa-times mt-5 ms-5" role="btn"></i>
        <div id="menuDrawer" class="d-flex flex-column justify-content-center">
            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => '',
                'menu_id' => '',
                'fallback_cb' => '__return_false',
                'depth' => 2,
                'walker' => new off_canvas_Walker_Nav_Menu()
            )); ?>
        </div>
    </div>
    <?php
}

/**
 *
 * pagination
 */
if (!function_exists('nomad_pagination')) {

    function _nomad_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function nomad_pagination($prev, $next, $pages, $args)
    {
        global $wp_query;

        $current_page = max(1, get_query_var('paged'));
        $total_pages = $wp_query->max_num_pages;

        $output = '<nav class="pagination-container"><div class="pagination">';
        if ($current_page > 1) {
            $prev_page = $current_page - 1;
            $output .= '<a class="pagination-newer" href="' . get_pagenum_link($prev_page) . '">PREV</a>';
        }
        $output .= '<span class="pagination-inner">';

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                $output .= '<a class="pagination-active" href="#">' . $i . '</a>';
            } else {
                $output .= '<a href="' . get_pagenum_link($i) . '">' . $i . '</a>';
            }
        }

        $output .= '</span>';
        if ($current_page < $total_pages) {
            $next_page = $current_page + 1;
            $output .= '<a class="pagination-older" href="' . get_pagenum_link($next_page) . '">NEXT</a>';
        }
        $output .= '</div></nav>';


        print _nomad_pagi_callback($output);
    }
}


function nomad_custom_color()
{
    $nomad_color_option_prim = get_theme_mod('nomad_color_option_prim', '#7fb432');


    wp_enqueue_style('nomad-custom', TEMPLATE_CSS_DIR . 'nomad-custom.css', []);

    if (!empty($nomad_color_option_prim)) {
        $custom_css = '';

        $custom_css .= "html:root{ 
        --tp-primary: " . $nomad_color_option_prim . "; 

      }";


        wp_add_inline_style('nomad-custom', $custom_css);
    }
}

add_action('wp_enqueue_scripts', 'nomad_custom_color');


function get_social_media_links()
{
    $social_media_icons = array(
        'facebook' => 'fab fa-facebook-f',
        'twitter' => 'fab fa-twitter',
        'instagram' => 'fab fa-instagram',
        'linkedin' => 'fab fa-linkedin-in',
        'telegram' => 'fab fa-telegram-plane',
        'youtube' => 'fab fa-youtube',
    );

    $social_links = array();

    foreach ($social_media_icons as $network => $icon_class) {
        $social_url = get_theme_mod('social_' . $network . '_url', '#');
        if (!empty($social_url)) {
            $social_links[] = '<a class="me-4 text-reset" href="' . esc_url($social_url) . '" target="_blank" ><i class="' . esc_attr($icon_class) . '"></i></a>';
        }
    }

    if (!empty($social_links)) {
        echo '<div class="social-media-links">' . implode(' ', $social_links) . '</div>';
    }
}