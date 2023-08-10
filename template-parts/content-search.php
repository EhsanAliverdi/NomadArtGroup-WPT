<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nomad
 */

$categories = get_the_terms( $post->ID, 'category' );
$nomad_blog_date = get_theme_mod( 'nomad_blog_date', false );
$nomad_blog_comments = get_theme_mod( 'nomad_blog_comments', false );
$nomad_blog_author = get_theme_mod( 'nomad_blog_author', false );
$nomad_blog_cat = get_theme_mod( 'nomad_blog_cat', false );

if ( is_single() ):
?>
    <article id="post-<?php the_ID();?>" <?php post_class( 'blogBlock blogBlock--style4 hoverStyle  mb-55' );?>>
        <?php if ( has_post_thumbnail() ): ?>
            <div class="blogBlock__figure overflow-hidden">
                <?php the_post_thumbnail( 'full', ['class' => 'img-responsive blogBlock__figure__image image-saturation'] );?>
            </div>
        <?php endif;
        ?>

            <div class="blogBlock__content">
                <div class="blogBlock__meta mb-20">
                    <ul class="blogBlock__meta__list">
                        <?php if ( !empty($nomad_blog_date) ): ?>
                        <li><span class="blogBlock__meta__text"><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?></span></li>
                         <?php endif;?>

                         <?php if ( !empty($nomad_blog_cat) ): ?>
                        <li>
                            <span class="blogBlock__meta__text">
                                <i class="far fa-tag"></i> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a> 
                            </span>
                        </li>
                         <?php endif;?>

                        <?php if ( !empty($nomad_blog_author) ): ?>
                        <li><a class="blogBlock__meta__text" href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><i class="far fa-user"></i> <?php print get_the_author();?> </a></li>
                        <?php endif;?>

                        <?php if ( !empty($nomad_blog_comments) ): ?>
                        <li><a class="blogBlock__meta__text" href="<?php comments_link();?>"><i class="fal fa-comments"></i> <?php comments_number();?></a></li>
                        <?php endif;?>
                    </ul>
                </div>
                <h3 class="blogBlock__heading heading text-uppercase mb-20 d-none">
                    <?php the_title();?>
                </h3>
                <div class="post-text mb-25 blogBlock__text text">
                <?php the_content();?>
                    <?php
                        wp_link_pages( [
                            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'nomad' ),
                            'after'       => '</div>',
                            'link_before' => '<span class="page-number">',
                            'link_after'  => '</span>',
                        ] );
                    ?>
                </div>
                <?php print nomad_get_tag();?>
            </div>
    </article>
<?php
else: ?>

    <article id="post-<?php the_ID();?>" <?php post_class( 'blogBlock blogBlock--style4 hoverStyle mb-60' );?> data-wow-delay=".3s">
        <?php if ( has_post_thumbnail() ): ?>    
        <div class="blogBlock__figure overflow-hidden">
            <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail( 'full', ['class' => 'img-responsive blogBlock__figure__image image-saturation'] );?>
            </a>
        </div>
        <?php endif; ?>
        <div class="blogBlock__content">
            <div class="blogBlock__meta mb-20">
                <ul class="blogBlock__meta__list">
                    <?php if ( !empty($nomad_blog_date) ): ?>
                    <li><span class="blogBlock__meta__text"><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?></span></li>
                     <?php endif;?>

                     <?php if ( !empty($nomad_blog_cat) ): ?>
                    <li>
                        <span class="blogBlock__meta__text">
                            <i class="far fa-tag"></i> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a> 
                        </span>
                    </li>
                     <?php endif;?>

                    <?php if ( !empty($nomad_blog_author) ): ?>
                    <li><a class="blogBlock__meta__text" href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><i class="far fa-user"></i> <?php print get_the_author();?> </a></li>
                    <?php endif;?>

                    <?php if ( !empty($nomad_blog_comments) ): ?>
                    <li><a class="blogBlock__meta__text" href="<?php comments_link();?>"><i class="fal fa-comments"></i> <?php comments_number();?></a></li>
                    <?php endif;?>
                </ul>
            </div>

            <h3 class="blogBlock__heading heading text-uppercase mb-20">
                <a class="blogBlock__heading__link" href="<?php the_permalink();?>"><?php the_title();?></a>
            </h3>
            <div class="post-text post-text mb-25 blogBlock__text text">
                <?php the_excerpt();?>
            </div>
            <!-- blog btn -->

            <?php
                $nomad_blog_btn = get_theme_mod( 'nomad_blog_btn', 'Read More' );
                $nomad_blog_btn_switch = get_theme_mod( 'nomad_blog_btn_switch', true );
            ?>

            <?php if ( !empty( $nomad_blog_btn_switch ) ): ?>
            <div class="blog-btn">
                   <a class="btn btn--styleOne btn--secondary it-btn" href="<?php the_permalink();?>">
                  <span class="btn__text"><?php print esc_html( $nomad_blog_btn );?></span>
                  <span class="it-btn__inner">
                  <span class="it-btn__blobs">
                    <span class="it-btn__blob"></span>
                  <span class="it-btn__blob"></span>
                  <span class="it-btn__blob"></span>
                  <span class="it-btn__blob"></span>
                  </span>
                  </span>
                  <svg class="it-btn__animation" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                      <filter class="goo">
                        <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10">
                        </feGaussianBlur>
                        <feColorMatrix in="blur"   values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                        </feColorMatrix>
                        <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                      </filter>
                    </defs>
                  </svg>
                </a>
                </div>
            <?php endif;?>
        </div>
    </article>
<?php
endif;?>
