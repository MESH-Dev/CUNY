<?php
	$fotomag_footer_copyright = get_theme_mod('fotomag_set_footer_copyright_line', NULL );
	$fotomag_footer_logo = get_theme_mod( 'fotomag_set_footer_logo', NULL );
	$fotomag_footer_logo_retina = get_theme_mod( 'fotomag_set_footer_logo_retina', NULL );
    $fotomag_footer_to_top = get_theme_mod( 'fotomag_set_footer_to_top', true );
?>

        <?php if ( ( $fotomag_footer_copyright != NULL ) || ( $fotomag_footer_to_top == true ) || ( has_nav_menu( 'fotomag_footer' ) ) || ( $fotomag_footer_logo != NULL ) || ( is_active_sidebar( 'cb-under-footer' ) == true ) ) { ?>

            <footer id="cb-footer" class="cb-footer-area clearfix" itemscope itemtype="http://schema.org/WPFooter">
                
                <div class="cb-footer-last cb-border cb-border-mob clearfix">

                	<?php if ( $fotomag_footer_logo != NULL ) { ?>
                        <div class="cb-logo-area cb-footer-logo cb-footer-last-block">
                            <a href="<?php echo esc_url( home_url('/') );?>" class="cb-logo-link">
                                <img src="<?php echo esc_url( $fotomag_footer_logo ); ?>" alt="<?php esc_html( get_bloginfo( 'name' ) ); ?> logo" <?php if ( $fotomag_footer_logo_retina != NULL ) { ?> data-at2x="<?php echo esc_url( $fotomag_footer_logo_retina ); ?>"<?php } ?>>
                            </a>
                        </div>
                    <?php } ?>

                    <?php if ( get_theme_mod('fotomag_set_footer_text_under_logo', '' ) != NULL ) { ?>
                         <div class="cb-ta-center cb-tagline cb-font-body">
                            <div class="cb-col-4">
                                <?php echo sanitize_text_field( get_theme_mod('fotomag_set_footer_text_under_logo', '' ) ); ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ( is_active_sidebar( 'cb-under-footer' ) == true ) { ?>
                        <span class="cb-separator"></span>

                        <div class="cb-under-footer clearfix">
                            <?php dynamic_sidebar('cb-under-footer'); ?>
                        </div>

                        <span class="cb-separator"></span>

                    <?php } ?>

                    <?php if ( has_nav_menu( 'fotomag_footer' ) ) { fotomag_footer_nav(); } ?>

                    <?php fotomag_footer_social_icons(); ?>
                    
                    <div class="cb-copyright cb-footer-last-block clearfix">
                        <?php if ( get_theme_mod('fotomag_set_footer_copyright_line', '' ) != NULL ) { ?>
                            <div class="cb-copyright-line cb-copyright-block"><?php echo esc_html( get_theme_mod('fotomag_set_footer_copyright_line', '' ) ); ?></div>
                        <?php } ?>

                        <?php if ( ( $fotomag_footer_to_top == true ) && ( $fotomag_footer_copyright != NULL ) ) { ?>
                            <span class="cb-copyright-block cb-divider">|</span>
                        <?php } ?>


                        <?php if ( $fotomag_footer_to_top == true ) { ?>
                            <div class="cb-to-top cb-copyright-block"><a href="#" id="cb-to-top"><?php esc_html_e('Back to top', 'fotomag'); ?> <i class="fa fa-angle-up"></i></a></div>
                        <?php } ?>

                    </div>

                </div>

            </footer> <!-- end footer -->

		<?php } ?>

		</div> <!-- end #cb-outer-container -->

		<div id="cb-overlay" class="cb-overlay-modal">
            <a href="#" class="cb-modal-closer">
                <i class="fa cb-times"></i>
            </a>
        </div>
        <?php if ( get_theme_mod( 'fotomag_set_left_nav_subscribe', false ) == true ) { ?>
            <div id="cb-sub-modal" class="cb-sub-modal">
                <a href="#" id="cb-sub-closer" class="cb-modal-closer"><i class="fa cb-times"></i></a>
                <div class="cb-modal-wrap clearfix">
                    <?php if ( get_theme_mod( 'fotomag_set_left_nav_subscribe_title', '' ) != NULL ) { ?>
                        <div class="cb-title"><?php echo esc_html( get_theme_mod( 'fotomag_set_left_nav_subscribe_title', '' ) ); ?></div>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'fotomag_set_left_nav_subscribe_subtitle', '' ) != NULL ) { ?>
                        <div class="cb-subtitle cb-font-body"><?php echo esc_html( get_theme_mod( 'fotomag_set_left_nav_subscribe_subtitle', '' ) ); ?></div>
                    <?php } ?>
                    <?php echo do_shortcode( esc_html( get_theme_mod( 'fotomag_set_left_nav_subscribe_code', '' ) ) ); ?>
                </div>
                <div class="cb-background"></div>
            </div>
        <?php } ?>
    
        <?php fotomag_search_overlay(); ?>

        <?php fotomag_post_formats_overlay(); ?>

		<?php wp_footer(); ?>
    
	</body>

</html> <!-- The End. Phew, what a ride! -->