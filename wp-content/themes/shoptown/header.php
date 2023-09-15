<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Templatemela
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

<?php tm_header(); ?>
 	
<?php wp_head();?> 
</head>
<body <?php body_class(); ?>>

<?php if ( get_option('tm_control_panel') == 'yes' ) do_action('tm_show_panel'); ?>

<div id="page" class="hfeed site">

<?php if ( get_header_image() ) : ?>
<div id="site-header"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="<?php echo esc_html_e('Siteheader','shoptown'); ?>"> </a> </div>
<?php endif; ?>
<!-- Header -->
	<?php if (get_option('tm_top_cms_banner')== 'yes') : ?>
		<div class="header-top-banner">
			<div class="header-top-inner">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php shoptown_get_top_cms_banner(); ?></a>
				<div class="close-btn"></div>
			</div>
		</div>
  	<?php endif; ?>
	
<?php tm_header_before(); ?>
<header id="masthead" class="site-header  <?php echo "header".esc_attr(get_option('tm_header_layout'));  ?> <?php echo esc_attr(tm_sidebar_position()); ?>">
	<?php if (get_option('tm_show_topbar') == 'yes') : ?>
    <div class="topbar-outer">
    	<div class="topbar-main theme-container">													
					<?php $welcome_text = get_option('tm_topbar_welcome_text');
						 if(!empty($welcome_text)):?>
							<span class="site-welcome-message"><span><?php echo esc_attr(get_option('tm_topbar_welcome_text'))."&nbsp;".get_bloginfo( 'name' ); ?></span></span>
					<?php endif; ?>
					<div class="topbar-link">
						<span class="topbar-link-toggle"></span>
					 <div class="topbar-link-wrapper">
						<?php if ( has_nav_menu('header-menu') ) { ?>    
						<div class="header-menu-links">						
								<?php 
								// Woo commerce Header Cart
								$tm_header_menu =array(
								'menu' => esc_html__('TM Header Navigation','shoptown'),
								'depth'=> 1,
								'echo' => false,
								'menu_class'      => 'header-menu', 
								'container'       => '', 
								'container_class' => '', 
								'theme_location' => 'header-menu'
								);
								echo wp_nav_menu($tm_header_menu);				    
								?>
						</div>
						<?php } ?> 				
						</div>
					</div>
   		</div>
	</div>
  	<?php endif; ?>
	
  <div class="site-header-main">
  <div class="theme-container">
    <div class="header-main">				
		<div class="header-left">
			<div class="header-logo">
			<?php if (get_option('tm_logo_image') != '') : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php shoptown_get_logo(); ?>
				</a>
			<?php else: ?>
				<h1 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
			<?php endif; ?>
			<?php if(get_option('tm_showsite_description') == 'yes') : ?>
				<h2 class="site-description">
					<?php bloginfo( 'description' ); ?>
				</h2>
			<?php endif; // End tm_showsite_description ?>
			</div>
			
			<div class="header-mob-logo">
			<?php if (get_option('tm_mob_logo_image') != '') : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php shoptown_get_mob_logo(); ?>
				</a>
			<?php else: ?>
				<h1 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
			<?php endif; ?>
			<?php if(get_option('tm_showsite_description') == 'yes') : ?>
				<h2 class="site-description">
					<?php bloginfo( 'description' ); ?>
				</h2>
			<?php endif; // End tm_showsite_description ?>
			</div>
		</div><!-- End header_center -->
		
      	<?php tm_header_inside(); ?>
		<div class="header-right">				
			 <?php if (get_option('tm_show_topbar_contact') == 'yes') : ?>
			 	<div class="header-contact">
					<?php shoptown_get_topbar_contact(); ?>
				</div>
			<?php endif; ?>
		</div><!-- End header_right -->		
		 <div class="header-center">

		
		<nav id="site-navigation" class="navigation main-navigation">																			
				<h3 class="menu-toggle"><?php esc_html_e( 'Menu', 'shoptown' ); ?></h3>
				<a class="screen-reader-text skip-link" href="#content" title="<?php esc_html_e( 'Skip to content', 'shoptown' ); ?>"><?php esc_html_e( 'Skip to content', 'shoptown' ); ?></a>	
				<div class="mega-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'mega' ) ); ?>			
			</div>	
			<div class="mobile-menu">		
				<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'mobile-menu-inner') ); ?>
			</div>	
		</nav><!-- #site-navigation -->
						

</div><!-- End navigation-bar -->
					    
  </div><!-- End header-main -->
  			  
</div>

</div><!-- End site-header-main -->

