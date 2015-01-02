<?php
$pego_active_plugins = get_option('active_plugins');
if (in_array("js_composer/js_composer.php", $pego_active_plugins)) {
 	if (function_exists('vc_map')) {
		// get all testimonials 
		$allTest= pego_get_all_test();
		$number_of_test = count($allTest);
		$list_allTest = '';
		$current=0;
		if ($allTest) {
			foreach($allTest as $key => $value) {
				$current++;
				if ($current == $number_of_test) {
					$list_allTest .= " and ".$value;	
				}
				else
				{
					$list_allTest .= $value.", ";
				}	
			}	
		}

		// get all galleries 
		$allgallery= pego_get_all_gallery();
		$number_of_gallery = count($allgallery);
		$list_allgallery = '';
		$current=0;
		if ($allgallery) {
			foreach($allgallery as $key => $value) {
				$current++;
				if ($current == $number_of_gallery) {
					$list_allgallery .= " and ".$value;	
				}
				else
				{
					$list_allgallery .= $value.", ";
				}	
			}	
		}



		/* new elements for builder */

		 /* Titles
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("End excerpt", "inkstory"),
		  "base" => "vc_end_excerpt",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'inkstory'),
		) );

		 /* Titles
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Titles", "inkstory"),
		  "base" => "vc_text_titles",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'inkstory'),
		  "params" => array(
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title", "inkstory"),
			  "param_name" => "title",
			  "holder" => "div",
			  "value" => esc_html__("Title", "inkstory"),
			  "description" => esc_html__("Title content.", "inkstory")
			),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Title type", "inkstory"),
			  "param_name" => "title_type",
			  "value" => array(esc_html__('h1', "inkstory") => "h1", esc_html__('h2', "inkstory") => "h2", esc_html__('h3', "inkstory") => "h3", esc_html__('h4', "inkstory") => "h4", esc_html__('h5', "inkstory") => "h5") ,
			  "description" => esc_html__("Select title type.", "inkstory")
			),
		   array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Title alignment", "inkstory"),
			  "param_name" => "title_align",
			  "value" => array(esc_html__('Left', "inkstory") => "left", esc_html__('Center', "inkstory") => "center", esc_html__('Right', "inkstory") => "right") ,
			  "description" => esc_html__("Select title alignment. ", "inkstory")
			)
		  ),
		  "js_view" => 'VcTextSeparatorView'
		) );

		/* Blockquote
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Blockquote", "inkstory"),
		  "base" => "vc_blockquote",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'inkstory'),
		  "params" => array(
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Blockquote type", "inkstory"),
			  "param_name" => "type",
			  "value" => array(esc_html__('Type#1', "inkstory") => "type1", esc_html__('Type#2', "inkstory") => "type2", esc_html__('Type#3', "inkstory") => "type3",  esc_html__('Type#4', "inkstory") => "type4"),
			  "description" => esc_html__("Select blockquote type.", "inkstory")
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Border color", "inkstory"),
			  "param_name" => "border_color",
			  "description" => esc_html__("Border color for blockquote.", "inkstory"),
			  "dependency" => Array('element' => "type", 'value' => array('type1'))
			),
			  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Border size", "inkstory"),
			  "param_name" => "border_size",
			  "description" => esc_html__("Border size. Insert number only.", "inkstory"),
			   "dependency" => Array('element' => "type", 'value' => array('type1'))
			  ),
			array(
			  "type" => "attach_image",
			  "heading" => esc_html__("Icon", "inkstory"),
			  "param_name" => "icon_image",
			  "value" => "",
			  "description" => esc_html__("Select icon image from media library.", "inkstory"),
			   "dependency" => Array('element' => "type", 'value' => array('type2', 'type3', 'type4'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Background color", "inkstory"),
			  "param_name" => "background_color",
			  "description" => esc_html__("Background color for blockquote.", "inkstory"),
			  "dependency" => Array('element' => "type", 'value' => array('type2', 'type4'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Icon background color", "inkstory"),
			  "param_name" => "icon_background_color",
			  "description" => esc_html__("Background color for icon.", "inkstory"),
			  "dependency" => Array('element' => "type", 'value' => array('type3'))
			),
			array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Text", "inkstory"),
			  "param_name" => "content",
			  "value" => __("<p>Sample content</p>", "inkstory")
			)
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );



		 /* Circle chart
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Circle chart", "inkstory"),
		  "base" => "vc_circle_chart",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'inkstory'),
		  "params" => array(  
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Bar color", "inkstory"),
			  "param_name" => "color",
			  "value" => "#8290bd",
			  "description" => esc_html__("Choose color for chart bar.", "inkstory")
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Track color", "inkstory"),
			  "param_name" => "track_color",
			   "value" => "#f1f1f1",
			  "description" => esc_html__("Choose color for chart track.", "inkstory")
			),
		  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Chart width", "inkstory"),
			  "param_name" => "chart_width",
			  "value" => "200",
			  "description" => esc_html__("Enter value for data line width. Enter number only.", "inkstory")
			),
		  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Data line width", "inkstory"),
			  "param_name" => "line_width",
			  "value" => "7",
			  "description" => esc_html__("Enter value for data line width. Enter number only.", "inkstory")
			),
		  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Value", "inkstory"),
			  "param_name" => "value",
			  "description" => esc_html__("Enter value for bar chart. Enter number only [1-100].", "inkstory")
			),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Type", "inkstory"),
			  "param_name" => "type",
			  "value" => array(esc_html__('Percent', "inkstory") => "percent", esc_html__('Description', "inkstory") => "description"),
			  "description" => esc_html__("Select type that will appear inside the chart.", "inkstory")
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Description", "inkstory"),
			  "param_name" => "description",
			  "description" => esc_html__("Enter description text for inside the chart.", "inkstory"),
			 "dependency" => Array('element' => "type", 'value' => array('description'))
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Description font size", "inkstory"),
			  "param_name" => "description_size",
			  "description" => esc_html__("Enter size for chart description. Enter number only.", "inkstory"),
			 "dependency" => Array('element' => "type", 'value' => array('description'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Description color", "inkstory"),
			  "param_name" => "description_color",
			  "description" => esc_html__("Choose color for chart description.", "inkstory"),
			  "dependency" => Array('element' => "type", 'value' => array('description'))
			),
		   array(
			  "type" => "textfield",
			  "heading" => esc_html__("Percent font size", "inkstory"),
			  "param_name" => "percent_size",
			  "description" => esc_html__("Enter size for chart percent. Enter number only.", "inkstory"),
			 "dependency" => Array('element' => "type", 'value' => array('percent'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Percent color", "inkstory"),
			  "param_name" => "percent_color",
			  "description" => esc_html__("Choose color for chart percent.", "inkstory"),
			  "dependency" => Array('element' => "type", 'value' => array('percent'))
			),
		   array(
			  "type" => "textarea_html",    
			  "heading" => esc_html__("Content under chart", "inkstory"),
			  "param_name" => "content",
			  "value" => __("<p></p>", "inkstory")
			)
		  )
		) );



		/* Dropcaps
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Dropcap", "inkstory"),
		  "base" => "vc_dropcap",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'inkstory'),
		  "params" => array(
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Dropcap type", "inkstory"),
			  "param_name" => "type",
			  "value" => array(esc_html__('Type#1', "inkstory") => "type1", esc_html__('Type#2', "inkstory") => "type2"),
			  "description" => esc_html__("Select dropcap type.", "inkstory")
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("First letter", "inkstory"),
			  "param_name" => "first_letter",
			  "value" => esc_html__("A", "inkstory"),
			  "description" => esc_html__("First letter.", "inkstory")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("First letter size", "inkstory"),
			  "param_name" => "first_letter_size",
			  "description" => esc_html__("First letter font size. Insert number only.", "inkstory")
			  ),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("First letter color", "inkstory"),
			  "param_name" => "first_letter_color",
			  "description" => esc_html__("Choose color for first letter.", "inkstory"),
			  "dependency" => Array('element' => "bgcolor", 'value' => array('custom'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("First letter background", "inkstory"),
			  "param_name" => "first_letter_bg",
			  "description" => esc_html__("Choose background color for first letter.", "inkstory"),
			  "dependency" => Array('element' => "type", 'value' => array('type2'))
			),
		  array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Text", "inkstory"),
			  "param_name" => "content",
			  "value" => __("<p>Sample content</p>", "inkstory")
			)
		  )
		) );


		 /* Testimonials
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Testimonials", "inkstory"),
		  "base" => "vc_testimonials",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'inkstory'),
		   "params" => array(
  
			  array(
			  "type" => "exploded_textarea",
			  "heading" => esc_html__("Testimonials", "inkstory"),
			  "param_name" => "grid_categories",
			  "description" => __("If you want to narrow output, enter testimonials names here. Note: Only listed testimonials will be included. Divide testimonials with linebreaks (Enter). You may choose between: <strong>".$list_allTest."</strong>", "inkstory")
			)
		   )
		) );


		 /* Galleries
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Galleries", "inkstory"),
		  "base" => "vc_galleries",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'inkstory'),
		   "params" => array(
			  array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Gallery", "inkstory"),
			  "param_name" => "type",
			  "value" => $allgallery,
			  "description" => esc_html__("Select gallery.", "inkstory")
			  )
		   )
		) );


		/* About me
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("About me", "inkstory"),
		  "base" => "vc_about_me",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'inkstory'),
		  "params" => array(
			  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Text", "inkstory"),
			  "param_name" => "text_title",
			  "description" => esc_html__("Insert text.", "inkstory")
			  ),
			array(
			  "type" => "attach_image",
			  "heading" => esc_html__("Image for signature", "inkstory"),
			  "param_name" => "name_image",
			  "value" => "",
			  "description" => esc_html__("Set image for signature display.", "inkstory")
			),
			array(
			  "type" => "attach_image",
			  "heading" => esc_html__("Big circle image", "inkstory"),
			  "param_name" => "circle1_image",
			  "value" => "",
			  "description" => esc_html__("Set image for big circle.", "inkstory")
			),
			array(
			  "type" => "attach_image",
			  "heading" => esc_html__("Medium circle image", "inkstory"),
			  "param_name" => "circle2_image",
			  "value" => "",
			  "description" => esc_html__("Set image for medium circle.", "inkstory")
			),
			 array(
			  "type" => "attach_image",
			  "heading" => esc_html__("Big small image", "inkstory"),
			  "param_name" => "circle3_image",
			  "value" => "",
			  "description" => esc_html__("Set image for small circle.", "inkstory")
			)
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );




		function text_titles_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'title' => __("Title", "inkstory"),
			'title_type' => 'h1',
			'page_title_type' => '',
			'page_title_text_heading' => '',
			'title_align' => 'left',
			'css_animation' => '',
			'el_class' => ''
		), $atts));

		$output = '<div class="wpb_content_element vc_titles title_align_'.esc_attr($title_align).'">';
			$output .= '<'.esc_attr($title_type).'>'.$title.'</'.esc_attr($title_type).'><div class="title-stripes-'.esc_attr($title_align).'"></div>';
		$output .= '</div>';


		return $output;
		}

		add_shortcode( 'vc_text_titles', 'text_titles_sh' );



		function about_me_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'text_title' => '',
			'name_image' => '',
			'circle1_image' => '',
			'circle2_image' => '',
			'circle3_image' => ''
		), $atts));



		$output = '<div class="about-me-wrap wpb_content_element">';

			$output .= '<div class="about-name-wrap">';
				$output .= '<h1>'.$text_title.'</h1>';

				$img_id = preg_replace('/[^\d]/', '', $name_image);
				$link_to = wp_get_attachment_image_src( $img_id, 'full');
				$output .= '<img class="name-image" src="'.esc_url($link_to[0]).'">';

			$output .= '</div>';
			$output .= '<div class="clear"></div>';
			$output .= '<div class="about-image-wrap">';
				$img_id = preg_replace('/[^\d]/', '', $circle1_image);
				$link_to = wp_get_attachment_image_src( $img_id, 'full');
				$output .= '<img class="about-big" src="'.esc_url($link_to[0]).'">';

				$img_id = preg_replace('/[^\d]/', '', $circle2_image);
				$link_to = wp_get_attachment_image_src( $img_id, 'full');
				$output .= '<img class="about-medium" src="'.esc_url($link_to[0]).'">';

				$img_id = preg_replace('/[^\d]/', '', $circle3_image);
				$link_to = wp_get_attachment_image_src( $img_id, 'full');
				$output .= '<img class="about-small" src="'.esc_url($link_to[0]).'">';
			$output .= '</div>';
		$output .= '</div>';

		return $output;
		}

		add_shortcode( 'vc_about_me', 'about_me_sh' );

		function blockquote_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'type' => 'type1',
			'border_color' => '',
			'border_size' => '',
			'icon_image' => '',
			'background_color' => '',
			'icon_background_color' => '',
			'css_animation' => '',
			'el_class' => ''
		), $atts));



		$output = '';
		$border_css = '';

		if ($type == 'type1') {
			if (($border_size != '')||($border_color != '')) {
				$border_css .= ' style=  " ';
				if ($border_size != '') {
					$border_css .= ' border-width: '.$border_size.'px;  ';
				}
				if ($border_color != '') {
					$border_css .= ' border-color: '.$border_color.';  ';
				}
				$border_css .= ' " ';	
			}
		}
		if ($type == 'type2') {
			if (($background_color != '')||($icon_image != '')) {
				$border_css .= ' style=  " ';		
				if ($icon_image != '') {
					$img_id = preg_replace('/[^\d]/', '', $icon_image);
					$link_to = wp_get_attachment_image_src( $img_id, 'thumbnail');
					$border_css .= ' background: url('.esc_url($link_to[0]).') no-repeat scroll 20px center; ';
				}
				if ($background_color != '') {
					$border_css .= ' background-color: '.$background_color.';  ';
				}
				$border_css .= ' " ';	
			}
		}
		$border_css = '';
		if ($type == 'type3') {
			if (($icon_background_color != '')||($icon_image != '')) {
				$border_css .= ' style=  " ';		
				if ($icon_image != '') {
					$img_id = preg_replace('/[^\d]/', '', $icon_image);
					$link_to = wp_get_attachment_image_src( $img_id, 'thumbnail');
					$border_css .= ' background: url('.esc_url($link_to[0]).') no-repeat scroll center center; ';
				}
				if ($icon_background_color != '') {
					$border_css .= ' background-color: '.$icon_background_color.';  ';
				}
				$border_css .= ' " ';	
			}
		}

		if ($type == 'type3') {
			$output .= '<div class="blockquote wpb_content_element '.esc_attr($type).'"><div class="icon_holder"'.$border_css.'></div><p>'.wpb_js_remove_wpautop($content).'</p></div>';
		} elseif ($type == 'type4') {
			$output .= '<div class="blockquote wpb_content_element '.esc_attr($type).'"'.$border_css.'><p><span>“</span>'.wpb_js_remove_wpautop($content).'<span>”</span></p></div>';
		} else {
			$output .= '<div class="blockquote wpb_content_element '.esc_attr($type).'"'.$border_css.'><p>'.wpb_js_remove_wpautop($content).'</p></div>';
		}

		if ($type == 'type4') {
			if (($background_color != '')||($icon_image != '')) {
				$border_css .= ' style=  " ';		
				if ($icon_image != '') {
					$img_id = preg_replace('/[^\d]/', '', $icon_image);
					$link_to = wp_get_attachment_image_src( $img_id, 'thumbnail');
					$border_css .= ' background: url('.esc_url($link_to[0]).') no-repeat scroll 20px center; ';
				}
				if ($background_color != '') {
					$border_css .= ' background-color: '.$background_color.';  ';
				}
				$border_css .= ' " ';	
			}
		}

		return $output;
		}

		add_shortcode( 'vc_blockquote', 'blockquote_sh' );


		function circle_chart_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			  'color' => '',
			'track_color' => '',
			'value' => '',
			'type' => '',
			'icon' => '',
			'icon_color' => '',
			'icon_size' => '',
			'chart_width' => '',
			'line_width' => '',
			'description_color' => '',
			'description_size' => '',
			'description' => '',
			'percent_color' => '',
			'percent_size' => '',
			'css_animation' => '',
			'el_class' => ''
		), $atts));

		$id = rand(1, 10000);

		wp_enqueue_script('pego_chart_js');
		if ($color == '') {
			$color = get_option($pego_prefix.'main_template_color');   
		 } 

		 $output = '<div class="wpb_content_element">';	
			$output .= '<style> .chart'.esc_attr($id).' { width:'.$chart_width.'px; height:'.$chart_width.'px; line-height:'.$chart_width.'px; } .chart'.$id.' .chart-percent, .chart'.$id.' .chart-description { line-height:'.$chart_width.'px; }   </style>';	
			$output .= '<div data-percent="'.$value.'" data-barsize="'.$chart_width.'" data-linewidth="'.$line_width.'" data-trackcolor="'.$track_color.'" data-barcolor="'.$color.'" class="easyPieChart chart'.esc_attr($id).'">';
			if($type == 'percent' ) {
				$percent_style = '';
				if (($percent_color != '')||($percent_size != '')) {
					$percent_style .= ' style= " ';
					if ($percent_color != '') {
						$percent_style .= ' color: '.$percent_color.'; ';
					}
					if ($percent_size != '') {
						$percent_style .= ' font-size: '.$percent_size.'px; ';
					}
					$percent_style .= ' " ';
				}
				$output .= '<div class="chart-percent"'.$percent_style.'><span'.$percent_style.'>'.$value.'</span>%</div>';
			}	
			if($type == 'icon' ) {
				$icon_style = '';
				if (($icon_color != '')||($icon_size != '')) {
					$icon_style .= ' style= " ';
					if ($icon_color != '') {
						$icon_style .= ' color: '.$icon_color.'; ';
					}
					if ($icon_size != '') {
						$icon_style .= ' font-size: '.$icon_size.'px; ';
					}
					$icon_style .= ' " ';
				}
				$output .= '<div class="chart-icon chart'.esc_attr($id).' icon-'.$icon.'"'.$icon_style.'></div>';
			}
			if($type == 'description' ) {
				$description_style = '';
				if (($description_color != '')||($description_size != '')) {
					$description_style .= ' style= " ';
					if ($description_color != '') {
						$description_style .= ' color: '.$description_color.'; ';
					}
					if ($description_size != '') {
						$description_style .= ' font-size: '.$description_size.'px; ';
					}
					$description_style .= ' " ';
				}
				$output .= '<div class="chart-description"'.$description_style.'>'.$description.'</div>';
			}
			$output .= '</div>';
			$output .= '<div class="circle-desc">'.wpb_js_remove_wpautop($content).'</div>';	
		$output .= '</div>';
		return $output;
		}

		add_shortcode( 'vc_circle_chart', 'circle_chart_sh' );


		function dropcap_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'first_letter' => '',
			'first_letter_bg' => '',
			'first_letter_color' => '',
			'first_letter_size' => '',
			'type' => 'type1',
			'css_animation' => '',
			'el_class' => ''
		), $atts));

		$first_letter_css = '';
		if ($type == 'type1') {
			if (($first_letter_color != '')||($first_letter_size != '')) {
				$first_letter_css .= ' style= " ';
				if ($first_letter_color != '') {
					$first_letter_css .= ' color: '.$first_letter_color.';  ';
				}
				if ($first_letter_size != '') {
					$first_letter_css .= ' font-size: '.$first_letter_size.'px !important;  ';
				}
				$first_letter_css .= ' " ';	
			}
		}

		if ($type == 'type2') {
			if (($first_letter_bg != '')||($first_letter_color != '')||($first_letter_size != '')) {
				$first_letter_css .= ' style= " ';
				if ($first_letter_bg != '') {
					$first_letter_css .= ' background-color: '.$first_letter_bg.';  ';
				}
				if ($first_letter_color != '') {
					$first_letter_css .= ' color: '.$first_letter_color.';  ';
				}
				if ($first_letter_size != '') {
					$first_letter_css .= ' font-size: '.$first_letter_size.'px !important;  ';
				}
				$first_letter_css .= ' " ';	
			}
		}

		$output = '<div class="wpb_content_element vc_dropcap"><div class="dropcap '.esc_attr($type).'"><span class="first_letter" '.$first_letter_css.'>'.$first_letter.'</span>'.wpb_js_remove_wpautop($content).'</div></div>';

		return $output;
		}

		add_shortcode( 'vc_dropcap', 'dropcap_sh' );

		function pego_testimonials_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'grid_categories' => ''
		   ), $atts ) );
	
			$id = rand(1, 10000);

			$terms = array();
	
		$output = '<div class="wpb_content_element owl-carousel owl-theme testimonials-wrapper">';


			$allTestimonials1 = pego_get_all_test();
			if ($grid_categories != '') {
				$allTestimonials = array();
				$single_test = explode(",", $grid_categories);	
				foreach($single_test as $currentTest)  {
					$key = array_search($currentTest, $allTestimonials1); 
					$allTestimonials[$key] = $currentTest;
				}
		
			} else {
				$allTestimonials = pego_get_all_test();	
			}
			foreach($allTestimonials as $key => $singleTestimonial) {
				$currrentTestimonial = get_post($key);
				$content = $currrentTestimonial->post_content;
				$author = get_post_meta($key, 'test_name' , true);
				$test_image = get_post_meta($key, 'test_image' , true);
				$output .= '<div class="item testimonials-wrapper">';
					$extra_class = '';
					if ($test_image != '') {
						$output .= '<img class="testimonial-image" src="'.esc_url($test_image).'" />';
						$extra_class = 'ml90';
					}
					$output .= '<div>';
						$output .= '<div class="testimonial-content">'.$content.'</div>';
						$output .= '<div class="testimonial-author">'.esc_html($author).'</div>';
					$output .= '</div>';
				$output .= '</div>';

		}
		$output .= '</div>';
	
		return $output;
		}
		add_shortcode( 'vc_testimonials', 'pego_testimonials_sh' );


		function pego_galleries_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'type' => ''
		), $atts));


			$allgalleries = pego_get_all_gallery();
			$key = array_search($type, $allgalleries); 
			$currrentGallery = get_post($key);
			$content = $currrentGallery->post_content;
			$output = do_shortcode($content);

		return $output;
		}

	}
}

add_shortcode( 'vc_galleries', 'pego_galleries_sh' );


remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_fancybox');

function gallery_shortcode_fancybox($attr) {
	global $post, $wp_locale;

$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	/**
	 * Filter the default gallery shortcode output.
	 *
	 * If the filtered output isn't empty, it will be used instead of generating
	 * the default gallery template.
	 *
	 * @since 2.5.0
	 *
	 * @see gallery_shortcode()
	 *
	 * @param string $output The gallery output. Default empty.
	 * @param array  $attr   Attributes of the gallery shortcode.
	 */
	$output = apply_filters( 'post_gallery', '', $attr );
	if ( $output != '' ) {
		return $output;
	}

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) {
			unset( $attr['orderby'] );
		}
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'dl',
		'icontag'    => $html5 ? 'div'        : 'dt',
		'captiontag' => $html5 ? 'figcaption' : 'dd',
		'columns'    => 3,
		'size'       => 'full',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery' );

	$id = intval( $atts['id'] );
	if ( 'RAND' == $atts['order'] ) {
		$atts['orderby'] = 'none';
	}

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
		}
		return $output;
	}



$output = '<div class="vc_gallery">';
	$random_id = rand(1, 10000);
	foreach ( $attachments as $id => $attachment ) {
		$output .= '<div class="column4">';
			$full_img_url = wp_get_attachment_image_src($id,'full', true);
			$output .= '<a class="no-ajaxy" href="'.esc_url($full_img_url[0]).'" rel="prettyPhoto[pp_gal'.esc_attr($random_id).']" title="'.esc_attr($attachment->post_title).'" >';
			$post_thumbnail = pego_getImageBySize(array( 'attach_id' => $id, 'thumb_size' => '350x250' ));
    		$thumbnail = $post_thumbnail['thumbnail'];
			$output .= $thumbnail;
			$output .= '</a>';
		$output .= '</div>';
	}
	$output .= '</div>';

	return $output;
}