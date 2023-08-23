<?php
/**
 * nomad customizer
 *
 * @package nomad
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function template_customizer_panels_sections($wp_customize)
{

    //<editor-fold desc="Dark Pages Sections and Panels">
    $wp_customize->add_panel('template_dark_page_panel', array(
        'title' => 'Dark Pages',
        'priority' => 80,
        'description' => 'Customize settings for dark pages.',
    ));

    // Color Subsection
    $wp_customize->add_section('theme_dark_page_color_section', array(
        'title' => 'Color',
        'priority' => 10,
        'description' => 'Customize the color settings for dark pages',
        'panel' => 'template_dark_page_panel',
    ));
    // Header section within Dark Pages Panel
    $wp_customize->add_section('theme_dark_header_section', array(
        'title' => 'Header',
        'priority' => 20,
        'description' => 'Customize Header',
        'panel' => 'template_dark_page_panel',
    ));
    // Footer section within Dark Pages Panel
    $wp_customize->add_section('theme_dark_footer_section', array(
        'title' => 'Footer',
        'priority' => 70,
        'description' => 'Customize footer',
        'panel' => 'template_dark_page_panel',
    ));
    $wp_customize->add_section('theme_dark_page_typography_section', array(
        'title' => 'Typography',
        'priority' => 80,
        'description' => 'Customize Typography',
        'panel' => 'template_dark_page_panel',
    ));

    //</editor-fold>

    //<editor-fold desc="Light Pages Sections and Panels">
    $wp_customize->add_panel('template_light_page_panel', array(
        'title' => 'Light Pages',
        'priority' => 80,
        'description' => 'Customize settings for light pages.',
    ));

    // Color Subsection within Light Pages Panel
    $wp_customize->add_section('theme_light_page_color_section', array(
        'title' => 'Color',
        'priority' => 10,
        'description' => 'Customize the color settings for light pages',
        'panel' => 'template_light_page_panel',
    ));
    $wp_customize->add_section('theme_light_header_section', array(
        'title' => 'Header',
        'priority' => 20,
        'description' => 'Customize Header',
        'panel' => 'template_light_page_panel',
    ));

    // Footer Panel within Light Pages Panel
    $wp_customize->add_section('theme_light_footer_section', array(
        'title' => 'Footer',
        'priority' => 70,
        'description' => 'Customize contact information',
        'panel' => 'template_light_page_panel',
    ));
    $wp_customize->add_section('theme_light_page_typography_section', array(
        'title' => 'Typography',
        'priority' => 70,
        'description' => 'Customize Typography',
        'panel' => 'template_light_page_panel',
    ));


    //</editor-fold>

    //<editor-fold desc="Home Pages Sections and Panels">
    $wp_customize->add_panel('template_home_page_panel', array(
        'title' => 'Home Pages',
        'priority' => 80,
        'description' => 'Customize settings for light pages.',
    ));

    // Color Subsection within Light Pages Panel
    $wp_customize->add_section('theme_home_page_color_section', array(
        'title' => 'Color',
        'priority' => 10,
        'description' => 'Customize the color settings for home pages',
        'panel' => 'template_home_page_panel',
    ));
    $wp_customize->add_section('theme_home_header_section', array(
        'title' => 'Header',
        'priority' => 20,
        'description' => 'Customize Header',
        'panel' => 'template_home_page_panel',
    ));

    // Footer Panel within Light Pages Panel
    $wp_customize->add_section('theme_home_footer_section', array(
        'title' => 'Footer',
        'priority' => 70,
        'description' => 'Customize contact information',
        'panel' => 'template_home_page_panel',
    ));

    $wp_customize->add_section('theme_home_page_typography_section', array(
        'title' => 'Typography',
        'priority' => 80,
        'description' => 'Customize Typography',
        'panel' => 'template_home_page_panel',
    ));
    //</editor-fold>

    //<editor-fold desc="Social Media Sections and Panels">
    // Social Media Section
    $wp_customize->add_section('theme_social_media_section', array(
        'title' => 'Social Media',
        'priority' => 50,
        'description' => 'Customize social media links',
    ));
    //</editor-fold>

    //<editor-fold desc="Contact Information Sections and Panels">
    // Contact Information Section

    $wp_customize->add_section('theme_contact_information_section', array(
        'title' => 'Contact Information',
        'priority' => 60,
        'description' => 'Customize contact information',
    ));
    //</editor-fold>

}

add_action('customize_register', 'template_customizer_panels_sections');

function _footer_home_settings($fields)
{
    // Footer Section

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_home_show_hotlinks_section',
        'label' => 'Show Hot Links Section',
        'section' => 'theme_home_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'url',
        'settings' => 'footer_home_donation_url',
        'label' => esc_html__('Donation Page URL', 'nomad'),
        'section' => 'theme_home_footer_section',
        'default' => '#',
    ];

    $fields[] = [
        'type' => 'url',
        'settings' => 'footer_home_tickets_url',
        'label' => esc_html__('Ticketing Page URL', 'nomad'),
        'section' => 'theme_home_footer_section',
        'default' => '#',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_home_show_copyright_section',
        'label' => 'Show Copyright Section',
        'section' => 'theme_home_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'Textarea',
        'settings' => 'footer_home_copyright_text',
        'label' => esc_html__('Copy Right Text', 'nomad'),
        'description' => esc_html__('The value in the following field will be added to copyright section in footer', 'nomad'),
        'section' => 'theme_home_footer_section',
        'default' => '© ' . date('Y') . ' Copyright: Nomad Art Group',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_home_show_contact_section',
        'label' => 'Show Contact Section',
        'section' => 'theme_home_footer_section',
        'default' => true,
    ];




    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_home_show_logo',
        'label' => 'Show logo',
        'section' => 'theme_home_footer_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'footer_home_logo',
        'label' => esc_html__('Logo', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'theme_home_footer_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];


    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_home_show_custom_widgets',
        'label' => 'Show Custom Widgets Section in the footer',
        'section' => 'theme_home_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'select',
        'settings' => 'footer_home_custom-widgets_col',
        'label' => esc_html__('Number of Columns', 'nomad'),
        'section' => 'theme_home_footer_section',
        'default' => 'col-4',
        'placeholder' => esc_html__('Choose an number of Columns', 'nomad'),
        'choices' => [
            'col-1' => esc_html__('1', 'nomad'),
            'col-2' => esc_html__('2', 'nomad'),
            'col-3' => esc_html__('3', 'nomad'),
            'col-4' => esc_html__('4', 'nomad'),
        ],
    ];

    return $fields;


}
add_action('kirki/fields', '_footer_home_settings');
function _footer_dark_settings($fields)
{
    // Footer Section

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_dark_show_hotlinks_section',
        'label' => 'Show Hot Links Section',
        'section' => 'theme_dark_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'url',
        'settings' => 'footer_dark_donation_url',
        'label' => esc_html__('Donation Page URL', 'nomad'),
        'section' => 'theme_dark_footer_section',
        'default' => '#',
    ];

    $fields[] = [
        'type' => 'url',
        'settings' => 'footer_dark_tickets_url',
        'label' => esc_html__('Ticketing Page URL', 'nomad'),
        'section' => 'theme_dark_footer_section',
        'default' => '#',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_dark_show_copyright_section',
        'label' => 'Show Copyright Section',
        'section' => 'theme_dark_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'Textarea',
        'settings' => 'footer_dark_copyright_text',
        'label' => esc_html__('Copy Right Text', 'nomad'),
        'description' => esc_html__('The value in the following field will be added to copyright section in footer', 'nomad'),
        'section' => 'theme_dark_footer_section',
        'default' => '© ' . date('Y') . ' Copyright: Nomad Art Group',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_dark_show_contact_section',
        'label' => 'Show Contact Section',
        'section' => 'theme_dark_footer_section',
        'default' => true,
    ];




    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_dark_show_logo',
        'label' => 'Show logo',
        'section' => 'theme_dark_footer_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'footer_dark_logo',
        'label' => esc_html__('Logo', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'theme_dark_footer_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];


    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_dark_show_custom_widgets',
        'label' => 'Show Custom Widgets Section in the footer',
        'section' => 'theme_dark_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'select',
        'settings' => 'footer_dark_custom-widgets_col',
        'label' => esc_html__('Number of Columns', 'nomad'),
        'section' => 'theme_dark_footer_section',
        'default' => 'col-4',
        'placeholder' => esc_html__('Choose an number of Columns', 'nomad'),
        'choices' => [
            'col-1' => esc_html__('1', 'nomad'),
            'col-2' => esc_html__('2', 'nomad'),
            'col-3' => esc_html__('3', 'nomad'),
            'col-4' => esc_html__('4', 'nomad'),
        ],
    ];

    return $fields;


}
add_action('kirki/fields', '_footer_dark_settings');

function _footer_light_settings($fields)
{
    // Footer Section

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_light_show_hotlinks_section',
        'label' => 'Show Hot Links Section',
        'section' => 'theme_light_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'url',
        'settings' => 'footer_light_donation_url',
        'label' => esc_html__('Donation Page URL', 'nomad'),
        'section' => 'theme_light_footer_section',
        'default' => '#',
    ];

    $fields[] = [
        'type' => 'url',
        'settings' => 'footer_light_tickets_url',
        'label' => esc_html__('Ticketing Page URL', 'nomad'),
        'section' => 'theme_light_footer_section',
        'default' => '#',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_light_show_copyright_section',
        'label' => 'Show Copyright Section',
        'section' => 'theme_light_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'Textarea',
        'settings' => 'footer_light_copyright_text',
        'label' => esc_html__('Copy Right Text', 'nomad'),
        'description' => esc_html__('The value in the following field will be added to copyright section in footer', 'nomad'),
        'section' => 'theme_light_footer_section',
        'default' => '© ' . date('Y') . ' Copyright: Nomad Art Group',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_light_show_contact_section',
        'label' => 'Show Contact Section',
        'section' => 'theme_light_footer_section',
        'default' => true,
    ];


    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_light_show_logo',
        'label' => 'Show logo',
        'section' => 'theme_light_footer_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'footer_light_logo',
        'label' => esc_html__('Logo', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'theme_light_footer_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];


    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_light_show_custom_widgets',
        'label' => 'Show Custom Widgets Section in the footer',
        'section' => 'theme_light_footer_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'select',
        'settings' => 'footer_light_custom-widgets_col',
        'label' => esc_html__('Number of Columns', 'nomad'),
        'section' => 'theme_light_footer_section',
        'default' => 'col-4',
        'placeholder' => esc_html__('Choose an number of Columns', 'nomad'),
        'choices' => [
            'col-1' => esc_html__('1', 'nomad'),
            'col-2' => esc_html__('2', 'nomad'),
            'col-3' => esc_html__('3', 'nomad'),
            'col-4' => esc_html__('4', 'nomad'),
        ],
    ];

    return $fields;


}
add_action('kirki/fields', '_footer_light_settings');

function _header_home_settings($fields)
{

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'template_home_header_show_logo_navbar',
        'label' => 'Show logo on Navbar',
        'section' => 'theme_home_header_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'template_home_header_navbar_logo',
        'label' => esc_html__('Navbar Logo', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'theme_home_header_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_home_settings');

function _header_dark_settings($fields)
{

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'template_dark_header_show_logo_navbar',
        'label' => 'Show logo on Navbar',
        'section' => 'theme_dark_header_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'template_dark_header_navbar_logo',
        'label' => esc_html__('Navbar Logo', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'theme_dark_header_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_dark_settings');

function _header_light_settings($fields)
{

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'template_light_header_show_logo_navbar',
        'label' => 'Show logo on Navbar',
        'section' => 'theme_light_header_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'template_light_header_navbar_logo',
        'label' => esc_html__('Navbar Logo', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'theme_light_header_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_light_settings');

function _color_dark_settings($fields)
{


    //Background Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_dark_background_color',
        'label' => 'Background Color',
        'section' => 'theme_dark_page_color_section',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => ['alpha' => true],
    ];
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_dark_footer_border_color',
        'label' => 'Footer Border',
        'section' => 'theme_dark_page_color_section',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => ['alpha' => true],
    ];
    return $fields;
}

add_filter('kirki/fields', '_color_dark_settings');

function _color_light_settings($fields)
{


    //Background Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_light_background_color',
        'label' => 'Background Color',
        'section' => 'theme_light_page_color_section',
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => ['alpha' => true],
    ];
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_light_footer_border_color',
        'label' => 'Footer Border',
        'section' => 'theme_light_page_color_section',
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => ['alpha' => true],
    ];



    return $fields;
}
add_filter('kirki/fields', '_color_light_settings');

function _color_home_settings($fields)
{
    $fields[] = [
        'type' => 'section',
        'settings' => 'theme_home_page_color_section',
        'title' => 'Color',
        'priority' => 10,
        'description' => 'Customize the typography settings',
        'panel' => 'template_home_page_panel',
    ];

    //Background Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_home_background_color',
        'label' => 'Background Color',
        'section' => 'theme_home_page_color_section',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => ['alpha' => true],
    ];

    //footer border Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_home_footer_border_color',
        'label' => 'Footer Border Color',
        'section' => 'theme_home_page_color_section',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => ['alpha' => true],
    ];


    return $fields;
}
add_filter('kirki/fields', '_color_home_settings');

function _social_media_fields($fields)
{
    // Facebook URL Control
    $fields[] = [
        'type' => 'url',
        'settings' => 'social_facebook_url',
        'label' => esc_html__('Facebook URL', 'nomad'),
        'section' => 'theme_social_media_section',
        'default' => '#',
    ];

    // Twitter URL Control
    $fields[] = [
        'type' => 'url',
        'settings' => 'social_twitter_url',
        'label' => esc_html__('Twitter URL', 'nomad'),
        'section' => 'theme_social_media_section',
        'default' => '#',
    ];

    // Instagram URL Control
    $fields[] = [
        'type' => 'url',
        'settings' => 'social_instagram_url',
        'label' => esc_html__('Instagram URL', 'nomad'),
        'section' => 'theme_social_media_section',
        'default' => '#',
    ];

    // LinkedIn URL Control
    $fields[] = [
        'type' => 'url',
        'settings' => 'social_linkedin_url',
        'label' => esc_html__('LinkedIn URL', 'nomad'),
        'section' => 'theme_social_media_section',
        'default' => '#',
    ];

    // Telegram URL Control
    $fields[] = [
        'type' => 'url',
        'settings' => 'social_telegram_url',
        'label' => esc_html__('Telegram URL', 'nomad'),
        'section' => 'theme_social_media_section',
        'default' => '#',
    ];

    // YouTube URL Control
    $fields[] = [
        'type' => 'url',
        'settings' => 'social_youtube_url',
        'label' => esc_html__('YouTube URL', 'nomad'),
        'section' => 'theme_social_media_section',
        'default' => '#',
    ];

    return $fields;
}
add_filter('kirki/fields', '_social_media_fields');

function _contact_information_fields($fields)
{
    // Phone Number Control
    $fields[] = [
        'type' => 'text',
        'settings' => 'contact_phone_number',
        'label' => esc_html__('Phone Number', 'nomad'),
        'section' => 'theme_contact_information_section',
        'default' => '',
    ];

    // Email Address Control
    $fields[] = [
        'type' => 'email',
        'settings' => 'contact_email_address',
        'label' => esc_html__('Email Address', 'nomad'),
        'section' => 'theme_contact_information_section',
        'default' => '',
    ];

    // Address Control
    $fields[] = [
        'type' => 'textarea',
        'settings' => 'contact_address',
        'label' => esc_html__('Address', 'nomad'),
        'section' => 'theme_contact_information_section',
        'default' => '',
    ];

    return $fields;
}
add_filter('kirki/fields', '_contact_information_fields');



function _typo_fields_dark_pages($fields)
{
    $fields[] = [
        'type' => 'section',
        'settings' => 'theme_dark_page_typography_section',
        'title' => 'Typography',
        'priority' => 10,
        'description' => 'Customize the typography settings',
        'panel' => 'template_dark_page_panel',
    ];
    // typography settings
    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_body_setting_dark_page',
        'label' => esc_html__('Body Font', 'nomad'),
        'section' => 'theme_dark_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#ffffff',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h_setting_dark_page',
        'label' => esc_html__('Heading h1 Fonts', 'nomad'),
        'section' => 'theme_dark_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#ffffff',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h2_setting_dark_page',
        'label' => esc_html__('Heading h2 Fonts', 'nomad'),
        'section' => 'theme_dark_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#ffffff',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h3_setting_dark_page',
        'label' => esc_html__('Heading h3 Fonts', 'nomad'),
        'section' => 'theme_dark_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#ffffff',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h4_setting_dark_page',
        'label' => esc_html__('Heading h4 Fonts', 'nomad'),
        'section' => 'theme_dark_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#ffffff',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h5_setting_dark_page',
        'label' => esc_html__('Heading h5 Fonts', 'nomad'),
        'section' => 'theme_dark_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#ffffff',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h6_setting_dark_page',
        'label' => esc_html__('Heading h6 Fonts', 'nomad'),
        'section' => 'theme_dark_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#ffffff',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];
    return $fields;
}

add_filter( 'kirki/fields', '_typo_fields_dark_pages' );


function _typo_fields_light_pages($fields)
{    $fields[] = [
    'type' => 'section',
    'settings' => 'theme_light_page_typography_section',
    'title' => 'Typography',
    'priority' => 10,
    'description' => 'Customize the typography settings',
    'panel' => 'template_light_page_panel',
];
    // typography settings
    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_body_setting_light_page',
        'label' => esc_html__('Body Font', 'nomad'),
        'section' => 'theme_light_page_typography_section',
        'default' => [
            'font-family' => '\'Cutive Mono\', sans-serif',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h_setting_light_page',
        'label' => esc_html__('Heading h1 Fonts', 'nomad'),
        'section' => 'theme_light_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h2_setting_light_page',
        'label' => esc_html__('Heading h2 Fonts', 'nomad'),
        'section' => 'theme_light_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h3_setting_light_page',
        'label' => esc_html__('Heading h3 Fonts', 'nomad'),
        'section' => 'theme_light_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h4_setting_light_page',
        'label' => esc_html__('Heading h4 Fonts', 'nomad'),
        'section' => 'theme_light_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h5_setting_light_page',
        'label' => esc_html__('Heading h5 Fonts', 'nomad'),
        'section' => 'theme_light_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h6_setting_light_page',
        'label' => esc_html__('Heading h6 Fonts', 'nomad'),
        'section' => 'theme_light_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];
    return $fields;
}
add_filter( 'kirki/fields', '_typo_fields_light_pages' );

function _typo_fields_home_pages($fields)
{    $fields[] = [
    'type' => 'section',
    'settings' => 'theme_home_page_typography_section',
    'title' => 'Typography',
    'priority' => 10,
    'description' => 'Customize the typography settings',
    'panel' => 'template_home_page_panel',
];
    // typography settings
    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_body_setting_home_page',
        'label' => esc_html__('Body Font', 'nomad'),
        'section' => 'theme_home_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h_setting_home_page',
        'label' => esc_html__('Heading h1 Fonts', 'nomad'),
        'section' => 'theme_home_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h2_setting_home_page',
        'label' => esc_html__('Heading h2 Fonts', 'nomad'),
        'section' => 'theme_home_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h3_setting_home_page',
        'label' => esc_html__('Heading h3 Fonts', 'nomad'),
        'section' => 'theme_home_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h4_setting_home_page',
        'label' => esc_html__('Heading h4 Fonts', 'nomad'),
        'section' => 'theme_home_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h5_setting_home_page',
        'label' => esc_html__('Heading h5 Fonts', 'nomad'),
        'section' => 'theme_home_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];

    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_h6_setting_home_page',
        'label' => esc_html__('Heading h6 Fonts', 'nomad'),
        'section' => 'theme_home_page_typography_section',
        'default' => [
            'font-family' => '',
            'variant' => '',
            'font-size' => '',
            'line-height' => '',
            'letter-spacing' => '0',
            'color' => '#000000',
        ],
        'priority' => 10,
        'transport' => 'auto',

    ];
    return $fields;
}
add_filter( 'kirki/fields', '_typo_fields_home_pages' );