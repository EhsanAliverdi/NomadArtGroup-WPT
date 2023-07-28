<?php
function template_customize_register($wp_customize) {

    template_customize_footer_settings($wp_customize);
}


function template_customize_social_media_settings($wp_customize) {

    // Facebook URL Control
    $wp_customize->add_setting('social_facebook_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_facebook_url', array(
        'label' => 'Facebook URL',
        'section' => 'theme_social_media_section',
        'type' => 'url',
    ));

    // Twitter URL Control
    $wp_customize->add_setting('social_twitter_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_twitter_url', array(
        'label' => 'Twitter URL',
        'section' => 'theme_social_media_section',
        'type' => 'url',
    ));

    // Instagram URL Control
    $wp_customize->add_setting('social_instagram_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_instagram_url', array(
        'label' => 'Instagram URL',
        'section' => 'theme_social_media_section',
        'type' => 'url',
    ));

    // LinkedIn URL Control
    $wp_customize->add_setting('social_linkedin_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_linkedin_url', array(
        'label' => 'LinkedIn URL',
        'section' => 'theme_social_media_section',
        'type' => 'url',
    ));

    // Telegram URL Control
    $wp_customize->add_setting('social_telegram_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_telegram_url', array(
        'label' => 'Telegram URL',
        'section' => 'theme_social_media_section',
        'type' => 'url',
    ));

    // YouTube URL Control
    $wp_customize->add_setting('social_youtube_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_youtube_url', array(
        'label' => 'YouTube URL',
        'section' => 'theme_social_media_section',
        'type' => 'url',
    ));

    // Add more social media controls as needed

    // ...
}


function template_customize_footer_settings($wp_customize) {
    // Footer Section
    $wp_customize->add_section('theme_footer_section', array(
        'title' => 'Footer',
        'priority' => 70,
        'description' => 'Customize the footer settings',
    ));

    // Footer Text Control
    $wp_customize->add_setting('footer_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text', array(
        'label' => 'Footer Text',
        'section' => 'theme_footer_section',
        'type' => 'text',
    ));

    // Footer Copyright Text Control
    $wp_customize->add_setting('footer_copyright_text', array(
        'default' => sprintf('© %s %s. All rights reserved.', get_bloginfo('name'), date('Y')),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_copyright_text', array(
        'label' => 'Footer Copyright Text',
        'section' => 'theme_footer_section',
        'type' => 'text',
    ));


}


