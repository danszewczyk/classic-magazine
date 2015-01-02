<?php
if ( function_exists( 'ot_get_option' ) ) {

/* main template color start */	
	$main_template_color = '';
	if (ot_get_option('pego_main_template_color') != '') {
	
		$main_template_color = ' .menu-header1 ul.sf-menu > li a:hover, .menu-header1 ul.sf-menu > li.sfHover a, .menu-header1 ul.sf-menu > li.current-menu-item a, .menu-header1 ul.sf-menu > li.current-menu-parent  a, .menu-header1 ul.sf-menu > li.current-menu-ancestor a, .page-title .page-subtitle  span, .menu-header2 ul.sf-menu > li a:hover, .menu-header2 ul.sf-menu > li.sfHover a, .menu-header2 ul.sf-menu > li.current-menu-item a, .menu-header2 ul.sf-menu > li.current-menu-parent  a, .menu-header2 ul.sf-menu > li.current-menu-ancestor a, .post-showing-type1 .post-categories .cat-link,  
		.toggle-comments:hover, .top-commented-icon, .widget ul li a, .widget_recent_entries ul li, .widget_recent_entries ul li a, .latest-posts .latest-post-format-icon   { ';
			$main_template_color .=' color: '. ot_get_option('pego_main_template_color').';  }';		
			
		$main_template_color .= '.menu-header1 ul.sf-menu > li li.current-menu-item > a, .header-wrapper.header1 .main-menu .sf-menu ul li > a:hover, .menu-header1 .sf-menu ul li.sfHover > a, .menu-header1 .sf-menu ul li.sfHover > a, .menu-header1 .sf-menu ul li li.current-menu-item > a, .menu-header1 .sf-menu ul li.current-menu-parent >  a, .menu-header1 .sf-menu ul li.current-menu-ancestor >  a, .menu-header2 ul.sf-menu > li li.current-menu-item > a, .header-wrapper.header2 .main-menu .sf-menu ul li > a:hover, .menu-header2 .sf-menu ul li.sfHover > a, .menu-header2 .sf-menu ul li.sfHover > a, .menu-header2 .sf-menu ul li li.current-menu-item > a, .menu-header2 .sf-menu ul li.current-menu-parent >  a, .menu-header2 .sf-menu ul li.current-menu-ancestor >  a, .socials-wrap, .quote_wrapper, .owl-prev, #commentform #submit, .wpcf7 input.wpcf7-submit, .blockquote.type3 .icon_holder, .vc_dropcap .dropcap.type2 span.first_letter, .testimonials-wrapper .owl-controls .owl-page span, .aboutme-socials-wrapper, 
		.widget  ul.aboutme-socials-list, #calendar_wrap caption, .tagcloud a, .widget_rss span.rss-date, .widget_search input#searchsubmit { ';
		$main_template_color .=' background-color: '. ot_get_option('pego_main_template_color').';  }';

	
		$main_template_color .= '  .socials-wrap, .aboutme-socials-wrapper, .aboutme-message-wrapper, .widget  ul.aboutme-socials-list  {  border: 1px solid '. ot_get_option('pego_main_template_color').';  }';
		$main_template_color .= '  .socials-wrap:after, .widget  ul.aboutme-socials-list:after {  border-top-color: '. ot_get_option('pego_main_template_color').';  }';
		$main_template_color .= '  .blockquote.type1 {  border-left: 3px solid '. ot_get_option('pego_main_template_color').';  }';
	}
/* main template color end */	


	$bodyBgCss = '';
	if ( function_exists( 'ot_get_option' ) ) {
		$bodyBgArray = ot_get_option('pego_global_background');
		if ($bodyBgArray) {
			$bodyBgCss = ' body { ';
			if ($bodyBgArray['background-color'] != '') { $bodyBgCss .= ' background-color: '.$bodyBgArray['background-color'].'; '; }
			if ($bodyBgArray['background-repeat'] != '') { $bodyBgCss .= ' background-repeat: '.$bodyBgArray['background-repeat'].'; '; }
			if ($bodyBgArray['background-attachment'] != '') { $bodyBgCss .= ' background-attachment: '.$bodyBgArray['background-attachment'].'; '; }
			if ($bodyBgArray['background-position'] != '') { $bodyBgCss .= ' background-position: '.$bodyBgArray['background-position'].'; '; }
			if ($bodyBgArray['background-size'] != '') { $bodyBgCss .= ' background-size: '.$bodyBgArray['background-size'].'; '; }
			if ($bodyBgArray['background-image'] != '') { $bodyBgCss .= ' background-image: url("'.$bodyBgArray['background-image'].'"); '; }
			$bodyBgCss .= ' } ';
 		}
	}
	
	$footerBgCss = '';
	if ( function_exists( 'ot_get_option' ) ) {
		$footerBgArray = ot_get_option('pego_footer_background');
		if ($footerBgArray) {
			$footerBgCss = ' .under-footer { ';
			if ($footerBgArray['background-color'] != '') { $footerBgCss .= ' background-color: '.$footerBgArray['background-color'].'; '; }
			if ($footerBgArray['background-repeat'] != '') { $footerBgCss .= ' background-repeat: '.$footerBgArray['background-repeat'].'; '; }
			if ($footerBgArray['background-attachment'] != '') { $footerBgCss .= ' background-attachment: '.$footerBgArray['background-attachment'].'; '; }
			if ($footerBgArray['background-position'] != '') { $footerBgCss .= ' background-position: '.$footerBgArray['background-position'].'; '; }
			if ($footerBgArray['background-size'] != '') { $footerBgCss .= ' background-size: '.$footerBgArray['background-size'].'; '; }
			if ($footerBgArray['background-image'] != '') { $footerBgCss .= ' background-image: url("'.$footerBgArray['background-image'].'"); '; }
			$footerBgCss .= ' } ';
 		}
	}
	
	
	$logocss = '';	
		
	if ( function_exists( 'ot_get_option' ) ) {
	if ((ot_get_option('pego_logo_width') != '')||(ot_get_option('pego_logo_height') != '')) {
		$logocss .= ' #logoImageRetina { ';	
		if (ot_get_option('pego_logo_width') != '') {
			$logocss .= ' width: '.ot_get_option('pego_logo_width').'px; ';
		}
		if (ot_get_option('pego_logo_height') != '') {
			$logocss .= ' height: '.ot_get_option('pego_logo_height').'px; ';
		}
		$logocss .= ' } ';						
	}
	
	if (ot_get_option('pego_logo_retina') != '') {
		$logocss .= ' @media
						only screen and (-webkit-min-device-pixel-ratio: 2),
						only screen and (   min--moz-device-pixel-ratio: 2),
						only screen and (     -o-min-device-pixel-ratio: 2/1),
						only screen and (        min-device-pixel-ratio: 2),
						only screen and (                min-resolution: 192dpi),
						only screen and (                min-resolution: 2dppx) { 
  
 							 #logoImageRetina {
								display: block;
 					 		}
 							 #logoImage {
								display: none;
  							}
						} ';
		}
	}
	
	echo '<style>';
		echo $bodyBgCss;
		echo $logocss;
		echo $footerBgCss; 
		echo $main_template_color;
	echo '</style>';
	
	echo '<style type="text/css">';	
		//additionalCSS
		if ( function_exists( 'ot_get_option' ) ) {
			echo ot_get_option('pego_additional_css');
		}
	echo '</style>';
	
	//additionalJS
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_additional_js') != ''){
			echo '<script>';	
			echo  ot_get_option('pego_additional_js');
			echo '</script>';	
		}
	}
	
}
	

?>