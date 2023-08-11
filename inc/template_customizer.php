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

    // Font Subsection
    $wp_customize->add_section('theme_dark_page_typography_section', array(
        'title' => 'Typography',
        'priority' => 20,
        'description' => 'Customize the font settings for dark pages.',
        'panel' => 'template_dark_page_panel',
    ));
    //</editor-fold>

    //<editor-fold desc="Light Pages Sections and Panels">
    $wp_customize->add_panel('template_light_page_panel', array(
        'title' => 'Light Pages',
        'priority' => 80,
        'description' => 'Customize settings for light pages.',
    ));

    // Color Subsection
    $wp_customize->add_section('theme_light_page_color_section', array(
        'title' => 'Color',
        'priority' => 10,
        'description' => 'Customize the color settings for light pages',
        'panel' => 'template_light_page_panel',
    ));

    // Font Subsection
    $wp_customize->add_section('theme_light_page_typography_section', array(
        'title' => 'Typography',
        'priority' => 20,
        'description' => 'Customize the font settings for light pages.',
        'panel' => 'template_light_page_panel',
    ));
    //</editor-fold>

    //<editor-fold desc="Header sections and panels">
    // Header Panel
    $wp_customize->add_panel('template_header_panel', array(
        'title' => 'Header',
        'priority' => 30,
        'description' => 'Customize the header settings',
    ));

    // Logo Subsection
    $wp_customize->add_section('template_header_logo_section', array(
        'title' => 'Logo',
        'priority' => 10,
        'description' => 'Upload a logo to be displayed in the header',
        'panel' => 'template_header_panel', // Associate with the "Header" panel
    ));


    // Navigation Style Section
    $wp_customize->add_section('template_header_navigation_style_section', array(
        'title' => 'Navigation Style',
        'priority' => 20,
        'description' => 'Select a navigation style for the header',
        'panel' => 'template_header_panel', // Associate with the "Header" panel
    ));

    // Header Style Section
    $wp_customize->add_section('template_header_style_section', array(
        'title' => 'Header Style',
        'priority' => 15,
        'description' => 'Select a style for the top bar in the header',
        'panel' => 'template_header_panel', // Associate with the "Header" panel
    ));

    $wp_customize->add_section('template_header_contact_settings_section', array(
        'title' => 'Contact',
        'description' => 'These settings apply only if the chosen style has a location for Contact information.',
        'panel' => 'template_header_panel',
    ));

    $wp_customize->add_section('template_header_social_media_settings_section', array(
        'title' => 'Social Media',
        'description' => 'These settings apply only if the chosen style has a location for Social Media links.',
        'panel' => 'template_header_panel',
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

    // Contact Footer

    $wp_customize->add_panel('theme_footer_panel', array(
        'title' => 'Footer',
        'priority' => 70,
        'description' => 'Customize contact information',
    ));

    $wp_customize->add_section('theme_footer_logo_section', array(
        'title' => 'Logo',
        'priority' => 10,
        'description' => 'Customize the logo settings for footer',
        'panel' => 'theme_footer_panel',
    ));

    $wp_customize->add_section('theme_footer_contact_section', array(
        'title' => 'Contact',
        'priority' => 20,
        'description' => 'Customize the contact section footer',
        'panel' => 'theme_footer_panel',
    ));
    $wp_customize->add_section('theme_footer_copyright_section', array(
        'title' => 'Copyright',
        'priority' => 30,
        'description' => 'Customize the copyright section for footer',
        'panel' => 'theme_footer_panel',
    ));
    $wp_customize->add_section('theme_footer_custom_widgets_section', array(
        'title' => 'Custom Widgets',
        'priority' => 40,
        'description' => 'Customize the Custom Widgets section for footer',
        'panel' => 'theme_footer_panel',
    ));

    $wp_customize->add_section('theme_footer_hotlinks_section', array(
        'title' => 'HotLinks',
        'priority' => 50,
        'description' => 'Customize Hot links section',
        'panel' => 'theme_footer_panel',
    ));
    //</editor-fold>
}

add_action('customize_register', 'template_customizer_panels_sections');


function _footer_settings($fields)
{
    // Footer Section

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_show_hotlinks_section',
        'label' => 'Show Hot Links Section',
        'section' => 'theme_footer_hotlinks_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'url',
        'settings' => 'footer_donation_url',
        'label' => esc_html__('Donation Page URL', 'nomad'),
        'section' => 'theme_footer_hotlinks_section',
        'default' => '#',
    ];

    $fields[] = [
        'type' => 'url',
        'settings' => 'footer_tickets_url',
        'label' => esc_html__('Ticketing Page URL', 'nomad'),
        'section' => 'theme_footer_hotlinks_section',
        'default' => '#',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_show_copyright_section',
        'label' => 'Show Copyright Section',
        'section' => 'theme_footer_copyright_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'Textarea',
        'settings' => 'footer_copyright_text',
        'label' => esc_html__('Copy Right Text', 'nomad'),
        'description' => esc_html__('The value in the following field will be added to copyright section in footer', 'nomad'),
        'section' => 'theme_footer_copyright_section',
        'default' => '© ' . date('Y') . ' Copyright: Nomad Art Group',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_show_contact_section',
        'label' => 'Show Contact Section',
        'section' => 'theme_footer_contact_section',
        'default' => true,
    ];




    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_show_logo_dark',
        'label' => 'Show logo on Dark Pages',
        'section' => 'theme_footer_logo_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'footer_logo_dark',
        'label' => esc_html__('Navbar Logo Dark Pages', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'theme_footer_logo_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];
    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_show_logo_light',
        'label' => 'Show logo on Light Pages',
        'section' => 'theme_footer_logo_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'footer_logo_Light',
        'label' => esc_html__('Navbar Logo Light Pages', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'theme_footer_logo_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_black.png',
    ];

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'footer_show_custom_widgets',
        'label' => 'Show Custom Widgets Section in the footer',
        'section' => 'theme_footer_custom_widgets_section',
        'default' => true,
    ];

    $fields[] = [
        'type' => 'select',
        'settings' => 'footer_custom-widgets_col',
        'label' => esc_html__('Number of Columns', 'nomad'),
        'section' => 'theme_footer_custom_widgets_section',
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

add_action('kirki/fields', '_footer_settings');


function _header_fields($fields)
{

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'template_header_show_logo_navbar_dark',
        'label' => 'Show logo on Navbar Dark Pages',
        'section' => 'template_header_logo_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'template_header_navbar_logo_dark',
        'label' => esc_html__('Navbar Logo Dark Pages', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'template_header_logo_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];
    $fields[] = [
        'type' => 'toggle',
        'settings' => 'template_header_show_logo_navbar_light',
        'label' => 'Show logo on Navbar Light Pages',
        'section' => 'template_header_logo_section',
        'default' => true,
    ];
    $fields[] = [
        'type' => 'image',
        'settings' => 'template_header_navbar_logo_Light',
        'label' => esc_html__('Navbar Logo Light Pages', 'nomad'),
        'description' => esc_html__('Upload Your Logo.', 'nomad'),
        'section' => 'template_header_logo_section',
        'default' => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_black.png',
    ];
    return $fields;
}

add_filter('kirki/fields', '_header_fields');

function _dark_pages_fields($fields)
{


    //Background Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_dark_page_color_section',
        'label' => 'Background Color',
        'section' => 'theme_dark_page_color_section',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => ['alpha' => true],
    ];


    // typography Subsection
    $fields[] = [
        'type' => 'section',
        'settings' => 'theme_dark_page_typography_section',
        'title' => 'Typography',
        'priority' => 10,
        'description' => 'Customize the typography settings',
        'panel' => 'template_dark_page_panel',
    ];

    return $fields;
}

add_filter('kirki/fields', '_dark_pages_fields');

function _light_pages_fields($fields)
{


    //Background Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'theme_light_page_color_section',
        'label' => 'Background Color',
        'section' => 'theme_light_page_color_section',
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => ['alpha' => true],
    ];


    // typography Subsection
    $fields[] = [
        'type' => 'section',
        'settings' => 'theme_light_page_typography_section',
        'title' => 'Typography',
        'priority' => 10,
        'description' => 'Customize the typography settings',
        'panel' => 'template_light_page_panel',
    ];

    return $fields;
}

add_filter('kirki/fields', '_light_pages_fields');

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


//TODO FIX this as it outputs as inline style
function _typo_fields_dark_pages($fields)
{
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
        'output' => [
            [
                'element' => 'body',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h1',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h2',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h3',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h4',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h5',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

//add_filter( 'kirki/fields', '_typo_fields_dark_pages' );

//TODO FIX this as it outputs as inline style
function _typo_fields_light_pages($fields)
{
    // typography settings
    $fields[] = [
        'type' => 'typography',
        'settings' => 'typography_body_setting_light_page',
        'label' => esc_html__('Body Font', 'nomad'),
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
        'output' => [
            [
                'element' => 'body',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h1',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h2',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h3',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h4',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h5',
            ],
        ],
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
        'output' => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}
//add_filter( 'kirki/fields', '_typo_fields_light_pages' );