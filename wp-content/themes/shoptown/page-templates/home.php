<?php
/* Template Name: Home */ 
?>
<?php 
get_header();
?>
<div id="main-content" class="main-content home-page <?php echo esc_attr(tm_sidebar_position()); ?> <?php echo esc_attr(tm_page_layout()); ?>">
  <?php
	if ( is_front_page() && shoptown_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
<?php if (get_option('tm_page_sidebar') == 'yes') : ?>
<div id="primary" class="content-area">
<?php else : ?>
<div id="primary" class="main-content-inner-full">
<?php endif; ?> 
    <div id="content" class="site-content" role="main">
      <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					// Include the page content template.
					get_template_part( 'content', 'page' ); ?>
      <?php endwhile;
			?>
    </div>
    <!-- #content -->
  </div>
  <!-- #primary -->
 <?php 
 if (get_option('tm_page_sidebar') == 'yes') : 
	get_sidebar( 'content' );
	get_sidebar();
endif;  ?>
</div>
<!-- #main-content -->
<?php get_footer(); ?>