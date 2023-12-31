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

/**
 * Template Name: Onepage Page Template
 * @package rasalina
 */
get_header();
?>

<div class="page-template-onepage">
	<?php
		if ( have_posts() ):
			while ( have_posts() ): the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile;
		else:
			get_template_part( 'template-parts/content', 'none' );
		endif;
	?>
</div>

<?php
get_footer();
