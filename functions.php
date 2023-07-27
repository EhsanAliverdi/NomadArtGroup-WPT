<?php
function nomadartgroup_enqueue_scripts() {
    // Enqueue your CSS and JS files here
    wp_enqueue_style('nomadartgroup-style', get_stylesheet_uri());
    // You can enqueue more styles and scripts as needed
}
add_action('wp_enqueue_scripts', 'nomadartgroup_enqueue_scripts');