function template_customizer_panels_sections( $wp_customize ) {

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

    //<editor-fold desc="Base Settings Sections And Panels">
    // Base Settings Panel
    $wp_customize->add_panel('theme_base_settings_panel', array(
        'title' => 'Base Settings',
        'priority' => 40,
        'description' => 'Customize the base settings applied to everything on the site',
    ));

    // Color Subsection
    $wp_customize->add_section('theme_base_settings_color_section', array(
        'title' => 'Color',
        'priority' => 10,
        'description' => 'Customize the color settings',
        'panel' => 'theme_base_settings_panel', // Associate with the "Base Settings" panel
    ));

    // Font Subsection
    $wp_customize->add_section('theme_base_settings_typography_section', array(
        'title' => 'Typography',
        'priority' => 20,
        'description' => 'Customize the font settings',
        'panel' => 'theme_base_settings_panel', // Associate with the "Base Settings" panel
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

    // Contact Information Section
    $wp_customize->add_section('theme_contact_information_section', array(
        'title' => 'Contact Information',
        'priority' => 60,
        'description' => 'Customize contact information',
    ));

}
add_action( 'customize_register', 'template_customizer_panels_sections' );

function _header_fields( $fields ) {
    $fields[] = [
        'type'        => 'toggle',
        'settings' => 'template_header_show_logo_navbar_home',
        'label' => 'Show logo on Navbar Home Page',
        'section' => 'template_header_logo_section',
        'default' => true,
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'template_header_navbar_logo_home',
        'label'       => esc_html__( 'Navbar Logo Home', 'nomadartgroup' ),
        'description' => esc_html__( 'Upload Your Logo.', 'nomadartgroup' ),
        'section'     => 'template_header_logo_section',
        'default'     => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];
    $fields[] = [
        'type'        => 'toggle',
        'settings' => 'template_header_show_logo_navbar_dark',
        'label' => 'Show logo on Navbar Dark Pages',
        'section' => 'template_header_logo_section',
        'default' => true,
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'template_header_navbar_logo_dark',
        'label'       => esc_html__( 'Navbar Logo Dark Pages', 'nomadartgroup' ),
        'description' => esc_html__( 'Upload Your Logo.', 'nomadartgroup' ),
        'section'     => 'template_header_logo_section',
        'default'     => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_white.png',
    ];
    $fields[] = [
        'type'        => 'toggle',
        'settings' => 'template_header_show_logo_navbar_light',
        'label' => 'Show logo on Navbar Light Pages',
        'section' => 'template_header_logo_section',
        'default' => true,
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'template_header_navbar_logo_Light',
        'label'       => esc_html__( 'Navbar Logo Light Pages', 'nomadartgroup' ),
        'description' => esc_html__( 'Upload Your Logo.', 'nomadartgroup' ),
        'section'     => 'template_header_logo_section',
        'default'     => TEMPLATE_IMAGES_DIR . 'logos/nomad_logo_black.png',
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_fields' );

function _base_fields($fields) {
    // Base Settings Panel
    $fields[] = [
        'type' => 'panel',
        'settings' => 'theme_base_settings_panel',
        'title' => 'Base Settings',
        'priority' => 40,
        'description' => 'Customize the base settings applied to everything on the site',
    ];

    // Color Subsection
    $fields[] = [
        'type' => 'section',
        'settings' => 'theme_base_settings_color_section',
        'title' => 'Color',
        'priority' => 10,
        'description' => 'Customize the color settings',
        'panel' => 'theme_base_settings_panel',
    ];

    // Home Background Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'background_color_home',
        'label' => 'Home Background Color',
        'section' => 'theme_base_settings_color_section',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => [ 'alpha' => true ],
    ];

    // Light Pages Background Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'background_color_light',
        'label' => 'Light Pages Background Color',
        'section' => 'theme_base_settings_color_section',
        'default' => 'rgba(255, 255, 255, 0)', // Fully transparent white (RGB: 255, 255, 255, Alpha: 0)
        'sanitize_callback' => 'sanitize_hex_color', // We can keep this sanitize callback
        'choices' => [ 'alpha' => true ],
    ];

    // dark Pages Background Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'background_color_dark',
        'label' => 'Dark Pages Background Color',
        'section' => 'theme_base_settings_color_section',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => [ 'alpha' => true ],
    ];

    // typography Subsection
    $fields[] = [
        'type' => 'section',
        'settings' => 'theme_base_settings_typography_section',
        'title' => 'Typography',
        'priority' => 10,
        'description' => 'Customize the typography settings',
        'panel' => 'theme_base_settings_panel',
    ];

    return $fields;
}
add_filter('kirki/fields', '_base_fields');

function _social_media_fields($fields) {
    // Facebook URL Control
    $fields[] = [
        'type'     => 'url',
        'settings' => 'social_facebook_url',
        'label'    => esc_html__('Facebook URL', 'nomadartgroup'),
        'section'  => 'theme_social_media_section',
        'default'  => '#',
    ];

    // Twitter URL Control
    $fields[] = [
        'type'     => 'url',
        'settings' => 'social_twitter_url',
        'label'    => esc_html__('Twitter URL', 'nomadartgroup'),
        'section'  => 'theme_social_media_section',
        'default'  => '#',
    ];

    // Instagram URL Control
    $fields[] = [
        'type'     => 'url',
        'settings' => 'social_instagram_url',
        'label'    => esc_html__('Instagram URL', 'nomadartgroup'),
        'section'  => 'theme_social_media_section',
        'default'  => '#',
    ];

    // LinkedIn URL Control
    $fields[] = [
        'type'     => 'url',
        'settings' => 'social_linkedin_url',
        'label'    => esc_html__('LinkedIn URL', 'nomadartgroup'),
        'section'  => 'theme_social_media_section',
        'default'  => '#',
    ];

    // Telegram URL Control
    $fields[] = [
        'type'     => 'url',
        'settings' => 'social_telegram_url',
        'label'    => esc_html__('Telegram URL', 'nomadartgroup'),
        'section'  => 'theme_social_media_section',
        'default'  => '#',
    ];

    // YouTube URL Control
    $fields[] = [
        'type'     => 'url',
        'settings' => 'social_youtube_url',
        'label'    => esc_html__('YouTube URL', 'nomadartgroup'),
        'section'  => 'theme_social_media_section',
        'default'  => '#',
    ];

    return $fields;
}
add_filter('kirki/fields', '_social_media_fields');


// Add the filter to register the social media fields, sections, and panels
add_filter('kirki/fields', '_social_media_fields');


function _contact_information_fields($fields) {
    // Phone Number Control
    $fields[] = [
        'type'     => 'text',
        'settings' => 'contact_phone_number',
        'label'    => esc_html__('Phone Number', 'nomadartgroup'),
        'section'  => 'theme_contact_information_section',
        'default'  => '',
    ];

    // Email Address Control
    $fields[] = [
        'type'     => 'email',
        'settings' => 'contact_email_address',
        'label'    => esc_html__('Email Address', 'nomadartgroup'),
        'section'  => 'theme_contact_information_section',
        'default'  => '',
    ];

    // Address Control
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'contact_address',
        'label'    => esc_html__('Address', 'nomadartgroup'),
        'section'  => 'theme_contact_information_section',
        'default'  => '',
    ];

    return $fields;
}
add_filter('kirki/fields', '_contact_information_fields');


