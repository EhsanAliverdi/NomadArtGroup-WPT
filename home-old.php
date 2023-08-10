<?php
/*
Template Name: Custom Homepage
*/
?>
<div class="container-fluid mh-100">
    <div class="row justify-content-center mh-100">
        <div class="col-12">
            <div class="h-100 d-flex flex-column">
                <?php  get_header(); ?>
                <div class="row justify-content-center flex-grow-1">
                    <div  class="d-flex align-items-center">
                        <div class="innerWrapper-2">
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
                                    <?php nomad_pagination( '<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>', '', ['class' => ''] );?>
                                </div>
                            <?php
                            else:
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
                            ?>

                        </div>
                    </div>
                </div>
                <?php  get_footer(); ?>
            </div>
        </div>
    </div>
</div>