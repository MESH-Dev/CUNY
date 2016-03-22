<?php
/*********************
PRE WP 4.1 TITLE FALLBACK
*********************/
if ( ! function_exists( '_wp_render_title_tag' ) ) {
    function fotomag_pre_4_1_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php
    }
   
    add_action( 'wp_head', 'fotomag_pre_4_1_title' );
}

/*********************
FOOTER NAVIGATION MENU
*********************/
if ( ! function_exists( 'fotomag_footer_nav' ) ) {
    function fotomag_footer_nav(){   
        if  ( has_nav_menu( 'fotomag_footer' ) ) {
            wp_nav_menu(
                array(
                    'theme_location'  => 'fotomag_footer',
                    'container' => FALSE,
                    'menu_class' => 'menu',
                    'items_wrap' => '<ul class="cb-footer-nav">%3$s</ul>',
                )
            );
        }
    }
}

/*********************
SLIDE IN NAVIGATION MENU
*********************/
if ( ! function_exists( 'fotomag_slide_in_nav' ) ) {
    function fotomag_slide_in_nav(){   
        if  ( has_nav_menu( 'fotomag_main' ) ) {
            wp_nav_menu(
                array(
                    'theme_location'  => 'fotomag_main',
                    'container'  => FALSE,
                    'menu_class' => 'menu',
                    'items_wrap' => '<ul id="cb-slide-in-nav" class="cb-slide-in-nav cb-style-text-1">%3$s</ul>',
                )
            );
        }
    }
}


/*********************
TOP NAVIGATION MENU
*********************/
if ( ! function_exists( 'fotomag_top_menu' ) ) {
    function fotomag_top_menu(){   
        if  ( has_nav_menu( 'fotomag_top' ) ) {
            wp_nav_menu(
                array(
                    'theme_location'  => 'fotomag_top',
                    'container'  => FALSE,
                    'menu_class' => 'menu',
                    'items_wrap' => '<ul id="cb-top-nav-menu" class="cb-top-nav-menu cb-style-text-1">%3$s</ul>',
                )
            );
        }
    }
}

/*********************
FEATURED IMAGE THUMBNAILS
*********************/
if ( ! function_exists( 'fotomag_thumbnail' ) ) {
    function fotomag_thumbnail( $width, $height, $fotomag_post_id = NULL, $fotomag_link = true ) {
        echo fotomag_get_thumbnail( $width, $height, $fotomag_post_id, $fotomag_link );
    }
}


/*********************
GET FEATURED IMAGE THUMBNAILS
*********************/
if ( ! function_exists( 'fotomag_get_thumbnail' ) ) {
    function fotomag_get_thumbnail( $width, $height, $fotomag_post_id = NULL, $fotomag_link = true ) {

        $fotomag_output = NULL;

        if  ( ( has_post_thumbnail( $fotomag_post_id ) ) && ( get_the_post_thumbnail( $fotomag_post_id ) != NULL ) ) {
            if ( $fotomag_link == true ) {
                $fotomag_output = '<a href="' . get_permalink( $fotomag_post_id ) . '">';
            }
            
            $fotomag_output .= get_the_post_thumbnail( $fotomag_post_id, 'fotomag-' . $width . '-' . $height ); 

            if ( $fotomag_link == true ) {
                $fotomag_output .= '</a>';
            }          

        } else {

            if ( $fotomag_link == true ) {
                $fotomag_output = '<a href="' . get_permalink( $fotomag_post_id ) . '">';
            }
            $fotomag_custom_placeholder = get_theme_mod( 'fotomag_set_placeholder_img', NULL );

            if ( $fotomag_custom_placeholder == NULL ) {
                $fotomag_thumbnail =  get_stylesheet_directory_uri() . '/library/img/placeholder-' . $width . 'x' . $height . '.png';
                $fotomag_output .= '<img src="' . esc_url( $fotomag_thumbnail ) . '" alt="article placeholder" class="cb-placeholder-img">';
            } else {
                $fotomag_custom_placeholder = attachment_url_to_postid($fotomag_custom_placeholder);
                $fotomag_thumbnail = wp_get_attachment_image_src( $fotomag_custom_placeholder, array( $width, $height ) );
                $fotomag_output .= '<img src="' . esc_url( $fotomag_thumbnail[0] ) . '" alt="article placeholder" class="cb-placeholder-img">';
            }
            if ( $fotomag_link == true ) {
                $fotomag_output .= '</a>';
            }
        }
        
        
        return $fotomag_output;
    }
}

/*********************
FEATURED IMAGE THUMBNAILS
*********************/
if ( ! function_exists( 'fotomag_cover_thumbnail' ) ) {
    function fotomag_cover_thumbnail( $width, $height, $fotomag_post_id = NULL ) {
        echo fotomag_get_cover_thumbnail( $width, $height, $fotomag_post_id );
    }
}


/*********************
GET FEATURED IMAGE THUMBNAILS
*********************/
if ( ! function_exists( 'fotomag_get_cover_thumbnail' ) ) {
    function fotomag_get_cover_thumbnail( $width, $height, $fotomag_post_id = NULL ) {

        $fotomag_output = NULL;

        if  ( ( has_post_thumbnail( $fotomag_post_id ) ) && ( get_the_post_thumbnail( $fotomag_post_id ) != NULL ) ) {

            if ( $width == 'full' ) {
                $fotomag_dimensions = 'full';
            } else {
                $fotomag_dimensions = array( $width, $height );
            }

            $fotomag_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $fotomag_post_id ), $fotomag_dimensions  ); 
            $fotomag_ext = substr($fotomag_thumbnail[0], -3);

            if ( $fotomag_ext == 'gif' ) {
                $fotomag_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $fotomag_post_id ), 'full'  ); 
            }

            $fotomag_output .= '<div class="cb-placeholder-img cb-fi" style="background-image: url(' . esc_url( $fotomag_thumbnail[0] ) . ')" data-adaptive-background data-ab-css-background></div>';

        } else {

            $fotomag_custom_placeholder = get_theme_mod( 'fotomag_set_placeholder_img', NULL );

            if ( $width == 'full' ) {
                $width = '1400';
                $height = '640';
            }

            if ( $fotomag_custom_placeholder == NULL ) {
                $fotomag_thumbnail =  get_stylesheet_directory_uri() . '/library/img/placeholder-' . $width . 'x' . $height . '.png';
                $fotomag_output .= '<div class="cb-placeholder-img cb-fi" style="background-image: url(' . esc_url( $fotomag_thumbnail ) . ')"></div>';
            } else {
                $fotomag_custom_placeholder = attachment_url_to_postid($fotomag_custom_placeholder);
                $fotomag_thumbnail = wp_get_attachment_image_src( $fotomag_custom_placeholder, array( $width, $height ) );
                $fotomag_output .= '<div class="cb-placeholder-img cb-fi" style="background-image: url(' . esc_url( $fotomag_thumbnail[0] ) . ')"></div>';
            }

        }
        
        return $fotomag_output;
    }
}


