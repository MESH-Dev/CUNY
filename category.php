<?php get_header(); ?>
		
	<div id="cb-content" class="clearfix">
		<div class="cb-arc-header cb-border cb-title-box wrap">

			<?php fotomag_arc_thumbnail(); ?>
			<?php the_archive_title( '<h1 class="cb-arc-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="cb-arc-sub">', '</div>' ); ?>
		</div>

		<div id="cb-inner-content" class="cb-inner-content-area clearfix">

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