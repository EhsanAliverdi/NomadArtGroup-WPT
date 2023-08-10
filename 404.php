<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nomad
 */

get_header();
?>

<section class="error__area pt-200 pb-200">
   <div class="container">
      <div class="row">
         <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
            <?php 
               $nomad_error_404_text = get_theme_mod('nomad_error_404_text', __('404', 'nomad'));
               $nomad_error_title = get_theme_mod('nomad_error_title', __('Page not found', 'nomad'));
               $nomad_error_link_text = get_theme_mod('nomad_error_link_text', __('Back To Home', 'nomad'));
               $nomad_error_desc = get_theme_mod('nomad_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'nomad'));
            ?>
            <div class="error__item text-center">
               <div class="error__thumb">
                  <h1><?php print esc_html($nomad_error_404_text); ?></h1>
               </div>
               <div class="error__content">
                  <h3 class="error__title"><?php print esc_html($nomad_error_title);?></h3>
                  <p><?php print esc_html($nomad_error_desc);?></p>
                   <a class="btn btn--styleOne btn--secondary it-btn" href="<?php print esc_url(home_url('/'));?>">
                  <span class="btn__text"><?php print esc_html($nomad_error_link_text);?></span>
                  <span class="it-btn__inner">
                  <span class="it-btn__blobs">
                    <span class="it-btn__blob"></span>
                  <span class="it-btn__blob"></span>
                  <span class="it-btn__blob"></span>
                  <span class="it-btn__blob"></span>
                  </span>
                  </span>
                  <svg class="it-btn__animation" xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                      <filter class="goo">
                        <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10">
                        </feGaussianBlur>
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                        </feColorMatrix>
                        <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                      </filter>
                    </defs>
                  </svg>
                </a>
               </div>
            </div>

         </div>
      </div>
   </div>
</section>

<?php
get_footer();
