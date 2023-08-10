<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nomad
 */

get_header();
?>

<?php
get_header();

// Check if the page should use the light or dark template
$page_design = get_post_meta(get_the_ID(), 'page_design', true); // You need to define how to get this value

// Default to "light" if no specific design is set
if ($page_design !== 'dark') {
    $page_design = 'light';
}

// Include the appropriate template part based on the design
get_template_part('template-parts/template', $page_design);

get_footer();
?>

<?php
get_footer();
