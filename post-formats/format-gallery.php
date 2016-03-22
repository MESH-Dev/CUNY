<?php $fotomag_post_id = fotomag_get_post_id(); ?>
<?php $fotomag_gallery_post_images =  get_post_meta( $fotomag_post_id, '_format_gallery_images', true ); ?>
<?php if ( ! empty( $fotomag_gallery_post_images ) ) { ?>
    <div id="cb-fis-wrap" class="cb-gallery-wrap cb-hide-bars">
        <div id="cb-fis" class="cb-fis cb-style-fis cb-style-1 cb-fis-slider">

            <div class="cb-meta">

                <?php fotomag_post_category(); ?>
                <h1 class="cb-post-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
                
            </div>
           
            <div id="cb-fis-gallery">

                <?php foreach ( $fotomag_gallery_post_images as $fotomag_each_image ) { ?>
                    <?php $fotomag_image = wp_get_attachment_image_src( $fotomag_each_image, 'full' ); ?>

                    <span class="cb-slider-image cb-slider-hidden"><img src="<?php echo esc_url( $fotomag_image[0] ); ?>">

                        <?php if ( get_post($fotomag_each_image)->post_excerpt != NULL ) { ?>
                            <span class="cb-caption cb-font-body"><?php echo get_post($fotomag_each_image)->post_excerpt ; ?> </span>
                        <?php } ?>

                    </span>

                <?php } ?>

            </div>

           
        </div>

    </div>

<?php } else { ?>

    <?php fotomag_featured_image(); ?>

<?php } ?>


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