/*********************
FEATURED IMAGE THUMBNAILS URL
*********************/
if ( ! function_exists( 'fotomag_thumbnail_url' ) ) {
    function fotomag_thumbnail_url( $width, $height, $fotomag_post_id = NULL ) {
        echo fotomag_get_thumbnail_url( $width, $height, $fotomag_post_id );
    }
}

/*********************
GET FEATURED IMAGE THUMBNAILS URL
*********************/
if ( ! function_exists( 'fotomag_get_thumbnail_url' ) ) {
    function fotomag_get_thumbnail_url( $width, $height, $fotomag_post_id = NULL ) {

        $fotomag_output = NULL;

        if  ( has_post_thumbnail( $fotomag_post_id ) ) {
            if ( $width == 'full' ) {
                $fotomag_dimensions = 'full';
            } else {
                $fotomag_dimensions = 'fotomag-' . $width . '-' . $height;
            }

            $fotomag_output = wp_get_attachment_image_src( get_post_thumbnail_id( $fotomag_post_id ), $fotomag_dimensions );

        }
        
        return $fotomag_output ;
    }
}

/*********************
FOOTER SOCIAL ICONS
*********************/
if ( ! function_exists( 'fotomag_footer_social_icons' ) ) {
    function fotomag_footer_social_icons(){
        ?>
        <div class="cb-footer-social-icons cb-footer-last-block">

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_twitter', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.twitter.com/' . get_theme_mod( 'fotomag_set_social_footer_twitter', '' ) ); ?>"><i class="fa fa-twitter"></i></a>
            <?php } ?>

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_facebook', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.facebook.com/' . get_theme_mod( 'fotomag_set_social_footer_facebook', '' ) ); ?>"><i class="fa fa-facebook"></i></a>
            <?php } ?>

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_pinterest', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.pinterest.com/' . get_theme_mod( 'fotomag_set_social_footer_pinterest', '' ) ); ?>"><i class="fa fa-pinterest"></i></a>
            <?php } ?>

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_instagram', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.instagram.com/' . get_theme_mod( 'fotomag_set_social_footer_instagram', '' ) ); ?>"><i class="fa fa-instagram"></i></a>
            <?php } ?>

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_dribbble', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.dribbble.com/' . get_theme_mod( 'fotomag_set_social_footer_dribbble', '' ) ); ?>"><i class="fa fa-dribbble"></i></a>
            <?php } ?>

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_youtube', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.youtube.com/' . get_theme_mod( 'fotomag_set_social_footer_youtube', '' ) ); ?>"><i class="fa fa-youtube-play"></i></a>
            <?php } ?>

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_vimeo', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.vimeo.com/' . get_theme_mod( 'fotomag_set_social_footer_vimeo', '' ) ); ?>"><i class="fa fa-vimeo"></i></a>
            <?php } ?>

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_soundcloud', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.soundcloud.com/' . get_theme_mod( 'fotomag_set_social_footer_soundcloud', '' ) ); ?>"><i class="fa fa-soundcloud"></i></a>
            <?php } ?>

            <?php if ( get_theme_mod( 'fotomag_set_social_footer_vk', '' ) != NULL ) { ?>
                <a href="<?php echo esc_url( '//www.vk.com/' . get_theme_mod( 'fotomag_set_social_footer_vk', '' ) ); ?>"><i class="fa fa-vk"></i></a>
            <?php } ?>

        </div>

        <?php        
    }
}

/*********************
SUBTITLES MARKUP
*********************/
if ( class_exists( 'Subtitles' ) &&  method_exists( 'Subtitles', 'subtitle_styling' ) ) {
    remove_action( 'wp_head', array( Subtitles::getInstance(), 'subtitle_styling' ) );
}

function subtitle_markup_mods( $markup ) {
    $markup[ 'before' ] = '<span class="cb-secondary-title cb-font-body">';
    $markup[ 'after' ] = '</span>';

    return $markup;
}
add_filter( 'subtitle_markup', 'subtitle_markup_mods' );


/*********************
SEARCH OVERLAY
*********************/
if ( ! function_exists( 'fotomag_search_overlay' ) ) {
    function fotomag_search_overlay() {
?>
        <div id="cb-search-overlay" class="clearfix cb-pre-load wrap cb-light-loader">
            <i class="fa fa-circle-o-notch cb-spin-loader fa-2x"></i>
                <?php get_search_form(); ?>
                <div id="cb-s-results"></div>
        </div>
<?php
    }
}

/*********************
SEARCH
*********************/
if ( ! function_exists( 'fotomag_s_a' ) ) {
    function fotomag_s_a() {

        $fotomag_s = ( isset( $_GET['fotomagI'] ) ) ? sanitize_text_field( $_GET['fotomagI'] ) : NULL;
        $fotomag_args = array( 's' => $fotomag_s,  'ignore_sticky_posts' => 1, 'post_status' => 'publish', 'post_type' => array( 'post', 'page') );
        $fotomag_qry_latest = new WP_Query( $fotomag_args );
        $i = 1;
        $fotomag_whitelist = fotomag_whitelist();

        $fotomag_mobile = new Mobile_Detect;

        if ( $fotomag_qry_latest->have_posts() ) {
            $fotomag_s_qry = 5; ?>

            <div class="cb-results-title cb-ta-center">
                <?php echo sprintf( _n( 'Found %d result for:', 'Found %d results for:', $fotomag_qry_latest->found_posts, 'fotomag' ), $fotomag_qry_latest->found_posts ); ?>
                <span class="cb-s-qry"><?php echo sanitize_text_field( $fotomag_s ); ?></span>
            </div>
            <ul id="cb-s-results-block" class="cb-s-a cb-style-text-1 clearfix">
                <?php while ( $fotomag_qry_latest->have_posts() ) { ?>

                    <?php $fotomag_qry_latest->the_post(); ?>
                    <?php $fotomag_post_id = get_the_ID(); ?>
                    
                    <li class="<?php echo esc_attr( implode( " ", get_post_class( "cb-article-" . $i . " clearfix" ) ) ); ?>">

                        <div class="cb-loop-meta"><?php fotomag_thumbnail( 75, 75, $fotomag_post_id ); ?>
                            <h3 class="cb-post-title clearfix">
                                <a href="<?php echo esc_url( get_permalink( $fotomag_post_id ) ); ?>"><?php echo wp_kses( get_the_title( $fotomag_post_id ), $fotomag_whitelist ); ?></a>
                            </h3>
                        </div>
                    </li>

                    <?php $i++; ?>
                    <?php if ( $i == 4 ) { break; } ?>

                <?php } ?>

            </ul>
            <div class="cb-info cb-ta-center">
                <a href="<?php echo esc_url( get_search_link( $fotomag_s ) ); ?>" id="cb-s-all-results" class="cb-button cb-button-yellow">
                    <?php esc_html_e('See all results', 'fotomag' ); ?>
                </a>
            </div>

        <?php } else { ?>
            <div class="cb-info cb-ta-center"><?php esc_html_e( 'No results found', 'fotomag' ); ?></div>
        <?php }

        wp_reset_postdata();

        die();
    }
}

add_action( 'wp_ajax_fotomag_s_a', 'fotomag_s_a' );
add_action( 'wp_ajax_nopriv_fotomag_s_a', 'fotomag_s_a' );


