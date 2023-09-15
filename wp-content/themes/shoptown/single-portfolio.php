<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
?>
<?php
//taxonomy
$taxonomy = 'portfolio_categories';
$link_page= '';
//category link
$terms = get_the_terms($post->ID, $taxonomy);
$i=0;
foreach ($terms as $taxindex => $taxitem) {
	if($i==0):
		$link_cat=get_term_link($taxitem->slug,$taxonomy);
		$term_slug = $taxitem->slug;
		$term_id = $taxitem->term_id;    
	endif;
$i++;
}
?>
<?php get_header(); ?>
<!--Start #primary-->
<?php if (get_option('tm_page_sidebar') == 'yes') : ?>
<div id="primary" class="content-area  image-attachment">
<?php else : ?>
<div id="primary" class="main-content-inner-full">
<?php endif; ?>
  <div class="page-title"><div class="page-title-inner"><h1 class="entry-title-main"><?php  the_title();?></h1>
	<?php shoptown_breadcrumbs(); ?></div>
	</div>
  <!--Start #content-->
  <div id="content" role="main">    
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'shoptown' ), 'after' => '</div>' ) ); ?>
      </div>
      <!-- .entry-content -->
      <div class="entry-utility-port">
        <?php edit_post_link( esc_html__( 'Edit', 'shoptown' ), '<span class="edit-link">', '</span>' ); ?>
      </div>
      <!-- .entry-utility -->
      <?php if ( comments_open() ) : ?>
      <?php comments_template( '', true ); ?>
      <?php endif; ?>
    </div>
    <!-- #post-## -->
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- End #content -->
</div>
<!-- End #primary-->
<?php 
if (get_option('tm_page_sidebar') == 'yes') : 
		get_sidebar( 'content' );
		get_sidebar();
	endif; 
 get_footer(); ?>