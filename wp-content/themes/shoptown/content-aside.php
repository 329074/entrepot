<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-main-content">
<?php if ( is_search() || !is_single()) : // Only display Excerpts for Search and not single pages ?>
<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>

	<?php 
	$postImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	?>

	<div class="entry-thumbnail  <?php if(empty($postImage)): ?> non <?php endif; ?>">
		<span class="blog-icon-outer"> <span class="blog-icon"></span></span>
		<?php 
		the_post_thumbnail('shoptown-blog-posts-list');
		$postImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		?>
		<?php 
		if(!empty($postImage)): ?>
					<div class="block_hover">
						<div class="links">
							<a href="<?php echo esc_url($postImage); ?>" title="<?php esc_html_e( 'Click to view Full Image', 'shoptown' );?>" data-lightbox="example-set" class="icon mustang-gallery"><i class="fa fa-plus"></i></a> <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_html_e( 'Click to view Read More', 'shoptown' );?>" class="icon readmore"><i class="fa fa-link"></i></a> 
						</div>
					</div>
		<?php endif; ?>
	</div>

<?php else : ?>

		<div class="entry-thumbnail  <?php if(empty($postImage)): ?> non <?php endif; ?>">
		<span class="blog-icon-outer"> <span class="blog-icon"></span></span>
		<?php  if ($postImage = shoptown_get_first_post_images(get_the_ID())):?>			 
			<span class="shoptown-blog-posts-list"><img src="<?php echo esc_url($postImage); ?>"></span>
		<?php 
		if(!empty($postImage)): ?>
				<div class="block_hover">
					<div class="links">
						<a href="<?php echo esc_url($postImage); ?>" title="<?php esc_html_e( 'Click to view Full Image', 'shoptown' );?>" data-lightbox="example-set" class="icon mustang-gallery"><i class="fa fa-plus"></i></a> <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_html_e( 'Click to view Read More', 'shoptown' );?>" class="icon readmore"><i class="fa fa-link"></i></a> 
					</div>
				</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
<?php endif; ?>
<div class="entry-main-header">		
<?php 
if( $post->post_title == '' ) : 
$entry_meta_class = "empty-entry-header";
else :
$entry_meta_class = "";
endif; ?>
<header class="entry-header <?php echo esc_attr($entry_meta_class); ?>">					
<h1 class="entry-title"> <a href="<?php esc_url(the_permalink()); ?>" rel="bookmark">
<?php the_title(); ?>
</a><?php shoptown_sticky_post(); ?></h1>					
</header><!-- entry-header -->

<div class="entry-content-inner"> 
<div class="entry-meta-inner">    
<div class="entry-meta">	
<div class="entry-content-date">
<?php shoptown_post_entry_date(); ?>
</div>											
<?php shoptown_author_link(); ?>								
<?php shoptown_comments_link(); ?>														
</div><!-- entry-meta -->
</div><!-- entry-meta-inner -->
</div><!-- entry-content-inner -->
</div><!-- entry-main-header -->	

<?php endif; ?>

<div class="entry-content-other">	
<?php if ( is_search() || !is_single()) : // Only display Excerpts for Search and not single pages ?>

<div class="entry-summary">
<div class="excerpt"> <?php echo shoptown_posts_short_description(); ?> </div>
</div><!-- entry-summary -->
<?php else : ?>
<div class="entry-main-header">				
<?php 
if( $post->post_title == '' ) : 
$entry_meta_class = "empty-entry-header";
else :
$entry_meta_class = "";
endif; ?>
<header class="entry-header <?php echo esc_attr($entry_meta_class); ?>">					
<h1 class="entry-title"> 
<?php the_title(); ?>
<?php shoptown_sticky_post(); ?> </h1>					
</header><!-- .entry-header -->

<div class="entry-content-inner"> 
<div class="entry-meta-inner">    
<div class="entry-meta">	
<div class="entry-content-date">
<?php shoptown_post_entry_date(); ?>
</div>						  							
<?php shoptown_author_link(); ?>																										
<?php shoptown_tags_links(); ?>											
<?php shoptown_categories_links(); ?>
<?php edit_post_link( esc_html__( 'Edit', 'shoptown' ), '&nbsp;&nbsp;|&nbsp;&nbsp;<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>	
</div><!-- .entry-meta -->
</div><!-- .entry-meta-inner -->
</div><!-- .entry-content-inner -->
</div><!-- .entry-main-header -->

<div class="entry-content">
<?php 
the_post_thumbnail('shoptown-blog-posts-list');
$postImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
?>
<?php the_content( wp_kses( __('Continue reading <span class="meta-nav">&rarr;</span>', 'shoptown' ),shoptown_allowed_html())); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'shoptown' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
</div><!-- .entry-content -->

<?php endif; ?>
</div> <!-- entry-content-other -->
</div>
</article>
<!-- #post -->