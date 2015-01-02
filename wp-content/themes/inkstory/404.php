<?php get_header(); ?>	
		<?php
		if ( function_exists( 'ot_get_option' ) ) {
			$error_page_id = ot_get_option('pego_error_page');
			$pego_page_titles_show = get_post_meta($error_page_id , 'pego_page_titles_show' , true);
			$pego_page_title_page_title_text = get_post_meta($error_page_id , 'pego_page_title_page_title_text' , true);
			$pego_page_breadcrumbs = get_post_meta($error_page_id , 'pego_page_breadcrumbs' , true);
			$pego_page_titles_bg_image = get_post_meta($error_page_id , 'pego_page_titles_bg_image' , true);
			$pego_page_sidebar = get_post_meta($error_page_id , 'pego_page_sidebar' , true);
			$pego_page_titles_show_bg = get_post_meta($error_page_id , 'pego_page_titles_show_bg' , true);
		
		$bg_css = '';
		if (($pego_page_titles_bg_image != '')||($pego_page_titles_show_bg == 'yes')) {
			$bg_css = ' style = " background-color: #fff; ';
			if ($pego_page_titles_bg_image != '') {
				$bg_css .= ' background: #fff url(\''.$pego_page_titles_bg_image.'\') no-repeat;  background-size: cover; '; 
			}
			$bg_css .= '  "';
		}
			
			if ($pego_page_titles_show != 'no') {
			?>
			
			<div class="page-title-wrapper"<?php echo $bg_css; ?>>
				<div class="page-title">
						<h1><?php echo get_the_title($error_page_id); ?></h1>
					<?php if ($pego_page_title_page_title_text != '') { ?>
						<div class="page-subtitle"><?php echo $pego_page_title_page_title_text; ?></div>
					<?php } ?>
				</div>
			</div>	
			<div class="clear"></div>
			<?php
			}
		$main_class= 'vc_col-sm-12';
		$sidebar_class = ' no-display';
		$sidebar_class1 = '';
		if ($pego_page_sidebar != '') {
			$sidebar_class = ' display-block'; 
			$main_class = 'vc_col-sm-8'; 
			$sidebar_class1 = ' sidebar-right';
		}
		?>
		<div id="container"> <!-- start container -->	
		<?php
		if (ot_get_option('pego_404_page_image') != '') {
		?>
			<img class="fl" src="<?php echo esc_url(ot_get_option('pego_404_page_image')); ?>" />
		<?php
		}
		?>
		
			<div class="vc_row wpb_row vc_inner vc_row-fluid">
				<div class="<?php echo $main_class; ?> wpb_column vc_column_container">
					<div class="wpb_wrapper">
						<div class="page-wrapper error-wrapper">
								<?php echo apply_filters('the_content', get_post_field('post_content', $error_page_id)); ?>
						</div>
					</div>
				</div>
			</div>	
		</div><!-- end container -->	
		<?php
		}
		?>	
<?php get_footer(); ?>





			