	</div> <!-- end center -->
	<div class="clear"></div>
	<div class="above-footer">
		<?php 
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Above footer fullwidth area') ) :  

		endif; 
		?>
	</div>
	<div class="clear"></div>
	<?php
	if ( function_exists( 'ot_get_option' ) ) {
		if ((ot_get_option('pego_under_footer_left_content') != '') ||  (ot_get_option('pego_under_footer_right_content') != ''))  {
	?>
	<div class="under-footer">
		<div class="center">
			<div class="left">
			<?php echo ot_get_option('pego_under_footer_left_content') ; ?>
			</div>
			<div class="right">
			<?php echo do_shortcode(ot_get_option('pego_under_footer_right_content')) ; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php
		}
	}
	?>
</div> <!-- end container-wrapper -->
<?php  
	//custom CSS 
	include("functions/custom-css.php"); 
	wp_footer(); 
?>
</body>
</html>