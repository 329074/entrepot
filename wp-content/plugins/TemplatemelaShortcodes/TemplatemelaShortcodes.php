<?php
 /*
Plugin Name: Templatemela Shortcode
Plugin URI: http://www.templatemela.com
Description: Templatemela Custom Shortcodes for templatemela wordpress themes.
Version: 1.0
Author: Templatemela
Author URI: http://www.templatemela.com
Text Domain: templatemela-shortcode
*/

/***************** accordion ****************/
function shortcode_accordion($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'style'	=> '1'	
	), $atts));
	
	$output = '';
	$output .= '<div class="accordion style'.$style.'">';
	$output .=	do_shortcode($content);
	$output .=	'</div>';
	return $output;
}
add_shortcode('tm_accordion', 'shortcode_accordion');

function shortcode_simple_accordion($atts, $content = null) {
	extract(shortcode_atts(array(	
	'style'	=> '1'	
	), $atts));
	
	$output = '';
	$output .= '<div id="accordion" class="simple_accordion style-'.$style.'">';
	$output .=	do_shortcode($content);
	$output .=	'</div>';
	return $output;
}
add_shortcode('tm_simple_accordion', 'shortcode_simple_accordion');


function shortcode_simple_accordiondata($atts, $content = null) {
	extract(shortcode_atts(array(
		'text'	=> '',
		'classname'=>'',		
	), $atts));
	
	$output = '';
	$output .= '<div class="accordion-wrapper '.$classname.'"><span class="accordion-icon"></span><div class="accordion-container"><span class="accordion-toggle">'.$text.'';
	$output .=	'</span>';
	$output .= '<div class="accordion-content">';
	$output .=	do_shortcode($content);
	$output .=	'</div></div></div>';
	return $output;
}
add_shortcode('tm_simple_accordiondata', 'shortcode_simple_accordiondata');

function shortcode_single_accordion($atts, $content = null)
{
	extract(shortcode_atts(array(
			'title' => 'Click here to hide/show Div'
		), $atts));
		$output = '';
		$output .= '<div class="single_accordion">';
		$output .= '<a class="tog" href="#"><div class="accordion-title"><span class="icon"></span>'.$title.'</div></a>';
		$output .= '<div class="tab_content">'.do_shortcode($content).'</div>';
		$output .=	'</div>';
		return $output;
	}
add_shortcode('accordion', 'shortcode_single_accordion');
/***************** Toggle ****************/
function shortcode_toggle($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'style'	=> '1'	
	), $atts));
	
	$output = '';
	$output .= '<div class="toggle style'.$style.'">';
	$output .=	do_shortcode($content);
	$output .=	'</div>';
	return $output;
}
add_shortcode('tm_toggle', 'shortcode_toggle');
function shortcode_single_toggle($atts, $content = null)
{
	extract(shortcode_atts(array(
			'title' => 'Click here to hide/show Div'
		), $atts));
		$output = '';
		$output .= '<div class="single_toggle toogle_div">';
		$output .= '<a class="tog" href="#"><div class="toggle-title"><span class="icon"></span>'.$title.'</div></a>';
		$output .= '<div class="tab_content">'.do_shortcode($content).'</div>';
		$output .=	'</div>';
		return $output;
	}
add_shortcode('toggle', 'shortcode_single_toggle');
/***************** Horizontal Tab ****************/
$maintab_div = '';
function tabs_group($atts, $content = null ) {
    global $maintab_div;
	 extract(shortcode_atts(array(  
        'tab_type' => 'horizontal', 
		'style'	=> '1'	
    ), $atts));  
	
	switch ($tab_type) {
        case 'vertical' :
            $element_class = 'vertical_tab';
            break;
        default :
            $element_class = 'horizontal_tab';
            break;
        break;
    }
	
	
    $maintab_div = '';
    $output = '<div id="'.$element_class.'" class="'.$element_class.' style'.$style.'"><div id="tab" class="tab"><ul class="tabs">';
    $output.= do_shortcode($content).'</ul>';
    $output.= '<div class="tab_groupcontent">'.$maintab_div.'</div></div></div>';
    return $output;  
}  
add_shortcode('tm_tabs', 'tabs_group');
function tab($atts, $content = null) {  
    global $maintab_div;
	
	static $oddeven_class=0;
	$oddeven_class++;
	$newclass = '';
	$output = ''; 
    if($oddeven_class % 2 == 0) { $newclass .= "even"; } else  { $newclass .= "odd"; }
	
	extract(shortcode_atts(array(  
        'title' => '', 
    ), $atts));  
	$dummy_title = "'. __( 'Tab', 'tm' ) .'";
	
	if($title != NULL) { 
			$output .= '<li class="'.$newclass.'"><a href="#">'.$title.'<span class="leftarrow"></span></a></li>';			
	} else {
			$output .= '<li class="'.$newclass.'"><a href="#">'.$dummy_title.'<span class="leftarrow"></span></a></li>';			
	}
    $maintab_div.= '<div class="tabs_tab">'.$content.'</div>';
    return $output;
}
add_shortcode('tm_tab', 'tab');

/***************** Custom Testimonial ****************/
function shortcode_custom_testimonials($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => '1',
		'type' => 'slider',
		'items_per_column' => 3,
		'number_of_posts' => 5,		
		'image_width' => 50,
		'image_height' => 50,
		'background_color' => ''
	), $atts));
	
	global $post;	
	$i = 1;
	$args = array(
			'posts_per_page' => $number_of_posts,
			'post_status' => 'publish',
			'post_type' => 'testimonial',
		);					
	$testimonial_array = get_posts($args);
	$testimonial_count = count($testimonial_array);
	$output = '';
	if($testimonial_count > 0 ):
	$output .= '<div class="custom-testimonial">';		
	if($type == "slider") { 
		if($testimonial_count > $items_per_column)
			$output .= '<div id="'.$items_per_column.'_testimonial_carousel" class="testimonial-carousel">';
		else
			$output .= '<div id="testimonial_grid" class="testimonial-grid testimonial-cols-'.$items_per_column.'">';
	} else if($type == "grid") {
		$output .= '<div id="testimonial_grid" class="testimonial-grid testimonial-cols-'.$items_per_column.'">';
	} else if($type == "list") {
		$output .= '<div id="testimonial_list" class="testimonial-list">';
	}
	$i = 1;
	$temp2 = 0;
	foreach($testimonial_array as $post) : setup_postdata($post);	
		get_post_meta($post->ID, 'testimonial_position', TRUE) ? $testimonial_position = get_post_meta($post->ID, 'testimonial_position', TRUE) : $testimonial_position = '';
		get_post_meta($post->ID, 'testimonial_link', TRUE) ? $testimonial_link = get_post_meta($post->ID, 'testimonial_link', TRUE) : $testimonial_link = '';		
		$contents = strip_tags(shoptown_strip_images($post->post_content));
		if($i % $items_per_column == 1)
			$class = " first-item";	
		elseif($i % $items_per_column == 0)
			$class = " last-item";
		else
			$class = "";
			
	    		
		$output .= '<div class="item'.$class.'">';					
		$output .= '<div class="product-block">';
			$output .= '<div class="custom-testimonial-inner">';											
					$output .= '<div class="testmonial-image">';
					if ( has_post_thumbnail() && ! post_password_required() ) :	
						$post_thumbnail_id = get_post_thumbnail_id();
						$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
						$output .= '<img src="'.shoptown_mr_image_resize($post_thumbnail_url, $image_width, $image_height, true, 'left', false).'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
					else:
						$output .= '<i style="width:'.$image_width.';height:'.$image_height.';" class="fa fa-user"></i>';
					endif;			
					$output .= '</div>';						
				
				
				$output .= '<div class="testimonial-wrapper">';
				
				$output .= '<div class="testmonial-text">';			
					$output .= '<div class="testimonial-title">'.get_the_title().'</div>';
					if(!empty($testimonial_position)):
						if(!empty($testimonial_link)):
							$output .= '<div class="testimonial-designation"><a title="'.$testimonial_position.'" href="'.$testimonial_link.'" >'.$testimonial_position.'</a></div>';	
						else:
							$output .= '<div class="testimonial-email">'.$testimonial_position.'</div>';
						endif;
					endif;
				$output .= '</div>';	
				$output .=  '<div class="testimonial-content">';
					$output .= '<div class="testimonial-top"><blockquote><q>'.substr($contents, 0, 150).'</q></blockquote></div>';					
				$output .= '</div></div>';
					 
			$output .= '</div>';
		$output .= '</div>';
			
		$output .= '</div>';		
		
		$i++;
	endforeach;
	$output .= '</div>';
	$output .= '</div>';
	else:
	$output .= '<div class="no-result">'.esc_html__('No results found...', 'shoptown').'</div>';
	endif;
	wp_reset_query();
	return $output;
}
add_shortcode('tm_custom_testimonials', 'shortcode_custom_testimonials');

