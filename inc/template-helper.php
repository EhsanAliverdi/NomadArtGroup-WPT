<?php
function render_header($page_type = 'dark'){
    ?>
    <div id="nomadHeader" class="d-flex">
        <div class="d-flex flex-grow-1 align-self-center ms-2" >
            <?php render_navbar_logo($page_type); ?>
        </div>
        <div class="d-flex align-self-center">
            <?php render_navbar(); ?>
        </div>
    </div>
    <?php
}


function render_navbar_logo($page_type = 'dark') {
    // Check if the toggle option is true
    $show_logo = get_theme_mod('template_header_show_logo_navbar_'.$page_type);
    // If the toggle option is true, display the logo
    if ($show_logo) {
        // Get the URL of the logo image based on the input $page_type
        $logo_url = get_theme_mod('template_header_navbar_logo_'.$page_type);
        // Display the logo
        echo '<img class="navbar-logo" src="' . esc_url($logo_url) . '" alt="' . esc_attr__('Navbar Logo', 'nomadartgroup') . '">';

    }

}




function render_navbar($page_type = 'dark'){
    ?>
    <div class="me-2">
        <a onclick="menuToggle()"><i class="fa fa-bars fa-2xl" ></i></a>
    </div>
    <div id="menuHolder" class="justify-content-center">
           <div id="menuDrawer">
               <i id="menuCloseBtn" class="fas fa-times" role="btn" onclick="menuToggle()"></i>
            <?php  wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => '',
                'menu_id'              => '',
                'fallback_cb' => '__return_false',
                'depth' => 2,
                'walker' => new off_canvas_Walker_Nav_Menu()
            )); ?>
        </div>
    </div>
    <?php
}