/*********************
LOAD CUSTOM CODE
*********************/
if ( ! function_exists( 'fotomag_custom_code' ) ) {
    function fotomag_custom_code() {

        $fotomag_custom_css = NULL;
        
        if ( get_theme_mod('fotomag_set_right_nav_bg', '' ) != NULL ) {
            $fotomag_custom_css .= '.cb-menu-overlay .cb-background { background-image: url(' . esc_url( get_theme_mod('fotomag_set_right_nav_bg', '' ) ) . '); }';
            $fotomag_custom_css .= '.cb-menu-overlay .cb-background { opacity: ' . floatval( get_theme_mod('fotomag_set_right_nav_bg_opacity', '85' ) / 100 ) . '; }';
        }
        
        if ( get_theme_mod('fotomag_set_left_nav_bg', '' ) != NULL ) {
            $fotomag_custom_css .= '.cb-sub-modal .cb-background { background-image: url(' . esc_url( get_theme_mod('fotomag_set_left_nav_bg', '' ) ) . '); }';
            $fotomag_custom_css .= '.cb-sub-modal .cb-background { opacity: ' . floatval( get_theme_mod('fotomag_set_left_nav_bg_opacity', '85' ) / 100 )  . '; }';
        }

        if ( get_theme_mod( 'fotomag_set_header_transparency', false ) == true ) {
            $fotomag_custom_css .= '.cb-nav-top { background: transparent; }';
        }

        if ( is_single() && ( get_theme_mod( 'fotomag_set_header_logo_light', NULL ) != NULL ) ) { 
            $fotomag_custom_css .= '.cb-top-nav-menu > li > a { color: #fff; }'; 
            $fotomag_custom_css .= '.cb-top-nav-menu li .sub-menu { padding-top: 0; }'; 

        }
        
        $fotomag_custom_css .= '.cb-menu-overlay { background-color: ' . esc_attr( get_theme_mod('fotomag_set_right_nav_bg_color', '#fff' ) ) . '; }';
        $fotomag_custom_css .= '.cb-top-nav-menu { padding-top: ' . intval( get_theme_mod('fotomag_set_header_layout_menu_pad', '5' ) ) . 'px; }';
        $fotomag_custom_css .= '.cb-sub-modal { background-color: ' . esc_attr( get_theme_mod('fotomag_set_left_nav_bg_color', '#fff' ) ) . '; }';
        $fotomag_custom_css .= '.cb-sub-modal, .cb-sub-modal .cb-modal-closer { color: ' . esc_attr( get_theme_mod('fotomag_set_left_nav_sub_font_color', '#000' ) ) . '; }';
        $fotomag_custom_css .= '.cb-menu-overlay, .cb-menu-overlay a { color: ' . esc_attr( get_theme_mod('fotomag_set_right_nav_font_color', '#111' ) ) . '; }';
        $fotomag_custom_css .= '.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5 { color: ' . esc_attr( get_theme_mod('fotomag_set_colors_headings', '#222' ) ) . '; }';
        $fotomag_custom_css .= '.entry-content blockquote { color: ' . esc_attr( get_theme_mod('fotomag_set_colors_blockquote', '#222' ) ) . '; }';
        $fotomag_custom_css .= '.entry-content a { color: ' . esc_attr( get_theme_mod('fotomag_set_colors_links', '#666' ) ) . '; }';
        $fotomag_custom_css .= '.entry-content a:hover { color: ' . esc_attr( get_theme_mod('fotomag_set_colors_links_hover', '#999' ) ) . '; }';
        $fotomag_custom_css .= '.cb-under-footer a, .cb-column a { color: ' . esc_attr( get_theme_mod('fotomag_set_colors_widget_links', '#666' ) ) . '; }';
        $fotomag_custom_css .= '.cb-under-footer a:hover, .cb-column a:hover { color: ' . esc_attr( get_theme_mod('fotomag_set_colors_widget_links_hover', '#999' ) ) . '; }';
        $fotomag_custom_css .= '.entry-content {  color: ' . esc_attr( get_theme_mod('fotomag_set_colors_body', '#222' ) ) . '; font-size: ' . intval( get_theme_mod('fotomag_section_typography_mobile', '15' ) ) . 'px; line-height: ' . floatval( floor ( get_theme_mod('fotomag_section_typography_mobile', '15' ) * get_theme_mod('fotomag_section_typography_mobile_lh', '1.9' ) ) ) . 'px; }';
        $fotomag_custom_css .= 'h1, h2, h3, h4 ,h5, .cb-font-title, .comment-form .submit, body { font-family: \'' . esc_attr( get_theme_mod('fotomag_set_typography_headings', 'Montserrat' ) ) . '\'; }';
        $fotomag_custom_css .= '.cb-font-body, .entry-content, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .cb-font-content, .comment-form input, .comment-form textarea, .cb-search-field, .comment-notes { font-family: \'' . esc_attr( get_theme_mod('fotomag_set_typography_body', 'Merriweather' ) ) . '\'; }';
        $fotomag_custom_css .= '*::-webkit-input-placeholder { font-family: \'' . esc_attr( get_theme_mod('fotomag_set_typography_body', 'Merriweather' ) ) . '\'; }';
        $fotomag_custom_css .= '*:-moz-placeholder { font-family: \'' . esc_attr( get_theme_mod('fotomag_set_typography_body', 'Merriweather' ) ) . '\'; }';
        $fotomag_custom_css .= '*::-moz-placeholder { font-family: \'' . esc_attr( get_theme_mod('fotomag_set_typography_body', 'Merriweather' ) ) . '\'; }';
        $fotomag_custom_css .= '*:-ms-input-placeholder { font-family: \'' . esc_attr( get_theme_mod('fotomag_set_typography_body', 'Merriweather' ) ) . '\'; }';
        $fotomag_custom_css .= '@media only screen and (min-width: 1020px) { .entry-content { font-size: ' . intval( get_theme_mod('fotomag_section_typography_desktop', '18' ) ) . 'px; line-height: ' . floatval( floor( get_theme_mod('fotomag_section_typography_desktop_lh', '1.9' ) * get_theme_mod('fotomag_section_typography_desktop', '18' ) ) ) . 'px; } }';
        $fotomag_custom_css .= '@media only screen and (min-width: 1200px) { .cb-nav-top { padding-top: ' . intval( get_theme_mod('fotomag_set_header_padding_top', '25' ) ). 'px; padding-bottom: ' . intval( get_theme_mod('fotomag_set_header_padding_bot', '25' ) ) . 'px } }';
        $fotomag_custom_css .= get_theme_mod('fotomag_set_custom_code_css', '' );


        if ( $fotomag_custom_css != NULL ) { echo '<style type="text/css">' . $fotomag_custom_css . '</style><!-- end custom css -->'; }

    }
}

add_action('wp_head', 'fotomag_custom_code');

/*********************
LOAD CUSTOM FOOTER CODE
*********************/
if ( ! function_exists( 'fotomag_custom_footer_code' ) ) {
    function fotomag_custom_footer_code() {

        if ( get_theme_mod('fotomag_set_custom_code_javascript', '' ) != NULL ) {
            echo "<script type='text/javascript'>" . get_theme_mod('fotomag_set_custom_code_javascript', '' ) . "</script>";
        }

    }
}
add_action('wp_footer', 'fotomag_custom_footer_code');



