<?php get_header(); ?>
<?php $fotomag_post_id = fotomag_get_post_id(); ?>
<?php $fotomag_whitelist = fotomag_whitelist(); ?>

	<div id="cb-content" class="clearfix">

		<div id="cb-inner-content" class="cb-inner-content-area clearfix">

			<main id="cb-main" class="wrap clearfix">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
						
						<?php echo(wp_get_attachment_link( $fotomag_post_id, 'full' )); ?>
						<section id="cb-entry-content" class="entry-content wrap clearfix">

							<h1 class="cb-post-title" itemprop="headline" rel="bookmark"><?php echo wp_kses( get_the_title( $fotomag_post_id ), $fotomag_whitelist ); ?></h1>
							<?php the_content(); ?>
						</section>
						
		
					</article>

				<?php endwhile; ?>

				<?php endif; ?>

			</main>

		</div>

	</div>

<?php get_footer(); ?>