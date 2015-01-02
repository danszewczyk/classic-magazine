<?php get_header(); ?>
<?php
		$cat_id = get_query_var('cat');
		$cat_name = get_cat_name( $cat_id );
		$main_class= 'vc_col-sm-12';
		$sidebar_class = ' no-display';
		$sidebar_class1 = '';
		$columns_class = 'vc_col-sm-12';
		if ( function_exists( 'ot_get_option' ) ) {
			if (ot_get_option('pego_search_archive_columns') == 2) { $columns_class = 'vc_col-sm-6'; }	
			if (ot_get_option('pego_search_archive_columns') == 3) { $columns_class = 'vc_col-sm-4'; }	
			if (ot_get_option('pego_search_archive_columns') == 4) { $columns_class = 'vc_col-sm-3'; }	
			if (ot_get_option('pego_sidebar_for_search_page') != '') { 
				$sidebar_class = ' display-block'; 
				$main_class = 'vc_col-sm-8'; 
				$sidebar_class1 = ' sidebar-right';
				$sidebar_selected = ot_get_option('pego_sidebar_for_search_page');
				if( is_category())  { 
					$category_sidebar = get_tax_meta($cat_id,'pego_category_sidebar');
					if ($category_sidebar != '') {
							$allSidebarss = pego_get_all_sidebars();
							$category_sidebar = $allSidebarss[$category_sidebar];
							$sidebar_selected = $category_sidebar;
					}
				}
			}
		}
		
		
		?>
		<div class="page-title-wrapper">
			<div class="page-title">
				<?php
				$category_sidebar = '';
				if( is_category())  { 
					$category_title_text = get_tax_meta($cat_id,'pego_category_title_text');
					$category_sidebar = get_tax_meta($cat_id,'pego_category_sidebar');
					
					$allSidebarss = pego_get_all_sidebars1();
					$category_sidebar = $allSidebarss[$category_sidebar];
					
					$bg_css = '';
					
				?>
					<div class="left-side"<?php echo $bg_css; ?>>
						<h1><?php single_cat_title(); ?></h1>
							<div class="page-subtitle"><?php echo $category_title_text; ?></div>
							
					
					</div>
					<?php if (category_description( $cat_id ) != '') { ?>
						<div class="right-side">
							<?php echo category_description( $cat_id ); ?>
						</div>
					<?php } 
				}
				elseif( is_tag() ) { ?>
					<h1><?php single_tag_title(); ?></h1>
				<?php
 				/* If this is a daily archive */ } elseif (is_day()) { ?>				
				<h1><?php the_time('F jS, Y'); ?></h1>
				<?php
				 /* If this is a monthly archive */ } elseif (is_month()) { ?>	
				 <h1><?php the_time('F Y'); ?></h1>
				<?php
				/* If this is a yearly archive */ } elseif (is_year()) { ?>			
				<h1><?php the_time('Y'); ?></h1>
				<?php
				 /* If this is an author archive */ } elseif (is_author()) { ?>	
				 <h1><?php the_author(); ?></h1><div class="page-subtitle">
				<?php
				/* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1><?php esc_html_e('Blog archive:','inkstory'); ?></h1>
				<?php
				}
				?>
			</div>
		</div>	
		<div class="clear"></div>
		<?php wp_enqueue_script('pego_isotopeJS'); ?>
		<div id="container"> <!-- start container -->	
			<div class="vc_row wpb_row vc_inner vc_row-fluid">
				<div class="<?php echo esc_attr($main_class); ?> wpb_column vc_column_container">
					<div class="wpb_wrapper">
						<div class="vc_row wpb_row vc_inner vc_row-fluid pego-isotope-wrapper wrapper-2-columns isotope">
						<?php
							while ( have_posts() ) : the_post();
							?>
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<?php
									if (get_post_type( $post ) == 'post') {
										$format = get_post_format( $post->ID );	
										$post_categories = wp_get_post_categories( $post->ID );
										$dateFormat = get_option( 'date_format' );
										$post_date = get_the_date($dateFormat);
										$time_format = get_option( 'time_format' );
										$post_time = get_the_time($time_format);
										$post_alternative_title = get_post_meta($post->ID,'pego_post_alternative_title', true);
										$post_summary_type1 = get_post_meta($post->ID , 'pego_post_summary_type1' , true);
										$title = get_the_title(); 
										$link = get_the_permalink();
										if ($format == 'link') {
												$link = get_post_meta($post->ID , 'pego_post_link_url' , true);
										}
										$post_tags = wp_get_post_tags($post->ID);
										if ($post_alternative_title != '') { $title = $post_alternative_title; }
										$strip_title = strip_tags($title);
					
										$extra_class = '';
										$icon_type = '';
										if ($format == 'quote') { $icon_type = 'icon-quote'; $extra_class = " quote_wrapper"; }
										if ($format == 'image') { $icon_type = 'icon-picture'; }
										if ($format == 'video') { $icon_type = 'icon-video'; }
										if ($format == 'audio') { $icon_type = 'icon-music'; }
										if ($format == 'gallery') { $icon_type = 'icon-camera'; $extra_class = " gallery_wrapper"; }
										if ($format == 'link')  { $icon_type = 'icon-link'; }
										if ($format == 'status') { $extra_class = " pego_twitter_wrapper"; }
					
										if ($post_categories) {
											$cats = array();
											$catslug = array();
				
											foreach($post_categories as $c){
												$cat = get_category( $c );
												$cats[] = array( 'id' => $cat->cat_ID, 'name' => $cat->name );
												$catslug[] =  $cat->slug;
												$catArray[] = $cat->cat_ID;
											}
											$cat_id = $cats[0]['id'];		
											$cat_name = $cats[0]['name'];	
											$cat_link =  get_category_link($cats[0]['id']);
										}
										$catslug = implode(" ",$catslug);
										?>
						
										<div class="<?php echo esc_attr($columns_class); ?> wpb_column vc_column_container isotope-item <?php echo esc_attr($catslug); ?>">
											<div class="post-showing-type1-wrapper">
												<div class="post-showing-type1<?php echo esc_attr($extra_class); ?>">
												<?php
													if (($format != 'quote')&&(($format != 'status'))) {
												?>
														<div class="post-type">
														<?php
															if ($format == 'image') {
																$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														?>
																<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
															<?php
															}
															if ($format == 'video') { 				
																global $wp_embed;
																$linkVideo = get_post_meta($post->ID , 'pego_post_video_url' , true);
																$embed = $wp_embed->run_shortcode('[embed width="1280"]'.$linkVideo.'[/embed]');
																echo '<div class="video-wrapper"><div class="video-container">'.$embed.'</div></div>';	
															} 
															if ($format == 'link') {
																$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
																$link = get_post_meta($post->ID , 'pego_post_link_url' , true);
															?>
																<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_attr($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
															<?php
															}
															if ($format == 'gallery') {
																$post_gallery_type = get_post_meta($post->ID , 'pego_post_gallery_type' , true);
																if ($post_gallery_type == 'Grid') {
																?> 
																	<div class="gallery-grid-wrapper grid cs-style-3">
																	 <?php
																		 $attachments = get_children(array( 'post_parent' => $post->ID,
																								'post_status' => 'inherit',
																								'post_type' => 'attachment',
																								'post_mime_type' => 'image',
																								'order' => 'DESC',
																								'orderby' => 'menu_order ID'));
																			$counter = 0;	
																			$idGallery = rand(1, 10000);						  		
																			foreach($attachments as $att_id => $attachment) {
																				$counter++;
																				$post_thumbnail = pego_getImageBySize(array(  'attach_id' => $attachment->ID, 'thumb_size' => '770x350' ));
																				$thumbnail = $post_thumbnail['thumbnail'];
																				$image = wp_get_attachment_image_src( $attachment->ID, 'full', true ); 
																				if ($counter == 1 ) { ?> <figure class="gallery-grid-half"> <?php }
																				if ($counter == 2 ) { ?> <figure class="gallery-grid-half"> <?php }
																				if ($counter == 3 ) { ?> <figure class="gallery-grid-full"> <?php 
																					$post_thumbnail = pego_getImageBySize(array(  'attach_id' => $attachment->ID, 'thumb_size' => '770x300' ));
																					$thumbnail = $post_thumbnail['thumbnail'];
																				}
																				if ($counter == 4 ) { ?> <figure class="gallery-grid-half"> <?php }
																				if ($counter == 5 ) { ?> <figure class="gallery-grid-half"> <?php }
																				?>
																				<a href="<?php echo esc_url($image[0]); ?>" rel="prettyPhoto[gallery<?php echo $idGallery; ?>]" >
																					<?php echo $thumbnail; ?>
																				</a>
																				</figure>
																			<?php
																			}	
																			?>
																			<div class="clear"></div>
																	</div>
																	<?php
																	} else
																	{
																		wp_enqueue_script('pego_owl_carousel');
																	?>
																	<div  class="owl-fade-slide owl-carousel owl-theme">
																	<?php
																		$attachments = get_children(array( 'post_parent' => $post->ID,
																								'post_status' => 'inherit',
																								'post_type' => 'attachment',
																								'post_mime_type' => 'image',
																								'order' => 'DESC',
																								'orderby' => 'menu_order ID'));
																			$idGallery = rand(1, 10000);	
																			foreach($attachments as $att_id => $attachment) {
																				$full_img_url = wp_get_attachment_image_src($attachment->ID,'PostSection1', true);
																			?>
																				<div class="item"><a href="<?php echo esc_url($full_img_url[0]); ?>"  rel="prettyPhoto[gallery<?php echo $idGallery; ?>]"><img src="<?php echo esc_url($full_img_url[0]); ?>" alt="<?php echo esc_attr($attachment->post_title); ?>" /></a></div>
																			<?php
																			}
																			?>
																	</div>
																	<?php
																	}
															}
															if ($format == 'audio') { 
																$audioFile = get_post_meta($post->ID , 'pego_post_audio_upload' , true);
																 if ( $audioFile != '') {
																		wp_enqueue_script('pego_mediaplayer');
																		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
																		?>
																		<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_attr($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
																		<audio preload="auto" controls>
																			<source src="<?php echo $audioFile; ?>">
																		</audio>
																	 <?php 
																} else {	
																	$audioFile = get_post_meta($post->ID , 'pego_post_soundcloud_url' , true); 
																	echo do_shortcode($audioFile);
																}
															}
															?>
														</div>
														<div class="post-details-wrapper">
															<div class="post-categories">
															<?php
																$counter = 0;
																foreach ($post_categories as $single_cat) {
																	$cat = get_category( $single_cat );
																	$counter++;
																	$cat_link =  get_category_link($cat->cat_ID);
																	if ($counter == count($post_categories)) {
																		?>
																		<a class="cat-link category-bg-color-<?php echo esc_attr($cat->cat_ID); ?>" href="<?php echo esc_url($cat_link); ?>"  ><?php echo esc_html($cat->name); ?></a>
																		<?php
																	}
																	else {
																		?>
																		<a class="cat-link category-bg-color-<?php echo esc_attr($cat->cat_ID); ?>" href="<?php echo esc_url($cat_link); ?>"  ><?php echo esc_html($cat->name); ?></a>,
																		<?php
																	}
																}
																?>
															</div>
															<i class="post-format-icon <?php echo esc_attr($icon_type); ?>"></i>
															<div class="clear"></div>
															<div class="post-title">
																<a href="<?php echo esc_url($link); ?>" target="_self" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo $title; ?></a>
															</div>
															<div class="clear"></div>
															<div class="post-details">
																<span class="post-detail-single"><i class="post-details-icon icon-user"></i><?php the_author_posts_link(); ?></span>
																<span class="post-detail-single"><i class="post-details-icon icon-calendar"></i><?php echo $post_date; ?> at <?php echo $post_time; ?></span>
																<span class="post-detail-single"><i class="post-details-icon icon-comment"></i><a href="<?php comments_link(); ?>" ><?php echo get_comments_number($post->ID); ?></a></span>
															</div>
															<div class="clear"></div>
															<div class="post_content">
																<?php //echo do_shortcode(get_the_excerpt());
																$content = get_the_content();
																if (strpos($content,'[vc_end_excerpt]') !== false) {
																	$excerpt_part = explode("[vc_end_excerpt]", $content);
																	$content =  $excerpt_part[0].'[/vc_column][/vc_row]';
																}
																echo do_shortcode($content);
																 ?>
															</div>
															<?php
																$read_more = 'CONTINUE READING ...';
																if ( function_exists( 'ot_get_option' ) ) {
																	if (ot_get_option('pego_read_more_text') != '') {
																		$read_more = ot_get_option('pego_read_more_text');
																	}
																}
															?>
															<a class="post-read-more" href="<?php echo esc_url($link); ?>"><i class="fa read-more-icon fa-minus"></i><?php echo esc_html($read_more); ?></a>
															<div class="post-bottom-details">
																<div class="fl">
																	<div class="post-tags"><?php the_tags('', ' ', '');  ?></div>
																</div>
																<div class="fr">
																	<?php  pego_get_blog_socials($strip_title, $link); ?>
																	<?php if ( shortcode_exists( 'zilla_likes' ) ) { ?>
																		<?php echo do_shortcode('[zilla_likes]'); ?>
																	<?php
																	} 
																	?>
																</div>
															</div>
														</div>
													<?php
													}
													else {
														if ($format == 'quote') {
														?>
														<div class="quote">
															<i class="quote-icon <?php echo esc_attr($icon_type); ?>"></i>
															<div class="quote-content"><?php the_content(); ?></div>
															<div class="quote-author"><?php echo esc_html(get_the_title()); ?></div>
														</div>
														<?php
														}
														if ($format == 'status') {
														?>
														<div class="twitter-post-type">
															<i class="twitter-icon fa-twitter"></i>
															<div class="twitter-content"><?php the_content(); ?></div>
															<div class="twitter-title"><?php echo esc_html(get_the_title()); ?></div>
														</div>
														<?php
														}
													}
													?>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									<?php	
									}
									?>
								</div>
								<?php endwhile; ?>	
							</div>
							<div class="pagination-wrapper">
								<div class="alignleft" style="margin-left: 10px; margin-bottom: 20px;"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
								<div class="alignright" style="margin-right: 10px;  margin-bottom: 20px;"><?php next_posts_link('Next Entries &raquo;','') ?></div>
							</div>
						</div>
					</div>
					<div class="vc_col-sm-4 wpb_column vc_column_container<?php echo esc_attr($sidebar_class); ?>">
						<div class="wpb_wrapper sidebar<?php echo esc_attr($sidebar_class1); ?>">
							<?php
							if (function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_selected)) : else : ?>
			
								<?php endif; 
							?>	
						</div>	
					</div>	
				</div>
			</div><!-- end container -->	
<?php get_footer(); ?>