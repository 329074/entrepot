<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
get_header(); ?>

<div id="main-content" class="main-content blog-page blog-list">
<div class="main-content-inner">

<?php if (get_option('tm_page_sidebar') == 'yes') : ?>
<section id="primary" class="content-area">
<?php else : ?>
<section id="primary" class="main-content-inner-full">
<?php endif; ?>
 <div class="page-title"><div class="page-title-inner"><h1 class="entry-title-main"><?php printf( esc_html__( 'Category Archives: %s', 'shoptown' ), single_cat_title( '', false ) ); ?></h1>
	<?php shoptown_breadcrumbs(); ?></div>
	</div>
  <div id="content" class="site-content" role="main">
    <?php if ( have_posts() ) : ?>
    
    <!-- .archive-header -->
    <?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
					endwhile;
					// Previous/next page navigation.
					shoptown_paging_nav();
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
				endif;
			?>
  </div>
  <!-- #content -->
</section>
<!-- #primary -->


<?php
if (get_option('tm_page_sidebar') == 'yes') : 
	get_sidebar( 'content' );
	get_sidebar();
endif;  ?>
</div><!--main-content-inner -->
</div><!-- main-content -->
<?php 
get_footer(); ?>