/***************** Our Team ****************/
function shortcode_ourteam($atts, $content = null) {
   extract(shortcode_atts(array(
		'type' => 'grid',
		'items_per_column' => 4,
		'number_of_posts' => -1
	), $atts));
	
	global $post;	
	$i = 1;
	$output = '';
	wp_reset_postdata();
	$args = array(
		'posts_per_page' => $number_of_posts,
		'post_status' => 'publish',
		'post_type' => 'staff',
		'orderby' => 'date'
	);		
	
	$output = '';
	$team_array = new WP_Query( $args );
				
	if ( $team_array->have_posts() ):
	$output .= '<div id="team-posts-products" class="team-posts-content staff-page posts-content">';	
	if($type == "slider") { 
		$output .= '<div id="'.$items_per_column.'_team_carousel" class="team-carousel">';
	} else {
		$output .= '<div id="team_grid" class="team-grid grid cols-'.$items_per_column.'">';
	}
	
	while ( $team_array->have_posts() ) : $team_array->the_post();
		get_post_meta(get_the_ID(), 'staff_position', TRUE) ? $staff_position = get_post_meta(get_the_ID(), 'staff_position', TRUE) : $staff_position = '';
		get_post_meta(get_the_ID(), 'staff_link', TRUE) ? $staff_link = get_post_meta(get_the_ID(), 'staff_link', TRUE) : $staff_link = '';
		get_post_meta(get_the_ID(), 'staff_phone', TRUE) ? $staff_phone = get_post_meta(get_the_ID(), 'staff_phone', TRUE) : $staff_phone = '';
		get_post_meta(get_the_ID(), 'staff_email', TRUE) ? $staff_email = get_post_meta(get_the_ID(), 'staff_email', TRUE) : $staff_email = '';
		get_post_meta(get_the_ID(), 'staff_twitter', TRUE) ? $staff_twitter = get_post_meta(get_the_ID(), 'staff_twitter', TRUE) : $staff_twitter = '';
		get_post_meta(get_the_ID(), 'staff_facebook', TRUE) ? $staff_facebook = get_post_meta(get_the_ID(), 'staff_facebook', TRUE) : $staff_facebook = '';
		get_post_meta(get_the_ID(), 'staff_google_plus', TRUE) ? $staff_google_plus = get_post_meta(get_the_ID(), 'staff_google_plus', TRUE) : $staff_google_plus = '';
		get_post_meta(get_the_ID(), 'staff_linkedin', TRUE) ? $staff_linkedin = get_post_meta(get_the_ID(), 'staff_linkedin', TRUE) : $staff_linkedin = '';
		get_post_meta(get_the_ID(), 'staff_youtube', TRUE) ? $staff_youtube = get_post_meta(get_the_ID(), 'staff_youtube', TRUE) : $staff_youtube = '';
		get_post_meta(get_the_ID(), 'staff_rss', TRUE) ? $staff_rss = get_post_meta(get_the_ID(), 'staff_rss', TRUE) : $staff_rss = '';
		get_post_meta(get_the_ID(), 'staff_pinterest', TRUE) ? $staff_pinterest = get_post_meta(get_the_ID(), 'staff_pinterest', TRUE) : $staff_pinterest = '';
		get_post_meta(get_the_ID(), 'staff_skype', TRUE) ? $staff_skype = get_post_meta(get_the_ID(), 'staff_skype', TRUE) : $staff_skype = ''; 
		
		$s = 0; 
		if(!empty($staff_link)) $s++;
		if(!empty($staff_email)) $s++; 
		if(!empty($staff_twitter)) $s++; 
		if(!empty($staff_facebook)) $s++; 
		if(!empty($staff_google_plus)) $s++; 
		if(!empty($staff_linkedin)) $s++; 
		if(!empty($staff_youtube)) $s++; 
		if(!empty($staff_rss)) $s++; 
		if(!empty($staff_pinterest)) $s++; 
		if(!empty($staff_skype)) $s++;	
		if($i % $items_per_column == 1 )
			$class = " first";
		elseif($i % $items_per_column == 0 )
			$class = " last";
		else
			$class = "";
		if ( has_post_thumbnail() && ! post_password_required() ) :	
			$post_thumbnail_id = get_post_thumbnail_id();
			$image = wp_get_attachment_url( $post_thumbnail_id );
		else:
			$image = get_template_directory_uri()."/images/placeholders/placeholder.jpg";
		endif;
		$src = shoptown_mr_image_resize($image, 600, 600, true, 't', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$src = shoptown_mr_image_resize($src, 600, 600, true, 't', false);
		endif;
			$output .= '<article class="item container'.$class.'">';
			$output .= '<div class="single-team container-inner">';
			$output .= '<div class="staff-image">';
			$output .= '<img src="'.$src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
			$output .= '<div class="staff-image-hover"></div>';
			$output .= '</div>';	
			$output .= '<div class="staff-content">';	
			$shorttitle = substr(the_title('','',FALSE),0,150);
			$output .= '<div class="team-content-box">';
			if(!empty($staff_position) && $staff_position != '')
			$output .= '<div class="staff-position"><span>'.$staff_position.'</span></div>';
			if(!empty($shorttitle) && $shorttitle != '')
			$output .= '<div class="staff-name">'.$shorttitle.'</div>';
			$output .= '<div class="staff-social icon-'.$s.'">';			
				if(!empty($staff_link) && $staff_link != '')
				$output .= '<a href="'.$staff_link.'" title="Website" class="website icon"><i class="fa fa-link"></i></a>';
				if(!empty($staff_email) && $staff_email != '')
				$output .= '<a href="mailto:'.$staff_email.'" title="Email" class="email icon"><i class="fa fa-envelope-o"></i></a>';
				if(!empty($staff_twitter) && $staff_twitter != '')
				$output .= '<a href="'.$staff_twitter.'" title="Twitter" class="twitter icon"><i class="fa fa-twitter"></i></a>';
				if(!empty($staff_facebook) && $staff_facebook != '')
				$output .= '<a href="'.$staff_facebook.'" title="Facebook" class="facebook icon"><i class="fa fa-facebook"></i></a>';
				if(!empty($staff_google_plus) && $staff_google_plus != '')
				$output .= '<a href="'.$staff_google_plus.'" title="Google Plus" class="google-plus icon"><i class="fa fa-google-plus"></i></a>';
				if(!empty($staff_linkedin) && $staff_linkedin != '')
				$output .= '<a href="'.$staff_linkedin.'" title="Linkedin" class="linkedin icon"><i class="fa fa-linkedin"></i></a>';
				if(!empty($staff_youtube) && $staff_youtube != '')
				$output .= '<a href="'.$staff_youtube.'" title="Youtube" class="youtube icon"><i class="fa fa-youtube"></i></a>';
				if(!empty($staff_rss) && $staff_rss != '')
				$output .= '<a href="'.$staff_rss.'" title="RSS" class="rss icon"><i class="fa fa-rss"></i></a>';
				if(!empty($staff_pinterest) && $staff_pinterest != '')
				$output .= '<a href="'.$staff_pinterest.'" title="Pinterest" class="pinterest icon"><i class="fa fa-pinterest"></i></a>';
				if(!empty($staff_skype) && $staff_skype != '')
				$output .= '<a href="'.$staff_skype.'" title="Skype" class="skype icon"><i class="fa fa-skype"></i></a>';
		  	$output .= '</div>';			
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div></article>';
		$i++;
	endwhile;
	wp_reset_postdata();
	$output .=	'</div></div>';
	else:
	$output .= '<div class="no-result">'.esc_html__('No results found...', 'shoptown').'</div>';
	endif;
	return $output;
}
add_shortcode("tm_ourteam", "shortcode_ourteam");
/***************** Pricing Table ****************/
function shortcode_pricingtable($atts, $content = null) {
   extract(shortcode_atts(array(
   	  "style" => '1',
      "heading" => '',
      "button_text" => '',
      "button_link" => '',
	  "price" => '',
	  "price_per" => '',
	  "selected" => 'no',
   ), $atts));
   
	if($selected == 'yes') 
	{
	 $selected = 'selected';
	}
	$output = '';
	$output .='<div class="pricing_wrapper">';
	$output .='<div class="pricing_wrapper_inner style-'.$style.' '.$selected.'">';
	if($style == '1') { 
		if($heading != '' && $price_per != '' && $price != '') { 
			$output .='<div class="pricing_heading">'.$heading.'</div>';
			$output .='<div class="pricing_top">';
			$output .='<div class="pricing_per">'.$price_per.'</div>';
			$output .='<div class="pricing_price">'.$price.'</div></div>';
		} 	
		else{
			$output .='<div class="nopricing_heading"></div>';
			$output .='<div class="nopricing_top"><div class="pricing_per"></div><div class="pricing_price"></div></div>';
		}
	}
	else
	{
		if($heading != '' && $price_per != '' && $price != '') { 
			$output .='<div class="pricing_top">';
			$output .='<div class="pricing_heading">'.$heading.'</div>';
			$output .='<div class="pricing_per">'.$price_per.'</div>';
			$output .='<div class="pricing_price">'.$price.'</div></div>';
		} 	
		else{
			$output .='<div class="nopricing_top"><div class="nopricing_heading"></div>';
			$output .='<div class="pricing_per"></div><div class="pricing_price"></div></div>';
		}
	}
	
	$output .='<div class="pricing_bottom">';
	$output .='<ul>';
	$output .= do_shortcode($content);
	$output .='</ul>';
	$output .='<div class="pricing_button">';
	if($button_text != '') { 
		$output .='<a href="'.$button_link.'" target="_blank" class="button" id="pricing-btn">'.$button_text .'</a>';
	} 
	$output .='</div></div>';
	$output .='</div></div>';
	return $output; 
}
add_shortcode("tm_pricingtable", "shortcode_pricingtable");
function shortcode_pricingtable_row($atts, $content = null)
{
	extract(shortcode_atts(array(	
	 	"symbol" => '',						 
		), $atts));
		$output = '';
		if(!empty($symbol))		
		$output .= '<li><i class="fa '.$symbol.'"></i>'.do_shortcode($content).'</li>';
		else
		$output .= '<li>'.do_shortcode($content).'</li>';
		return $output;
}
add_shortcode('price_row', 'shortcode_pricingtable_row');


/***************** Contact Form ****************/


function shortcode_contactform($atts, $content = null) {
   extract(shortcode_atts(array(
	'display_cellno' => '',
	'display_city' => '',
	'display_address' => '',
	'submit_text' => __('Submit', 'tm'),
	'success_msg' => __('Thanks for Contacting Us, We will call back to you soon.', 'tm'),
	'error_msg' => __('Sorry your message not sent, Try again Later.', 'tm')
	), $atts)); 
	
	
	if(isset($_POST['c_submit'])){	
	$name   		= $_POST['c_name'];
	$email   		= $_POST['c_email'];	
	$subject  		= $_POST['hidsubject'];
    $message_body   = $_POST['c_message'];
	
	
	$get_emailaddress = "";
	$email_to = get_option('tm_contact_email'); 
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	
	if(preg_match($email_exp,$email_to)) { $get_emailaddress .= $email_to; }
	   
	if		( $get_emailaddress != '') { $email_to = $get_emailaddress;  }
	else  	{ $email_to = bloginfo('admin_email');  }

	$headers = '';
	
	// Additional headers
	$headers .= 'From: '. $email . "\r\n";
	$headers .= 'CC: '. $email_to . "\r\n";
	
	$message_body .= "You have been contacted by $name with regards to $subject.\r\n\n";
	$message_body .= "You can contact $name via email, $email.\r\n\n";

	if(mail($email, $subject, $message_body, $headers))
		echo $success_msg;
	 else
		echo $error_msg;			
	}
	$output .= '';
	$output .= '<div class="shortcode_contactform">';
	$output .= '<form action="'.get_permalink().'" id="shortcode_contactform" method="post">';

	$output .= '<div class="contactform_left"><div class="row100">';
	$output .= '<div class="col70"><input id="c_name" name="c_name" size="25" class="required" minlength="2" placeholder="Name *"/><i class="fa fa-user"></i></div>';
	$output .= '</div>';
	
	$output .= '<div class="row100">';
	$output .= '<div class="col70"><input id="hidsubject" name="hidsubject" size="25" class="required" minlength="2" placeholder="Subject*"/><i class="fa fa-pencil"></i></div>';
	$output .= '</div>';
	
	$output .= '<div class="row100">';
	$output .= '<div class="col70"><input id="c_email" name="c_email" class="required email" placeholder="E-mail *"/><i class="fa fa-envelope-o"></i></div>';
	$output .=	'</div>';	
	
	if(!empty($display_cellno) && $display_cellno == 'yes') { 
	$output .= '<div class="row100">';
	$output .= '<div class="col70"><input id="c_number" name="c_number" class="digits" placeholder="Telephone"/><i class="fa fa-phone"></i></div>';
	$output .=	'</div>';
	} 
	
	if(!empty($display_address) && $display_address == 'yes') { 
	$output .= '<div class="row100">';
	$output .= '<div class="col70"><input id="c_address" name="c_address" placeholder="Address"/><i class="fa fa- -marker"></i></div>';
	$output .=	'</div>';
	} 
	
	if(!empty($display_city) && $display_city == 'yes') { 

	$output .= '<div class="row100">';
	$output .= '<div class="col70"><input id="c_city" name="c_city" placeholder="City"/><i class="fa fa-map-marker"></i></div>';
	$output .=	'</div>';
	} 	
	$output .=	'</div>';
	
	$output .= '<div class="contactform_right"> <div class="row100">';
	$output .= '<div class="col70"><textarea rows="8" name="c_message" id="c_message" class="required" placeholder="Message *"></textarea></div>';
	$output .=	'</div>';	
	
	$output .=	'</div>';
	$output .= '<div class="button">';
	$output .= '<div class="col70"><button type="submit" class="button" name="c_submit" id="c_submit"><span>'.$submit_text.'</span></button></div>';
	$output .=	'</div>';

	$output .= '</form></div>';		

	return $output;	
}
add_shortcode('tm_contactform', 'shortcode_contactform');

/***************** List Style ****************/
function shortcode_list($atts, $content = null)
{
	extract(shortcode_atts(array(
			'icon' =>  'fa-circle-o',
			'color' => '000000',								 
		), $atts));
		$output = '';
		$output .= '<li><i style="color:#'.$color.'" class="fa '.$icon.'"></i>'.do_shortcode($content).'</li>';
		return $output;
	}
add_shortcode('list_item', 'shortcode_list');
function shortcode_tm_list($atts, $content = null)
{
	extract(shortcode_atts(array(				 
		), $atts));
		$output = '';
		$output .= '<ul class="list">';
		$output .= do_shortcode($content);
		$output .=	'</ul>';
		return $output;
	}
add_shortcode('tm_list', 'shortcode_tm_list');
/***************** Icon ****************/
function theme_shortcode_icon($atts, $content = null) {
	extract(shortcode_atts(array(
		'icon' => 'fa-users',
		'color' => '212121',
	), $atts));
	
	return '<span class="icon_text"><i style="color:#'.$color.'" class="fa '.$icon.'"></i>'.do_shortcode($content).'</span>';
}
add_shortcode('tm_icon', 'theme_shortcode_icon');
/***************** Divider Space and Gap ****************/
function shortcode_divider($atts, $content = null) {
   extract(shortcode_atts(array(
   	'type' => '',
	'space' => ''
	), $atts)); 
	
	$elem_value = ''; 
    switch ($type) {
        case 'dotted' :
            $elem_value = 'dotted';
            break;
        case 'dashed' :
            $elem_value = 'dashed';
            break;
		case 'double' :
         	 $elem_value = 'double';
            break;				
		case 'groove' :
         	 $elem_value = 'groove';
            break;	
		case 'solid' :
            $elem_value = 'solid';
            break;	
        default :
            $elem_value = '';
            break;
        break;
    }
	
	if($space != NULL) { $space = 'height:'.$space.';' ; } else { $space = '';	}
	
	$output =	'<div class="divider_content">';
	$output .=	'<div class="divider_content_inner divider_element"><p>';
	$output .=	do_shortcode($content).'</p>';
	$output .=	'<div class="'.$elem_value.'" style="'.$space.'"></div></div></div>';
	return $output;
}
add_shortcode('tm_divider', 'shortcode_divider');
/***************** Call to Action Area Button ****************/
function shortcode_calltoaction($atts, $content = null)
{
	extract(shortcode_atts(array(
			'link_title' => '',	
			'link_url' => '',
			'animation_type' => '',	
			'align' => 'left',
			'color' => '',
			'button_color' => '',
			'button_background_color' => '',		
			'button_background_hover_color' => ''	 
		), $atts));
							
		$output = '';
		$output .= '<div class="calloutarea '.$align.'">';
		$output .= '<div class="calloutarea_block animated" data-animated="'.$animation_type.'" style="color: #'.$color.'" >';
		$output .= '<div class="calloutarea_block_content">';
		if($align == 'center')
			$output .= '<h2 class="title" style="color: #'.$color.'">'.do_shortcode($content).'</h2>';
		else
			$output .= '<h3 class="title" style="color: #'.$color.'">'.do_shortcode($content).'</h3>';
		$output .= '</div>';
		if(!empty($link_title))
			$output .= '<div class="calloutarea_button"><a href="'.$link_url.'" class="button" style="color: '.$button_color.' onMouseOver="this.style.backgroundColor='."#".$button_background_color.'" onMouseOut="this.style.backgroundColor='."#".$button_background_hover_color.'">'.$link_title.'</a></div>';
		$output .= '</div></div>';
		return $output;
	}
add_shortcode('tm_calltoaction', 'shortcode_calltoaction');


/***************** Custom Action ****************/
function shortcode_customaction($atts, $content = null)
{
extract(shortcode_atts(array(
'title1' => '',	
'title2' => '',
'color' => '',
'button_color' => '',
'button_background_color' => '',	
'button_background_hover_color' => '',
'link_title' => '',
'align' => 'center'	 
), $atts));

$output = '';
$link_url='';
$output .= '<div class="customaction '.$align.'">';
$output .= '<div class="customaction_title1" style="color: #'.$color.'" >'.$title1.'</div>';
$output .= '<div class="dash"></div>';
$output .= '<div class="customaction_title2" style="color: #'.$color.'" >'.$title2.'</div>';
if(!empty($link_title))
$output .= '<div class="calloutarea_button"><a href="'.$link_url.'" class="button" style="color: '.$button_color.' onMouseOver="this.style.backgroundColor='."#".$button_background_color.'" onMouseOut="this.style.backgroundColor='."#".$button_background_hover_color.'">'.$link_title.'</a></div>';
$output .= '</div>';
return $output;
}
add_shortcode('tm_customaction', 'shortcode_customaction');
/*********************Custom Action*****************************/



/***************** Static Text ****************/
function shortcode_tm_statictext($atts, $content = null){
	extract(shortcode_atts(array(
		'text' => '',
		'style' => '',
		'color' => '',
		'align' => '',
		'width' => '',
		'weight' => '',		
		'margin' => ''
	), $atts));
	$variables='';
		if(!empty($color)):
			$variables .= 'margin:'.$color.'; ';			
		endif;
		if(!empty($align)):		
			$variables .= 'text-align:'.$align.'; ';
		endif;
		if(!empty($margin)):
			$variables .= 'margin:'.$margin.'; ';			
		endif;
		if(!empty($width)):		
			$variables .= 'text-align:'.$width.'; ';
		endif;
		if(!empty($weight)):
			$variables .= 'margin:'.$weight.'; ';			
		endif;
	
	$output = '';
	
	$output .= '<div class="custom-text-container" style="'.$variables.'">';
		$output .= '<div class="text" style="'.$variables.'">'.$text.'</div>';				
	$output .= '</div>';
	return $output;
}
add_shortcode('tm_statictext', 'shortcode_tm_statictext');


/***************** Highlight Text ****************/
function shortcode_highlight($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => 'light'
		
	), $atts));
	$output = '';
	$output .= '<span class="hightlight_text highlight_'.$style . '">' . do_shortcode($content) . '</span>';
	return $output;
}
add_shortcode('tm_highlighttext', 'shortcode_highlight');
/***************** DropCap Text ****************/
function shortcode_dropcaps($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => 'FFFFFF',
		'background_color' => '282828',
		'text_transform' => 'uppercase'
	), $atts));
	
	if(empty($background_color))
		$class = " no-background";
	else
		$class = "";
	$output = '';
	$output .= '<span class="dropcap'.$class.'" style="color:#'.$color.'; background-color:#'.$background_color.';text-transform:'.$text_transform.'">' . do_shortcode($content) . '</span>';
	return $output;
}
add_shortcode('tm_dropcap', 'shortcode_dropcaps');
/***************** Benefits ****************/
function shortcode_benefits($atts, $content = null)
{
	extract(shortcode_atts(array(
			'benefits_style' => 'column3',	
			'benefits_img' => '',	
			'benefits_name' => 'Responsive Design',	
			'benefits_linktitle' => 'View detail',	
			'benefits_urllink' => '#',	
		), $atts));
		
	switch ($benefits_style) {
        case 'style2' :
            $col_width = 'column2';
            break;
		case 'style3' :
			$col_width = 'column1';
		break;	
        default :
            $col_width = 'column3';
            break;
        break;
    }
		
		if($benefits_img != NULL) { 
			$get_imagepath = get_template_directory_uri() . '/images/megnor/' . $benefits_img;
		} else {
			$get_imagepath = get_template_directory_uri() . '/images/megnor/no_image.jpg';	
		}
		$output = '';
		$output .='<div class="benefitsarea '.$col_width.'">';
		$output .= '<div class="benefitsarea_inner">';
		$output .='<div class="benifit_image">';
		$output .= '<span class="benefit_bkg animated" data-animated="bounceIn"><img src="'.$get_imagepath.'" alt="benifit_image" /></span></div>';
		$output .= '<div class="benefitsarea_bottom"><div class="benifit_name">'. $benefits_name.'</div>';
		$output .= '<p>'.do_shortcode($content).'</p>';
		$output .= '<div class="viewmore"><a href="'.$benefits_urllink.'" target="_blank">'.$benefits_linktitle.' <i class="fa fa-angle-double-right"></i></a></div>';
		$output .=	'</div></div></div>';
		return $output;
	}
