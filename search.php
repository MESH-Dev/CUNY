<?php get_header(); ?>
		
	<div id="cb-content" class="clearfix">
		
		<div class="cb-arc-header cb-border cb-title-box wrap">

			<h1 class="cb-arc-title">
				<span class="cb-upper-title"><?php esc_html_e( 'Search results for', 'fotomag' ); ?></span>
				<?php echo esc_attr( get_search_query() ); ?>
			</h1>

		</div>

		<div id="cb-inner-content" class="cb-inner-content-area clearfix">

				<main id="cb-main" class="cb-border cb-posts-loop clearfix" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php fotomag_post_layout(); ?>

					<?php endwhile; ?>

					</main>

					<?php fotomag_pagination(); ?>

					<?php else : ?>
					<section class="entry-content wrap">

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fotomag' ); ?></p>
						<?php get_search_form(); ?>

					</section>
					
					</main>
						
					<?php endif; ?>


				

		</div>

	</div>

<?php get_footer(); ?>