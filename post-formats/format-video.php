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

    <?php if ( get_theme_mod( 'fotomag_set_post_tags', true ) == true ) { the_tags('<p class="cb-tags"> ', '', '</p>'); } ?>

    <?php if ( get_theme_mod( 'fotomag_set_post_sharing', true ) == true ) { fotomag_sharing_block(); } ?>

</section>