<?php if (is_active_sidebar('home-category') || is_active_sidebar('header-search') || is_active_sidebar('header-widget')) : ?>
		<div class="navigation-bar navigation-block ">
		  <div id="navbar-cat" class="header-bottom navbar default theme-container">
		  <nav id="site-navigation-cat" class="navigation main-navigation">	
										<?php if (is_active_sidebar('home-category')) : ?>
									<div class="box-category-heading">
							<div class="box-category">
								<span class="heading-img"></span><?php echo get_option( 'tm_navbar_category_title' ); ?>
							</div>
						</div>
				<?php endif; ?>	
				
			
				<div class="quick-access search">
				
						<?php if (is_active_sidebar('header-search')) : ?>
							<div class="header-search">
								<?php shoptown_get_widget('header-search');  ?>	
							</div>
						<?php endif; ?>	
							
						</div>
					<div class="header-cart">
						<?php 
							// Woo commerce Header Cart
							if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && is_active_sidebar('header-widget') ) : ?>
							
							<div class="cart togg">
							<?php global $woocommerce;
							ob_start();?>						
							<div id="shopping_cart" class="shopping_cart tog" title="<?php esc_html_e('View your shopping cart', 'shoptown'); ?>">
							
							<a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'shoptown'); ?>"><?php echo sprintf(_n('(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'shoptown'), $woocommerce->cart->cart_contents_count);?></a>
							</div>	
							<?php global $woocommerce; ?>
							<?php shoptown_get_widget('header-widget'); ?>		
						</div>							
					<?php endif; ?>	
					</div>
					
					
				</nav><!-- #site-navigation -->
			</div>
		</div>
		<?php endif; ?>	
		
		
</header>
<!-- #masthead -->	
<?php tm_header_after(); ?>
<?php tm_main_before(); ?>
	<?php 
		$tm_page_layout = tm_page_layout(); 
		if( isset( $tm_page_layout) && !empty( $tm_page_layout ) ):
		$tm_page_layout = $tm_page_layout; 
		else:
		$tm_page_layout = '';
		endif;
	?>
<!-- Center -->
<?php 
$shop = '0';
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	if(is_shop())
		$tm_page_layout = 'wide-page';
		$shop = '1';
	endif;
?>


<!-- end mainbanner sidebanner -->
<div id="main" class="site-main">
<div class="main_inner">

	<?php if (in_array( 'revslider/revslider.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  || is_active_sidebar('home-banners') || get_option('tm_service_block') == 'yes') : ?>
	<div class="main-container category <?php echo esc_attr(tm_sidebar_position());?> 
	<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :    
		if (get_option('tm_shop_sidebar') == 'yes') : ?>single-product-sidebar<?php else: ?>single-product-full<?php	endif;  ?>
    <?php endif; ?>">
	   <div class="main-inner-container">
			
		<!-- category block -->
			<?php if (is_active_sidebar('home-category')) : ?>
				<div class="home-category one_fifth widget_product_categories">
					<?php shoptown_get_widget('home-category');  ?>	
				</div>
			<?php endif; ?>	
		<!-- end category block -->
		
		<?php if (is_page_template('page-templates/home.php') ) : ?>
			<div class="mainbanner-sidebanner-inner col-main">
				<!--  main slider -->
				 <?php if ( in_array( 'revslider/revslider.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>	
					 <div class="mainbanner">
						<div id="revolutionslider">
								<div class="revolutionslider-inner">
									<?php echo do_shortcode('[rev_slider '.get_option('tm_revslider_alias').']'); ?>
								</div>
						</div>			
					</div>
				<?php endif; ?>
				<!-- End main slider -->
				<!-- sidebar banner -->
				<?php if (is_active_sidebar('home-banners')) : ?>
					<div class="sidebanner">
							<div class="home-banners">
								<?php shoptown_get_widget('home-banners');  ?>	
							</div>
					</div>
				<?php endif; ?>	
				<!-- end sidebar banner -->
			</div>
			<!-- Service Banner -->
				<?php if (get_option('tm_service_block') == 'yes') : ?>
						<?php shoptown_get_topbar_banner(); ?>
				<?php endif; ?>
			<!-- end Service Banner -->
		<?php endif; ?>
		
		</div>
	</div>
	<?php endif; ?>
</div>
<?php 
	
if ( is_page_template('page-templates/home.php') || $tm_page_layout == 'wide-page' ) : ?>
	
	<div class="main-content-inner-full">
	<?php else: 
		if(is_archive() || is_tag() || is_404()) : ?>
			<div class="main-content">
		<?php else : ?>
			<div class="main-content-inner <?php echo esc_attr(tm_sidebar_position()); ?>">
		<?php endif; ?>
	<?php endif; ?>
<?php tm_content_before(); ?>