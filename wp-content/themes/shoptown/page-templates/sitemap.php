<?php
/* Template Name: SiteMap Page */
?>
<?php get_header(); ?>
<div id="main-content" class="main-content blog-page blog-filter <?php echo esc_attr(tm_sidebar_position()); ?>">
   	<?php if (get_option('tm_page_sidebar') == 'yes') : ?>
	<div id="primary" class="content-area">
	<?php else : ?>
	<div id="primary" class="main-content-inner-full">
	<?php endif; ?>
	<div class="page-title"><div class="page-title-inner"><h1 class="entry-title-main"><?php  the_title();?></h1>
	<?php shoptown_breadcrumbs(); ?></div>
	</div>
    <div id="content" class="site-content sitemap" role="main">
      <!-- Start archive-content -->
      <div class="archive-content">
      
			<div class="sitemap-item">
			  <div class="sitemap-pages">
				<h2>
				  <?php esc_html_e('Pages','shoptown');?>
				</h2>
				<ul>
				  <?php wp_list_pages('depth=0&sort_column=post_title&title_li=' ); ?>
				</ul>
			  </div>
			  </div>
       
        
		<div class="sitemap-item">
			  <div class="sitemap-category">
				<h2>
				  <?php esc_html_e( 'Category Archives','shoptown'); ?>
				</h2>
				<ul>
				  <?php wp_list_categories( array( 'feed' => esc_html__( 'RSS', 'shoptown' ), 'show_count' => true, 'use_desc_for_title' => false, 'title_li' => false ) ); ?>
				</ul>
			  </div>
			  <div class="clear"></div>
			  <div class="sitemap-month-archieves">
				<h2>
				  <?php esc_html_e( 'Monthly Archives','shoptown'); ?>
				</h2>
				<ul>
				  <?php wp_get_archives('type=monthly'); ?>
				</ul>
			  </div>
			  <div class="clear"></div>
			  <div class="sitemap-authors">
				<h2>
				  <?php esc_html_e( 'Author Archives','shoptown'); ?>
				</h2>
				<ul>
				  <?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0'); ?>
				</ul>
			  </div>
			 </div>
      
     
		<div class="sitemap-item">
          <div class="sitemap-posts">
            <h2>
              <?php esc_html_e( 'Blog Posts','shoptown'); ?>
            </h2>
            <ul>
              <?php 
				$archivesquery = new WP_Query('showposts=20');
				while ($archivesquery->have_posts()) : $archivesquery->the_post(); ?>
              <li> <a href="<?php the_permalink() ?>"  rel="bookmark" title="<?php printf( esc_html__("Permanent Link to %s", 'shoptown'), get_the_title() ); ?>">
                <?php the_title(); ?>
                </a> (
                <?php comments_number('0', '1', '%'); ?>
                ) </li>
              <?php endwhile; ?>
            </ul>
          </div>
		  </div>
      
      </div>
      <!-- End archive-content -->
    </div>
    <!--End #content -->
  </div>
  <!-- End #primary -->
 <?php 
  	if (get_option('tm_page_sidebar') == 'yes') : 
	get_sidebar();
endif;  ?>
</div>
<?php get_footer(); ?>