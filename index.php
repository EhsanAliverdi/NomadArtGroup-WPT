<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nomad
 */
?>


<?php get_header();
$blog_column = is_active_sidebar( 'blog-sidebar',false ) ? 8 : 12;
?>
    <section class="content blog-sidebar-area donation pt-130 pb-100 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-<?php print esc_attr( $blog_column );?> mb-30">
                    <div class="row justify-content-start">
                        <?php
                        if ( have_posts() ):
                            if ( is_home() && !is_front_page() ):
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title();?></h1>
                                </header>
                            <?php
                            endif;?>
                            <?php
                            /* Start the Loop */
                            while ( have_posts() ): the_post(); ?>
                                <?php
                                /*
                                * Include the Post-Type-specific template for the content.
                                * If you want to override this in a child theme, then include a file
                                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                */
                                get_template_part( 'template-parts/content', get_post_format() );?>
                            <?php
                            endwhile;
                            ?>
                            <div class="basic-pagination mb-40 pagination justify-content-left">
                                <?php nomad_pagination( '', '', '', ['class' => ''] );?>
                            </div>
                        <?php
                        else:
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>
                    </div>
                </div>

                <?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
                    <div class="col-lg-4 mb-30">
                        <div class="sidebarLayout">
                            <?php get_sidebar();?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>

<?php get_footer();?>
