<?php get_header(); ?>	
		<?php
		$pego_page_titles_show = get_post_meta($post->ID , 'pego_page_titles_show' , true);
		$pego_page_title_page_title_text = get_post_meta($post->ID , 'pego_page_title_page_title_text' , true);
		$pego_page_breadcrumbs = get_post_meta($post->ID , 'pego_page_breadcrumbs' , true);
		$pego_page_titles_bg_image = get_post_meta($post->ID , 'pego_page_titles_bg_image' , true);
		$pego_page_sidebar = get_post_meta($post->ID , 'pego_page_sidebar' , true);
		$pego_page_titles_show_bg = get_post_meta($post->ID , 'pego_page_titles_show_bg' , true);
		
		$bg_css = '';
		if (($pego_page_titles_bg_image != '')||($pego_page_titles_show_bg == 'yes')) {
			$bg_css = ' style = " background-color: #fff; ';
			if ($pego_page_titles_bg_image != '') {
				$bg_css .= ' background: #fff url(\''.esc_url($pego_page_titles_bg_image).'\') no-repeat;  background-size: cover; '; 
			}
			$bg_css .= '  "';
		}
		//echo "Bg image: ? ".$pego_page_titles_bg_image;
		if ($pego_page_titles_show != 'no') {
		?>
			<div class="page-title-wrapper"<?php echo $bg_css; ?>>
				<div class="page-title">
						<h1><?php the_title(); ?></h1>
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
			<div class="vc_row wpb_row vc_inner vc_row-fluid">
				<div class="<?php echo $main_class; ?> wpb_column vc_column_container">
					<div class="wpb_wrapper">
						<div class="page-wrapper">
							<?php while ( have_posts() ) : the_post();  ?>					
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<?php the_content(); ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
				<div class="vc_col-sm-4 wpb_column vc_column_container<?php echo $sidebar_class; ?>">
					<div class="wpb_wrapper sidebar<?php echo $sidebar_class1; ?>">
						<?php
							if (function_exists('dynamic_sidebar') && dynamic_sidebar($pego_page_sidebar)) : else : ?>
			
								<?php endif; 
							?>	
					</div>	
				</div>	
			</div>	
		</div><!-- end container -->		
<?php get_footer(); ?>