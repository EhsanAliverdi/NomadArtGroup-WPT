<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package nomad
 */


wp_footer(); ?>

<!-- Footer -->
<footer class="footer-bs text-center text-lg-start ">
    <!-- Section: Hot Links -->
    <?php if (get_theme_mod('footer_show_hotlinks_section', true)): ?>
        <section class="footer-custom-links">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $donation_url = esc_url(get_theme_mod('footer_donation_url', '#'));
                    $tickets_url = esc_url(get_theme_mod('footer_tickets_url', '#'));
                        ?>
                        <div class="col-md-6 text-md-start mb-3 text-uppercase">
                            <h1><a href="<?php echo $donation_url; ?>" class="custom-link"><?php esc_html_e('Donation', 'nomad'); ?></a></h1>
                        </div>
                        <div class="col-md-6 text-md-end text-uppercase">
                            <h1> <a href="<?php echo $tickets_url; ?>" class="custom-link"><?php esc_html_e('Tickets', 'nomad'); ?></a></h1>
                        </div>

                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Section: Hot Links -->

    <!-- Section: contact -->
    <?php if (get_theme_mod('footer_show_contact_section', true)): ?>
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
    <?php if (get_theme_mod('footer_show_custom_widgets', true)): ?>
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
    <?php if (get_theme_mod('footer_show_copyright_section', true)): ?>
        <section class="text-center p-4">
            <?php echo esc_html(get_theme_mod('footer_copyright_text', '© 2023 Copyright: NomadArtGroup')); ?>
        </section>
    <?php endif; ?>
    <!-- Copyright -->
</footer>
<!-- Footer -->