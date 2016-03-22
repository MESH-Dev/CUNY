<?php

/*********************
GLOBAL DEFINITIONS
*********************/
define( 'FOTOMAG_VER', '1.2.1' );

/*********************
CORE FILES
*********************/
require_once esc_url( get_template_directory() ) . '/library/core.php';
require_once esc_url( get_template_directory() ) . '/library/admin/mobile-detect-class.php';
require_once esc_url( get_template_directory() ) . '/library/admin/tgm.php'; 
require_once esc_url( get_template_directory() ) . '/library/admin/class-tgm-plugin-activation.php';
require_once esc_url( get_template_directory() ) . '/library/admin/customizer.php';
require_once esc_url( get_template_directory() ) . '/library/admin/github.php';

/*********************
LAUNCH FOTOMAG
*********************/
// Adding Functions & Theme Support
if ( ! function_exists( 'fotomag_theme_support' ) ) {  
    function fotomag_theme_support() {

        // Title Tag
        add_theme_support( 'title-tag' );
        // Wp thumbnails 
        add_theme_support('post-thumbnails');
        // Default thumb size
        set_post_thumbnail_size(75, 75, true);
        // RSS 
        add_theme_support('automatic-feed-links');
        add_theme_support( 'woocommerce' );
        // Adding post format support
        add_theme_support( 'post-formats',
            array(
                'video',             
                'audio',            
                'gallery',          
            )
        );
        // wp menus
        add_theme_support( 'menus' );
        // registering menus
        register_nav_menus(
            array(
                
                'fotomag_main' => esc_html__( 'Slide-In Navigation Menu', 'fotomag' ), 
                'fotomag_top' => esc_html__( 'Header 2 Navigation Menu', 'fotomag' ), 
                'fotomag_footer' => esc_html__( 'Footer Navigation Menu', 'fotomag' ), 
            )
        );

    }
}

/*********************
SCRIPTS & ENQUEUEING
*********************/
if ( ! function_exists( 'fotomag_startup' ) ) {   
    function fotomag_startup() {

        fotomag_theme_support();
        // let's get language support going, if you need it
        load_theme_textdomain( 'fotomag', get_template_directory() . '/library/translation' );
        // enqueue base scripts and styles
        add_action('wp_enqueue_scripts', 'fotomag_scripts_and_styles', 999);
        // editor styling
        add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

    }
}
add_action('after_setup_theme','fotomag_startup', 15);

/*********************
SET CONTENT WIDTH
*********************/
if ( ! function_exists( 'fotomag_content_width' ) ) {   
    function fotomag_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'fotomag_content_width', 750 );
    }
}
add_action( 'after_setup_theme', 'fotomag_content_width', 0 );

/*********************
THUMBNAIL SIZES
*********************/
add_image_size( 'fotomag-870-580', 870, 580, true ); // Blog Style Thumbnails
add_image_size( 'fotomag-75-75', 75, 75, true ); // Small Thumbnails
add_image_size( 'fotomag-150-150', 150, 150, true ); // Archive Thumbnails

/*********************
SCRIPTS AND STYLESHEETS
*********************/
if ( ! function_exists( 'fotomag_scripts_and_styles' ) ) {   
    function fotomag_scripts_and_styles() {  

        if ( ! is_admin() ) {

            global $wp_styles;
            $fotomag_post_id = NULL;
            $fotomag_is_ssl = is_ssl() ? 'https' : 'http';
            $fotomag_style = is_rtl() ? 'style-rtl' : 'style';
            if ( is_singular() ) {
                $fotomag_post_id = fotomag_get_post_id();
            }

            // Register main stylesheet
            wp_enqueue_style('fotomag-stylesheet', esc_url( get_template_directory_uri() ) . '/library/css/' . $fotomag_style . '.css', array(), FOTOMAG_VER, 'all' );
            // Stylesheet for Internet Explorer < 10
            wp_enqueue_style('fotomag-ie-stylesheet',  esc_url( get_template_directory_uri() ) . '/library/css/ie.css', array(), FOTOMAG_VER, 'all' ); 
            $wp_styles->add_data( 'fotomag-ie-stylesheet', 'conditional', 'lt IE 10' );
            // Modernizr (without media query polyfill)
            wp_enqueue_script('modernizr', esc_url( get_template_directory_uri() ) . '/library/js/modernizr.custom.min.js', array(), '2.6.2', false );
            // FontAwesome
            wp_enqueue_style('fontawesome',  esc_url( get_template_directory_uri() ) . '/library/css/font-awesome-4.5.0/css/font-awesome.min.css', array(), '4.5.0', 'all');
            // Google Fonts
            wp_enqueue_style( 'fotomag-fonts' , $fotomag_is_ssl  . '://fonts.googleapis.com/css?family=' . fotomag_get_fonts( 'fotomag_titles' ) . ':400,700|' . fotomag_get_fonts( 'fotomag_body' ) . ':400,700,400italic' . fotomag_get_fonts( 'fotomag_ext' ), array(), FOTOMAG_VER, 'all' );
            // comment reply script for threaded comments
            if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {  
                wp_enqueue_script( 'comment-reply' ); 
            }
            // Load Theme Javascript
            wp_enqueue_script( 'fotomag-js-ext',  esc_url( get_template_directory_uri() )  . '/library/js/fotomag-ext.js', array( 'jquery' ), FOTOMAG_VER, true );
            wp_localize_script( 'fotomag-js-ext', 'fotomagExt', array( 'fotomagSS' => esc_attr( get_theme_mod( 'fotomag_set_extras_smooth', true ) ), 'fotomagLb' => esc_attr( get_theme_mod( 'fotomag_set_extras_lightbox', true ) ) ) );
            if ( get_theme_mod( 'fotomag_set_extras_minify_js', true ) == true ) {
                wp_enqueue_script( 'fotomag-js',  esc_url( get_template_directory_uri() )  . '/library/js/fotomag-scripts.min.js', array( 'jquery', 'fotomag-js-ext' ), FOTOMAG_VER, true);
            } else {
                wp_enqueue_script( 'fotomag-js',  esc_url( get_template_directory_uri() )  . '/library/js/fotomag-scripts.source.js', array( 'jquery', 'fotomag-js-ext' ), FOTOMAG_VER, true);
            }
            wp_localize_script( 'fotomag-js', 'fotomagScripts', array( 'fotomagUrl' => esc_url( admin_url( 'admin-ajax.php' ) ), 'fotomagPostId' => intval( $fotomag_post_id ), 'fotomagALlNonce' => wp_create_nonce( 'fotomagALlNonce' )  ) );
            // Load Theme Javascript for Internet Explorer < 10
            wp_enqueue_script( 'fotomag-ie-js', esc_url( get_template_directory_uri() ). '/library/js/fotomag-ie-scripts.js' );
            wp_script_add_data( 'fotomag-ie-js', 'conditional', 'lt IE 10' );

        }
    }
}

/*********************
WIDGET AREAS
*********************/
if ( ! function_exists( 'fotomag_register_sidebars' ) ) {
    function fotomag_register_sidebars() {

        // Footer widget area
        register_sidebar(array(
            'name' => 'Footer Widget Area',
            'id' => 'cb-under-footer',
            'before_widget' => '<div id="%1$s" class="cb-widget clearfix %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="cb-widget-title">',
            'after_title' => '</h3>'
        ));

    }
}
add_action( 'widgets_init', 'fotomag_register_sidebars' );

?>