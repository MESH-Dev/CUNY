<?php if ( post_password_required() ) { return; } ?>

<div id="comments" class="cb-comments wrap cb-post-footer-block">

<?php if ( have_comments() ) : ?>

    <h3 id="comments-title" class="cb-block-title"><?php comments_number( esc_html__( 'No Comments', 'fotomag' ), esc_html__( 'One Comment', 'fotomag' ), esc_html__( '% Comments', 'fotomag' ) );?></h3>

    <ul class="commentlist cb-font-content">
      <?php
        wp_list_comments( array(
          'callback' => 'fotomag_comments'
        ) );

      ?>
    </ul>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav class="navigation comment-navigation">
      	<div class="comment-nav-prev"><?php previous_comments_link( esc_html__( '&larr; Previous Comments', 'fotomag' ) ); ?></div>
      	<div class="comment-nav-next"><?php next_comments_link( esc_html__( 'More Comments &rarr;', 'fotomag' ) ); ?></div>
    	</nav>
    <?php endif; ?>

<?php endif; ?>
<?php  if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
  <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'fotomag' ); ?></p>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
  <div class="cb-comment-form cb-border">
    <?php comment_form(); ?>
  </div>
<?php endif; ?>

</div>

<?php if ( comments_open() || ( have_comments() ) ) : ?>
  <span class="cb-separator wrap"></span>
<?php endif; ?>