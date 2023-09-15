<?php 
// Add woocommerce support theme
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
// Disables woocommerce style
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment'); 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;	
	ob_start();	
	?>
<a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'shoptown'); ?>"><?php echo sprintf(_n('(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'shoptown'), $woocommerce->cart->cart_contents_count);?></a>
<?php	
	$fragments['a.cart-contents'] = ob_get_clean();	
	return $fragments;	
}
// Change the breadcrumb delimeter from '/' to '>'
add_filter( 'woocommerce_breadcrumb_defaults', 'tm_change_breadcrumb_delimiter' );
function tm_change_breadcrumb_delimiter( $defaults ) {
$defaults['delimiter'] = ' / ';
$defaults['before'] = '<span>';
$defaults['after'] = '</span>';
return $defaults;
}
// Display products per page
function cols( $tm_shop_items ) {
	$tm_shop_items = get_option('tm_shop_items');
    return $tm_shop_items;
}
add_filter( 'loop_shop_per_page','cols', 20 ); 
// Change number or products per row
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return get_option('tm_shop_items_per_row'); // products per row	
	}	
}
add_filter('loop_shop_columns', 'loop_columns');?>