add_shortcode('tm_benefits', 'shortcode_benefits');

/***************** Button ****************/
function shortcode_button($atts, $content = null) {
   extract(shortcode_atts(array(
   	'type' => 'medium',
	'background_color' => '',
	'link_url' => '',
	'icon' => '',
	'icon_align' => 'left'
	), $atts)); 
	wp_reset_query();
	$style_css = '';
	if(!empty($background_color)):
	$style_css .= 'background-color: #'.$background_color.';';
	$icon_class = '';
	else:
	$icon_class = ' no-background';
	endif;
	$output = '';
	$output .= '<div class="button_content_inner">';
	if(!empty($icon)){
		if($icon_align == 'left')
			$output .= '<a href="'.$link_url.'" class="button button_'.$type.' '.$icon_align.'" style="'.$style_css.'"><i class="fa '.$icon.'"></i>'.do_shortcode($content).'</a>';
		if($icon_align == 'right')
			$output .= '<a href="'.$link_url.'" class="button button_'.$type.' '.$icon_align.'" style="'.$style_css.'">'.do_shortcode($content).'<i class="fa '.$icon.'"></i></a>';
	}else{
		$output .= '<a href="'.$link_url.'" class="button button_'.$type.'" style="'.$style_css.'">'.do_shortcode($content).'</a>';
	}	
	$output .=	'</div>';
	return $output;
}
add_shortcode('tm_button', 'shortcode_button');
/***************** Progress Bar  ****************/
function shortcode_progressbar_container($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => '1',	
	), $atts));
	$output = '';
	$output .= '<div class="progressbar-container">';
    $output .= '<div class="progressbar-content '.$style.'">';
	$output .= do_shortcode($content);	
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('progressbar', 'shortcode_progressbar_container');
function shortcode_progressbar($atts, $content = null)
{
	extract(shortcode_atts(array(
			'value' => '90',		
			'color' =>'FFFFFF',
			'background_color' =>'87CFC5',
			'show_percentage' =>'yes',
			'style' => '1'
		), $atts));
		$output = '';
		$output .= '<div class="tm_progresbar style-'.$style.'">';
		
		if($style == 4):			
			$output .=	'<small class="progress_detail">';
			$output .= do_shortcode($content);
			if($show_percentage == 'yes') { 
				$output .= '<span class="tm_progress_label">'.$value.'%</span>';
			} 
			$output .= '</small>';
			$output .= '<div class="active_progresbar" style="color:#'.$color.'" data-value="'.$value.'" data-percentage-value="'.$value.'">';
		else:
			$output .= '<div class="active_progresbar" style="color:#'.$color.'" data-value="'.$value.'" data-percentage-value="'.$value.'">';
			$output .=	'<small class="progress_detail" style="color:#'.$color.'">';
			$output .= do_shortcode($content);
			if($show_percentage == 'yes') { 
				$output .= '<span class="tm_progress_label">'.$value.'%</span>';
			} 
			$output .= '</small>';
		endif;
		
	
		$output .= '<span class="value animated" data-animated="fadeInLeft" style="width:'.$value.'%; background-color:#'.$background_color.';"></span>';		
		$output .=	'</div></div>';
	
		return $output;
	}
add_shortcode('tm_progressbar', 'shortcode_progressbar');
/***************** PIE Chart ****************/
function shortcode_piechart($atts, $content = null)
{
	extract(shortcode_atts(array(

			'percentage' => 20,
			'background_color' => '#87CFC5',
			'title' => '',
		), $atts));
		
		$output = '';
		$randomdValue = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz123456789"), 0,2);
		$output = '';
		
		$output .='<div class="tm_piechart column4">';
		$output .='<div class="chart_top">';
		$output .='<span class="chart_'.$randomdValue.' tmchat_wrapper animated" data-percent="'.$percentage.'"><span class="percent" style="color:'.$background_color.';"></span></span>';
		$output .='</div>';
		$output .='<div class="chart_bottom">';
		if(!empty($title))
		$output .='<h2 class="chart_title">'.$title.'</h2>';
		$output .='<div class="chart_desc">'.do_shortcode($content).'</div>';
		$output .='</div>';
		$output .='</div>';
	
		$output .= "<script type='text/javascript'>\n";
			$output .= "\t jQuery(function() {\n";
			$output .= "\t jQuery('.chart_".$randomdValue."').waypoint(function() {\n";
  			$output .= "\t jQuery(this).easyPieChart({\n";
			$output .= "\t easing:'easeOutBounce',\n";
			$output .= "\t animate: {duration: 2000, enabled: true},\n";
			$output .= "\t barColor: '".$background_color."',\n";
			$output .= "\t trackColor: '#EAEAEB',\n";
			$output .= "\t scaleColor: '',\n";
			$output .= "\t lineWidth: 8,\n";
			$output .= "\t size: 130,\n";
			$output .= "\t onStep: function(from, to, percent) { {\n";
			$output .= "\t\t jQuery(this.el).find('.percent').text(Math.round(percent));\n";
			$output .= "\t } \n";
			$output .= "\t } }); \n";
			$output .= "\t }, {
			  triggerOnce: true,
			  offset: 'bottom-in-view'
			});\n";
			$output .= "\t}); \n";
		$output .= "</script>\n\n";
		
		return $output;
	}
add_shortcode('tm_piechart', 'shortcode_piechart');

/*****************************Counter*****************/
function shortcode_counter($atts, $content = null)
{
	extract(shortcode_atts(array(
			'id' => '',
			'start' => 0,
			'end' => '154',
			'decimal' => '0',
			'duration' => '20',
			'title' => '',
			'separator'=> ','
		), $atts));
		$output = '';
		$i=
		$output .="<div class='counter'>";
		$output .="<div class='counter_number'><h1 class='jumbo' id='".$id."'>0</h1></div>";
		$output .="<div class='counter_title'>".$title."</div>";
		$output .="</div>";
		
		$output .= "<script type='text/javascript'>\n";
		$output .= "\t var options = {\n";
		$output .= "\t useEasing : true,\n";
		$output .= "\t useGrouping : true,\n";
		$output .= "\t separator : ',', \n";
		$output .= "\t decimal : '.', \n";
		$output .= "\t }\n";
		$output .= "\t  jQuery.noConflict(); jQuery(document).ready(function() { \n";
		$output .= 	"\t var demo = new CountUp(".$id.", ".$start.", ".$end.", ".$decimal.", ".$duration.", options); \n";
		$output .="\t demo.start(); \n";
		$output .="\t }); \n";
		$output .= "</script>\n\n";

	return $output;
}
add_shortcode('tm_counter', 'shortcode_counter');



/***************** Social Icon  ****************/
function shortcode_socialicon($atts, $content = null)
{
	extract(shortcode_atts(array(
			'target' => '_blank',	
			'icon' => 'facebook',	
			'link' =>'#',
		), $atts));
		
		$output = '';
		$output .= '<div class="tm_socialicon">';
		$output .= '<a href="'.$link.'" target="'.$target.'" title="'.$icon.'"><i class="fa fa-'.$icon.'"></i></a>';
		$output .=	'</div>';
		return $output;
	}
add_shortcode('tm_socialicon', 'shortcode_socialicon');
/***************** Photo Shortcode ****************/
function shortcode_flickrphoto($atts, $content = null) {
	extract(shortcode_atts(array(
	    'id' => '',
		'count_no' => '',
	), $atts));
	$flickr_data = '<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$count_no.'&display=latest&size=t&layout=x&source=user&user='.$id.'"></script> ';
	return $flickr_data;
}
add_shortcode('tm_flickrphoto', 'shortcode_flickrphoto');// use:-[flickrbadge id="67176627@N04" count_no="6"]
/***************** Fancy Media ****************/
function shortcode_fancymedia($atts, $content = null) {
	 extract(shortcode_atts(array(
      "media_type" => 'type1',
      "enable_lightbox" => 'yes',
      "align" => '',
	  "media_url" => '',
	  "media_img" => '',
	  "fancyimg_src" => '',
	  "image_alt" => '',
   ), $atts));
   
   	 switch ($media_type) {
        case 'type2' :
            $media_type = 'noframe';
            break;
        default :
            $media_type = 'frame';
            break;
        break;
    }
	
 	if($fancyimg_src != NULL) { 
		$get_fancyimagepath = get_template_directory_uri() . '/images/' . $fancyimg_src;
	} else {
		$get_fancyimagepath = get_template_directory_uri() . '/images/megnor/no_image.jpg';	
	}
	
	if($media_img != NULL) { 
		$get_mediaimagepath = get_template_directory_uri() . '/images/' . $media_img;
	} else {
		$get_mediaimagepath = get_template_directory_uri() . '/images/megnor/no_image.jpg';	
	}
	$output = '';
	$output .='<div class="tm_fancymediacontent '.$media_type.' '.$align.'"><div class="fancymedia_inner">';
	
	if($media_url != NULL)
	{
		if($media_img != NULL)
		{
			$output .= '<div class="media_top">';
			$output .= '<a href="'.$media_url.'" title="The Last Eggtion Hero"><img src="'.$get_mediaimagepath.'" alt="'.$image_alt.'"/></a></div>';
			$output .= '<div class="media_bottom">'.do_shortcode($content).'</div>';
		}
		else
		{
			$output .= '<div class="media_top">';
			$output .= '</div><div class="media_bottom">'.do_shortcode($content).'</div>';
		}
	
	}
	else
	{
		$output .= '<div class="media_top">';
		if($enable_lightbox == "yes")	
		{
			$output .= '<a href="'.$get_fancyimagepath.'" class="mustang-gallery"><img src="'.$get_fancyimagepath.'" alt="'.$image_alt.'"/></a>';
		}
		else
		{
			$output .= '<img src="'.$get_fancyimagepath.'" alt="'.$image_alt.'"/>';
		}
		$output .= '</div><div class="media_bottom">'.do_shortcode($content).'</div>';
	}
	$output .= '</div></div>';
	return $output;
}
add_shortcode('tm_fancymedia', 'shortcode_fancymedia');
/***************** Logo ****************/
function shortcode_logo($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'type' => 'grid',
		'items_per_column' => 5,
		'align' => 'left',
		"border_color"=> 'e6e4dc',
		"border" => ''
		
	), $atts));
	$output = '';
	if($border == 'yes')
			{
				$variables .= 'border-top:1px solid #'.$border_color.';';
			}
	$output .= '<div id="brand-products" class="tm_logocontent '.$align.'">';
	if($type == 'slider'):
			$output .= '<div id="'.$items_per_column.'_brand_carousel" class="brand-carousel tm-logo-content">';
		else:
			$output .= '<div id="'.$items_per_column.'_brand_grid" class="brand-grid tm-logo-content">';							
		endif;
	$output .=	do_shortcode($content).'</div></div>';
	return $output;
}
add_shortcode('tm_logo', 'shortcode_logo');
function shortcode_logoinner($atts, $content = null) {
	
   extract(shortcode_atts(array(
      "image" => '',
      "link_url" => '',
      "title" => 'Logo Image',
   ), $atts));
   
	$output = '';		
	$output .= '<div class="item brand_main"><div class="product-block"><a href="'.$link_url.'"><img src="'.$image.'" alt="'.$title.'"/></a></div></div>';	
	return $output;
}
add_shortcode("tm_logoinner", "shortcode_logoinner");

/************Cateory Content****************/

function shortcode_static_category($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'type' => 'grid',
		'items_per_column' => 4,
		'align' => 'left',
		"border_color"=> 'e6e4dc',
		"border" => ''
		
	), $atts));
	$output = '';
	if($border == 'yes')
			{
				$variables .= 'border-top:1px solid #'.$border_color.';';
			}
	$output .= '<div id="cateogry-products" class="tm_categorycontent '.$align.'">';
	if($type == 'slider'):
			$output .= '<div id="'.$items_per_column.'_cat_carousel" class="cat-carousel tm-category-content">';
		else:
			$output .= '<div id="'.$items_per_column.'_category_grid" class="category-grid tm-category-content cols-'.$items_per_column.'">';							
		endif;
	$output .=	do_shortcode($content).'</div></div>';
	return $output;
}
add_shortcode('tm_static_category', 'shortcode_static_category');

