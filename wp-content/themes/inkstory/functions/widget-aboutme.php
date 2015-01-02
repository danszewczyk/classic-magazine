<?php
/*
	Plugin Name: AboutMe Widget
	Description: Plugin is used for About me description.
	Author:
	Version: 1.0
	Author URI:  
*/

class aboutme_widget extends WP_Widget {
/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function aboutme_Widget() {

	$widget_options = array(
		'classname' => 'aboutme_widget',
		'description' => esc_html__('Custom AboutMe widget.','inkstory'));

	$control_options = array(   
		'width' => 200,
		'height' => 400,
		'id_base' => 'aboutme_widget'
	);

	$this->WP_Widget( 'aboutme_widget', esc_html__('Pego - AboutMe Widget','inkstory'), $widget_options, $control_options );
	
}
function widget( $args, $instance ) {
	
	extract( $args );
	$title = apply_filters('widget_title', $instance['title'] );
	$subtitle = $instance['subtitle'];
	$image1 = $instance['image1'];
	$messagebutton = $instance['messagebutton'];
	$messagebuttonurl = $instance['messagebuttonurl'];
	$socialsbutton = $instance['socialsbutton'];
	
	
	 $socials_select1 = ( $instance['socials_select1'] ) ? $instance['socials_select1'] : '';
	 $socialstitle1 = ( $instance['socialstitle1'] ) ? $instance['socialstitle1'] : '';
	 $socialsurl1 = ( $instance['socialsurl1'] ) ? $instance['socialsurl1'] : '';
	 $socials_select2 = ( $instance['socials_select2'] ) ? $instance['socials_select2'] : '';
	 $socialstitle2 = ( $instance['socialstitle2'] ) ? $instance['socialstitle2'] : '';
	 $socialsurl2 = ( $instance['socialsurl2'] ) ? $instance['socialsurl2'] : '';
	 $socials_select3 = ( $instance['socials_select3'] ) ? $instance['socials_select3'] : '';
	 $socialstitle3 = ( $instance['socialstitle3'] ) ? $instance['socialstitle3'] : '';
	 $socialsurl3 = ( $instance['socialsurl3'] ) ? $instance['socialsurl3'] : '';
	 $socials_select4 = ( $instance['socials_select4'] ) ? $instance['socials_select4'] : '';
	 $socialstitle4 = ( $instance['socialstitle4'] ) ? $instance['socialstitle4'] : '';
	 $socialsurl4 = ( $instance['socialsurl4'] ) ? $instance['socialsurl4'] : '';
	 $socials_select5 = ( $instance['socials_select5'] ) ? $instance['socials_select5'] : '';
	 $socialstitle5 = ( $instance['socialstitle5'] ) ? $instance['socialstitle5'] : '';
	 $socialsurl5 = ( $instance['socialsurl5'] ) ? $instance['socialsurl5'] : '';
	 $socials_select6 = ( $instance['socials_select6'] ) ? $instance['socials_select6'] : '';
	 $socialstitle6 = ( $instance['socialstitle6'] ) ? $instance['socialstitle6'] : '';
	 $socialsurl6 = ( $instance['socialsurl6'] ) ? $instance['socialsurl6'] : '';
	 $socials_select7 = ( $instance['socials_select7'] ) ? $instance['socials_select7'] : '';
	 $socialstitle7 = ( $instance['socialstitle7'] ) ? $instance['socialstitle7'] : '';
	 $socialsurl7 = ( $instance['socialsurl7'] ) ? $instance['socialsurl7'] : '';
	 $socials_select8 = ( $instance['socials_select8'] ) ? $instance['socials_select8'] : '';
	 $socialstitle8 = ( $instance['socialstitle8'] ) ? $instance['socialstitle8'] : '';
	 $socialsurl8 = ( $instance['socialsurl8'] ) ? $instance['socialsurl8'] : '';
	 
	 $valuesSocials = array('facebook', 'twitter', 'linkedin', 'googleplus', 'pinterest', 'tumblr', 'youtube', 'dribbble', 'instagram', 'vimeo');
	 
	 $valuesForIcons =  array('fa-facebook', 'fa-twitter', 'fa-linkedin', 'fa-google-plus', 'fa-pinterest-square', 'fa-tumblr', 'fa-youtube', 'fa-dribbble', 'fa-instagram', 'fa-vimeo-square');
	 
	 
	echo $before_widget;	


	?>
	
	<div class="aboutme-widget-wrapper">
		<?php if ($image1 != '') { ?>
			<div class="aboutme-widget-image">
				<img src="<?php echo esc_url($image1); ?>" alt="<?php echo esc_attr($title); ?>" />
			</div>
		<?php
		}
		if ($title != '') {
		?>
			<h1><?php echo esc_html($title); ?></h1>
		<?php
		}
		if ($subtitle != '') {
		?>
		<h2><?php echo esc_html($subtitle); ?></h2>
		<?php
		}
		?>
		<div class="socials-button-wrapper">
		<div class="aboutme-socials-wrapper">
		<ul class="aboutme-socials-list">
		<?php
		 $i = 0;
            for ($i = 1 ; $i <= 8 ; $i++)
            {
                $socials_select = "socials_select".$i;
                $socialstitle = "socialstitle".$i;
                $socialsurl = "socialsurl".$i;
                if ($$socials_select != '') {
                	 $key = array_search($$socials_select, $valuesSocials); 
                	 ?>
                	<li class="aboutme-social-item">
						<a href="<?php echo esc_url($$socialsurl); ?>"><i class="fa <?php echo esc_attr($valuesForIcons[$key]); ?>"></i><?php echo esc_html($$socialstitle); ?></a>
					</li>
                	 <?php
                }
               
                
            }
		?>
		</ul>
		<div class="aboutme-follwoing-button"><i class="aboutme-icon icon-user"></i><?php echo esc_html($socialsbutton); ?></div>
		</div>
		<div class="aboutme-message-wrapper">
			<a href="<?php echo esc_url($messagebuttonurl); ?>" title="<?php echo esc_attr($messagebutton); ?>" ><i class="aboutme-icon icon-mail-alt"></i><?php echo esc_html($messagebutton); ?></a>
		</div>
		<div class="clear"></div>
		</div>
		
	</div>
	
	
	
	
		<div class="clear"></div><?php
	echo $after_widget;	
}
function form( $instance ) {  

		/* Set default values. */
		$defaults = array(
		'title' => esc_html__('AboutMe Widget','inkstory'),
		'username' => '52617155@N08',
		'pics_number' => '9'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$valuesSocials = array('facebook', 'twitter', 'linkedin', 'googleplus', 'pinterest', 'tumblr', 'youtube', 'dribbble', 'instagram', 'vimeo');

	 ?>
	 <label for="<?php echo $this->get_field_id( 'image1' ); ?>">
		<?php esc_html_e('Image url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image1' ); ?>" 
				 name="<?php echo $this->get_field_name( 'image1' ); ?>" 
				 value="<?php echo $instance['image1']; ?>" />
		</label>
	 
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php esc_html_e('Title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" 
				 name="<?php echo $this->get_field_name( 'title' ); ?>" 
				 value="<?php echo $instance['title']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">
		<?php esc_html_e('Subtitle:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" 
				 name="<?php echo $this->get_field_name( 'subtitle' ); ?>" 
				 value="<?php echo $instance['subtitle']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'messagebutton' ); ?>">
		<?php esc_html_e('Message button caption:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'messagebutton' ); ?>" 
				 name="<?php echo $this->get_field_name( 'messagebutton' ); ?>" 
				 value="<?php echo $instance['messagebutton']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'messagebuttonurl' ); ?>">
		<?php esc_html_e('Message button url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'messagebuttonurl' ); ?>" 
				 name="<?php echo $this->get_field_name( 'messagebuttonurl' ); ?>" 
				 value="<?php echo $instance['messagebuttonurl']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsbutton' ); ?>">
		<?php esc_html_e('Socials button caption:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsbutton' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsbutton' ); ?>" 
				 value="<?php echo $instance['socialsbutton']; ?>" />
		</label>
		
		<?php if ($valuesSocials) { ?>
		<label for="<?php echo $this->get_field_id('socials_select1'); ?>">
        <?php esc_html_e('Social #1 type: ','inkstory'); ?>
          <select name="<?php echo $this->get_field_name('socials_select1'); ?>" 
                  id="<?php echo $this->get_field_id('socials_select1'); ?>"
                class="widefat">
                <option value="">Select social</option>
          <?php 
            foreach ($valuesSocials as $value)
              {     
              ?>
                <option <?php if ($instance['socials_select1'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
		<label for="<?php echo $this->get_field_id( 'socialstitle1' ); ?>">
		<?php esc_html_e('Social #1 title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialstitle1' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialstitle1' ); ?>" 
				 value="<?php echo $instance['socialstitle1']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsurl1' ); ?>">
		<?php esc_html_e('Social #1 url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsurl1' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsurl1' ); ?>" 
				 value="<?php echo $instance['socialsurl1']; ?>" />
		</label>
		
				<?php if ($valuesSocials) { ?>
		<label for="<?php echo $this->get_field_id('socials_select2'); ?>">
        <?php esc_html_e('Social #2 type: ','inkstory'); ?>
          <select name="<?php echo $this->get_field_name('socials_select2'); ?>" 
                  id="<?php echo $this->get_field_id('socials_select2'); ?>"
                class="widefat">
                <option value="">Select social</option>
          <?php 
            foreach ($valuesSocials as $value)
              {     
              ?>
                <option <?php if ($instance['socials_select2'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
		<label for="<?php echo $this->get_field_id( 'socialstitle2' ); ?>">
		<?php esc_html_e('Social #2 title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialstitle2' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialstitle2' ); ?>" 
				 value="<?php echo $instance['socialstitle2']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsurl2' ); ?>">
		<?php esc_html_e('Social #2 url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsurl2' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsurl2' ); ?>" 
				 value="<?php echo $instance['socialsurl2']; ?>" />
		</label>
		
		<?php if ($valuesSocials) { ?>
		<label for="<?php echo $this->get_field_id('socials_select3'); ?>">
        <?php esc_html_e('Social #3 type: ','inkstory'); ?>
          <select name="<?php echo $this->get_field_name('socials_select3'); ?>" 
                  id="<?php echo $this->get_field_id('socials_select3'); ?>"
                class="widefat">
                <option value="">Select social</option>
          <?php 
            foreach ($valuesSocials as $value)
              {     
              ?>
                <option <?php if ($instance['socials_select3'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
		<label for="<?php echo $this->get_field_id( 'socialstitle3' ); ?>">
		<?php esc_html_e('Social #3 title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialstitle3' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialstitle3' ); ?>" 
				 value="<?php echo $instance['socialstitle3']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsurl3' ); ?>">
		<?php esc_html_e('Social #3 url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsurl3' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsurl3' ); ?>" 
				 value="<?php echo $instance['socialsurl3']; ?>" />
		</label>
		
		
				<?php if ($valuesSocials) { ?>
		<label for="<?php echo $this->get_field_id('socials_select4'); ?>">
        <?php esc_html_e('Social #4 type: ','inkstory'); ?>
          <select name="<?php echo $this->get_field_name('socials_select4'); ?>" 
                  id="<?php echo $this->get_field_id('socials_select4'); ?>"
                class="widefat">
                <option value="">Select social</option>
          <?php 
            foreach ($valuesSocials as $value)
              {     
              ?>
                <option <?php if ($instance['socials_select4'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
		<label for="<?php echo $this->get_field_id( 'socialstitle4' ); ?>">
		<?php esc_html_e('Social #4 title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialstitle4' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialstitle4' ); ?>" 
				 value="<?php echo $instance['socialstitle4']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsurl4' ); ?>">
		<?php _e('Social #4 url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsurl4' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsurl4' ); ?>" 
				 value="<?php echo $instance['socialsurl4']; ?>" />
		</label>
		
		
		<?php if ($valuesSocials) { ?>
		<label for="<?php echo $this->get_field_id('socials_select5'); ?>">
        <?php esc_html_e('Social #5 type: ','inkstory'); ?>
          <select name="<?php echo $this->get_field_name('socials_select5'); ?>" 
                  id="<?php echo $this->get_field_id('socials_select5'); ?>"
                class="widefat">
                <option value="">Select social</option>
          <?php 
            foreach ($valuesSocials as $value)
              {     
              ?>
                <option <?php if ($instance['socials_select5'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
		<label for="<?php echo $this->get_field_id( 'socialstitle5' ); ?>">
		<?php esc_html_e('Social #5 title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialstitle5' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialstitle5' ); ?>" 
				 value="<?php echo $instance['socialstitle5']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsurl5' ); ?>">
		<?php esc_html_e('Social #5 url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsurl5' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsurl5' ); ?>" 
				 value="<?php echo $instance['socialsurl5']; ?>" />
		</label>
		
		<?php if ($valuesSocials) { ?>
		<label for="<?php echo $this->get_field_id('socials_select6'); ?>">
        <?php esc_html_e('Social #6 type: ','inkstory'); ?>
          <select name="<?php echo $this->get_field_name('socials_select6'); ?>" 
                  id="<?php echo $this->get_field_id('socials_select6'); ?>"
                class="widefat">
                <option value="">Select social</option>
          <?php 
            foreach ($valuesSocials as $value)
              {     
              ?>
                <option <?php if ($instance['socials_select6'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
		<label for="<?php echo $this->get_field_id( 'socialstitle6' ); ?>">
		<?php esc_html_e('Social #6 title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialstitle6' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialstitle6' ); ?>" 
				 value="<?php echo $instance['socialstitle6']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsurl6' ); ?>">
		<?php esc_html_e('Social #6 url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsurl6' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsurl6' ); ?>" 
				 value="<?php echo $instance['socialsurl6']; ?>" />
		</label>
		
		
				<?php if ($valuesSocials) { ?>
		<label for="<?php echo $this->get_field_id('socials_select7'); ?>">
        <?php esc_html_e('Social #7 type: ','inkstory'); ?>
          <select name="<?php echo $this->get_field_name('socials_select7'); ?>" 
                  id="<?php echo $this->get_field_id('socials_select7'); ?>"
                class="widefat">
                <option value="">Select social</option>
          <?php 
            foreach ($valuesSocials as $value)
              {     
              ?>
                <option <?php if ($instance['socials_select7'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
		<label for="<?php echo $this->get_field_id( 'socialstitle7' ); ?>">
		<?php esc_html_e('Social #7 title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialstitle7' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialstitle7' ); ?>" 
				 value="<?php echo $instance['socialstitle7']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsurl7' ); ?>">
		<?php esc_html_e('Social #7 url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsurl7' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsurl7' ); ?>" 
				 value="<?php echo $instance['socialsurl7']; ?>" />
		</label>
		
		<?php if ($valuesSocials) { ?>
		<label for="<?php echo $this->get_field_id('socials_select8'); ?>">
        <?php esc_html_e('Social #8 type: ','inkstory'); ?>
          <select name="<?php echo $this->get_field_name('socials_select8'); ?>" 
                  id="<?php echo $this->get_field_id('socials_select8'); ?>"
                class="widefat">
                <option value="">Select social</option>
          <?php 
            foreach ($valuesSocials as $value)
              {     
              ?>
                <option <?php if ($instance['socials_select8'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
		<label for="<?php echo $this->get_field_id( 'socialstitle8' ); ?>">
		<?php esc_html_e('Social #8 title:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialstitle8' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialstitle8' ); ?>" 
				 value="<?php echo $instance['socialstitle8']; ?>" />
		</label>
		
		<label for="<?php echo $this->get_field_id( 'socialsurl8' ); ?>">
		<?php esc_html_e('Social #8 url:','inkstory'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'socialsurl8' ); ?>" 
				 name="<?php echo $this->get_field_name( 'socialsurl8' ); ?>" 
				 value="<?php echo $instance['socialsurl8']; ?>" />
		</label>
		

																													



			
	<?php
	}
}


/*     Adding widget to widgets_init and registering aboutme widget    */
add_action( 'widgets_init', 'aboutme_widgets' );

function aboutme_widgets() {
	register_widget( 'aboutme_Widget' );
}
?>