<?php get_header(); ?>

	<div id="cb-content" class="clearfix">

		<div id="cb-inner-content" class="cb-inner-content-area clearfix">

			<main id="cb-main" class="clearfix">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php if(get_the_id() == 6) { ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

						<?php get_template_part( 'post-formats/format', get_post_format() ); ?>

						<?php if ( get_theme_mod( 'fotomag_set_post_autoload', false ) == true ) { ?><span id="cb-al"></span><?php } ?>

						<footer class="article-footer clearfix">

					        <?php if ( get_theme_mod( 'fotomag_set_post_author', true ) == true ) { fotomag_written_by(); } ?>

					        <?php if ( get_theme_mod( 'fotomag_set_post_next_previous', true ) == true ) { ?>
					        	<span class="cb-separator wrap"></span>
					        	<?php fotomag_previous_next_posts(); ?>
					        <?php } ?>

					        <span class="cb-separator wrap"></span>

					        <?php if ( get_theme_mod( 'fotomag_set_post_comments', true ) == true ) { comments_template(); } ?>

					    </footer>
					    <?php if ( get_theme_mod( 'fotomag_set_post_related', true ) == true ) { fotomag_related_posts(); } ?>

					</article>

					<?php } ?>

				<?php endwhile; ?>

				<?php endif; ?>

			</main>

		</div>

	</div>

<?php get_footer(); ?>