function shortcode_categoryinner($atts, $content = null) {
	
   extract(shortcode_atts(array(
      "image" => '',
      "link_url" => '',
      "title" => 'Logo Image',
	  "name" => '',
	  "price" => '',
	  "description" => ''
   ), $atts));
   
	$output = '';		
	$output .= '<div class="item category-block"><a href="'.$link_url.'"><img src="'.$image.'" height="240" width="222" alt="'.$title.'"/><span class="banner-hover"> <span>'.$name.'</span> <span class="price">'.$price.' </span> <span class="description">'.$description.' </span></span></a></div>';	
	return $output;
}
add_shortcode("tm_catinner", "shortcode_categoryinner");

/***************** Banner ****************/
function shortcode_banner($atts, $content = null)
{
	extract(shortcode_atts(array(
			'background_img' => '',	
			'link_url' => '#',
			'title' => '',
			'description' => '',							 
		), $atts));
		
		if($background_img != NULL) { 
			$get_imagepath = $background_img;
		} else {
			$get_imagepath = get_template_directory_uri() . '/images/megnor/no_image.jpg';	
		}
		
		$output = '';
		$output .='<div class="tm_banner">';
		$output .='<div class="tm_banner_inner">';
		$output .='<a href="'.$link_url.'" target="_Blank">';
		$output .='<img src="'.$get_imagepath.'" alt="" />';	
		$output .='</a>';
		$output .='</div>';
		if(!empty($title))
		$output .='<div class="title">'.$title.'</div>';
		if(!empty($description))
		$output .='<div class="description">'.$description.'</div>';
		$output .='</div>';
		return $output;
	}
add_shortcode('tm_banner', 'shortcode_banner');

/***************** CMS Banner ****************/
function shortcode_cms_banner($atts, $content = null)
{
	extract(shortcode_atts(array(
			'background_img' => '',	
			'link_url' => '#',
			'title' => '',
			'description' => '',
			'classname' => ''							 
		), $atts));
		
		if($background_img != NULL) { 
			$get_imagepath = $background_img;
		} else {
			$get_imagepath = get_template_directory_uri() . '/images/megnor/no_image.jpg';	
		}
		
		$output = '';
		$output .='<div class="cms_banner '.$classname .'">';
		$output .='<div class="cms_banner_inner">';
		$output .='<a href="'.$link_url.'" target="_Blank">';
		$output .='<img src="'.$get_imagepath.'" alt="" />';	
		$output .='</a>';
		$output .='</div>';
		if(!empty($title))
		$output .='<div class="title">'.$title.'</div>';
		if(!empty($description))
		$output .='<div class="description">'.$description.'</div>';
		$output .='</div>';
		return $output;
	}
add_shortcode('cms_banner', 'shortcode_cms_banner');



/***************** Banner slider ****************/
function shortcode_single_slide($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	$output = '';
	$output .= '<div class="banner-slider-container">';
	$output .= '<div class="slider-container-inner">';	
	$output .= '<div class="title">'.$title.'</div>';
	$output .= '<ul class="slides">';
	$output .=	do_shortcode($content);
	$output .= '</ul>';
	$output .= '</div></div>';
	return $output;
}
add_shortcode('slider', 'shortcode_single_slide');
function shortcode_single_slider($atts, $content = null)
{
	extract(shortcode_atts(array(
			'image' => '',	
			'link' => '',
			'height' => '',
			'width' => '',							 
		), $atts));
		$output = ''; 
		$output .= '<li><div class="banner-image">';
		if(!empty($link)):
			$output .= '<a target="_Blank" href="'.$link.'"><img src="'.$image.'" alt="" height="'.$height.'" width="'.$width.'" class="vv" /></a>';
		else:
			$output .= '<img src="'.$image.'" alt="" class="vv" />';
		endif;
		$output .= '</li></div">';
		return $output;
	}
add_shortcode('slide', 'shortcode_single_slider');
/***************** Gallery  ****************/
function shortcode_gallery($attr) {
    $post = get_post();
	static $instance = 0;
	$instance++;
	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}
	#Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	
	if ( $output != '' )
		return $output;
	# We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}
	extract(shortcode_atts(array(
		'type'      => 'grid',
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));
	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';
	
	if ( !empty($include) ) 
	{
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} 
	elseif ( !empty($exclude) ) 
	{
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} 
	else
	{
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
	
	if ( empty($attachments) )
		return '';
	
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}
	
	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';
	
	$columns = intval($columns);
	
	
	$selector = "gallery-{$instance}";
	
	
	$size_class = sanitize_html_class( $size );
	
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	
	$i = 0;
	foreach ( $attachments as $id => $attachment ) 
	{
		
					
					
	$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
	
	$output = '';
		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '<br style="clear: both" />';
	}
	
	$output .= "
			<br style='clear: both;' />
		</div>\n";
	
	return $output;
}
add_shortcode('tm_gallery', 'shortcode_gallery');  
/*============ testing ===========*/
function ContactButton($params, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/contact-us',
		'type' => 'style1'
	), $params));
	return
		'<a href="' . $url . '" class="button ' . $type. '">' . ucwords($content) . '</a>';
}
add_shortcode('button','ContactButton');
// callout box
function CalloutBox($params, $content = null) {
	extract(shortcode_atts(array(
		'type' => 'style1'
	), $params));
	
	return
		'<div class="callout ' . $type . '">' . $content . '</div>';
}
add_shortcode('callout','CalloutBox');
/***************** Portfolio Filter ****************/
function shortcode_portfolio_filter_container($atts, $content = null, $code) {
	global $logotype;
	extract(shortcode_atts(array(
		'items_per_column' => 4,
		'align' => ''
		
	), $atts));
	if($items_per_column == '1'):
		$width = 550;
		$height = 550; 
		$desc_limit = 550;
	elseif($items_per_column == '2'):
		$width = 600;
		$height = 600; 
		$desc_limit = 450;
	elseif($items_per_column == '3'):
		$width = 600;
		$height = 600; 
		$desc_limit = 250;
	else:
		$width = 600;
		$height = 600;
		$desc_limit = 80; 
	endif;								
	$categories = get_categories('hide_empty=0&orderby=name&taxonomy=portfolio_categories');	
	$output = '';
	$output .= '<div class="clearfix portfolio-filter-container filter-container">';
	$output .= '<section id="portfolio_filter_options" class="options category-container"">';
	$output .= '<ul id="filters" class="option-set"  data-option-key="filter">';
	$output .= '<li><a href="#show-all" data-option-value="*" class="selected">Show All</a></li>';
	foreach ($categories as $category_item ) {
		$output .= '<li><a href="#'.$category_item->slug.'" data-option-value=".'.$category_item->slug.'">'.$category_item->cat_name.'</a></li>';
	}
	$output .= '</ul></section>'; 					 
	$output .= '<div id="portfolio_filter" class="portfolio-container portfolios portfolio-filter clearfix da-thumbs portfolio-cols-'.$items_per_column.'">';
	foreach ($categories as $category_item ):
	$paged = ( isset( $my_query_array['paged'] ) && !empty( $my_query_array['paged'] ) ) ? $my_query_array['paged'] : 1;
    $args = array(
      'post_type' => 'portfolio',
      'post_status' => 'publish',
	  'posts_per_page' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'portfolio_categories',
          'field' => 'id',
          'terms' => $category_item->term_id,
          'paged' => $paged
        )
      )
    );
    query_posts($args);  
		 while (have_posts()) : the_post();
		$image = shoptown_get_first_post_images(get_the_ID());
		$src = shoptown_mr_image_resize($image, $width, $height, true, 't', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$src = shoptown_mr_image_resize($src, $width, $height, true, $align, false);
		endif;
			$output .= '<div class="'.$category_item->slug.' main item single-portfolio">';
				$output .= '<div class="image image-block">';
					$output .= '<img src="'.$src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
					$output .= '<div class="block_hover"><div class="block_hover_inner">';
						$output .= '<h1 class="entry-title">'.get_the_title().'</h1>';
						$output .= '<div class="links">';
							$output .= '<a href="'.$image.'" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';
							$output .= '<a href="'.get_permalink().'" class="icon"><i class="fa fa-link"></i></a>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div></div>';		
			$output .= '</div>';
		endwhile; 
	endforeach;
	wp_reset_query();
	$output .= '</div></div>'; 
	return $output;
}
add_shortcode('tm_portfolio_filter', 'shortcode_portfolio_filter_container');
/***************** Portfolio Slider ****************/
function shortcode_portfolio_slider_container($atts, $content = null, $code) {
	global $logotype;
	extract(shortcode_atts(array(
		'category' => '',
		'type' => 'slider',
		'items_per_column' => 3,
		'number_of_posts' => 10,
		'layout' => 'dark'
	), $atts));
	
	if(!empty($category)):
		$term_id = $category;	
		$args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'posts_per_page' => $number_of_posts,
		'tax_query' => array(
			array(
				'taxonomy' => 'portfolio_categories',
				'field' => 'id',
				'terms' => $term_id
			)
		)
		);		
	else:
		$args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'posts_per_page' => "'".$number_of_posts."'"
		);		
	endif;			
		$array_posts = query_posts($args);
		$count = count($array_posts);
		$output = '';
		if($count > 0):
		$output .= '<div class="portfolio-container">';
		if($type == 'slider'):
			if($count > $items_per_column)
				$output .= '<div id="'.$items_per_column.'_portfolio_carousel" class="portfolio-carousel">';
			else
				$output .= '<div id="'.$items_per_column.'_portfolio_grid" class="portfolio-grid cols-'.$items_per_column.'">';
		else:
			$output .= '<div id="'.$items_per_column.'_portfolio_grid" class="portfolio-grid cols-'.$items_per_column.'">';							
		endif;
			$i = 1;
			while (have_posts()) : the_post();
				if($i % $items_per_column == 1 )
					$class = "first";
				elseif($i % $items_per_column == 0 )
					$class = "last";
				else
					$class = "";
				if($items_per_column == '1'):
					$width = 550;
					$height = 500; 
				elseif($items_per_column == '2'):
					$width = 450;
					$height = 400; 
				elseif($items_per_column == '3'):
					$width = 300;
					$height = 250; 
				else:
					$width = 280;
					$height = 220; 
				endif;
				$image = shoptown_get_first_post_images(get_the_ID());
				$image_src = shoptown_mr_image_resize($image, $width, $height, true, 't', false);
				if(empty($image_src))
					$image_src = get_template_directory_uri()."/images/megnor/placeholder.png";
				$output .= '<div class="item portfolio-main">';
				$output .= '<div class="product-block single-portfolio '.$class.' '.$layout.'">';
					$output .= '<div class="portfolio-image">';
						$output .= '<div class="portfolio-image_inner">';
							$output .= '<img src="'.$image_src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
							$output .= '<div class="other-box">';
								$output .= '<div class="links">';
								$output .= '<a href="'.$image.'" title="Click to view Full Image" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';
								$output .= '<a href="'.get_permalink().'" title="'.esc_html__('Click to view read more', 'shoptown').'" class="icon"><i class="fa fa-link"></i></a>';							
								$output .= '</div></div>';
							$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="portfolio-title"><a href="'.get_permalink().'">'.get_the_title().'</div></a>';
					/*$output .= '<div class="portfolio-description">'.shoptown_portfolio_excerpt(60).'</div>';*/
					$output .= '<div class="read-more"><a href="'.get_permalink().'" title="'.get_the_title().'">'.esc_html__('read more...', 'shoptown').'</a></div>';				
				$output .= '</div>';
				$output .= '</div>';
				$i++;
			endwhile;
		$output .= '</div>';
		wp_reset_query();
	$output .= '</div>';
	else:
	$output .= '<div class="no-result">'.esc_html__(''.esc_html__('No results found...', 'shoptown').'', 'shoptown').'</div>';
	endif;
	return $output;
}
add_shortcode('tm_portfolio_slider', 'shortcode_portfolio_slider_container');
/*============ Portfolio ===========*/
function shortcode_portfolio($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'column' => 4,
		'cat' => '',
		'max' => '12'
	), $atts));
	
	$output = '';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$terms = array();
		if ($cat != '') {
		$cat = preg_replace('/\s*,\s*/', ',', $cat);
			foreach(explode(',', $cat) as $term_name) {
				$terms[] = get_term_by('name', $term_name, 'portfolio_categories');
			}		
			foreach($terms as $term) {	
				$term_ids[] = $term->term_id;
			}		
			$args = array(
				'posts_per_page' => $max,
				'paged' => $paged,
				'post_type' => 'portfolio',
				'post_status' => 'publish',
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_categories',
						'field' => 'id',
						'terms' => $term_ids
					)
				)
			);			
		} else {
			$args = array(
				'posts_per_page' => $max,
				'paged' => $paged,
				'post_type' => 'portfolio',
				'post_status' => 'publish'
			);
		}
		query_posts($args);
		if($column == 1){
			 $width = 1200;
			$excerpt_length = 180;
      		$column = 1;
   		}else if($column == 2){
     		$width = 600;
			$excerpt_length = 180;
      		$column = 2;
    	}else if($column == 3){
      		$width = 400;
			$excerpt_length = 120;
      		$column = 3;
    	}else if($column == 4){
     		$width = 300;
			$excerpt_length =80;
      		$column = 4;
    	}else {
      		$width = 300;
      		$column = 4;
    	}  
 
	$output = '<div class="portfolios">';
	$output .= '<ul class="portfolio_'.$column.'column da-thumbs">';
	$num_layout =  substr($column, 0, 1);	
	$i = 1;
	while(have_posts()) {
		the_post();
		$terms = get_the_terms(get_the_ID(), 'portfolio_categories');
		if ( strlen( $img = get_the_post_thumbnail( get_the_ID()) ) ): 
		$image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );								
		else:
		$image = shoptown_get_first_post_images(get_the_ID());
		endif;
		$src = shoptown_mr_image_resize($image, $width, $width, true, 'left', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$image = $src;
			$src = shoptown_mr_image_resize($src, $width, $width, true, 'left', false);			
		endif;
		 ?>
<?php $terms_slug = array();
		if (is_array($terms)) {
			foreach($terms as $term) {
				$terms_slug[] = $term->slug;
			}
		}
		if($i % $num_layout == 0)
			$li_class = "last";
		else if($i % $num_layout == 1)
			$li_class = "first";
		else
			$li_class = "inner";
		$output .= '<li class="'.$li_class.'">';
		$more = get_post_meta(get_the_ID(), '_more', true);
		$output .= '<div class="main"><div class="image-block">';
		if(get_option('portfolio','display_image') || $column == 1):			
			$output .= '<a href= "'.$image.'" class="mustang-gallery">';
			$output .= '<img class="image1" src="'.$src.'"/ >';
			$output .= '</a>';
		endif;
		$output .= '<div class="other-box">';
	$output .= '<div class="links">';
	$output .= '<a href="'.$image.'" title="Click to view Full Image" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';
	$output .= '<a href="'.get_permalink().'"  title="'.esc_html__('Click to view read more', 'shoptown').'" class="icon"><i class="fa fa-link"></i></a>';							
$output .= '</div></div>';
		$output .= '</div>';
		$output .= '<h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
		$output .=  shoptown_portfolio_excerpt($excerpt_length);
		$output .= '</li>';
		$i++;
	}
	$output .= '</ul>';
	$output .= shoptown_shortcode_paging_nav();  
	$output .= '</div>';	  
	wp_reset_query();
	return $output;
}
add_shortcode('tm_portfolio', 'shortcode_portfolio');
/*============ Faqs ===========*/
function shortcode_faqs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => '1',
		'category' => ''
	), $atts));
	$output = '';
	$output .= '<div class="faqs-container">';
    $output .= '<div class="faqs-content style-'.$style.'">';
	
	if(!empty($category)):	
		$term_id = $category;	
		$args = array(
		'post_type' => 'faq',
		'post_status' => 'publish',
		'posts_per_page' => '50',
		'tax_query' => array(
			array(
				'taxonomy' => 'faq_categories',
				'field' => 'id',
				'terms' => $term_id
			)
		)
		);
		query_posts($args);	
		$term = get_term( $term_id, 'faq_categories' );		
		if(!empty($term)):	
		 	$output .= '<h1 class="small-title">'.$term->name.'</h1>';
		endif;	
		 $output .= '<div class="faqs-category-container">';
		 while (have_posts()) : the_post(); 
			if($style == '1'):
			$output .= '<div class="single-faq toogle_div">';
			$output .= '<a class="tog" href="#"><span class="faq_title">'. get_the_title() .' </span></a>';
			$output .= '<div class="tab_content">'.get_the_content().'</div>';
			$output .= '</div>';
			endif;
			if($style == '2'):
			$output .= '<div class="single-faq">';
			$output .= '<div class="title">'.get_the_title().'</div>';
			$output .= '<div class="content">'.get_the_content().'</div>';
			$output .= '</div>';
			endif;
		endwhile; 
		$output .= '</div>';
	else:
		$categories = get_categories('hide_empty=0&orderby=name&taxonomy=faq_categories');		
		foreach ($categories as $category_item ) {
			$args = array(
				'post_type' => 'faq',
				'post_status' => 'publish',
				'tax_query' => array(
					array(
						'taxonomy' => 'faq_categories',
						'field' => 'id',
						'terms' => $category_item->term_id
					)
				)
			);
		 query_posts($args);	
		 $output .= '<h1 class="small-title">'.$category_item->name.'</h1>';
		 $output .= '<div class="faqs-category-container">';
		 while (have_posts()) : the_post(); 
		 	if($style == '1'):
			$output .= '<div class="single-faq toogle_div">';
			$output .= '<a class="tog" href="#"><span class="faq_title">'. get_the_title() .' </span></a>';
			 $output .= '<div class="tab_content">'.get_the_content().'</div>';
			 $output .= '</div>';
			 endif;
			 if($style == '2'):
			 $output .= '<div class="single-faq">';
			$output .= '<div class="title">'.get_the_title().'</div>';
			 $output .= '<div class="content">'.get_the_content().'</div>';
			 $output .= '</div>';
			 endif;
		endwhile; 
		$output .= '</div>';
		}
       	endif; 
		$output .= '</div>';
		$output .= '</div>';
		wp_reset_query();
		return $output;
}
add_shortcode('faqs', 'shortcode_faqs');

