<?php get_header(); ?>

			<div id="cb-content" class="clearfix">

				<div id="cb-inner-content" class="cb-inner-content-area clearfix">

					<main id="cb-main" class="clearfix">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

								<?php fotomag_featured_image(); ?>

								<section id="cb-entry-content" class="entry-content wrap clearfix">

								    <?php the_content(); ?>

								    <?php wp_link_pages( array(
								            'before'      => '<div class="cb-page-links"><span class="cb-page-links-title">' . esc_html__( 'Pages:', 'fotomag' ) . '</span>',
								            'after'       => '</div>',
								            'link_before' => '<span class="cb-page-number">',
								            'link_after'  => '</span>',
								        ) );
								    ?>

								    <?php if ( get_theme_mod( 'fotomag_set_pages_sharing', false ) == true ) { fotomag_sharing_block(); } ?>

								</section>

								<footer class="article-footer">

							        <?php if ( get_theme_mod( 'fotomag_set_pages_comments', true ) == true ) { comments_template(); } ?>
							        
							    </footer> 

							</article>

						<?php endwhile; ?>

						<?php endif; ?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>