<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <!-- for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta name="format-detection" content="telephone=no" />
		
    <!-- Favicon Icon -->
	<?php
	$favicon = get_template_directory_uri()."/images/favicon.ico";
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_favicon') != '') {
			$favicon = ot_get_option('pego_favicon');
		}
	} 
	?>
	
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/vnd.microsoft.icon"/>
	<link rel="icon" href="<?php echo $favicon; ?>" type="image/x-ico"/>	
	<?php
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_ga_code') != '') {
			echo ot_get_option('pego_ga_code');
		}
	}
	$search_place = '';
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_search_placeholder_text') != '') {
			$search_place =  ot_get_option('pego_search_placeholder_text');
		}
	}
	$post_comments_count = 0;
	if (get_post_type( $post ) == 'post') {
		$post_comments_count = get_comments_number($post->ID); 
	}
	?>
	
	<script type="text/javascript">
        var search_placeholder = '<?php echo $search_place; ?>';
        var post_comments_count = '<?php echo $post_comments_count; ?>';
    </script>
    
	 <!--[if IE]>
	  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/IELow.css"/>		
	<![endif]-->
	<?php  
		wp_enqueue_script('jquery-ui-accordion'); 
		wp_enqueue_script('jquery'); 
		wp_head();	
	?>		
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'ot_get_option' ) ) {
	if (ot_get_option('pego_header_type') == 'type2') {
	?>
	<div class="header-wrapper header2 onlyheader2">
		<div class="header-inner-wrapper">
			<div class="center">
				
					<div class="main-menu menu menu-header2">
						<?php wp_nav_menu(
							array(
							'theme_location' => 'primary', 
							'menu_class' => 'sf-menu'
							)); 
						?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	<?php pego_get_header_logo(); ?>
	<div class="clear"></div>
	</div>
	<?php
	}
	 else  {  
	wp_enqueue_script('modernizr');
	wp_enqueue_script('snap-svg');
	wp_enqueue_script('classie');
	wp_enqueue_script('dialogFx');
	
	?>
<div id="somedialog" class="dialog">
	<div class="dialog__overlay"></div>
	<div class="dialog__content search-wrap">
		<?php echo do_shortcode('[wpbsearch]'); ?>
		<div class="action" data-dialog-close>X</div>
	</div>
</div>
<div class="search-under">
	<div class="center">
		<div data-dialog="somedialog"  class="search-icon trigger">
			<div class="fa icons fa-search"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>	
<div class="header-wrapper-both-menus">	
	<div class="header-wrapper header1">
		<div class="center">
			<?php pego_get_header_logo(); ?>
			<div class="clear"></div>
			<div class="header1-divider"></div>
			<div class="main-menu menu-header1">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'primary', 
					'menu_class' => 'sf-menu'
			)); 
			?>
			</div>
		<div class="clear"></div>
		</div>
	</div>
	<div class="header-wrapper header2">
		<div class="header-inner-wrapper">
			<div class="center">
					<div class="main-menu menu menu-header2">
						<?php wp_nav_menu(
							array(
							'theme_location' => 'primary', 
							'menu_class' => 'sf-menu'
							)); 
						?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
	</div>
</div>
	<?php
	} 
}
else {
?>
<div id="somedialog" class="dialog">
	<div class="dialog__overlay"></div>
	<div class="dialog__content search-wrap">
		<?php echo do_shortcode('[wpbsearch]'); ?>
		<div class="action" data-dialog-close>X</div>
	</div>
</div>
<div class="search-wrap">
	<div class="center">
		<div class="serach-inside">
		<?php echo do_shortcode('[wpbsearch]'); ?>
		</div>
	</div>
</div>
<div class="search-under">
	<div class="center">
		<div class="search-icon">
			<div class="icons fa-search"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>	
<div class="header-wrapper header1">
	<div class="center">
		<?php pego_get_header_logo(); ?>
		<div class="clear"></div>
		<div class="header1-divider"></div>
		<div class="main-menu menu-header1">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'primary', 
				'menu_class' => 'sf-menu'
		)); 
		?>
		</div>
	<div class="clear"></div>
	</div>
</div>
<?php
}
?>
<div class="clear"></div>
<div class="container-wrapper">
	<div class="center">