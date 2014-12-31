<?php get_header(); ?>
<?php get_sidebar(); ?>

<div class="content">
	    

<?php
	// The Query
	query_posts( array( 'category_name' => 'main-feature', 'posts_per_page' => 1 ) );

	// The Loop
	while ( have_posts() ) : the_post();
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

?>



	        <div id="left" class="Col story" style="background: url('<?php echo $url; ?>') center center; background-size: cover;">
	          
	          <div class="gradient">
	            <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
	          </div>
	        </div>

<?php
	endwhile;

	// Reset Query
	wp_reset_query();
?>


<div id="right" class="Col">
<?php
	// The Query
	query_posts( array( 'category_name' => 'side-feature', 'posts_per_page' => 2 ) );
	$i = 0;
	// The Loop
	while ( have_posts() ) : the_post();
	$i++;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );


	if($i == 1){
?>
	 <div id="top" class="rows story" style="background: url('<?php echo $url; ?>') center center; background-size: cover;">
	               <div class="gradient">
	             <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
	          </div>
	        </div>
<?php
	}else if($i == 2){
?>
	 <div id="bottom" class="rows story" style="background: url('<?php echo $url; ?>') center center; background-size: cover;">
	               <div class="gradient">
	             <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
	          </div>
	        </div>
<?php
	}

?>



	       

<?php
	endwhile;

	// Reset Query
	wp_reset_query();
?>

	       
	            
	            
	        </div>
	   
	</div>

<?php get_footer(); ?>