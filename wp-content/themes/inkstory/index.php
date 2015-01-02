<?php get_header(); ?>
<?php
	$sidebar_class = ' display-block'; 
	$main_class = 'vc_col-sm-8'; 
	$sidebar_class1 = ' sidebar-right';
	$columns_class = 'vc_col-sm-12';
		?>
		<div id="container"> <!-- start container -->	
			<div class="vc_row wpb_row vc_inner vc_row-fluid">
				<div class="<?php echo esc_attr($main_class); ?> wpb_column vc_column_container">
					<div class="wpb_wrapper">
					<?php wp_enqueue_script('pego_isotopeJS'); ?>
						<div class="vc_row wpb_row vc_inner vc_row-fluid pego-isotope-wrapper wrapper-2-columns isotope">
						<?php
							while ( have_posts() ) : the_post();
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
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="<?php echo esc_attr($columns_class); ?> wpb_column vc_column_container isotope-item <?php echo esc_attr($catslug); ?>">
									<div class="post-showing-type1-wrapper">
										<div class="post-showing-type1<?php echo esc_attr($extra_class); ?>">
										<?php
											if (($format != 'quote')&&(($format != 'status'))) {
										?>
												<div class="post-type">
												<?php
													if ( has_post_thumbnail( $post->ID ) ) {
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														?>
														<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
													<?php
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
														<span class="post-detail-single"><i class="post-details-icon icon-calendar"></i><?php echo $post_date; ?></span>
														<span class="post-detail-single"><i class="post-details-icon icon-comment"></i><a href="<?php comments_link(); ?>" ><?php echo get_comments_number($post->ID); ?></a></span>
													</div>
													<div class="clear"></div>
													<div class="post_content">
														<?php echo do_shortcode(get_the_excerpt()); ?>
													</div>
													<?php
														$read_more = 'CONTINUE READING ...';
														if ( function_exists( 'ot_get_option' ) ) {
															if (ot_get_option('pego_read_more_text') != '') {
																$read_more = ot_get_option('pego_read_more_text');
															}
														}
													?>
													<?php wp_link_pages(); ?>
													<a class="post-read-more" href="<?php echo esc_url($link); ?>"><i class="fa read-more-icon fa-minus"></i><?php echo $read_more; ?></a>
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
						</div>
						<?php	
							endwhile; 
						 ?>	
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
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar')) : else : ?>
	
					<?php endif; 
					?>	
				</div>	
			</div>	
		</div>
	</div><!-- end container -->	
<?php get_footer(); ?>