function _typo_fields( $fields ) {
    // Home text Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'text_color_home',
        'label' => 'Home text Color',
        'section' => 'theme_base_settings_typography_section',
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => [ 'alpha' => true ],
    ];

    // light text Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'text_color_light',
        'label' => 'Light pages text Color',
        'section' => 'theme_base_settings_typography_section',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => [ 'alpha' => true ],
    ];

    // dark text Color
    $fields[] = [
        'type' => 'color',
        'settings' => 'text_color_text',
        'label' => 'Light pages text Color',
        'section' => 'theme_base_settings_typography_section',
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'choices' => [ 'alpha' => true ],
    ];

    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'nomadartgroup' ),
        'section'     => 'theme_base_settings_typography_section',
        'default'     => [
            'font-family'    => 'Cutive Mono',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'nomadartgroup' ),
        'section'     => 'theme_base_settings_typography_section',
        'default'     => [
            'font-family'    => 'Cutive Mono',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'nomadartgroup' ),
        'section'     => 'theme_base_settings_typography_section',
        'default'     => [
            'font-family'    => 'Cutive Mono, sans-serif',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'nomadartgroup' ),
        'section'     => 'theme_base_settings_typography_section',
        'default'     => [
            'font-family'    => 'Cutive Mono, sans-serif',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'nomadartgroup' ),
        'section'     => 'theme_base_settings_typography_section',
        'default'     => [
            'font-family'    => 'Cutive Mono, sans-serif',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'nomadartgroup' ),
        'section'     => 'theme_base_settings_typography_section',
        'default'     => [
            'font-family'    => 'Cutive Mono, sans-serif',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'nomadartgroup' ),
        'section'     => 'theme_base_settings_typography_section',
        'default'     => [
            'font-family'    => 'Cutive Mono, sans-serif',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}
add_filter('kirki/fields', '_typo_fields');