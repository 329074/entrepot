<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<header class="page-header">
  <h1 class="title">
    <?php esc_html_e( 'Nothing Found', 'shoptown' ); ?>
  </h1>
</header>
<div class="page-content">
  <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
  <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'shoptown' ),shoptown_allowed_html()), admin_url( 'post-new.php' ) ); ?></p>
  <?php elseif ( is_search() ) : ?>
  <p>
    <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shoptown' ); ?>
  </p>
  <?php get_search_form(); ?>
  <?php else : ?>
  <p>
    <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'shoptown' ); ?>
  </p>
  <?php get_search_form(); ?>
  <?php endif; ?>
</div>
<!-- .page-content -->