/*********************
WHITELIST WP_KSES
*********************/
if ( ! function_exists( 'fotomag_whitelist' ) ) {
    function fotomag_whitelist() {
        return array( 
            'i'      => array(),
            'span'      => array(
                'class'      => array(),
            ),

        );
    }
}

/*********************
PREVIOUS + NEXT POSTS
*********************/
if ( ! function_exists( 'fotomag_previous_next_posts' ) ) {
    function fotomag_previous_next_posts() {
        global $post;

        $fotomag_next_post = get_next_post();
        $fotomag_previous_post = get_previous_post();
        $fotomag_whitelist = fotomag_whitelist();

        if ( ( ( $fotomag_previous_post != NULL ) || ( $fotomag_next_post != NULL ) ) && ( $post->post_type != 'attachment' ) ) { ?>

            <div id="cb-next-previous-posts" class="cb-next-previous cb-post-block-bg cb-underline-h cb-post-footer-block cb-font-content cb-border wrap clearfix<?php if ( ( $fotomag_next_post == NULL )  || ( $fotomag_previous_post == NULL ) ) { echo ' cb-one-missing'; } ?>">

                <?php if ( $fotomag_previous_post != NULL ) { ?>
                    <?php $fotomag_post_id = $fotomag_previous_post->ID; ?>
                    <div class="cb-previous-post cb-meta cb-next-previous-block clearfix">

                        <?php fotomag_thumbnail( 75, 75, $fotomag_post_id ); ?>
                        <div class="cb-meta"><a href="<?php echo esc_url( get_permalink( $fotomag_post_id ) ); ?>" class="cb-read-previous-title cb-read-title"><?php esc_html_e( 'Previous', 'fotomag' ); ?></a>
                        <a href="<?php echo esc_url( get_permalink( $fotomag_post_id ) ); ?>" class="cb-previous-title cb-title"><?php echo wp_kses( get_the_title( $fotomag_post_id ), $fotomag_whitelist ); ?></a></div>
                            
                    </div>
                <?php } ?>

                <?php if ( $fotomag_next_post != NULL ) { ?>
                    <?php $fotomag_post_id = $fotomag_next_post->ID; ?>
                    <div class="cb-next-post cb-meta cb-next-previous-block clearfix">
                        <?php fotomag_thumbnail( 75, 75, $fotomag_next_post->ID ); ?>
                        <div class="cb-meta"><a href="<?php echo esc_url( get_permalink( $fotomag_post_id ) ); ?>" class="cb-read-next-title cb-read-title"><?php esc_html_e( 'Next', 'fotomag' ); ?></a>
                        <a href="<?php echo esc_url( get_permalink( $fotomag_post_id ) ); ?>" class="cb-next-title cb-title"><?php echo wp_kses( get_the_title( $fotomag_post_id ), $fotomag_whitelist ); ?></a></div>
                    </div>

                <?php } ?>

            </div>

        <?php }

    }
}

/*********************
SHARING BLOCK
*********************/
if ( ! function_exists( 'fotomag_sharing_block' ) ) {
    function fotomag_sharing_block() {
        global $post;

        $fotomag_post_url = get_permalink( $post->ID );
        $fotomag_featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        $fotomag_encoded_img = urlencode( $fotomag_featured_image_url[0] );
        $fotomag_encoded_url = urlencode( get_permalink($post->ID) );
        ?>

            <div class="cb-social-sharing clearfix">
                <div class="cb-title cb-font-body"><?php esc_html_e( 'Share:', 'fotomag' ); ?></div>
                <div class="cb-sharing-buttons">
                    <a href="https://twitter.com/share?url=<?php echo esc_url( $fotomag_post_url ); ?>" class="cb-tip-bot" target="_blank" data-title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( $fotomag_post_url ); ?>" class="cb-tip-bot" target="_blank" data-title="Facebook""><i class="fa fa-facebook"></i></a>
                    <a href="//www.pinterest.com/pin/create/button/?url=<?php echo esc_url( $fotomag_encoded_url ); ?>&media=<?php echo esc_url( $fotomag_encoded_img );?>" class="cb-tip-bot" target="_blank" data-title="Pinterest""><i class="fa fa-pinterest"></i></a>
                    <a href="https://plus.google.com/share?url=<?php echo esc_url( $fotomag_post_url ); ?>" class="cb-tip-bot" target="_blank" data-title="Google+""><i class="fa fa-google-plus"></i></a>
                    <a href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( $fotomag_post_url ); ?>" class="cb-tip-bot" target="_blank" data-title="StumbleUpon""><i class="fa fa-stumbleupon"></i></a>
                </div>
            </div>

        <?php
    }
}

/*********************
RELATED POSTS
*********************/
if ( ! function_exists( 'fotomag_related_posts' ) ) {
    function fotomag_related_posts() {

        if ( get_theme_mod( 'fotomag_set_post_autoload', false ) == true ) {
            return;
        }

        global $post;
        $fotomag_post_id = $post->ID;
        $fotomag_all_cats = $fotomag_meta = NULL;
        $fotomag_post_sz = 'inc/cb-posts-half';
 
        $fotomag_categories = get_the_category();
        foreach ( $fotomag_categories as $fotomag_category ) { $fotomag_all_cats .= $fotomag_category->term_id  . ','; }
        $fotomag_related_args = array( 'numberposts' => 2, 'category' => $fotomag_all_cats, 'exclude' => $fotomag_post_id, 'post_status' => 'publish', 'orderby' => 'rand' );
        $fotomag_related_posts = get_posts( $fotomag_related_args );

        if ( $fotomag_related_posts != NULL ) {
            if ( count( $fotomag_related_posts ) == 1 ) {
                $fotomag_meta = ' cb-single-rp';
                $fotomag_post_sz = 'inc/cb-posts-full';
            }
?>
            <div id="cb-related-posts-block" class="cb-post-footer-block cb-related-posts cb-border cb-arrows-tr cb-module-block clearfix<?php echo esc_attr( $fotomag_meta ); ?>">
                <h3 class="cb-block-title cb-title-header"><?php echo esc_html__('More Stories', 'fotomag'); ?></h3>
                <?php foreach ( $fotomag_related_posts as $post ) { ?>
                    <?php setup_postdata( $post ); ?>
                    <?php get_template_part( $fotomag_post_sz ); ?>
                <?php } ?>
            </div>
<?php
            wp_reset_postdata();
        }
    }
}

/*********************
COMMENTS
*********************/
if ( ! function_exists( 'fotomag_comments' ) ) {
    function fotomag_comments($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>

        <li <?php comment_class( 'cb-border' ); ?> >

            <article id="comment-<?php comment_ID(); ?>" class="clearfix">

                <div class="cb-comment-body clearfix">

                    <header class="comment-author vcard">
                        <div class="cb-gravatar-image">
                            <?php echo get_avatar( $comment, 75 ); ?>
                        </div>
                        <time datetime="<?php comment_date(); ?>"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_date(); ?> </a></time>
                        <?php echo "<cite class='fn'>" . get_comment_author_link() . "</cite>"; ?>
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </header>
                    <?php edit_comment_link(esc_html__('(Edit)', 'fotomag'),'  ','') ?>
                    <?php if ( $comment->comment_approved == '0' ) { ?>
                        <div class="alert info">
                            <p><?php esc_html_e('Your comment is awaiting moderation.', 'fotomag') ?></p>
                        </div>
                    <?php } ?>
                    <section class="comment_content clearfix">
                        <?php comment_text(); ?>
                    </section>
                </div>

            </article>
<?php
    }
}