/******************** Single Static Link ***************/
function shortcode_single_static_link($atts, $content = null) {
		
   extract(shortcode_atts(array(
      "link" => '',
      "title" => '',
   ), $atts));
   
	$output = '';		
	$output .= '<div class="single-link"><a href="'.$link.'">'.$title.'</a></div>';	
	return $output;
}
add_shortcode("single_link", "shortcode_single_static_link");

/******************** Single Category  Link ***************/
function shortcode_menu_bottom_category($atts, $content = null) {
		
   extract(shortcode_atts(array(
     	'category_ids' => '113,111,116,118,108,117,114,112',
		'title' => ''
	), $atts));
	
	$category_ids_array = explode(",",$category_ids);
	$category_ids_array[] = $category_ids_array;
	
	$output = '';
	$output .= '<div id="category_link">';
	$output .= '<h2 class="menu-cat-title">'.$title.'</h2>';
	$output .= '<ul class="category_link_inner">';
	foreach($category_ids_array as $key){
		$category_ids = get_term( $key, 'product_cat' );
		if($category_ids){		
			$output .= '<li><a href="'.get_category_link( $category_ids ).'" target="_blank">'.$category_ids->name.'</a></li>';
			
		}
	}	
	$output .= '</ul>';
	
	$output .= '</div>';
	return $output;
}
add_shortcode("menu_bottom_category", "shortcode_menu_bottom_category");

/******************** Single static Category  Link ***************/

function shortcode_tm_home_category($atts, $content = null) {
		
   extract(shortcode_atts(array(
   		'category_ids' => '112',
     	'subcategory_ids' => '108,111,116,118,108,117,114,112',	
		'background_image' => '',
		'padding' => '0',
		'margin' => '0',
		'custom_text' => '',
		'animation' => 'fadeIn'
	), $atts));
	$category_ids_array = explode(",",$category_ids);
	
	$category_ids_array[] = $category_ids_array;
	
	$subcategory_ids_array = explode(",",$subcategory_ids);
	$subcategory_ids_array[] = $subcategory_ids_array;
	
	$output = '';
	$output .= '<div id="category_link" style="background-image:url('.$background_image.');padding:'.$padding.';margin:'.$margin.'">';	
	$output .= '<ul class="category_link_inner animated" data-animated="'.$animation.'">' ;
	foreach($category_ids_array as $key1){		
		$category_ids = get_term( $key1, 'product_cat' );
		if($category_ids){		
			$output .= '<li class="first"><a href="'.get_category_link( $category_ids ).'" target="_blank">'.$category_ids->name.'</a></li>';
			break;
		}
	}	
	foreach($subcategory_ids_array as $key){
		$subcategory_ids = get_term( $key, 'product_cat' );
		if($subcategory_ids){		
			$output .= '<li><a href="'.get_category_link( $subcategory_ids ).'" target="_blank">'.$subcategory_ids->name.'</a></li>';
			
		}
	}	
	$output .= '</ul>';
	$output .='<span class="view"><a href="'.get_category_link( $category_ids ).'" target="_blank">'.$custom_text.'</a></span><span class="view-border"></span>';
	$output .= '</div>';
	return $output;
}
add_shortcode("tm_home_category", "shortcode_tm_home_category");


/********************Title***************/
function shortcode_title($atts, $content = null) {
		
   extract(shortcode_atts(array(
   'size' => 'big',
   'type' => 'simple',
   'color' => '',
   'align' => ''
   ), $atts));
      
	$output = '';	
	$output .= '<div class="shortcode-title '.$align.'">';
	
	if(!empty($color))	
		$output .= '<h1 class="'.$type.'-type '.$size.'-title" style="color:#'.$color.';">'.do_shortcode($content).'</h1>';	
	else
		$output .= '<h1 class="'.$type.'-type '.$size.'-title">'.do_shortcode($content).'</h1>';	
	$output .= '</div>';
	return $output;
}
add_shortcode("title", "shortcode_title");
function shortcode_our_features($atts, $content = null) {	
   extract(shortcode_atts(array(
   	 "icon" => '',
     "title" => '', 
     "read_more_text" => 'read more',
	 "read_more_link" => '',	
   ), $atts));
   
	$output = '';		
	$output .= '<div class="feature-container">';
    $output .= '<div class="feature-content">';
	if(!empty($icon))
	$output .= '<div class="icon"><i class="'.$icon.'"></i></div>';
	if(!empty($title))
	$output .= '<div class="title">'.$title.'</div>';
	$output .= '<div class="description">'.do_shortcode($content).'</div>';
	if(!empty($read_more_link))
	$output .= '<a herf="'.$read_more_link.'" class="other-read-more">'.$read_more_text.'</a>';	
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode("feature", "shortcode_our_features");
/***************** Features ****************/
function shortcode_about($atts, $content = null)
{
	extract(shortcode_atts(array(					
			'title' => '',
			'link_text' => 'read more',
			'link_url' => '#',	
			'image' => '',
			'image_align' => 'right',	
			'title_margin' => '20px 0 30px'					 
		), $atts));
		
		$output = '';
		$output .='<div class="tm_about">';
		$output .='<div class="tm_about_inner image-'.$image_align.'">';
			if(!empty($image)):		
				$output .='<div class="about_image">';
				$output .='<img src="'.$image.'" alt="" />';
				$output .='</div>';
			endif;
			if(!empty($image))
				$output .='<div class="about_content">';
			else
				$output .='<div class="about_content">';
				$output .='<h3 class="title" style="margin:'.$title_margin.'">'.$title.'</h3>';
				$output .='<div class="description">'.do_shortcode($content).'</div>';
				$output .='<div class="readmore"><a href="'.$link_url.'" title="'.$link_text.'">'.$link_text.'<i class="fa fa-arrow-right"></i></a></div>';
			$output .='</div>';
		$output .='</div></div>';
		return $output;
	}
add_shortcode('tm_about', 'shortcode_about');
/***************** Overlap images ****************/
function shortcode_overlap_images($atts, $content = null)
{
	extract(shortcode_atts(array(					 
		), $atts));
		
		$output = '';
		$output .='<div class="tm_overlap_images">';
		$output .='<div class="tm_overlap_images_inner">';
			$output .='<ul class="images">';
			$output .= do_shortcode($content);
			$output .='</ul>';
		$output .='</div></div>';
		return $output;
	}
add_shortcode('tm_overlap_images', 'shortcode_overlap_images');

/***************** Single_image banner ****************/
function shortcode_single_image($atts, $content = null) 
{	
   extract(shortcode_atts(array(
		'image' => '',
		'link_url' => '#',
		'margin' => '',	
		'textalign' => '',
		'hover' => 'none',
		'classname' => '',		
   ), $atts));
	$output = '';
	$variables = '';
	
		if(!empty($margin)):
			$variables .= 'margin:'.$margin.'; ';			
		endif;
		if(!empty($textalign)):		
			$variables .= 'text-align:'.$textalign.'';
		endif;
		if($hover == "yes"):
			$output .='<div class="subbanner-inner '.$classname.'" style="'.$variables.';"><a href="'.$link_url.'" target="_blank"><img  src="'.$image.'" alt=""/>

	   			<span class="hover_glass"> </span> </a></div>';	
		else :
		    $output .='<div class="subbanner-inner '.$classname.'" style="'.$variables.';"><a href="'.$link_url.'" target="_blank"><img  src="'.$image.'" alt=""/>
	   			</a></div>';	
		endif;
	return $output;
}
add_shortcode("tm_single_image", "shortcode_single_image");


/***************** single_category ****************/
function shortcode_single_category($atts, $content = null) 
{	
   extract(shortcode_atts(array(
		'image' => '',		
		'category_id' => '108',
		'margin' => ' ',	
		'textalign' => '',
		'hover' => 'none',
		'classname' => '',
		'animation' => 'fadeIn',		
   ), $atts));
	$output = '';
	$variables = '';
	$category_ids_array = explode(",",$category_id);
	$category_ids_array[] = $category_ids_array;
	
		if(!empty($margin)):
			$variables .= 'margin:'.$margin.'; ';
			$variables .= 'text-align:'.$textalign.'';
		endif;
	
	foreach($category_ids_array as $key1){		
	  $category_id = get_term( $key1, 'product_cat' );
		if($category_id){			
		if($hover == "yes"):
			$output .='<div class="single-category-banner '.$classname.' animated " data-animated="'.$animation.'" style="'.$variables.';"><a href="'.get_category_link( $category_id ).'" target="_blank"><img  data-animated="fadeInLeft" src="'.$image.'" alt=""/>
	   			<span class="category-title">'.$category_id->name.'</span><span class="hover_block"></span></a></div>';	
		else :
		  $output .='<div class="single-category-banner animated '.$classname.'" data-animated="'.$animation.'" style="'.$variables.';"><a href="'.get_category_link( $category_id ).'" target="_blank"><img  data-animated="fadeInLeft" src="'.$image.'" alt=""/>
	   			<span class="category-title">'.$category_id->name.'</span></a></div>';	
		endif;
	  }
	}
	return $output;
}
add_shortcode("tm_single_category", "shortcode_single_category");

/***************** Services ****************/

function shortcode_home_services($atts, $content = null) {	
   extract(shortcode_atts(array(
	 "color" => 'f02640',
	 "icon_background_color" => '',
   	 "icon" => 'fa-arrows-alt',
     "title" => '',
     "link_text" => '',
	 "link_url" => '',
	 "style" => '1'	
	 ), $atts));
	 
	$style_css = 'color:#'.$color.';';
	if(!empty($icon_background_color)):
	$style_css .= 'background-color: #'.$icon_background_color.';';
	$icon_class = '';
	else:
	$icon_class = ' no-background';
	endif;
	
	$output = '';		
	$output .= '<div class="service hb-animate-element bottom-to-top style-'.$style.'">';
	$output .= '<div class="service-content style-'.$style.'">';
	
	if($style == '1' || $style == '2'):	
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		$output .= '<div class="service-desc">';	
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';	
	endif;	
	
	if($style == '3'):		
		$output .= '<div class="service-top">';		
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';
		$output .= '</div>';
		$output .= '<div class="service-desc">';
	endif;
	
	if($style == '4'):
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';	
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="color:#'.$color.';background-color: #'.$icon_background_color.';"></i></div>';
		$output .= '<div class="service-desc">';
	endif;	
	
	if($style == '5'):
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		$output .= '<div class="service-desc">';	
		if(!empty($title))
			$output .= '<div class="title service-text"><span class="text-first">'.$title.'</span><span class="text-second">'.$title.'</span></div>';	
	endif;		
		
	$output .= '<div class="description other-font">'.do_shortcode($content).'</div>';
	
	if(!empty($link_text)):
		if(!empty($link_url)):
			$output .= '<div class="service-read-more other-font"><a herf="'.$link_url.'" class="other-read-more">'.$link_text.'<i class="fa fa-arrow-right"></i></a></div>';	
		else:
			$output .= '<div class="service-read-more other-font">'.$link_text.'></div>';	
		endif;
	endif;	
	
	$output .= '</div>';			
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode("service", "shortcode_home_services");



/***************** Services ****************/

function shortcode_parallax_services($atts, $content = null) {	
   extract(shortcode_atts(array(
	 "color" => '',
	 "icon_background_color" => '',
   	 "icon" => 'fa-arrows-alt',
     "title" => '',
     "link_text" => '',
	 "link_url" => '',
	 "style" => '1'	
	 ), $atts));
	 
	$style_css = 'color:#'.$color.';';
	if(!empty($icon_background_color)):
	$style_css .= 'background-color: #'.$icon_background_color.';';
	$icon_class = '';
	else:
	$icon_class = ' no-background';
	endif;
	
	$output = '';		
	$output .= '<div class="service hb-animate-element bottom-to-top style-'.$style.'">';
	$output .= '<div class="service-content parallax-service-content style-'.$style.'">';
	
	if($style == '1'):	
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		$output .= '<div class="service-desc">';	
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';		
	$output .= '<div class="description other-font">'.do_shortcode($content).'</div>';	
	if(!empty($link_text)):
		if(!empty($link_url)):
			$output .= '<div class="service-read-more other-font"><a herf="'.$link_url.'" class="other-read-more">'.$link_text.'<i class="fa fa-arrow-right"></i></a></div>';	
		else:
			$output .= '<div class="service-read-more other-font">'.$link_text.'></div>';	
		endif;
	endif;
	endif;	
	
	if($style == '2'):	
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		$output .= '<div class="service-desc">';	
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';		
	$output .= '<div class="description other-font">'.do_shortcode($content).'</div>';	
	if(!empty($link_text)):
		if(!empty($link_url)):
			$output .= '<div class="service-read-more other-font"><a herf="'.$link_url.'" class="other-read-more">'.$link_text.'<i class="fa fa-arrow-right"></i></a></div>';	
		else:
			$output .= '<div class="service-read-more other-font">'.$link_text.'></div>';	
		endif;
	endif;
	endif;
	
	if($style == '3'):	
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		$output .= '<div class="service-desc">';	
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';		
	$output .= '<div class="description other-font">'.do_shortcode($content).'</div>';	
	if(!empty($link_text)):
		if(!empty($link_url)):
			$output .= '<div class="service-read-more other-font"><a herf="'.$link_url.'" class="other-read-more">'.$link_text.'<i class="fa fa-arrow-right"></i></a></div>';	
		else:
			$output .= '<div class="service-read-more other-font">'.$link_text.'></div>';	
		endif;
	endif;
	endif;				
	
	$output .= '</div>';			
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode("parallaxservices", "shortcode_parallax_services");

/***************** Services ****************/
function shortcode_home_cms_block($atts, $content = null) {	
   extract(shortcode_atts(array(
	 "color" => '',
	 "icon_background_color" => '',
   	 "icon" => 'fa-arrows-alt',
     "title1" => '',
	 "title2" => '',
     "link_text" => '',
	 "link_url" => '',
	 "padding"	=> '',
	 ), $atts));
	 
	$style_css = 'color:#'.$color.';';
	if(!empty($icon_background_color)):
	$style_css .= 'background-color: #'.$icon_background_color.';';
	$icon_class = '';
	else:
	$icon_class = ' no-background';
	endif;
	
	$output = '';		
	$output .= '<div class="service hb-animate-element bottom-to-top" style="padding:'.$padding.'">';
	$output .= '<div class="service-content-wrapper">';
				
	if(!empty($icon))
		$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
	$output .= '<div class="service-desc">';	
	if(!empty($title1) && !empty($title2))
		$output .= '<div class="title service-text"><span class="title1">'.$title1.'</span><span class="title2">'.$title2.'</span></div>';	
	
		
	$output .= '<div class="description other-font">'.do_shortcode($content).'</div>';
	
	if(!empty($link_text)):
		if(!empty($link_url)):
			$output .= '<div class="service-read-more other-font"><a herf="'.$link_url.'" class="other-read-more">'.$link_text.'<i class="fa fa-arrow-right"></i></a></div>';	
		else:
			$output .= '<div class="service-read-more other-font">'.$link_text.'></div>';	
		endif;
	endif;	
	
	$output .= '</div>';			
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode("homecmsblock", "shortcode_home_cms_block");




/***************** Code ****************/
function shortcode_code($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'style'	=> '1'	
	), $atts));
	
	$output = '';
	$output .= '<div class="code">';
	$output .=	do_shortcode($content);
	$output .=	'</div>';
	return $output;
}
add_shortcode('tm_code', 'shortcode_code');

/*============ Container ===========*/
function shortcode_container($atts, $content = null){
	extract(shortcode_atts(array(
		'background_color' => '',
		'background_image' => '',
		'background_position' => '',
		'background_repeat' => 'no-repeat',
		'background_attachment' => '',
		'parallax' => false,
		'background_size' => '',
		'padding' => '0',
		'margin' => '0',
		'align'=> '',
		'color'=> '',	
		'classname'=>'',
		'overflow' => 'hidden',
		'toggle_title' => '',
		'toggle' => 'off'
	), $atts));
	
	$variables  = '';
	$datasourceurl = '';
	
	if(!empty($background_color))
		$variables .= 'background-color: #'.$background_color.';';  
    $variables .= 'padding:'.$padding.';';
	$variables .= 'margin:'.$margin.';';	
	
	if(!empty($color))
		$variables .= 'color:#'.$color.';';
	$variables .= 'overflow:'.$overflow.';';	
	
	if(!empty($background_image)):
		$variables .= 'background-image: url('.$background_image.');';
	endif;
	if(!empty($background_repeat)):	
		$variables .= 'background-repeat:'.$background_repeat.';';
	endif;
	if(!empty($background_size)):	
		$variables .= 'background-size:'.$background_size.';';
	endif;
	if(!empty($background_attachment)):	
		$variables .= 'background-attachment:'.$background_attachment.';';
	endif;
	if(!empty($background_position)):	
		$variables .= 'background-position:'.$background_position.';';
	endif;
	$output = '';
	if($parallax == "true") :
		if(!empty($background_image)):
			$datasourceurl = 'data-source-url='.$background_image;  
			$classname .= ' parallax ';
		 endif;	
    endif;
	
	if(( $toggle == 'on') && (!empty($toggle_title))) :					
			$classname .= ' toggle-content ';		
    endif;		
	
	$output .= '<div class="main-container '.$align.' '.$classname.'" style="'.$variables.'"' .$datasourceurl.'>';		
	$output .= '<div class="inner-container">';	
	if(( $toggle == 'on') && (!empty($toggle_title))) :	
	$output .= '<div class="toggle_title title-outer widget"><h1 class="widget-title">'.$toggle_title.'</h1></div>';	
	$output .= '<div class="toggle-block">';	
	 endif;
	$output .=	do_shortcode($content);
	if(( $toggle == 'on') && (!empty($toggle_title))) :	
		$output .= '</div>';
	endif;
	$output .= '</div></div>';
	return $output;
}
add_shortcode('container', 'shortcode_container');
/*============ One half ===========*/
function shortcode_one_half($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left',
	'class' => ''	
	), $atts));
	
	$output = '';
	$output .= '<div class="one_half '.$class.'">';	
	$output .= '<div class="one_half_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('one_half', 'shortcode_one_half');
