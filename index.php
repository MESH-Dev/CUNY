<?php get_header(); ?>
			
	<div id="cb-content">

		<div id="cb-inner-content" class="cb-inner-content-area clearfix">

				<main id="cb-main" class="cb-border cb-fade-in cb-posts-loop clearfix" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php fotomag_post_layout(); ?>
		
					<?php endwhile; ?>
					<?php else : ?>

						<?php get_template_part( 'inc/cb-posts-none' ); ?>

					<?php endif; ?>

				</main>

				<?php fotomag_pagination(); ?>

		</div>

	</div>

<?php get_footer(); ?>