/*********************
WRITTEN BY BLOCK
*********************/
if ( ! function_exists( 'fotomag_written_by' ) ) {
    function fotomag_written_by() {
        global $post;
        $fotomag_author_id = $post->post_author; 
?>
        <div id="cb-author-box" class="cb-post-footer-block cb-post-block-bg cb-author-box cb-font-content clearfix">
            <div class="cb-mask">
                <a href="<?php echo esc_url( get_author_posts_url( $fotomag_author_id ) ); ?>"><?php echo get_avatar( $fotomag_author_id, '150' ); ?></a>
            </div>
            <div class="cb-meta">
                <div class="cb-title vcard" itemprop="author">
                    <?php esc_html_e('By', 'fotomag'); ?>
                    <a href="<?php echo esc_url( get_author_posts_url( $fotomag_author_id ) ); ?>">
                        <span class="fn">
                            <?php echo esc_attr( get_the_author_meta('display_name', $fotomag_author_id ) ); ?>
                        </span>
                    </a>
                </div>
                <?php if ( get_theme_mod( 'fotomag_set_post_date', true ) == true ) { ?> 
                    <div class="cb-date">
                        <?php echo esc_html( date_i18n(  get_option('date_format'), strtotime(get_the_time("Y-m-d", $post->ID ) ) ) ); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
<?php
    }
}




/*********************
ARCHIVES THUMBNAILS
*********************/
if ( ! function_exists( 'fotomag_arc_thumbnail' ) ) {
    function fotomag_arc_thumbnail( $fotomag_extra_args = NULL ) {

        if ( is_category() ) {
            $fotomag_extra_args = array( 'cat' => get_query_var('cat') );
        } elseif ( is_tag() ) {
            $fotomag_extra_args = array( 'tag_id' => get_query_var('tag_id') );
        } elseif ( is_year() ) {
            $fotomag_extra_args = array( 'year' => get_the_date('Y') );
        } elseif ( is_month() ) {
            $fotomag_extra_args = array( 'monthnum' => get_the_date('n') );
        } elseif ( is_day() ) {
            $fotomag_extra_args = array( 'day' => get_the_date('j') );
        } elseif ( is_tax( 'post_format' ) ) {
            $fotomag_extra_args = array( 'tax_query' => array( array('taxonomy' => 'post_format', 'field' => 'slug', 'terms' => array( 'post-format-' . get_post_format() ) ) ) );
        } elseif ( is_post_type_archive() ) {
            $fotomag_extra_args = array( 'post_type' => get_post_type() );
        } elseif ( is_tax() ) {
            $fotomag_extra_args = NULL;
        } else {
            $fotomag_extra_args = NULL;
        }

        $fotomag_args = array_merge( array( 'posts_per_page' => 3, 'orderby' => 'rand' ), $fotomag_extra_args );
        $fotomag_random_post = get_posts( $fotomag_args );

        if ( ! empty( $fotomag_random_post ) ) {

            foreach ( $fotomag_random_post as $fotomag_post ) {

                setup_postdata( $fotomag_post );
                $fotomag_post_id = $fotomag_post->ID;

                if ( has_post_thumbnail( $fotomag_post_id ) ) {
                    echo '<div class="cb-mask">' . get_the_post_thumbnail( $fotomag_post_id, array(150,150) ) . '</div>';
                    break;
                }

            }
        }

        wp_reset_postdata(); 

    }
}

/*********************
PAGINATION
*********************/
if ( ! function_exists( 'fotomag_pagination' ) ) {
    function fotomag_pagination( $fotomag_qry = NULL ) {

        $fotomag_no_more_articles = esc_html__( 'No more articles', 'fotomag' );
        $fotomag_load_more_text = esc_html__( 'Load More', 'fotomag' );
        $fotomag_pagination_type = intval( get_theme_mod('fotomag_set_extras_pagination' , '1' ) );

        global $wp_query;
        $fotomag_total = $GLOBALS['wp_query']->max_num_pages;
        $fotomag_paged = get_query_var('paged');

        if ( $fotomag_paged == false ) {
            $fotomag_paged = 1;
        }

        if ( $fotomag_pagination_type == '2' ) {

            if ( get_next_posts_link() != NULL ) {
                echo '<nav id="cb-blog-infinite-load" class="cb-pagination-button cb-col-4 cb-infinite-scroll cb-infinite-load" data-cb-paged="' . $fotomag_paged . '" data-cb-max="' . $fotomag_total . '">' . get_next_posts_link( $fotomag_load_more_text ) . '</nav>';
            } else {
                echo '<div id="cb-blog-infinite-load" class="cb-no-more-posts cb-pagination-button cb-col-4 cb-infinite-load"><span>' . $fotomag_no_more_articles . '</span></div>';
            }

        } else {

            $fotomag_pagination = paginate_links( array(
                'base'     => str_replace( 99999, '%#%', esc_url( get_pagenum_link(99999) ) ),
                'format'   => '',
                'total'    => $fotomag_total,
                'current'  => max( 1, $fotomag_paged ),
                'mid_size' => 2,
                'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                'next_text' => '<i class="fa fa-long-arrow-right"></i>',
                'type' => 'list',
            ) );

            echo '<nav class="cb-pagination clearfix">' . $fotomag_pagination . '</nav>';
        }
    }
}

/*********************
GET BODY CLASSES
*********************/
if ( ! function_exists( 'fotomag_get_body_classes' ) ) {
    function fotomag_get_body_classes( $classes ) {
        
        if ( get_theme_mod( 'fotomag_set_images_fw_embed', '' ) == NULL ) {
            $classes[] = 'cb-fw-embeds';
        }

        if ( get_theme_mod( 'fotomag_set_header_layout', '1' ) == '2' ) {
            $classes[] = 'cb-header-2';
        } else {
            $classes[] = 'cb-header-1';
        }


        if ( ! has_nav_menu( 'fotomag_main' ) ) {
            $classes[] = 'cb-mob-no-right';
        }

        if ( ( get_theme_mod( 'fotomag_set_left_nav_subscribe', false ) == false ) && ( get_theme_mod( 'fotomag_set_left_nav_search', true ) == false ) && ( get_theme_mod( 'fotomag_set_left_nav_social', false ) == false ) ) {
            $classes[] = 'cb-mob-no-left';
        }

        if ( is_singular() ) {
            global $post;

            if ( has_post_thumbnail( $post->ID ) ) {
                $classes[] = 'cb-fis-exists'; 
            } elseif ( ( get_post_format() == 'gallery' ) && ( get_post_meta($post->ID, '_format_gallery_images', true) != NULL ) ) {
                $classes[] = 'cb-fis-exists'; 
                $classes[] = 'cb-has-gallery'; 
            } else {
                $classes[] = 'cb-no-fis'; 
            }
            
        }

        $classes[] = 'cb-body-bs-' . fotomag_post_layout_bs();
        $fotomag_mobile = new Mobile_Detect;
        $fotomag_phone = $fotomag_mobile->isMobile();
        $fotomag_tablet = $fotomag_mobile->isTablet();

        if ( $fotomag_tablet == true ) {
            $classes[] = 'cb-body-tabl';
        } 
        if ( $fotomag_phone == true ) {
            $classes[] = 'cb-body-mob';
        } 

        return $classes;
    }
}

add_filter( 'body_class', 'fotomag_get_body_classes' );

/*********************
LIKES
*********************/
if ( ! function_exists( 'fotomag_likes' ) ) {
    function fotomag_likes( ) {
        
        if ( ( ! is_single() ) || ( get_theme_mod( 'fotomag_set_post_likes', true ) != true ) ) {
            return;
        }

        global $post;

        $fotomag_lkd_class = ' cb-lkd-0';

        $fotomag_lks = get_post_meta( $post->ID, 'fotomag_lks', true );
        
        if ( $fotomag_lks == NULL ) { 
            $fotomag_lks = 0; 
        }

        if ( isset( $_COOKIE['article_liked'] ) ) {
            $fotomag_lkd_class = ' cb-lkd';
        }

        ?>
            <span id="cb-likes" class="cb-like-count cb-font-title<?php echo esc_attr( $fotomag_lkd_class ); ?>" data-cb-nonce="<?php echo esc_attr( wp_create_nonce( 'fotomagAlNonce' ) ); ?>">
                <span class="cb-like-icon"><i class="fa fa-heart-o cb-icon-empty"></i><i class="fa fa-heart cb-icon-full"></i></span> <span id="cb-likes-int"><?php echo intval( $fotomag_lks ); ?></span>
            </span>

        <?php
           

    }
}


/*********************
LIKES CALL
*********************/
if ( ! function_exists( 'fotomag_a_l' ) ) {
    function fotomag_a_l() {        

        if ( ! wp_verify_nonce( esc_attr( $_POST['fotomagAlNonce'] ), 'fotomagAlNonce' ) ) {
            die();
        }

        $fotomag_post_id = absint($_POST['fotomagPostId']);
        $fotomag_lks = get_post_meta( $fotomag_post_id, 'fotomag_lks', true );
        
        if ( $fotomag_lks == NULL ) { 
            $fotomag_lks = 0;
        }
        
        update_post_meta( $fotomag_post_id, 'fotomag_lks', intval( $fotomag_lks + 1 ) );

        $fotomag_output = json_encode( intval( $fotomag_lks + 1 ) );

        die( $fotomag_output );
    }
}
add_action('wp_ajax_fotomag_a_l', 'fotomag_a_l');
add_action('wp_ajax_nopriv_fotomag_a_l', 'fotomag_a_l');

/*********************
LOAD CALL
*********************/
if ( ! function_exists( 'fotomag_al_l' ) ) {
    function fotomag_al_l() {        

        if ( ! wp_verify_nonce( esc_attr( $_GET['fotomagALlNonce'] ), 'fotomagALlNonce' ) ) {
            die();
        }

        $fotomag_post_id = absint($_GET['fotomagPostId']);

        $fotomag_qry = new WP_Query( array(  'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'post__not_in' => array( $fotomag_post_id ), 'offset' => absint($_GET['fotomagCounter']) ) );

        if ( $fotomag_qry->have_posts() ) {

            while ( $fotomag_qry->have_posts() ) {

                $fotomag_qry->the_post();
                global $post;
                $fotomag_post_id = $post->ID;

                $fotomag_video_meta =  get_post_meta( $fotomag_post_id, '_format_video_embed', true );
                $fotomag_audio_meta =  get_post_meta( $fotomag_post_id, '_format_audio_embed', true );
                
                ?>
                <div id="cb-al-post-<?php echo absint( $_GET['fotomagCounter'] ); ?>" class="cb-al-post" data-cb-purl="<?php echo esc_url( get_permalink( $fotomag_post_id ) ); ?>">
                    <?php get_template_part( 'post-formats/format', get_post_format( $fotomag_post_id ) ); ?>

                    <footer class="article-footer clearfix">

                        <?php if ( get_theme_mod( 'fotomag_set_post_author', true ) == true ) { fotomag_written_by(); } ?>
                        
                        <span class="cb-separator wrap"></span>
                        
                        <?php if ( get_theme_mod( 'fotomag_set_post_comments', true ) == true ) { comments_template(); } ?>
                        
                    </footer>
                    <?php fotomag_post_formats_overlay( $fotomag_post_id ); ?>
                </div>
                <?php 

            }

        }

        wp_reset_postdata();
        
        die();
    }
}
add_action('wp_ajax_fotomag_al_l', 'fotomag_al_l');
add_action('wp_ajax_nopriv_fotomag_al_l', 'fotomag_al_l');


/*********************
ARROW SCROLL DOWN
*********************/
if ( ! function_exists( 'fotomag_get_arrow_down' ) ) {
    function fotomag_get_arrow_down() {

        if ( ! is_single() || ( get_theme_mod( 'fotomag_set_post_down_arrow', true ) != true ) ) {
            return;
        } ?>

        <a href="#" id="cb-vertical-down" class="cb-vertical-down"><i class="fa fa-angle-down"></i></a>

        <?php
    }
}


/*********************
FONTS
*********************/
if ( ! function_exists( 'fotomag_get_fonts' ) ) {   
    function fotomag_get_fonts( $fotomag_var = NULL ) {

        $fotomag_output = NULL;
        
        if ( $fotomag_var == 'fotomag_titles' ) {

            $fotomag_output = str_replace(' ', '+', get_theme_mod('fotomag_set_typography_headings', 'Montserrat' ) );
        }

        if ( $fotomag_var == 'fotomag_body' ) {
            $fotomag_output = str_replace(' ', '+', get_theme_mod('fotomag_set_typography_body', 'Merriweather' ) );
        }

        if ( $fotomag_var == 'fotomag_ext' ) {
            
            if ( is_array( get_theme_mod('fotomag_set_typography_subsets', 'latin' ) ) ) {
                $fotomag_output = implode( ',', get_theme_mod('fotomag_set_typography_subsets', 'latin' ) );
            } 
            if ( $fotomag_output == NULL ) {
                $fotomag_output = 'latin';
            }

            $fotomag_output = '&subset=' . $fotomag_output;
        }

        return $fotomag_output;
        
    }
}

/*********************
GET POST CATEGORIES
*********************/
if ( ! function_exists( 'fotomag_post_category' ) ) {
    function fotomag_post_category( $fotomag_post_id = NULL ) {

        if ( ( get_theme_mod( 'fotomag_set_post_category', true ) != true ) ) {
            return;
        }

        if ( $fotomag_post_id == NULL ) {
            global $post;
            $fotomag_post_id = $post->ID;
        }
        
        $fotomag_cats = get_the_category( $fotomag_post_id );

        if ( ! empty( $fotomag_cats ) ) { ?>

            <div class="cb-cat">
                
                <?php foreach( $fotomag_cats as $fotomag_cat => $fotomag_current_cat ) { ?>

                    <a href="<?php echo esc_url( get_category_link( $fotomag_current_cat->term_id ) ); ?>" title="<?php echo esc_attr( sprintf( esc_html__( "View all posts in %s", "fotomag" ), sanitize_title( $fotomag_current_cat->name ) ) ); ?>">
                        <?php echo ( $fotomag_current_cat->cat_name ); ?>
                    </a>

                <?php } ?>
            </div>

        <?php }
        
    }
}

/*********************
POST FORMAT EMBEDS
*********************/
if ( ! function_exists( 'fotomag_post_formats_overlay' ) ) {
    function fotomag_post_formats_overlay( $fotomag_post_id = NULL ) {

        global $post;
        $fotomag_single_check = $fotomag_post_al= true;
        if ( $fotomag_post_id == NULL ) {
            if ( ! get_post_format() ) {
                return;
            }
            $fotomag_post_id = $post->ID;
            $fotomag_post_al = false;
            $fotomag_single_check = is_single();
        }
        

        $fotomag_video_meta =  get_post_meta( $fotomag_post_id, '_format_video_embed', true );
        $fotomag_audio_meta =  get_post_meta( $fotomag_post_id, '_format_audio_embed', true );

        if ( ( $fotomag_video_meta != NULL ) && ( get_post_format( $fotomag_post_id ) == 'video' ) && ( $fotomag_single_check == true ) ) { ?>


            <div id="cb-media-trigger-<?php echo intval( $fotomag_post_id ); ?>" class="cb-post-format-embed">
                <div class="cb-embed-wrap clearfix">
                    <?php if (  get_theme_mod( 'fotomag_set_extras_youtube_api', true ) == true ) { ?>

                        <?php if ( strpos( $fotomag_video_meta, 'yout' ) !== false && ( $fotomag_post_al == false ) ) { preg_match( '([-\w]{11})', $fotomag_video_meta, $fotomag_youtube_id ); ?>
                            <span id="cb-yt-player-<?php echo intval( $fotomag_post_id ); ?>"><?php  echo esc_html( $fotomag_youtube_id[0] ); ?></span>
                        <?php } else { ?>
                            <?php echo do_shortcode( get_post_meta( $fotomag_post_id, '_format_video_embed', true ) ); ?>
                        <?php } ?>
                        
                    <?php } else { ?>
                        <?php echo do_shortcode( get_post_meta( $fotomag_post_id, '_format_video_embed', true ) ); ?>
                    <?php } ?>
                </div>
            </div>
            
        <?php } 

        if ( ( $fotomag_audio_meta != NULL ) && ( get_post_format( $fotomag_post_id ) == 'audio' ) && ( $fotomag_single_check == true ) )  { ?>

            <div id="cb-media-trigger-<?php echo intval( $fotomag_post_id ); ?>" class="cb-post-format-embed">
                <div class="cb-embed-wrap clearfix">
                    <?php echo do_shortcode( get_post_meta( $fotomag_post_id, '_format_audio_embed', true ) ); ?>
                </div>
            </div>
            
        <?php } 
        
    }
}

/*********************
GET CATEGORIES
*********************/
if ( ! function_exists( 'fotomag_get_categories' ) ) {
    function fotomag_get_categories() {

        $fotomag_cats = get_categories();
        $fotomag_cat_array = array();
        foreach ( $fotomag_cats as $fotomag_cat ) {
            $fotomag_cat_array[$fotomag_cat->term_id] = $fotomag_cat->cat_name;
        }
        return $fotomag_cat_array;

    }
}

/*********************
POST FORMAT EMBEDS
*********************/
if ( ! function_exists( 'fotomag_post_formats_embed' ) ) {
    function fotomag_post_formats_embed( $fotomag_post_id = NULL ) {

        global $post;

        if ( $fotomag_post_id == NULL ) {
            $fotomag_post_id = $post->ID;

            if ( ! get_post_format() ) {
                return;
            }
        }


        if ( ( get_post_meta($fotomag_post_id, '_format_video_embed', true) != NULL ) && ( get_post_format( $fotomag_post_id ) == 'video' ) ) { ?>
            
             <a href="#" <?php if ( is_single() ) { echo 'id="cb-embed-icon-trigger"'; } ?> class="cb-embed-icon cb-circle" data-cb-pid="<?php echo esc_attr( $fotomag_post_id ); ?>"><i class="fa fa-play"></i></a>
            
        <?php }

        if ( ( get_post_meta($fotomag_post_id, '_format_gallery_images', true) != NULL ) && ( get_post_format( $fotomag_post_id ) == 'gallery' ) ) { ?>
            
             <a href="#" <?php if ( is_single() ) { echo 'id="cb-embed-icon-trigger"'; } ?> class="cb-embed-icon cb-circle"><i class="fa fa-camera"></i></a>
            
        <?php } 

        if ( ( get_post_meta($fotomag_post_id, '_format_audio_embed', true) != NULL ) && ( get_post_format( $fotomag_post_id ) == 'audio' ) )  { ?>

            <a href="#" <?php if ( is_single() ) { echo 'id="cb-embed-icon-trigger"'; } ?> class="cb-embed-icon cb-circle" data-cb-pid="<?php echo esc_attr( $fotomag_post_id ); ?>"><i class="fa fa-headphones"></i></a>
            
        <?php } 
        
    }
}

/*********************
GET POST ID
*********************/
if ( ! function_exists( 'fotomag_get_post_id' ) ) {
    function fotomag_get_post_id() {

        global $post;
        return $post->ID;
        
    }
}

/*********************
GET POST LAYOUT
*********************/
if ( ! function_exists( 'fotomag_post_layout' ) ) {
    function fotomag_post_layout() {

        $fotomag_post_layout = '1';
        global $wp_query;

        if ( is_home() ) {
            $fotomag_post_layout = get_theme_mod( 'fotomag_section_layouts_hp', '1' );
        } elseif ( is_category() ) {
            $fotomag_post_layout = get_theme_mod( 'fotomag_section_layouts_cat', '1' );

            $fotomag_cat_id = $wp_query->get_queried_object_id();
            $fotomag_cat_l_a = get_theme_mod('fotomag_section_layout_a_cat_multi', array() );
            $fotomag_cat_l_b = get_theme_mod('fotomag_section_layout_b_cat_multi', array() );
            $fotomag_cat_l_c = get_theme_mod('fotomag_section_layout_c_cat_multi', array() );

            if ( ( ! empty( $fotomag_cat_l_a ) ) && ( in_array( $fotomag_cat_id, $fotomag_cat_l_a ) == true ) ) {
                $fotomag_post_layout = '1';
            } elseif ( ( ! empty( $fotomag_cat_l_b ) ) && ( in_array( $fotomag_cat_id, $fotomag_cat_l_b ) == true ) ) {
                $fotomag_post_layout = '2';
            } elseif ( ( ! empty( $fotomag_cat_l_c ) ) && ( in_array( $fotomag_cat_id, $fotomag_cat_l_c ) == true ) ) {
                $fotomag_post_layout = '3';
            }

        } elseif ( is_tag() ) {
            $fotomag_post_layout = get_theme_mod( 'fotomag_section_layouts_tags', '1' );
        } elseif ( is_author() ) {
            $fotomag_post_layout = get_theme_mod( 'fotomag_section_layouts_ap', '1' );
        } elseif ( is_search() ) {
            $fotomag_post_layout = get_theme_mod( 'fotomag_section_layouts_sp', '1' );
        }

        
        switch ( $fotomag_post_layout ) {
            case '2':
                if ( ( $wp_query->current_post ) == 0 ) {
                    get_template_part( 'inc/cb-posts-full' ); 
                } else { 
                    get_template_part( 'inc/cb-posts-half' ); 
                }
                break;
            case '3':
                get_template_part( 'inc/cb-posts-full' ); 
                break;
            
            default:
                if ( ( $wp_query->current_post + 1 ) % 3 != 1 ) {
                    get_template_part( 'inc/cb-posts-half' ); 
                } else { 
                    get_template_part( 'inc/cb-posts-full' ); 
                }
                break;
        }

        
    }
}

/*********************
GET POST LAYOUT
*********************/
if ( ! function_exists( 'fotomag_post_layout_bs' ) ) {
    function fotomag_post_layout_bs() {

        $fotomag_pl_bs = '1';
        global $wp_query;
        if ( is_home() ) {
            $fotomag_pl_bs = get_theme_mod( 'fotomag_section_layouts_hp', '1' );
        } elseif ( is_category() ) {
            $fotomag_pl_bs = get_theme_mod( 'fotomag_section_layouts_cat', '1' );

            $fotomag_cat_id = $wp_query->get_queried_object_id();
            $fotomag_cat_l_a = get_theme_mod('fotomag_section_layout_a_cat_multi', array() );
            $fotomag_cat_l_b = get_theme_mod('fotomag_section_layout_b_cat_multi', array() );
            $fotomag_cat_l_c = get_theme_mod('fotomag_section_layout_c_cat_multi', array() );

            if ( ( ! empty( $fotomag_cat_l_a ) ) && ( in_array( $fotomag_cat_id, $fotomag_cat_l_a ) == true ) ) {
                $fotomag_pl_bs = '1';
            } elseif ( ( ! empty( $fotomag_cat_l_b ) ) && ( in_array( $fotomag_cat_id, $fotomag_cat_l_b ) == true ) ) {
                $fotomag_pl_bs = '2';
            } elseif ( ( ! empty( $fotomag_cat_l_c ) ) && ( in_array( $fotomag_cat_id, $fotomag_cat_l_c ) == true ) ) {
                $fotomag_pl_bs = '3';
            }


        } elseif ( is_tag() ) {
            $fotomag_pl_bs = get_theme_mod( 'fotomag_section_layouts_tags', '1' );
        } elseif ( is_author() ) {
            $fotomag_pl_bs = get_theme_mod( 'fotomag_section_layouts_ap', '1' );
        } elseif ( is_search() ) {
            $fotomag_pl_bs = get_theme_mod( 'fotomag_section_layouts_sp', '1' );
        }

        return $fotomag_pl_bs;
    }
}

/*********************
FEATURED IMAGE
*********************/
if ( ! function_exists( 'fotomag_featured_image' ) ) {
    function fotomag_featured_image() { 
        
        global $post;
        $fotomag_post_id = $post->ID;
        $fotomag_whitelist = fotomag_whitelist();

        if  ( ( has_post_thumbnail( $fotomag_post_id ) ) && ( get_the_post_thumbnail( $fotomag_post_id ) != NULL ) ) {
        
            $fotomag_bg_img = fotomag_get_thumbnail_url( 'full', 'full', $fotomag_post_id );
?>
            <div id="cb-fis-wrap" class="cb-fis-wrap clearfix cb-hide-bars">

                <div id="cb-fis" class="cb-fis cb-style-fis cb-style-<?php if ( is_single() ) { echo '1'; } else { echo '2'; } ?>">

                    <div class="cb-meta">

                        <?php fotomag_post_category( $fotomag_post_id ); ?>
                        <h1 class="cb-post-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
                        <?php fotomag_post_formats_embed( $fotomag_post_id ); ?>
                        
                    </div>

                    <?php fotomag_get_arrow_down(); ?>
                    <?php fotomag_likes(); ?>
                    <div class="cb-fis-bg<?php if (  $fotomag_bg_img[1] < $fotomag_bg_img[2] ) { echo ' cb-vertical-fi'; } ?>" style="background-image: url(<?php echo esc_url( $fotomag_bg_img[0] ); ?>);"></div>

                </div>

            </div>

    <?php } else { ?>

            <div id="cb-fis-wrap">

                <div id="cb-fis" class="cb-style-fis cb-fis-not-set">

                    <div class="cb-meta">
                        
                        <?php fotomag_post_category( $fotomag_post_id ); ?>
                        <?php fotomag_post_formats_embed( $fotomag_post_id ); ?>
                        <h1 class="cb-post-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
                        <?php fotomag_likes(); ?>

                    </div>

                </div>

            </div>
<?php
        }
        
    }
}


/*********************
POSTS IN FRONTEND SEARCHES
*********************/
if ( ! function_exists( 'fotomag_clean_search' ) ) {
    function fotomag_clean_search( $query ) {

        if ( $query->is_search ) {

            $query->set( 'post_type', 'post' );

        }
        return $query;
    }
}
add_filter( 'pre_get_posts', 'fotomag_clean_search' );


/*********************
REMOVE CATEGORY/TAG WORDS FROM TITLES
*********************/
if ( ! function_exists( 'fotomag_cat_tag_title' ) ) {
    function fotomag_cat_tag_title( $title ) {

        if ( is_category() ) {
            if ( get_theme_mod( 'fotomag_section_layouts_cat_title', false ) == false ) {
                $title = single_cat_title( '', false );
            }

        } elseif ( is_tag() ) {
            if ( get_theme_mod( 'fotomag_section_layouts_tags_title', false ) == false ) {
                $title = single_tag_title( '', false );
            }

        }

        return $title;

    }
}
add_filter( 'get_the_archive_title', 'fotomag_cat_tag_title' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if ( ! function_exists( 'cb_woo_start_wrap' ) ) {
    function cb_woo_start_wrap() { 
        echo '<div id="cb-content" class="clearfix"><div id="cb-inner-content" class="cb-inner-content-area clearfix"><main id="cb-main" class="clearfix"><section id="cb-entry-content" class="entry-content wrap clearfix">'; 
    }
}
add_action('woocommerce_before_main_content', 'cb_woo_start_wrap', 10);

if ( ! function_exists( 'cb_woo_end_wrap' ) ) {
    function cb_woo_end_wrap() {
        echo '</section></main> <!-- end #main -->';
        echo '</div><!-- end #cb-content -->'; 
        echo '</div><!-- end #cb-content -->'; 
    }
}
add_action('woocommerce_after_main_content', 'cb_woo_end_wrap', 10);
function woocommerce_get_sidebar() {}
?>