/*============ Inner One half ===========*/
function shortcode_inner_one_half($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left',
	'class' =>''	
	), $atts));
	
	$output = '';
	$output .= '<div class="one_half '.$class.'">';	
	$output .= '<div class="one_half_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('inner_one_half', 'shortcode_inner_one_half');
/*============ One third ===========*/
function shortcode_one_third($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => ''	
	), $atts));
	
	$output = '';
	$output .= '<div class="one_third">';	
	$output .= '<div class="one_third_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('one_third', 'shortcode_one_third');
/*============ One fourth ===========*/
function shortcode_one_fourth($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left',
	'padding' => '0',
	'background_color' => '',
	), $atts));
	
	$output = '';
	$output .= '<div class="one_fourth">';	
	$output .= '<div class="one_fourth_inner content_inner '.$align.'" style="background-color:#'.$background_color.';margin:'.$margin.';padding:'.$padding.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('one_fourth', 'shortcode_one_fourth');
/*============ One Fifth ===========*/
function shortcode_one_fifth($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left'
	), $atts));
	
	$output = '';
	$output .= '<div class="one_fifth">';	
	$output .= '<div class="one_fifth_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('one_fifth', 'shortcode_one_fifth');
/*============ One sixth ===========*/
function shortcode_one_sixth($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left'
	), $atts));
	
	$output = '';
	$output .= '<div class="one_sixth">';	
	$output .= '<div class="one_sixth_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('one_sixth', 'shortcode_one_sixth');
/*============ Two third ===========*/
function shortcode_two_third($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left'
	), $atts));
	
	$output = '';
	$output .= '<div class="two_third">';	
	$output .= '<div class="two_third_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('two_third', 'shortcode_two_third');
/*============ Two Fifth ===========*/
function shortcode_two_fifth($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left'
	), $atts));
	
	$output = '';
	$output .= '<div class="two_fifth">';	
	$output .= '<div class="two_fifth_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('two_fifth', 'shortcode_two_fifth');
/*============ Three Fourth ===========*/
function shortcode_three_fourth($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left'
	), $atts));
	
	$output = '';
	$output .= '<div class="three_fourth">';	
	$output .= '<div class="three_fourth_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('three_fourth', 'shortcode_three_fourth');
/*============ Three Fifth ===========*/
function shortcode_three_fifth($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left'
	), $atts));
	
	$output = '';
	$output .= '<div class="three_fifth">';	
	$output .= '<div class="three_fifth_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('three_fifth', 'shortcode_three_fifth');
/*============ Four Fifth ===========*/
function shortcode_four_fifth($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left'
	), $atts));
	
	$output = '';
	$output .= '<div class="four_fifth">';	
	$output .= '<div class="four_fifth_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('four_fifth', 'shortcode_four_fifth');
/*============ Four Fifth ===========*/
function shortcode_five_sixth($atts, $content = null){
	extract(shortcode_atts(array(
	'content_width' => '100%',
	'margin' => '0',
	'align' => 'left'
	), $atts));
	
	$output = '';
	$output .= '<div class="five_sixth">';	
	$output .= '<div class="five_sixth_inner content_inner '.$align.'" style="margin:'.$margin.';width:'.$content_width.';">';
	$output .=	do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('five_sixth', 'shortcode_five_sixth');

/***************** Static Text ****************/
function shortcode_static_text($atts, $content = null){
	extract(shortcode_atts(array(
	'align' => 'left',
	'classname' => ''
	), $atts));
	
	$output = '';
	$output .= '<div class="static-text-container '.$align.' '.$classname.'">';
	$output .= '<div class="text">'.do_shortcode($content).'</div>';
	$output .= '</div>';	
	return $output;
}
add_shortcode('text', 'shortcode_static_text');

/***************** Static Text Newsletter****************/
function shortcode_tm_newsletter($atts, $content = null){
	extract(shortcode_atts(array(	
	'icon' => 'fa-envelope-o',
	'title' => 'Subcribe to our',
	'text'  => 'Newsletter',
	), $atts));
	
	$output = '';
	$output .= '<div class="tm-newsletter-container">';
	$output .= '<span class="tm-newsletter-icon"><i class="fa '.$icon.'"></i></span>';
	$output .= '<div class="tm-newsletter-title">'.$title.'</div>';
	$output .= '<div class="tm-newsletter-text">'.$text.'</div>';
	$output .= '<div class="tm-newsletter-form">'.do_shortcode($content).'</div>';
	$output .= '</div>';	
	return $output;
}
add_shortcode('tm_newsletter', 'shortcode_tm_newsletter');

/***************** Blog Posts ****************/
function shortcode_blog_posts_container($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => 'grid',
		'items_per_column' => 3,
		'number_of_posts' => 10,
		'category' => '',
		'width' => '264',
		'height' => '180',
		'linkurl' => '',
		'moretext' => '',
	), $atts));
	
	$morevariable = "";
	
	if(!empty($linkurl) || !empty($linkurl)):
		$morevariable .= '<div class="blog-more-link"><a href='.$linkurl.'>'.$moretext.'</a></div>';
	endif;
	
	$i = 1;
	wp_reset_postdata();
	$args = array(
		'posts_per_page' => $number_of_posts,
		'post_status' => 'publish',
		'category' => $category,
		'orderby' => 'date'		
	);		
	
	$output = '';
	$blog_array = new WP_Query( $args );	
	$count = $blog_array->post_count;
	$output = '';
	if ( $blog_array->have_posts() ):
	$output .= '<div id="blog-posts-products" class="blog-posts-content posts-content">';	
	if($type == "slider") { 
		if($count > $items_per_column)
			$output .= '<div id="'.$items_per_column.'_blog_carousel" class="slider blog-carousel">';
		else
			$output .= '<div id="blog_grid" class="blog-grid grid cols-'.$items_per_column.'">';
	} else {
		$output .= '<div id="blog_grid" class="blog-grid grid cols-'.$items_per_column.'">';
	}
	
	while ( $blog_array->have_posts() ) : $blog_array->the_post();
			
		if($i % $items_per_column == 1 )
			$class = " first";
		elseif($i % $items_per_column == 0 )
			$class = " last";
		else
			$class = "";
		$post_day = get_the_date('d');
		$post_month = get_the_date('m');
		$post_year = get_the_date('Y');
		$post_author = get_the_author();
		$args = array(
			   'status' => 'approved',
			   'number' => '5',
			   'post_id' => get_the_ID()
		    );
		 $comments = wp_count_comments(get_the_ID()); 				   
		if ( has_post_thumbnail() && ! post_password_required() ) :	
			$post_thumbnail_id = get_post_thumbnail_id();
			$image = wp_get_attachment_url( $post_thumbnail_id );			
		else:
			$image = get_template_directory_uri()."/images/placeholders/placeholder.jpg";					
		endif;
		$src = shoptown_mr_image_resize($image, $width, $height, true, 't', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$src = shoptown_mr_image_resize($src, $width, $height, true, 't', false);			
		endif;
		
				$output .= '<div class="item container '.$class.'">';
					$output .= '<div class="container-inner">';
			
					$output .= '<div class="post-image">';
						$output .= '<img src="'.$src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
						$output .= '<div class="block_hover">';
						$output .= '<div class="links">';				
						$output .= '<a href="'.$image.'" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';				
						$output .= '<a href="'.get_permalink().'" class="icon"><i class="fa fa-link"></i></a>';
						$output .= '</div>';
						$output .= '</div>';															
					$output .= '</div>';
					
					$output .= '<div class="post-content-inner">';
					
					$output .= '<div class="post-detail"><div class="post-date"><div class="month">'.$post_month.', </div> <div class="day">'.$post_day.', </div> <div class="year">'.$post_year.'</div></div>';
					$shorttitle = substr(get_the_title('','',FALSE),0,50);
					$output .= '<div class="post-title"><a href="'.get_permalink().'" title="'.get_the_title().'">'.$shorttitle.'</a></div>';
					
					
					$output .= '<div class="post-description">'.shoptown_blog_post_excerpt(60).'</div>';
					$output .= '<div class="read-more"><a href="'.get_permalink().'" title="'.get_the_title().'">'.esc_html__('read more...', 'shoptown').'</a></div>';									
					$output .= '</div>';
					$output .= '</div>';
			$output .= '</div></div>';
		$i++;
	endwhile;
	$output .= $morevariable;
	wp_reset_postdata();
	$output .=	'</div></div>';
	else:
	$output .= '<div class="no-result">'.esc_html__('No results found...', 'shoptown').'</div>';
	endif;
	return $output;
}
add_shortcode('blog_posts', 'shortcode_blog_posts_container');


