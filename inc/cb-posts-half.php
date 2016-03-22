<?php /* Posts loop - Half Width*/ ?>
<?php $fotomag_post_id = $post->ID; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(  array('cb-style-1', 'cb-bs', 'cb-s', 'clearfix' ) ); ?>>
	
	<?php fotomag_cover_thumbnail( 870, 580, $fotomag_post_id ); ?>
		
	<div class="cb-meta">
		
		<?php fotomag_post_category( $fotomag_post_id ); ?>
        <h2 class="cb-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php fotomag_post_formats_embed(); ?>

    </div>
    
    <a href="<?php the_permalink(); ?>" class="cb-link"></a>

</article>