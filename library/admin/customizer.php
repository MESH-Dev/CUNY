<?php 

if ( class_exists( 'Kirki' ) ) {

    Kirki::add_config( 'fotomag_config', array(
    	'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );

  
    /*********************
    HEADER SECTION
    *********************/

    Kirki::add_section( 'fotomag_section_header', array(
        'title'          => esc_attr__( 'Header And Logo Options', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'radio-image',
        'settings'    => 'fotomag_set_header_layout',
        'label'       => esc_html__( 'Header Layout', 'fotomag' ),
        'section'     => 'fotomag_section_header',
        'default'     => '1',
        'priority'    => 0,
        'choices'     => array(
            '1'   => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-hl-1.png',
            '2' => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-hl-2.png',
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'     => 'number',
        'settings' => 'fotomag_set_header_layout_menu_pad',
        'label'    => esc_html__( 'Header Menu Padding: Top (px)', 'fotomag' ),
        'section'  => 'fotomag_section_header',
        'default'   => '5',
        'priority' => 0,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_header_layout',
                'operator' => '==',
                'value'    => '2',
            ),
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
    	'type'      => 'image',
    	'settings'   => 'fotomag_set_header_logo',
    	'label'      => esc_html__( 'Header Logo', 'fotomag' ),
        'section'    => 'fotomag_section_header',
        'priority'   => 0,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'image',
        'settings'   => 'fotomag_set_header_logo_retina',
        'help' => esc_html__( 'Retina Logo should be exactly double the size of the normal logo', 'fotomag' ),
        'label'      => esc_html__( 'Header Logo (Retina version)', 'fotomag' ),
        'section'    => 'fotomag_section_header',
        'priority'   => 0,
    ) );

     Kirki::add_field( 'fotomag_config', array(
        'type'     => 'switch',
        'settings' => 'fotomag_set_header_transparency',
        'help'     => esc_html__( 'Make header background transparent inside posts', 'fotomag'),
        'label'    => esc_html__( 'Transparent Header in Posts', 'fotomag' ),
        'section'  => 'fotomag_section_header',
        'default'   => false,
        'priority' => 0,
    ) );

     Kirki::add_field( 'fotomag_config', array(
        'type'      => 'image',
        'settings'   => 'fotomag_set_header_logo_light',
        'description'       => esc_html__('If desired, you can set a light version of your logo to show inside posts', 'fotomag'),
        'label'      => esc_html__( 'Header Logo For Posts (optional)', 'fotomag' ),
        'section'    => 'fotomag_section_header',
        'priority'   => 0,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_header_transparency',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'image',
        'settings'   => 'fotomag_set_header_logo_light_retina',
        'description'       => esc_html__('If desired, you can set a light version of your logo to show inside posts', 'fotomag'),
        'help' => esc_html__( 'Retina Logo should be exactly double the size of the normal logo', 'fotomag' ),
        'label'      => esc_html__( 'Header Logo For Posts (Retina version)', 'fotomag' ),
        'section'    => 'fotomag_section_header',
        'priority'   => 0,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_header_transparency',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    ) );


    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'number',
        'settings'   => 'fotomag_set_header_padding_top',
        'label'      => esc_html__( 'Header Padding: Top (px)', 'fotomag' ),
        'section'    => 'fotomag_section_header',
        'default'   => '25',
        'priority'   => 0,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'number',
        'settings'   => 'fotomag_set_header_padding_bot',
        'label'      => esc_html__( 'Header Padding: Bottom (px)', 'fotomag' ),
        'section'    => 'fotomag_section_header',
        'priority'   => 0,
        'default'   => '25',
    ) );


    /*********************
    LEFT NAVIGATION SECTION
    *********************/
    Kirki::add_section( 'fotomag_section_left_nav', array(
        'title'          => esc_html__( 'Left Navigation Options', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_left_nav_search',
        'label'       => esc_html__( 'Show Search In Menu', 'fotomag' ),
        'section'     => 'fotomag_section_left_nav',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_left_nav_social',
        'label'       => esc_html__( 'Show Social Icons', 'fotomag' ),
        'section'     => 'fotomag_section_left_nav',
        'default'     => false,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_left_nav_twitter',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Twitter',
        'section'     => 'fotomag_section_left_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_social',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_left_nav_instagram',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Instagram',
        'section'     => 'fotomag_section_left_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_social',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );


    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_left_nav_facebook',
        'description' => esc_html__( 'Enter the profile part only (everything after www.facebook.com/)', 'fotomag' ),
        'label'       => 'Facebook',
        'section'     => 'fotomag_section_left_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_social',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_left_nav_pinterest',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Pinterest',
        'section'     => 'fotomag_section_left_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_social',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_left_nav_subscribe',
        'label'       => esc_html__( 'Show Subscribe Button', 'fotomag' ),
        'section'     => 'fotomag_section_left_nav',
        'default'     => false,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_left_nav_subscribe_text',
        'label'       => esc_html__( '- Subscribe Button Text', 'fotomag' ),
        'section'     => 'fotomag_section_left_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_subscribe',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_left_nav_subscribe_title',
        'label'       => esc_html__( '- Popup Title', 'fotomag' ),
        'section'     => 'fotomag_section_left_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_subscribe',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_left_nav_subscribe_subtitle',
        'label'       => esc_html__( '- Popup Subtitle', 'fotomag' ),
        'section'     => 'fotomag_section_left_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_subscribe',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_left_nav_subscribe_code',
        'label'       => esc_html__( '- Subscribe Code', 'fotomag' ),
        'description' => esc_html__( 'Enter the form shortcode here', 'fotomag' ),
        'section'     => 'fotomag_section_left_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_subscribe',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_left_nav_sub_font_color',
        'label'      => esc_html__( '- Subscribe Popup Font Color', 'fotomag' ),
        'section'    => 'fotomag_section_left_nav',
        'priority'   => 10,
        'default'   => '#000',
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_subscribe',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

     Kirki::add_field( 'fotomag_config', array(
        'type'      => 'image',
        'settings'   => 'fotomag_set_left_nav_bg',
        'label'      => esc_html__( '- Subscribe Background Image', 'fotomag' ),
        'section'    => 'fotomag_section_left_nav',
        'priority'   => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_subscribe',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_left_nav_bg_color',
        'label'      => esc_html__( '- Subscribe Background Color', 'fotomag' ),
        'section'    => 'fotomag_section_left_nav',
        'default'   => '#fff',
        'priority'   => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_subscribe',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'     => 'slider',
        'settings' => 'fotomag_set_left_nav_bg_opacity',
        'label'    => esc_html__( '- Subscribe Background Image Opacity', 'fotomag' ),
        'section'  => 'fotomag_section_left_nav',
        'default'  => 80,
        'priority' => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_left_nav_subscribe',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        'choices'  => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ),
    ) );

    /*********************
    RIGHT NAVIGATION SECTION
    *********************/
    Kirki::add_section( 'fotomag_section_right_nav', array(
        'title'          => esc_html__( 'Slide In Menu Options', 'fotomag' ),
        'priority'       => 10,
        'description'   => esc_html__( 'You need to set a menu to the Slide-In Navigation Menu Location before setting these options up.', 'fotomag' ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'image',
        'settings'   => 'fotomag_set_right_nav_bg',
        'label'      => esc_html__( 'Background Image', 'fotomag' ),
        'section'    => 'fotomag_section_right_nav',
        'priority'   => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'     => 'slider',
        'settings' => 'fotomag_set_right_nav_bg_opacity',
        'label'    => esc_html__( 'Background Image Opacity', 'fotomag' ),
        'section'  => 'fotomag_section_right_nav',
        'default'  => 80,
        'priority' => 10,
        'choices'  => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_right_nav_bg_color',
        'label'      => esc_html__( 'Background Color', 'fotomag' ),
        'section'    => 'fotomag_section_right_nav',
        'priority'   => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_right_nav_font_color',
        'label'      => esc_html__( 'Text/Icons Color', 'fotomag' ),
        'section'    => 'fotomag_section_right_nav',
        'priority'   => 10,
        'default'   => '#111',
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_right_nav_social',
        'label'       => esc_html__( 'Show Social Icons', 'fotomag' ),
        'section'     => 'fotomag_section_right_nav',
        'default'     => false,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_right_nav_twitter',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Twitter',
        'section'     => 'fotomag_section_right_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_right_nav_social',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_right_nav_facebook',
        'description' => esc_html__( 'Enter the profile part only (everything after www.facebook.com/)', 'fotomag' ),
        'label'       => 'Facebook',
        'section'     => 'fotomag_section_right_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_right_nav_social',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_right_nav_pinterest',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Pinterest',
        'section'     => 'fotomag_section_right_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_right_nav_social',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

     Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_right_nav_instagram',
        'label'       => 'Instagram',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'section'     => 'fotomag_section_right_nav',
        'default'     => '',
        'priority'    => 10,
        'required'  => array(
            array(
                'setting'  => 'fotomag_set_right_nav_social',
                'operator' => '==',
                'value'    => true,
            ),
        )
    ) );

    /*********************
    POSTS SECTION
    *********************/

    Kirki::add_section( 'fotomag_section_post', array(
        'title'          => esc_html__( 'Post Options', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_category',
        'label'       => esc_html__( 'Show Category Above Title', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_down_arrow',
        'label'       => esc_html__( 'Show Down Arrow On Image', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_likes',
        'label'       => esc_html__( 'Show Like System', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_progress',
        'label'       => esc_html__( 'Show Progress Bar', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_author',
        'label'       => esc_html__( 'Show Author Box', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_date',
        'label'       => esc_html__( 'Show Publish Date', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_tags',
        'label'       => esc_html__( 'Show Tags', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_sharing',
        'label'       => esc_html__( 'Show Sharing Block', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );


    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_next_previous',
        'label'       => esc_html__( 'Show Next + Previous Posts', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_comments',
        'label'       => esc_html__( 'Show Comments', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_related',
        'label'       => esc_html__( 'Show Related Posts', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_post_autoload',
        'label'       => esc_html__( 'Ajax Autoload More Posts', 'fotomag' ),
        'help'       => esc_html__( 'When a user reaches 100% scroll progress in a post, the theme can autoload the next post so no need for user clicks. Fotomag will also tell Google Analytics about this (pageview).', 'fotomag' ),
        'section'     => 'fotomag_section_post',
        'default'     => false,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'image',
        'settings'   => 'fotomag_set_placeholder_img',
        'help' => esc_html__( 'If no featured image is set, you can set a placeholder image to use outside of the post, such as on the homepage.', 'fotomag' ),
        'label'      => esc_html__( 'Placeholder Image', 'fotomag' ),
        'section'    => 'fotomag_section_post',
        'priority'   => 10,
    ) );

    /*********************
    PAGES SECTION
    *********************/

    Kirki::add_section( 'fotomag_section_pages', array(
        'title'          => esc_html__( 'Pages Options', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_pages_progress',
        'label'       => esc_html__( 'Show Progress Bar', 'fotomag' ),
        'section'     => 'fotomag_section_pages',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_pages_sharing',
        'label'       => esc_html__( 'Show Sharing Block', 'fotomag' ),
        'section'     => 'fotomag_section_pages',
        'default'     => false,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_pages_comments',
        'label'       => esc_html__( 'Show Comments', 'fotomag' ),
        'section'     => 'fotomag_section_pages',
        'default'     => true,
        'priority'    => 10,
        
    ) );


    /*********************
    LAYOUTS
    *********************/
    Kirki::add_section( 'fotomag_section_layouts', array(
        'title'          => esc_html__( 'Layouts', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'radio-image',
        'settings'    => 'fotomag_section_layouts_hp',
        'label'       => esc_html__( 'Homepage Layout', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            '1'   => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-1.png',
            '2' => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-2.png',
            '3'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-3.png',
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'radio-image',
        'settings'    => 'fotomag_section_layouts_tags',
        'label'       => esc_html__( 'Tags Layout', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            '1'   => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-1.png',
            '2' => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-2.png',
            '3'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-3.png',
        ),
    ) );

     Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_section_layouts_tags_title',
        'help'         => esc_html__('This is to show the word Tag: before the tag title on tag pages', 'fotomag'),
        'label'       => esc_html__( 'Show word "Tag:"', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => false,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'radio-image',
        'settings'    => 'fotomag_section_layouts_sp',
        'label'       => esc_html__( 'Searches Layout', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            '1'   => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-1.png',
            '2' => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-2.png',
            '3'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-3.png',
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'radio-image',
        'settings'    => 'fotomag_section_layouts_ap',
        'label'       => esc_html__( 'Author Layout', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            '1'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-1.png',
            '2'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-2.png',
            '3'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-3.png',
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'radio-image',
        'settings'    => 'fotomag_section_layouts_cat',
        'label'       => esc_html__( 'Categories Layout', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            '1'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-1.png',
            '2'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-2.png',
            '3'  => esc_url( get_stylesheet_directory_uri() ) . '/library/img/cb-pl-3.png',
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_section_layouts_cat_title',
        'help'         => esc_html__('This is to show the word Category: before the category title on category pages', 'fotomag'),
        'label'       => esc_html__( 'Show word "Category:"', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => false,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'select',
        'settings'    => 'fotomag_section_layout_a_cat_multi',
        'label'       => esc_html__( 'Layout A For Specific Categories:', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => '',
        'priority'    => 10,
        'choices'     => fotomag_get_categories(),
        'multiple'    => 50,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'select',
        'settings'    => 'fotomag_section_layout_b_cat_multi',
        'label'       => esc_html__( 'Layout B For Specific Categories:', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => '',
        'priority'    => 10,
        'choices'     => fotomag_get_categories(),
        'multiple'    => 50,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'select',
        'settings'    => 'fotomag_section_layout_c_cat_multi',
        'label'       => esc_html__( 'Layout C For Specific Categories:', 'fotomag' ),
        'section'     => 'fotomag_section_layouts',
        'default'     => '',
        'priority'    => 10,
        'choices'     => fotomag_get_categories(),
        'multiple'    => 50,
    ) );


    /*********************
    TYPOGRAPHY
    *********************/
    Kirki::add_section( 'fotomag_section_typography', array(
        'title'          => esc_html__( 'Typography', 'fotomag' ),
        'priority'       => 10,
    ) );


    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'slider',
        'settings'  => 'fotomag_section_typography_desktop',
        'label'     => esc_html__( 'Font Size (Big Screens)', 'fotomag' ),
        'section'   => 'fotomag_section_typography',
        'default'   => 18,
        'priority'  => 10,
        'choices'   => array(
            'min'   => 7,
            'max'   => 48,
            'step'  => 1,
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'slider',
        'settings'  => 'fotomag_section_typography_desktop_lh',
        'label'     => esc_html__( 'Font Line Height (Big Screens)', 'fotomag' ),
        'section'   => 'fotomag_section_typography',
        'default'   => 1.9,
        'priority'  => 10,
        'choices'   => array(
            'min'   => 1,
            'max'   => 3,
            'step'  => 0.1,
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'slider',
        'settings'  => 'fotomag_section_typography_mobile',
        'label'     => esc_html__( 'Font Size (Mobile Devices)', 'fotomag' ),
        'section'   => 'fotomag_section_typography',
        'default'   => 15,
        'priority'  => 10,
        'choices'   => array(
            'min'   => 7,
            'max'   => 48,
            'step'  => 1,
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'slider',
        'settings'  => 'fotomag_section_typography_mobile_lh',
        'label'     => esc_html__( 'Font Line Height (Mobile Devices)', 'fotomag' ),
        'section'   => 'fotomag_section_typography',
        'default'   => 1.9,
        'priority'  => 10,
        'choices'   => array(
            'min'   => 1,
            'max'   => 3,
            'step'  => 0.1,
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'     => 'select',
        'settings' => 'fotomag_set_typography_headings',
        'label'    => esc_html__( 'Headings/Titles Font', 'fotomag' ),
        'section'  => 'fotomag_section_typography',
        'default'  => 'Montserrat',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'     => 'select',
        'settings' => 'fotomag_set_typography_body',
        'label'    => esc_html__( 'Subtitle and Article Body Font', 'fotomag' ),
        'section'  => 'fotomag_section_typography',
        'default'  => 'Merriweather',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'multicheck',
        'settings'    => 'fotomag_set_typography_subsets',
        'label'       => esc_html__( 'Google-Font Scripts To Load', 'fotomag' ),
        'description' => esc_html__( 'If your language has special characters, enable them here.', 'fotomag' ),
        'section'     => 'fotomag_section_typography',
        'default'     => 'latin',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_google_font_subsets(),
    ) );

    

    /*********************
    FOOTER SECTION
    *********************/
    Kirki::add_section( 'fotomag_section_footer', array(
        'title'          => esc_html__( 'Footer Options', 'fotomag' ),
        'priority'       => 10,
    ) );


    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'image',
        'settings'   => 'fotomag_set_footer_logo',
        'label'      => esc_html__( 'Footer Logo', 'fotomag' ),
        'section'    => 'fotomag_section_footer',
        'priority'   => 0,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'image',
        'settings'   => 'fotomag_set_footer_logo_retina',
        'help' => esc_html__( 'Retina Logo should be exactly double the size of the normal logo', 'fotomag' ),
        'label'      => esc_html__( 'Footer Logo (Retina version)', 'fotomag' ),
        'section'    => 'fotomag_section_footer',
        'priority'   => 0,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_footer_text_under_logo',
        'label'       => esc_html__( 'Text Under Logo', 'fotomag' ),
        'section'     => 'fotomag_section_footer',
        'default'     => '',
        'priority'    => 0,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_footer_to_top',
        'label'       => esc_html__( 'To Top Button', 'fotomag' ),
        'section'     => 'fotomag_section_footer',
        'default'     => true,
        'priority'    => 0,
        
    ) );


    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'text',
        'settings'   => 'fotomag_set_footer_copyright_line',
        'label'      => esc_html__( 'Copyright Line', 'fotomag' ),
        'section'    => 'fotomag_section_footer',
        'priority'   => 0,
    ) );

    /*********************
    SOCIAL MEDIA FOOTER
    *********************/
    Kirki::add_section( 'fotomag_section_social_icons', array(
        'title'          => esc_html__( 'Footer Social Icons', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_twitter',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Twitter',
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_facebook',
        'description' => esc_html__( 'Enter the profile part only (everything after www.facebook.com/)', 'fotomag' ),
        'label'       => 'Facebook',
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_pinterest',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Pinterest',
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_instagram',
        'label'       => 'Instagram',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_dribbble',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Dribbble',
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_youtube',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Youtube',
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_vimeo',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Vimeo',
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_soundcloud',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'Soundcloud',
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'text',
        'settings'    => 'fotomag_set_social_footer_vk',
        'description' => esc_html__( 'Enter your username only', 'fotomag' ),
        'label'       => 'VK',
        'section'     => 'fotomag_section_social_icons',
        'default'     => '',
        'priority'    => 10,
    ) );

    /*********************
    COLORS SECTION
    *********************/

    Kirki::add_section( 'fotomag_section_colors', array(
        'title'          => esc_html__( 'Font Color Options', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_colors_body',
        'label'      => esc_html__( 'Article Font Color', 'fotomag' ),
        'section'    => 'fotomag_section_colors',
        'priority'   => 10,
        'default'   => '#444',
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_colors_headings',
        'label'      => esc_html__( 'Article Headings Font Color', 'fotomag' ),
        'section'    => 'fotomag_section_colors',
        'priority'   => 10,
        'default'   => '#222',
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_colors_blockquote',
        'label'      => esc_html__( 'Article Blockquotes Font Color', 'fotomag' ),
        'section'    => 'fotomag_section_colors',
        'priority'   => 10,
        'default'   => '#222',
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_colors_links',
        'label'      => esc_html__( 'Article Links Font Color', 'fotomag' ),
        'section'    => 'fotomag_section_colors',
        'priority'   => 10,
        'default'   => '#666',
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_colors_links_hover',
        'label'      => esc_html__( 'Article Links Hover Font Color', 'fotomag' ),
        'section'    => 'fotomag_section_colors',
        'priority'   => 10,
        'default'   => '#999',
    ) );


    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_colors_widget_links',
        'label'      => esc_html__( 'Widget Links Font Color', 'fotomag' ),
        'section'    => 'fotomag_section_colors',
        'priority'   => 10,
        'default'   => '#666',
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'      => 'color',
        'settings'   => 'fotomag_set_colors_widget_links_hover',
        'label'      => esc_html__( 'Widget Links Hover Font Color', 'fotomag' ),
        'section'    => 'fotomag_section_colors',
        'priority'   => 10,
        'default'   => '#999',
    ) );

    

    /*********************
    EXTRAS SECTION
    *********************/

    Kirki::add_section( 'fotomag_section_extras', array(
        'title'          => esc_html__( 'Extra Options', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_extras_lightbox',
        'label'       => esc_html__( 'Lightbox', 'fotomag' ),
        'section'     => 'fotomag_section_extras',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_extras_smooth',
        'help'        => esc_html__( 'Even if enabled, it will not load on Macs. As Macs already have native smooth scroll.', 'fotomag' ),
        'label'       => esc_html__( 'Smooth Scroll', 'fotomag' ),
        'section'     => 'fotomag_section_extras',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_extras_minify_js',
        'label'       => esc_html__( 'Minify JavaScript', 'fotomag' ),
        'section'     => 'fotomag_section_extras',
        'default'     => true,
        'priority'    => 10,
        
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_extras_youtube_api',
        'help'        => esc_html__( 'Enabling this allows for Video Posts to play YouTube video with big play button.', 'fotomag' ),
        'label'       => esc_html__( 'Load YouTube API', 'fotomag' ),
        'section'     => 'fotomag_section_extras',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotomag_set_extras_show_percentage_value',
        'help'        => esc_html__( 'If you have the progress bar enabled, this option is for showing the progress in a percentage number next to the bar.', 'fotomag' ),
        'label'       => esc_html__( 'Show percentage in progress bar.', 'fotomag' ),
        'section'     => 'fotomag_section_extras',
        'default'     => false,
        'priority'    => 10,
    ) );

    Kirki::add_field( '', array(
        'type'        => 'select',
        'settings'    => 'fotomag_set_extras_pagination',
        'label'       => esc_html__( 'Pagination Style', 'fotomag' ),
        'section'     => 'fotomag_section_extras',
        'default'     => true,
        'priority'    => 10,
        'choices'     => array(
            '1' => esc_html__( 'Number Pagination', 'fotomag' ),
            '2' => esc_html__( 'Infinite Scroll With Load More Button', 'fotomag' ),
        ),
    ) );

    


    /*********************
    CUSTOM CODE
    *********************/
    Kirki::add_section( 'fotomag_section_custom_code', array(
        'title'          => esc_html__( 'Custom Code Options', 'fotomag' ),
        'priority'       => 10,
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'code',
        'settings'    => 'fotomag_set_custom_code_css',
        'label'       => esc_html__( 'Custom CSS', 'fotomag' ),
        'section'     => 'fotomag_section_custom_code',
        'default'     => '',
        'priority'    => 0,
        'choices'     => array(
            'language' => 'css',
            'theme'    => 'ambiance',
            'height'   => 250,
        ),
    ) );

    Kirki::add_field( 'fotomag_config', array(
        'type'        => 'code',
        'settings'    => 'fotomag_set_custom_code_javascript',
        'label'       => esc_html__( 'Custom JavaScript', 'fotomag' ),
        'section'     => 'fotomag_section_custom_code',
        'default'     => '',
        'priority'    => 0,
        'choices'     => array(
            'language' => 'javascript',
            'theme'    => 'ambiance',
            'height'   => 250,
        ),
    ) );


}

?>