/***************** Sidebar Blog Posts ****************/
function shortcode_sidebar_blog_posts_container($atts, $content = null, $code) {
	extract(shortcode_atts(array(
			'type' => 'grid',
		'items_per_column' => 3,
		'number_of_posts' => 10,
		'category' => ''
	), $atts));
	
	$i = 1;
	wp_reset_postdata();
	$args = array(
		'posts_per_page' => $number_of_posts,
		'post_status' => 'publish',
		'category' => $category,
		'orderby' => 'date'
	);		
	
	$output = '';
	$blog_array = new WP_Query( $args );	
	$count = $blog_array->post_count;
	$output = '';
	if ( $blog_array->have_posts() ):
	$output .= '<div id="blog-posts-products" class="blog-posts-content posts-content">';	
	if($type == "slider") { 
		if($count > $items_per_column)
			$output .= '<div id="'.$items_per_column.'_sidebar_blog_carousel" class="slider sidebar-blog-carousel">';
		else
			$output .= '<div id="blog_grid" class="blog-grid grid cols-'.$items_per_column.'">';
	} else {
		$output .= '<div id="blog_grid" class="blog-grid grid cols-'.$items_per_column.'">';
	}
	
	while ( $blog_array->have_posts() ) : $blog_array->the_post();
			
		if($i % $items_per_column == 1 )
			$class = " first";
		elseif($i % $items_per_column == 0 )
			$class = " last";
		else
			$class = "";
		$post_day = get_the_date('j');
		$post_month = get_the_date('F');
		$post_year = get_the_date('Y');
		$post_author = get_the_author();
		$args = array(
			   'status' => 'approved',
			   'number' => '5',
			   'post_id' => get_the_ID()
		    );
		 $comments = wp_count_comments(get_the_ID()); 				   
		if ( has_post_thumbnail() && ! post_password_required() ) :	
			$post_thumbnail_id = get_post_thumbnail_id();
			$image = wp_get_attachment_url( $post_thumbnail_id );			
		else:
			$image = get_template_directory_uri()."/images/placeholders/placeholder.jpg";					
		endif;
		$src = shoptown_mr_image_resize($image, 280, 200, true, 't', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$src = shoptown_mr_image_resize($src, 280, 200, true, 't', false);			
		endif;
			$output .= '<div class="item container '.$class.'">';
			$output .= '<div class="container-inner">';
				$output .= '<div class="post-image">';
					$output .= '<img src="'.$src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
					$output .= '<div class="block_hover">';
					$output .= '<div class="links">';				
					$output .= '<a href="'.$image.'" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';				
					$output .= '<a href="'.get_permalink().'" class="icon"><i class="fa fa-link"></i></a>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="post-image-hover"></div>';
					$output .= '<a href="'.$image.'" data-lightbox="example-set" class="icon mustang-gallery"></a>';
					
				$output .= '</div>';
				
				$output .= '<div class="post-content-inner">';				
				
					$output .= '<div class="post-date"></i><div class="month">'.$post_month.'</div> <div class="day">'.$post_day.'</div>, <div class="year">'.$post_year.'</div></div>';	
				if($comments->total_comments > 0):
					$output .='<div class="comments-link"><i class="fa fa-comments"> </i>'.$comments->total_comments.' comment </div> <div class="post_author1"><i class="blog-icon fa fa-user"></i>'.$post_author.'&nbsp;&nbsp;</div>';
				else:
					$output .='<div class="comments-link"> <i class="fa fa-comments"> </i> Leave a comment </div> <div class="post_author1"><i class="blog-icon fa fa-user"></i>'.$post_author.'&nbsp;&nbsp;</div>';
				endif;				
				$shorttitle = substr(get_the_title('','',FALSE),0,50);
				$output .= '<div class="post-title"><a href="'.get_permalink().'" title="'.get_the_title().'">'.$shorttitle.'</a></div>';
				$output .= '<div class="post-description">'.shoptown_blog_post_excerpt(18).'</div>';				
			     
		
			$output .= '</div></div></div>';
		$i++;
	endwhile;
	wp_reset_postdata();
	$output .=	'</div></div>';
	else:
	$output .= '<div class="no-result">'.esc_html__('No results found...', 'shoptown').'</div>';
	endif;
	return $output;
}
add_shortcode('sidebar_blog_posts', 'shortcode_sidebar_blog_posts_container');

/***************** Google Map ****************/
function tm_mapshortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'latlong' => '21.182626,72.831674',
      'icon' => get_template_directory_uri().'/images/megnor/map-pin.png',
      'height' => '400',
      'id' => '0',	 
	  'class'=>'',
	  'apikey' => 'AIzaSyD7jVYXIv6_BEZKW1wcsDZ2ph756-SaLyw',
      ), $atts ) );
	
	$text = preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content));

	
	if (!$latlong) { $latlong = '21.182626,72.831674'; }
		if (!$icon) { $icon = get_template_directory_uri().'/images/megnor/map-pin.png'; }
		if (!$height) { $height = ""; } else { $height = 'style="height:'.$height.'px;"'; }
		if (!$id) { $id = 0; }
		
		$text = str_replace(chr(13),'<br>',$text);
        $text = str_replace(chr(10),'',$text);

		return '<div id="map'.$id.'" class="google-map '.$class.'" '.$height.'></div>
      	<script type="text/javascript" src="http://maps.google.com/maps/api/js?key='.$apikey.'&sensor=false"></script>
        <script type="text/javascript">
			function mapinitialize'.$id.'() {
				var latlng = new google.maps.LatLng('.$latlong.');
				var myOptions = {
					zoom: 17,
					center: latlng,
					scrollwheel: false,
					scaleControl: true,
					disableDefaultUI: false,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("map'.$id.'"),myOptions);
				
				var image = "'.$icon.'";
				var marker = new google.maps.Marker({
					map: map, 
					icon: image,
					position: map.getCenter()
				});
				
				var contentString = "'.$text.'";
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
							
				google.maps.event.addListener(marker, "click", function() {
				  infowindow.open(map,marker);
				});													
			}
			mapinitialize'.$id.'();
		</script>';			
}
add_shortcode('tm_map', 'tm_mapshortcode');
/***************** Addess ****************/
function shortcode_address($atts, $content = null)
{
	extract(shortcode_atts(array(
			'title' => '',	
			'description' => '',
			'address_label' => 'Address:',
			'phone_label' => 'Phone numbers:',
			'phone' => '',
			'email_label' => 'Email:',
			'email' => '',
			'email_link' => '',
			'other_label' => 'We are open:',
			'other' => '',
									 
		), $atts));
		$output = '';
		$output .= '<div class="address-container hb-animate-element right-to-left">';
		if(!empty($title))
			$output .= '<h1 class="address-title simple-title"><span>'.$title.'</span></h1>';
		if(!empty($description))
			$output .= '<div class="address-description description">'.$description.'</div>';
			

		$output .= '<div class="address-text first"><div class="address-text-inner"><div class="icon"><i class="fa fa-map-marker"></i></div> <div class="content"><div class="address-label">'.$address_label.'</div>'.do_shortcode($content).'</div> </div></div>';
		
		if(!empty($phone)):
			$output .= '<div class="address-text second"><div class="address-text-inner"><div class="icon"><i class="fa fa-phone"></i></div> <div class="content"><div class="address-label">'.$phone_label.'</div>'.$phone.'</div> </div></div>';
		endif;
		
		if(!empty($email)):
			if(!empty($email_link)):
				$output .= '<div class="address-text third"><div class="address-text-inner"><div class="icon"><i class="fa fa-envelope "></i></div> <div class="content"><div class="address-label">'.$email_label.'</div><a herf="'.$email_link.'">'.$email.'</a><p>'.$other.'</p></div></div></div>';	
			else:
				$output .= '<div class="address-text><div class="address-text-inner"><div class="icon"><i class="fa fa-envelope "></i></div>  <div class="content"><div class="address-label">'.$email_label.'</div>'.$email.'></div></div></div>';	
			endif;
		endif;	
		if(!empty($other)):
			/*$output .= '<div class="address-label">'.$other_label.'</div>';*/
			// $output .= '<div class="address-text"><i class="fa fa-info"></i>'.$other.'</div>';
		endif;
		$output .= '</div>';
		return $output;
	}
add_shortcode('tm_address', 'shortcode_address');
/***************** Static links ****************/
function shortcode_link($atts, $content = null)
{
	extract(shortcode_atts(array(
			'link_url' =>  '',								 
		), $atts));
		$output = '';
		if(!empty($link_url))
		$output .= '<li><a href="'.$link_url.'">'.do_shortcode($content).'</a></li>';
		else
		$output .= '<li>'.do_shortcode($content).'</li>';
		return $output;
	}
add_shortcode('link', 'shortcode_link');
function shortcode_tm_links($atts, $content = null)
{
	extract(shortcode_atts(array(				 
		), $atts));
		$output = '';
		$output .= '<ul class="links">';
		$output .= do_shortcode($content);
		$output .=	'</ul>';
		return $output;
	}
add_shortcode('tm_links', 'shortcode_tm_links');

/*============== All Boxes ==================*/
function shortcode_successbox($atts, $content=null, $code="") { 
    $return = '<div class="success-message message">'; 
    $return .= $content; 
    $return .= '</div>'; 
    return $return; 
}
add_shortcode('tm_success' , 'shortcode_successbox' ); 
function shortcode_errorbox($atts, $content=null, $code="") {
     $return = '<div class="error-message message">'; 
    $return .= $content;
     $return .= '</div>'; 
    return $return;
}
add_shortcode('tm_error' , 'shortcode_errorbox' );
function shortcode_messagebox($atts, $content=null, $code="") { 
    $return = '<div class="message-message message">'; 
    $return .= $content; 
    $return .= '</div>'; 
    return $return; 
}
add_shortcode('tm_message' , 'shortcode_messagebox' );
function shortcode_warningbox($atts, $content=null, $code="") { 
    $return = '<div class="warning-message message">'; 
    $return .= $content; 
    $return .= '</div>'; 
    return $return; 
}
add_shortcode('tm_warning' , 'shortcode_warningbox' );
/***************** Products ****************/
function shortcode_woo_products_container($atts, $content = null, $code) {
	global $logotype;
	extract(shortcode_atts(array(
		'type' => 'grid',
		'items_per_column' => 3,
		'product' => 'shop',
		'classname' => ''		
	), $atts));
	$logotype = $type;	
	static  $cnt = 1;
	$output = '';	
		
	
	$output .= '<div class="woo-products woo-content products_block '.$product.' '.$classname.'">';
	
	if($type == "slider") { 
		$output .= '<div id="'.$items_per_column.'_woo_carousel" class="woo-carousel">';
	} else {
		$output .= '<div class="woo_grid woo-grid cols-'.$items_per_column.'">';
	}
	 $output .= do_shortcode($content).'</div>';
	if($type == "grid") {  
		$output .=	'<div class="tm-message"><i class="fa fa-frown-o"></i>'.get_option( 'tm_nomore' ).'</div>';
		$output .=	'<button class="woocount">'.esc_html__('View More', 'shoptown').'</button>';		
	}
	
	$output .='</div>';
	$cnt++;
	return $output;
}
add_shortcode('woo_products', 'shortcode_woo_products_container');

/******************* WooCommerce Small Prodcuts ******/
function shortcode_woo_small_products_container($atts, $content = null, $code) {
	global $logotype;
	extract(shortcode_atts(array(
		'type' => 'grid',
		'items_per_column' => 2,
	), $atts));
	$logotype = $type;
	
	$output = '';
	$output .= '<div id="woo-small-products" class="woo-content products_block">';
	if($type == "slider") { 
		$output .= '<div id="'.$items_per_column.'_woo_carousel" class="woo-carousel">';
	} else {
		$output .= '<div id="woo_grid" class="woo-grid cols-'.$items_per_column.'">';
	}
	$output .=	do_shortcode($content).'</div></div>';
	return $output;
}
add_shortcode('woo_small_products', 'shortcode_woo_small_products_container');

