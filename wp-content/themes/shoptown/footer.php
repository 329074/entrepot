<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<?php tm_content_after(); ?>
</div>
<!-- .main-content-inner -->
</div>
<!-- .main_inner -->
<?php tm_footer_before(); ?>
<footer id="colophon" class="site-footer">
	<?php if ( is_active_sidebar( 'footer-top-area' ) ) : ?>
			<div class="footer-top-outer">
				<div class="footer-top-inner">
					<?php dynamic_sidebar('footer-top-area'); ?>
				</div>
			</div>
	<?php endif; ?>
	  <div class="theme-container">
					<?php if (is_active_sidebar('footer-top-cms-area')) : ?>
				 <div class="footer_top">
					<?php dynamic_sidebar('footer-top-cms-area'); ?>
				</div>
				<?php endif; ?>
			<!-- .footer-bottom -->
		  <div class="footer_middle">
			<?php tm_footer_inside(); ?>
			<?php get_sidebar('footer'); ?>
			<!-- .footer-bottom -->
		  </div>
		  <?php if (is_active_sidebar('fifth-footer-widget-area')) : ?>
				<div class="footer_bottom">	
					<?php dynamic_sidebar('fifth-footer-widget-area'); ?>
				</div>
				<?php endif; ?>
			</div>	
			<div class="footer-bottom-container">	
			
				<div class="theme-container">
				
			   <div class="footer_left">			  
					  <div class="site-info">  <?php esc_html__( 'Copyright', 'shoptown' ); ?> &copy; <?php echo esc_attr(date('Y')); ?> <a href="<?php echo esc_url(get_option('tm_footer_link')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr(get_option('tm_footer_slog'));?>
						</a>
						<?php do_action( 'shoptown_credits' ); ?>
					  </div>
				</div>
				<?php if (is_active_sidebar('sixth-footer-widget-area')) : ?>
				<div class="footer_right">	
					<?php dynamic_sidebar('sixth-footer-widget-area'); ?>
				</div>
				<?php endif; ?>
			  </div>
		</div>
  <!--. Footer inner -->
</footer>
<!-- #colophon -->
<?php tm_footer_after(); ?>
</div>
</div>
<!-- #main -->
<!-- #page -->
<?php shoptown_go_top(); ?>
<?php shoptown_get_widget('before-end-body-widget'); ?>
<?php wp_footer(); ?>
</body>
</html>