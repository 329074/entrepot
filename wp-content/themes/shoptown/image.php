<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();
get_header();
?>

  
<?php if (get_option('tm_page_sidebar') == 'yes') : ?>
<section id="primary" class="content-area  image-attachment">
<?php else : ?>
<section id="primary" class="main-content-inner-full">
<?php endif; ?>
<div class="page-title"><div class="page-title-inner"><h1 class="entry-title-main"><?php  the_title();?></h1>
	<?php shoptown_breadcrumbs(); ?></div>
	</div>
    <div id="content" class="site-content" role="main">
      <?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
	?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
       
        
          <div class="entry-main-content"> 
		  
		  		
				<div class="entry-content-inner">
				<?php shoptown_post_entry_date(); ?>
				<span class="full-size-link"><a href="<?php echo esc_url(wp_get_attachment_url()); ?>"><?php echo esc_attr($metadata['width']); ?> &times; <?php echo esc_attr($metadata['height']); ?></a></span> <span class="parent-post-link"><a href="<?php echo esc_url(get_permalink( $post->post_parent )); ?>" rel="gallery"><?php echo esc_attr(get_the_title( $post->post_parent )); ?></a></span>
            <?php edit_post_link( esc_html__( 'Edit', 'shoptown' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
          
          <!-- .entry-meta -->
     
        <!-- .entry-header -->
        
          <div class="entry-attachment">
            <div class="attachment">
              <?php shoptown_the_attached_image(); ?>
            </div>
            <!-- .attachment -->
            <?php if ( has_excerpt() ) : ?>
            <div class="entry-caption">
              <?php the_excerpt(); ?>
            </div>
            <!-- .entry-caption -->
            <?php endif; ?>
          </div>
          <!-- .entry-attachment -->
          <?php
				the_content();
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'shoptown' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
        </div>
		
        <!-- .entry-content -->
      </article>
      <!-- #post-## -->
      <nav id="image-navigation" class="navigation image-navigation">
        <div class="nav-links">
          <?php previous_image_link( false, '<div class="previous-image">' . esc_html__( 'Previous Image', 'shoptown' ) . '</div>' ); ?>
          <?php next_image_link( false, '<div class="next-image">' . esc_html__( 'Next Image', 'shoptown' ) . '</div>' ); ?>
        </div>
        <!-- .nav-links -->
      </nav>
      <!-- #image-navigation -->
      <?php comments_template(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
    <!-- #content -->
</section>
  <!-- #primary -->
  <?php 
  	if (get_option('tm_page_sidebar') == 'yes') : 
		get_sidebar( 'content' );
		get_sidebar();
	endif; ?>
<!--main-content-inner -->
<?php get_footer(); ?>