/*=============CMS Block ============ */
function shortcode_cms_block($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'image' => '',
		'background_color' => '',
		'link_url' => '',
		'margin' => '',	
		'textalign' => '',
		'hover' => 'no',
		'bgimage' => 'no',
		'backimageheight' => '606px',
		'classname' => '',
		'animation' => '',
		'text1'  => '',
		'text2'  => '',
		'text3'  => '',
		'text4'  => '',
		'text5'  => ''
   ), $atts));
	$output = '';
	$variables = '';

	$cmstext1 = '';	
	$cmstext2 = '';	
	$cmstext3 = '';
	$cmstext4 = '';	
	$cmstext5 = '';		
	$dataanimated = '';
	$backimage='';
									
		
		if(!empty($text1)) :	
				$cmstext1 = '<div class="text1 static-text">'.$text1.'</div>';		
		endif;
		if(!empty($text2)) :	
				$cmstext2 = '<div class="text2 static-text">'.$text2.'</div>';		
		endif;
		if(!empty($text3)) :	
				$cmstext3 = '<div class="text3 static-text">'.$text3.'</div>';		
		endif;
		if(!empty($text4)) :	
				$cmstext4 = '<div class="text4 static-text">'.$text4.'</div>';		
		endif;
		if(!empty($text5)) :	
				$cmstext5 = '<div class="text5 static-text">'.$text5.'</div>';		
		endif;
						
		if(!empty($margin)):
			$variables .= 'margin:'.$margin.';';			
		endif;
		
		if(!empty($background_color)):
			$variables .= 'background-color:'.$background_color.';';			
		endif;
		
		if(!empty($animation)):
			$classname .= ' animated ';
			$dataanimated = 'data-animated="'.$animation.'"';
		endif;
		
	
		
		if($bgimage=="yes"):
			$backimage="background-image: url('".$image."')  ;height:".$backimageheight.";";			
		endif;
		
		if($hover == "yes"):
			$output .='<div class="cms-banner-item '.$classname.'" '.$dataanimated.'  style="'.$variables.'"><div class="cms-banner-inner" style="'.$backimage.'"><a href="'.$link_url.'" target="_self">';
				if(!empty($image)) :	
					$output .='<div class="cms-banner-img"><img src="'.$image.'" alt=""/></div>';
				endif;
			$output .='<div class="static-wrapper"><div class="static-inner"> '.$cmstext1.' '.$cmstext2.' '.$cmstext3.' '.$cmstext4.' '.$cmstext5.' <div class="hover-div"></div></div></div></a></div></div>';	
		else :
			$output .='<div class="cms-banner-item '.$classname.'" '.$dataanimated.'  style="'.$variables.'"><div class="cms-banner-inner" style="'.$backimage.'"><a href="'.$link_url.'" target="_self">';
				if(!empty($image)) :	
					$output .='<div class="cms-banner-img"><img src="'.$image.'" alt=""/></div>';
				endif;
			$output .='<div class="static-wrapper"><div class="static-inner"> '.$cmstext1.' '.$cmstext2.' '.$cmstext3.' '.$cmstext4.' '.$cmstext5.'</div></div></a></div></div>';	
		endif;
	return $output;
}
add_shortcode('tm_cms_block', 'shortcode_cms_block');
/*=============Sub Banner ============ */
function shortcode_subbanner($atts, $content = null)
{
	extract(shortcode_atts(array(
			'image'	=> '',
			'padding' => '',
			'margin' => '',
			'height' => '',
			'width' => '',
			'class' => '',
			'link_url' => ''	
			
		), $atts));
		
		$variables  = '';
		$output = '';
		
		if(!empty($image)) :
			$variables .= 'padding:'.$padding.';';
			$variables .= 'margin:'.$margin.';';
		endif;
		
		$output .= '<div class="sub-container '.$class.'" style="'.$variables.'">';
		$output .= '<div class="inner-image"><a href="'.$link_url.'" target="_Blank"><img src='.$image.' height="'.$height.'" width="'.$width.'"></a></div>'; 
		$output .= '</div>';
		return $output;
}
add_shortcode('subbanner', 'shortcode_subbanner');

/*=============Latest Product Information============ */
function shortcode_information($atts, $content = null) {	
   extract(shortcode_atts(array(
   'title' => '',
   'description' => '',
   ), $atts));
   
	$output = '';
	$output	.= '<div class="information">';	
		$output .= '<div class="info-title">' .$title. '</div>';	
		$output	.= '<div class="info-description">' .$description. '</div>';	
	$output	.= '</div>';	
	return $output;
}
add_shortcode("information", "shortcode_information");

/***** Product Category Tabs List******/
function shortcode_woo_category_slider($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'category_ids' => '',
		'items_per_column' => '4',
	), $atts));	
	
	$category_ids_array = explode(",",$category_ids);
	$category_ids_array[] = $category_ids_array;
	
	$output = '';
	$output .= '<div id="categorytab">';
		$category_ids = '';
		$term_category_id = '';
		$term_category_name = '';
		$term_categroy_slug = '';
		$term_thumbnai_id = '';
		$term_image = '';			
		$output .= '<ul class="resp-tabs-list">';
			foreach($category_ids_array as $key){
				$category_ids = get_term( $key, 'product_cat' );
				if($category_ids){
					$term_category_id = $category_ids->term_id;
					$term_category_name = $category_ids->name;
					$term_category_slug = $category_ids->slug;
					$term_thumbnail_id =  get_woocommerce_term_meta( $term_category_id , 'thumbnail_id', true );		
					$term_image = wp_get_attachment_url( $term_thumbnail_id );  // get the image URL
					$output .= '<li>'.$term_category_name.'</li>';
				}
			}
		$output .= '</ul>';
		$output .= '<div class="resp-tabs-container">';
			foreach($category_ids_array as $key){
				$term_array = get_term( $key, 'product_cat' );
					$term_category_id = $term_array->term_id;
					$term_category_slug = $term_array->slug;
						$output .= do_shortcode('[woo_products type="grid" items_per_column="4"][product_category category="'.$term_category_slug.'"][/woo_products]');
			}
		$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('woo_categories', 'shortcode_woo_category_slider');

function shortcode_product_tabs($atts, $content = null)
{
	extract(shortcode_atts(array(
		'tab1_text' => '',
		'tab2_text' => '',
		'tab3_text' => '',
		'tab4_text' => '',
	), $atts));
	
	$output = '';
	
	$output .= '<div id="horizontalTab">';
		$output .= '<ul class="resp-tabs-list">';
			$output .= '<li ><div class="tab-title">'.$tab1_text.'</div></li>';
			$output .= '<li ><div class="tab-title">'.$tab2_text. '</div> </li>';
			$output .= '<li><div class="tab-title">'.$tab3_text. '</div></li>';	
			$output .= '<li><div class="tab-title">'.$tab4_text. '</div></li>';	
		$output .= '</ul>';
		$output .= '<div class="resp-tabs-container">';
		$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('tm_product_tabs', 'shortcode_product_tabs');


function shortcode_product_tab($atts, $content = null)
{
	extract(shortcode_atts(array(							 
		), $atts));
		$output = '';
		$output .= do_shortcode($content);
		return $output;
	}
add_shortcode('tm_tab_home', 'shortcode_product_tab');

/*****		Parallax	******/
function shortcode_parallax_image($atts, $content = null)
{
	extract(shortcode_atts(array(
		'background_color' => 'dddddd',
		'background_image' => '',
		'background_repeat' => 'repeat-y',
		'background_position' => '50% 0',
		'background_attachment' => '',
		'image' => '',
		'parallax' => false,
		'background_size' => '',							 		
		'highlight_text1' => '',
		'highlight_text2' =>'',		
		'description' => '',
		'classname' => ''
		), $atts));
		
		$output = '';
		$variables  = '';
		$datasourceurl = '';
		$imagevariables = "";
		
		if(!empty($background_image)):
			$variables .= 'background-color: #'.$background_color.';';  
		endif;
		if(!empty($background_image)):
			$variables .= 'background-image: url('.$background_image.');';
		endif;
		if(!empty($background_repeat)):	
			$variables .= 'background-repeat:'.$background_repeat.';';
		endif;
		if(!empty($background_size)):	
			$variables .= 'background-size:'.$background_size.';';
		endif;
		if(!empty($background_attachment)):	
			$variables .= 'background-attachment:'.$background_attachment.';';
		endif;
		if(!empty($background_position)):	
			$variables .= 'background-position:'.$background_position.';';
		endif;
		
		if(!empty($image)):	
			$imagevariables .= '<div class="static-image"><img src="'.$image.'"/></div>';
		endif;
		
		if($parallax == 'true') :
			if(!empty($background_image)):
				$datasourceurl .= 'data-source-url='.$background_image;  
				$classname .= ' parallax';
			 endif;	
    	endif;	
		
		$output .= '<div class="parallax-container '.$classname.'" style="'.$variables.'"' .$datasourceurl.'>';	
		$output .= '<div class="parallax-inner-container theme-container">';
		$output .= '<div class="parallax-text-wrapper">'.$imagevariables.'<div class="parallax-text"><span class="hightlight-text1">'.$highlight_text1.'</span><span class="hightlight-text2">'.$highlight_text2.'</span> <div class="description">' .$description. '</div></div>';		
		$output .= '</div>';
		$output .= do_shortcode($content).'</div></div>';
		return $output;
}
add_shortcode('tm_parallax', 'shortcode_parallax_image');

//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');
 
//activate own function
add_shortcode('gallery', 'msdva_gallery_shortcode');
function msdva_gallery_shortcode($attr) {
$post = get_post();
 
static $instance = 0;
$instance++;
 
if ( ! empty( $attr['ids'] ) ) {
// 'ids' is explicitly ordered, unless you specify otherwise.
if ( empty( $attr['orderby'] ) )
$attr['orderby'] = 'post__in';
$attr['include'] = $attr['ids'];
}
 
// Allow plugins/themes to override the default gallery template.
$output = apply_filters('post_gallery', '', $attr);
if ( $output != '' )
return $output;
 
// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
if ( isset( $attr['orderby'] ) ) {
$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
if ( !$attr['orderby'] )
unset( $attr['orderby'] );
}
 
extract(shortcode_atts(array(
'order' => 'ASC',
'orderby' => 'menu_order ID',
'id' => $post ? $post->ID : 0,
'itemtag' => 'dl',
'icontag' => 'dt',
'captiontag' => 'dd',
'divtag' => 'div',
'columns' => 3,
'size' => 'full',
'include' => '',
'exclude' => '',
'link' => 'file' // CHANGE #1
), $attr, 'gallery'));
 
$id = intval($id);
if ( 'RAND' == $order )
$orderby = 'none';
 
if ( !empty($include) ) {
$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
 
$attachments = array();
foreach ( $_attachments as $key => $val ) {
$attachments[$val->ID] = $_attachments[$key];
}
} elseif ( !empty($exclude) ) {
$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
} else {
$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
}
 
if ( empty($attachments) )
return '';
 
if ( is_feed() ) {
$output = "\n";
foreach ( $attachments as $att_id => $attachment )
$output .= shoptown_wp_get_attachment_link($att_id, $size, true) . "\n";
return $output;
}
 
$itemtag = tag_escape($itemtag);
$captiontag = tag_escape($captiontag);
$icontag = tag_escape($icontag);
$valid_tags = wp_kses_allowed_html( 'post' );
if ( ! isset( $valid_tags[ $itemtag ] ) )
$itemtag = 'dl';
if ( ! isset( $valid_tags[ $captiontag ] ) )
$captiontag = 'dd';
if ( ! isset( $valid_tags[ $icontag ] ) )
$icontag = 'dt';
 
$columns = intval($columns);
$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
$float = is_rtl() ? 'right' : 'left';
$selector = "gallery-{$instance}";
 
$gallery_style = $gallery_div = '';
if ( apply_filters( 'use_default_gallery_style', true ) )
$gallery_style = "
<style type='text/css'>
#{$selector} {
margin: auto;
}
#{$selector} .gallery-item {
float: {$float};
margin-top: 10px;
text-align: center;
width: {$itemwidth}%;
}
#{$selector} img {
border: 2px solid #cfcfcf;
}
#{$selector} .gallery-caption {
margin-left: 0;
}
/* see gallery_shortcode() in wp-includes/media.php */
</style>";
$size_class = sanitize_html_class( $size );
$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
 
$i = 0;
foreach ( $attachments as $id => $attachment ) {
$image_url = $attachment->guid;
$image_output = shoptown_wp_get_attachment_link( $id, $size, true, false );
$image_meta = wp_get_attachment_metadata( $id );
 
$orientation = '';
if ( isset( $image_meta['height'], $image_meta['width'] ) )
$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
$output .= "<{$itemtag} class='gallery-item'>";
$output .= "
<{$icontag} class='gallery-icon {$orientation}'>
$image_output
</{$icontag}>";
$output .= "
<{$captiontag} class='wp-caption-text gallery-caption'>
<{$divtag} class='gallery-caption-inner'>";
	$output .= " <{$divtag} class='wp-caption-text gallery-title'>
	" . wptexturize($attachment->post_title) . "
	</{$divtag}>";
	
if ( $captiontag && trim($attachment->post_excerpt) ) {		
	$output .= "<{$divtag} class='wp-caption-text gallery-excerpt'>";
	if($columns == 1):		
		$excerpt_length = 100;
	elseif($columns == 2):
		$excerpt_length = 300;
	elseif($columns == 3):
		$excerpt_length = 200;
	elseif($columns == 4):
		$excerpt_length = 50;
	elseif($columns == 5):
		$excerpt_length = 10;
	endif;
	$output .= substr($attachment->post_excerpt,0,$excerpt_length);		
	$output .= "</{$divtag}>";
	
$output .= "<{$divtag} class='wp-caption-text gallery-zoom'>
		<a href=" . $image_url . " title='Click to view Full Image' class='icon mustang-gallery'><i class='fa fa-plus'></i></a>
	</{$divtag}>";
	
$output .= "<{$divtag} class='wp-caption-text gallery-redirect'>
	 <a href=" . get_attachment_link( $attachment->ID ) . " title='Click to view read more' class='icon readmore'><i class='fa fa-link'></i></a>
	</{$divtag}>"; 
}else{
$output .= "<{$divtag} class='wp-caption-text gallery-zoom no-text'>
	 <a href=" . $image_url . " title='Click to view Full Image' class='icon mustang-gallery'><i class='fa fa-plus'></i></a>
	</{$divtag}>";		
$output .= "<{$divtag} class='wp-caption-text gallery-redirect'>
	 <a href=" . get_attachment_link( $attachment->ID ) . " title='Click to view read more' class='icon readmore'><i class='fa fa-link'></i></a>
	</{$divtag}>";
}
$output .= "</{$divtag}>";	
$output .= "</{$captiontag}>";
$output .= "</{$itemtag}>";
}
 
$output .= "
</div>\n";
 
return $output;
}
 
 
function shoptown_wp_get_attachment_link( $id = 0, $size = 'thumbnail', $permalink = true, $icon = false, $text = false ) {
$id = intval( $id );
$_post = get_post( $id );
if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) )
return __( 'Missing Attachment', 'tm' );
 
if ( $permalink )
// $url = get_attachment_link( $_post->ID ); // we want the "large" version!!
// FIX!! ask for large URL
$image_attributes = wp_get_attachment_image_src( $_post->ID, 'large' );
$url = $image_attributes[0];
// $url = wp_get_attachment_image( $_post->ID, 'large' );
 
$post_title = esc_attr( $_post->post_title );
 
if ( $text )
$link_text = $text;
elseif ( $size && 'none' != $size )
$link_text = wp_get_attachment_image( $id, $size, $icon );
else
$link_text = '';
 
if ( trim( $link_text ) == '' )
$link_text = $_post->post_title; 
return apply_filters( 'wp_get_attachment_link', "<a rel='gallery-nr'>$link_text</a>", $id, $size, $permalink, $icon, $text );
}
?>