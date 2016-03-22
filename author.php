<?php 
	get_header(); 
	$fotomag_author = get_user_by( 'slug', get_query_var( 'author_name' ) ); 
	$fotomag_author_id = $fotomag_author->ID; 
    $fotomag_author_tw = get_the_author_meta('twitter', $fotomag_author_id);
    $fotomag_author_fb = get_the_author_meta('facebook', $fotomag_author_id);
    $fotomag_author_googleplus = get_the_author_meta('googleplus', $fotomag_author_id);
    $fotomag_author_www = get_the_author_meta('url', $fotomag_author_id);
    $fotomag_show_icons = false;

    if ( ( $fotomag_author_www != NULL ) || ( $fotomag_author_fb != NULL ) || ( $fotomag_author_googleplus != NULL ) || ( $fotomag_author_tw != NULL ) ) {
        $fotomag_show_icons = true;
    }
?>

<div id="cb-content">

	<div id="cb-inner-content" class="cb-inner-content-area clearfix">
		
        <div id="cb-author-box" class="cb-post-block-bg cb-author-box cb-title-box wrap cb-border clearfix">
        	<div class="cb-mask"><?php echo get_avatar( $fotomag_author_id, '150' ); ?></div>
	        <div class="cb-meta">
		        	<h1 class="cb-title cb-arc-title cb-font-title vcard" itemprop="author">
		        		<span class="fn"><?php echo get_the_author_meta('display_name', $fotomag_author_id); ?></span>
		        	</h1>
		       
		        <?php if ( get_the_author_meta('description', $fotomag_author_id) != NULL ) { ?><p class="cb-arc-sub cb-author-bio"><?php echo get_the_author_meta('description', $fotomag_author_id); ?></p><?php } ?>

		        <?php if ( $fotomag_show_icons == true ) { ?>
		            <div class="cb-author-page-contact">
			            <?php if ( $fotomag_author_www != NULL ) { ?><a href="<?php echo esc_url( $fotomag_author_www ); ?>" target="_blank" class="cb-contact-icon cb-tip-bot" data-title="<?php esc_html_e('Website', 'fotomag'); ?>"><i class="fa fa-link"></i></a><?php } ?>
			            <?php if ( $fotomag_author_tw != NULL ) { ?><a href="<?php echo esc_url( '//www.twitter.com/' . $fotomag_author_tw ); ?>" target="_blank" class="cb-contact-icon cb-tip-bot" data-title="Twitter"><i class="fa fa-twitter"></i></a><?php } ?>
			            <?php if ( $fotomag_author_fb != NULL ) { ?><a href="<?php echo esc_url( $fotomag_author_fb ); ?>" target="_blank" class="cb-contact-icon cb-tip-bot" data-title="Facebook"><i class="fa fa-facebook"></i></a><?php } ?>
			            <?php if ( $fotomag_author_googleplus != NULL ) { ?><a href="<?php echo esc_url( $fotomag_author_googleplus ); ?>" target="_top" class="cb-contact-icon cb-tip-bot" data-title="Google+"><i class="fa fa-google-plus"></i></a><?php } ?>
		            </div>
		        <?php } ?>
		            
	        </div>

        </div>

		<main id="cb-main" class="cb-border cb-posts-loop clearfix" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php fotomag_post_layout(); ?>

			<?php endwhile; ?>
			<?php endif; ?>


		</main>

		<?php fotomag_pagination(); ?>

	</div>

</div>

<?php get_footer(); ?>