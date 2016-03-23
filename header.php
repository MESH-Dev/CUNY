<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/fonts.css">
		<style>
			@media (min-width: 481px) {
				.entry-title-primary {
					font-family: 'industry_inccutline';
					font-size: 80px !important;
					line-height: 1em !important;
				}
			}
			@media (max-width: 480px) {
				.entry-title-primary {
					font-size: 52px !important;
					font-family: 'industry_inccutline';
					line-height: 1em !important;
				}
			}

			.entry-content h6 {
				line-height: 24px !important;
			}
		</style>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

        	<?php if ( get_theme_mod( 'fotomag_set_header_logo', NULL ) != NULL ) { ?>

        	<?php $fotomag_logo_url = get_theme_mod( 'fotomag_set_header_logo', NULL ); ?>
        	<?php $fotomag_logo_retina_url = get_theme_mod( 'fotomag_set_header_logo_retina', NULL ); ?>

        	<?php if ( is_single() && ( get_theme_mod( 'fotomag_set_header_logo_light', NULL ) != NULL ) ) { ?>

	        	<?php $fotomag_logo_url = get_theme_mod( 'fotomag_set_header_logo_light', NULL ); ?>
	        	<?php if ( get_theme_mod( 'fotomag_set_header_logo_light_retina', NULL ) != NULL ) { $fotomag_logo_retina_url = get_theme_mod( 'fotomag_set_header_logo_light_retina', NULL ); } ?>

	        <?php } ?>

	            <header id="cb-header" class="cb-header cb-nav-top clearfix" itemscope itemtype="http://schema.org/WPHeader">

	                <div id="logo" class="cb-logo-area cb-main-logo cb-header-block">
	                    <a class="cb-logo-link cb-header-block-inner" href="<?php echo esc_url( home_url( '/' ) );?>">
	                        <img src="<?php  echo esc_url( $fotomag_logo_url ); ?>" alt="<?php esc_html( get_bloginfo( 'name' ) );  ?>" <?php if ( get_theme_mod( 'fotomag_set_header_logo_retina', NULL ) != NULL ) { echo 'data-at2x="' . esc_url( $fotomag_logo_retina_url ) . '"'; } ?>>
	                    </a>
	                </div>

	                <?php if ( get_theme_mod( 'fotomag_set_header_layout', '1' ) == '2' ) { ?>

						<?php fotomag_top_menu(); ?>

	                <?php } ?>

				</header>

            <?php } ?>

			<?php if ( ( is_single() && ( get_theme_mod( 'fotomag_set_post_progress', true ) == true ) ) || ( is_page() && ( get_theme_mod( 'fotomag_set_pages_progress', true ) == true ) ) ) { ?>

				<div id="cb-read-progress" class="cb-read-progress"><div class="cb-bar"><?php if ( get_theme_mod( 'fotomag_set_extras_show_percentage_value', false ) == true ) { ?><span id="cb-progress-value">0%</span><?php }?></div></div>

			<?php } ?>

			<?php if ( ( get_theme_mod( 'fotomag_set_left_nav_subscribe', false ) == true ) || ( get_theme_mod( 'fotomag_set_left_nav_search', true ) == true ) || ( get_theme_mod( 'fotomag_set_left_nav_social', false ) == true ) ) { ?>

				<div id="cb-nav-left" class="cb-fixed cb-nav-left cb-font-title cb-nav-sides">
					<div class="cb-v-container">

					    <?php if ( ( get_theme_mod( 'fotomag_set_left_nav_twitter', '' ) != NULL ) && ( get_theme_mod( 'fotomag_set_left_nav_social', false ) == true ) ) { ?>
	            				<div class="cb-social-icon"><a href="//www.twitter.com/<?php echo esc_attr( get_theme_mod( 'fotomag_set_left_nav_twitter', '' ) ); ?>" class="cb-tip-right" target="_blank" data-title="Twitter"><i class="fa fa-twitter"></i></a></div>
					    <?php } ?>

					    <?php if ( ( get_theme_mod( 'fotomag_set_left_nav_facebook', '' ) != NULL ) && ( get_theme_mod( 'fotomag_set_left_nav_social', false ) == true ) ) { ?>
					    	<div class="cb-social-icon"><a href="//www.facebook.com/<?php echo esc_attr( get_theme_mod( 'fotomag_set_left_nav_facebook', '' ) ); ?>" class="cb-tip-right" target="_blank" data-title="Facebook"><i class="fa fa-facebook"></i></a></div>
					    <?php } ?>

					    <?php if ( ( get_theme_mod( 'fotomag_set_left_nav_instagram', '' ) != NULL ) && ( get_theme_mod( 'fotomag_set_left_nav_social', false ) == true ) ) { ?>
	            				<div class="cb-social-icon"><a href="//www.instagram.com/<?php echo esc_attr( get_theme_mod( 'fotomag_set_left_nav_instagram', '' ) ); ?>" class="cb-tip-right" target="_blank" data-title="Instagram"><i class="fa fa-instagram"></i></a></div>
					    <?php } ?>

					    <?php if ( ( get_theme_mod( 'fotomag_set_left_nav_pinterest', '' ) != NULL ) && ( get_theme_mod( 'fotomag_set_left_nav_social', false ) == true ) ) { ?>
					    	<div class="cb-social-icon"><a href="//www.pinterest.com/<?php echo esc_attr( get_theme_mod( 'fotomag_set_left_nav_pinterest', '' ) ); ?>" class="cb-tip-right" target="_blank" data-title="Pinterest"><i class="fa fa-pinterest"></i></a></div>
					    <?php } ?>

						<?php if ( get_theme_mod( 'fotomag_set_left_nav_search', true ) == true ) { ?>
							<div class="cb-social-icon"><a href="#" id="cb-search-trigger" class="cb-tip-right" data-title="<?php esc_html_e('Search', 'fotomag'); ?>"><i class="fa fa-search"></i></a></div>
						<?php } ?>

						<?php if ( get_theme_mod( 'fotomag_set_left_nav_subscribe', false ) == true ) { ?>
							<div class="cb-rotate-acw">

								<a href="#" id="cb-sub-trigger"><?php echo esc_attr( get_theme_mod( 'fotomag_set_left_nav_subscribe_text', '' ) ); ?></a>

							</div>
						<?php } ?>
					</div>
				</div>

			<?php } ?>

			<?php if ( has_nav_menu( 'fotomag_main' ) ) { ?>
				<div id="cb-nav-right" class="cb-fixed cb-nav-right cb-nav-sides">
					<div class="cb-v-container">
							<a href="#" id="cb-menu-trigger"><i class="fa fa-bars"></i></a>
					</div>
				</div>
			<?php } ?>


			<?php if ( has_nav_menu( 'fotomag_main' ) ) { ?>

				<div class="cb-menu-overlay cb-border cb-border-bot">
					<a href="#" id="cb-menu-closer" class="cb-modal-closer"><i class="fa cb-times"></i></a>

					<?php fotomag_slide_in_nav(); ?>

					<?php if ( get_theme_mod( 'fotomag_set_right_nav_social', false ) == true ) { ?>
					<?php   if ( get_theme_mod( 'fotomag_set_right_nav_twitter', '' ) != NULL ) {
	            				$fotomag_icons = '<a href="//www.twitter.com/' . get_theme_mod( 'fotomag_set_right_nav_twitter', '' ) . '" class="cb-tip-top" target="_blank" data-title="Twitter"><i class="fa fa-twitter"></i></a>';
					        }

					        if ( get_theme_mod( 'fotomag_set_right_nav_facebook', '' ) != NULL ) {
					            $fotomag_icons .= '<a href="//www.facebook.com/' . get_theme_mod( 'fotomag_set_right_nav_facebook', '' ) . '"  class="cb-tip-top" target="_blank" data-title="Facebook"><i class="fa fa-facebook"></i></a>';
					        }

					        if ( get_theme_mod( 'fotomag_set_right_nav_pinterest', '' ) != NULL ) {
					            $fotomag_icons .= '<a href="//www.pinterest.com/' . get_theme_mod( 'fotomag_set_right_nav_pinterest', '' ) . '"><i class="fa fa-pinterest"></i></a>';
					        }

					        if ( get_theme_mod( 'fotomag_set_right_nav_instagram', '' ) != NULL ) {
					            $fotomag_icons .= '<a href="//www.instagram.com/' . get_theme_mod( 'fotomag_set_right_nav_instagram', '' ) . '"><i class="fa fa-instagram"></i></a>';
					        }
					         if ( $fotomag_icons != NULL ) {
					            echo '<div class="cb-slide-social-icons">' . $fotomag_icons . '</div>';
					        }
					?>
					<?php } ?>
					<span class="cb-background"></span>

				</div>

			<?php } ?>
