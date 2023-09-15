<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class CMSBlockWidget extends WP_Widget
{
    function __construct(){
			$widget_settings = array('description' => 'CMS Block Widget', 'classname' => 'widgets-cms');
		parent::__construct(false,$name='TM - CMS Block Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
		$cms_class = empty($instance['cms_class']) ? '' : $instance['cms_class'];
		$main_title = empty($instance['main_title']) ? '' : $instance['main_title']; 
		$sub_title = empty($instance['sub_title']) ? '' : $instance['sub_title']; 
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		$bgcolor = empty($instance['bgcolor']) ? '' : $instance['bgcolor'];
		$bghovercolor = empty($instance['bghovercolor']) ? '' : $instance['bghovercolor'];
		$fontcolor = empty($instance['fontcolor']) ? '' : $instance['fontcolor'];
		$fonthovercolor = empty($instance['fonthovercolor']) ? '' : $instance['fonthovercolor'];
		if($is_template_path == 1):
			$imageSrc = get_template_directory_uri() . '/images/megnor/banners/' . $imageSrc; 
		endif;
		
		 echo wp_kses_post($before_widget);
		 ?>
		 <div class="side_banner <?php echo esc_attr($cms_class); ?>" style="background-color:<?php echo "#".esc_attr($bgcolor); ?>;" onmouseover="this.style.background='<?php echo "#".esc_attr($bghovercolor);?>'" onmouseout="this.style.background='<?php echo "#".esc_attr($bgcolor);?>'">
		 		<a href="<?php if($linkURL == ""): echo home_url( '/' ); else:?><?php echo esc_url($linkURL); endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?> onmouseover="this.style.color='<?php echo "#".esc_attr($fonthovercolor); ?>'" onmouseout="this.style.color='<?php echo "#".esc_attr($fontcolor); ?>'" style="color:<?php echo "#".esc_attr($fontcolor); ?>;">
					<span class="image">
					 	<img src="<?php echo esc_url($imageSrc); ?>" alt="xx" class="vv" />
					</span>
					<span class="details"> 
					 	<span class="main-title"><?php echo esc_attr($main_title); ?> </span>
						<span class="sub-title"><?php echo esc_attr($sub_title); ?> </span>
					</span>
				</a>
		 </div>
		<?php
		 echo wp_kses_post($after_widget);				
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		$instance['main_title'] = strip_tags($new_instance['main_title']);
		$instance['sub_title'] = strip_tags($new_instance['sub_title']);
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['cms_class'] = strip_tags($new_instance['cms_class']);
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		$instance['imageSrc'] = strip_tags($new_instance['imageSrc']);
		$instance['bgcolor'] = strip_tags($new_instance['bgcolor']);
		$instance['bghovercolor'] = strip_tags($new_instance['bghovercolor']);
		$instance['fontcolor'] = strip_tags($new_instance['fontcolor']);
		$instance['fonthovercolor'] = strip_tags($new_instance['fonthovercolor']);
		if($is_template_path == 1):
			$imageSrc = get_template_directory_uri() . '/images/megnor/banners/' . $imageSrc; 
		endif;
		
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array(
			'main_title'=>'use wallet', 
			'sub_title'=>'pay for payments', 
			'imageSrc'=>'icon_1.png',
			'linkURL'=>'#',
			'cms_class' => 'cms-banner even',
			'bgcolor'=>'f2f2f2',
			'bghovercolor'=>'f2f2f2',
			'fontcolor'=>'333333',
			'fonthovercolor'=>'f02640',
			'window_target'=>true,
			'is_template_path'=>true
		) );
		
		$main_title = esc_attr($instance['main_title']);
		$sub_title = esc_attr($instance['sub_title']);
		$linkURL = esc_attr($instance['linkURL']);
		$bgcolor = esc_attr($instance['bgcolor']);
		$imageSrc = esc_attr($instance['imageSrc']);
		$cms_class = esc_attr($instance['cms_class']);
		$bghovercolor = esc_attr($instance['bghovercolor']);
		$fontcolor = esc_attr($instance['fontcolor']);
		$fonthovercolor = esc_attr($instance['fonthovercolor']);
		$window_target =  esc_attr($instance['window_target']);
		$is_template_path =  esc_attr($instance['is_template_path']); 
		
	?>
		<p><label for="<?php echo esc_attr($this->get_field_id('main_title'));?>">Main Title:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('main_title'));?>" name="<?php echo esc_attr($this->get_field_name('main_title'));?>" type="text" value="<?php echo esc_attr($main_title);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('sub_title'));?>">Sub Title:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_title'));?>" name="<?php echo esc_attr($this->get_field_name('sub_title'));?>" type="text" value="<?php echo esc_attr($sub_title);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('cms_class'));?>">Class:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('cms_class'));?>" name="<?php echo esc_attr($this->get_field_name('cms_class'));?>" type="text" value="<?php echo esc_attr($cms_class);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('bgcolor'));?>">Bg Color:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('bgcolor'));?>" name="<?php echo esc_attr($this->get_field_name('bgcolor'));?>" type="text" value="<?php echo esc_attr($bgcolor);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('bghovercolor'));?>">Bg Hover Color:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('bghovercolor'));?>" name="<?php echo esc_attr($this->get_field_name('bghovercolor'));?>" type="text" value="<?php echo esc_attr($bghovercolor);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('fontcolor'));?>">Font Color:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('fontcolor'));?>" name="<?php echo esc_attr($this->get_field_name('fontcolor'));?>" type="text" value="<?php echo esc_attr($fontcolor);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('fonthovercolor'));?>">Font hover Color:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('fonthovercolor'));?>" name="<?php echo esc_attr($this->get_field_name('fonthovercolor'));?>" type="text" value="<?php echo esc_attr($fonthovercolor);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('imageSrc'));?>">Image URL:<br /></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('imageSrc'));?>" name="<?php echo esc_attr($this->get_field_name('imageSrc'));?>" type="text" value="<?php echo esc_attr($imageSrc);?>" /><br />
			<input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo esc_attr($this->get_field_id('is_template_path')); ?>" name="<?php echo esc_attr($this->get_field_name('is_template_path')); ?>" /><label for="<?php echo esc_attr($this->get_field_id('is_template_path')); ?>">Use Template Path for Image</label>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('linkURL'));?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkURL'));?>" name="<?php echo esc_attr($this->get_field_name('linkURL'));?>" type="text" value="<?php echo esc_attr($linkURL);?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo esc_attr($this->get_field_id('window_target')); ?>" name="<?php echo esc_attr($this->get_field_name('window_target')); ?>" /><label for="<?php echo esc_attr($this->get_field_id('window_target')); ?>">Open Link In New Window</label></p>		
		
		<?php
	}
}
function cmsblock_register_widgets()
{
    global $wp_widget_factory;
    $wp_widget_factory->register('CMSBlockWidget');
}
add_action('widgets_init', 'cmsblock_register_widgets');	
?>
