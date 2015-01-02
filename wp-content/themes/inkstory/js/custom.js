/*	Menu START */
jQuery(function(){
	"use strict";
	// main navigation init
	jQuery('.main-menu ul.sf-menu').superfish({
		delay:	300,	// one second delay on mouseout 
		animation:   {opacity:'show',height:'show'}, // fade-in and slide-down animation
		speed:       'fast',  // faster animation speed 
		autoArrows:  true,   // generation of arrow mark-up (for submenu) 
		dropShadows: false
	});
});
 /*	Menu END */
 
/* audio player START */
if (jQuery("audio").length > 0) {
	jQuery(document).ready(function($) {
		(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
		jQuery( function($) { $( 'audio' ).audioPlayer(); } ); 
	});
}
/* audio player END */


/* pretty photo START */	
jQuery(window).load(function(){
 	jQuery("a[rel^='prettyPhoto']").prettyPhoto();
});
/* pretty photo END */	

/* post owl slider START  */	
if (jQuery(".owl-fade-slide").length > 0) {
	jQuery(document).ready(function($) {
 	 var owl = $(".owl-fade-slide");
 
  	owl.owlCarousel({
    	navigation : true,
    	pagination : false,
    	stopOnHover: true,
    	singleItem : true,
    	transitionStyle : "fadeUp"
  	});
 
});
}
/* post owl slider END  */	

/* post socials START */
jQuery( document ).ready(function($) {
$('.social-item').hover(function () {
    $('.icon', this).toggleClass('active');
    $('.icon', this).css({'display':'block'});
});
});
/* post socials END */

/* Circle progress bar START */
function easyCharts() {
	   jQuery('.easyPieChart').each(function () {
			var $this, $parent_width, $chart_size;
			$this =jQuery(this);
			$parent_width = jQuery(this).parent().width();
			$chart_size = $this.attr('data-barSize');
			if (!$this.hasClass('chart-animated')) {
				$this.easyPieChart({
					animate: 3000,
					lineCap: 'round',
					lineWidth: $this.attr('data-lineWidth'),
					size: $chart_size,
					barColor: $this.attr('data-barColor'),
					trackColor: $this.attr('data-trackColor'),
					scaleColor: 'transparent',
					onStep: function (value) {
						this.$el.find('.chart-percent span').text(Math.ceil(value));
					}
				});
			}
		});
 }

jQuery(document).ready(function () {
	easyCharts();
});

/* Circle progress bar END */

/*	Dropdown Menu  START */
jQuery(document).ready(function($){
	jQuery('.header-wrapper.header1 .main-menu ul.sf-menu, .header-wrapper.onlyheader2 .main-menu ul.sf-menu').mobileMenu({
    	defaultText: 'Navigate to...',
    	className: 'select-menu',
    	subMenuDash: '&nbsp;&nbsp;&nbsp;&ndash;'
	});	 
 	
});
/*	Dropdown Menu  END */

/*	Animation effect START */
jQuery(document).ready(function($) {
	
	if (Object.hasOwnProperty.call(window, "ActiveXObject") && !window.ActiveXObject) {
    // is IE11
    $('#container', this).css({'opacity':'1'});
}

});
/*	Animation effect END */

/*	Share socials START */
jQuery(document).ready(function($) {
 jQuery(".share-post-wrapper")
  .mouseenter(function() {
  	jQuery(this).parent().find(".socials-wrap").addClass("showit");
  })
  .mouseleave(function() {
    jQuery(this).parent().find(".socials-wrap").removeClass("showit");
  });
  
 jQuery(".aboutme-socials-wrapper")
  .mouseenter(function() {
  	jQuery(this).parent().find(".aboutme-socials-list").addClass("showit");
  })
  .mouseleave(function() {
    jQuery(this).parent().find(".aboutme-socials-list").removeClass("showit");
  });
});
/*	Share socials END */


/*	Comments START */
jQuery(document).ready(function() {
	// Get #comment-section div
	var commentsDiv = jQuery('.comments-wrapper');
	// Only do this work if that div isn't empty
	if (commentsDiv.length) {
	// Hide #comment-section div by default
	jQuery(commentsDiv).hide();
	// Append a link to show/hide
	jQuery('<a>')
		.attr('class', 'toggle-comments')
		.attr('href', '#')
		.html('Show Comments ('+post_comments_count+')')
		.insertBefore(commentsDiv);
	// Encase button in #toggle-comments-container div
	jQuery('.toggle-comments').wrap(jQuery('<div/>', {
		id: 'toggle-comments-container'
	}))
	// When show/hide is clicked
	jQuery('.toggle-comments').on('click', function(e) {
		e.preventDefault();
	// Show/hide the div using jQuery's toggle()
	jQuery(commentsDiv).slideToggle('slow', function() {
	// change the text of the anchor
		var anchor = jQuery('.toggle-comments');
		var anchorText = anchor.html() == 'Show Comments ('+post_comments_count+')' ? 'Hide Comments ('+post_comments_count+')' : 'Show Comments ('+post_comments_count+')';
		jQuery(anchor).html(anchorText);
	});
	});
 
	} // End of commentsDiv.length
}); 
/*	Comments END */

/*	Testimonials START */
if (jQuery(".owl-carousel.testimonials-wrapper").length > 0) {
jQuery(document).ready(function() {
  var owl = jQuery(".owl-carousel.testimonials-wrapper");
  owl.owlCarousel({
     
      itemsCustom : [
        [0, 1],
        [450, 1],
        [600, 1],
        [700, 1],
        [1000, 1],
        [1200, 1],
        [1400, 1],
        [1600, 1]
      ],
      navigation : false,
      pagination : true,
      autoPlay: 5000
  });
});
}
/*	Testimonials END */

/*	Search START */
jQuery(document).ready(function() {
	(function() {
		var dlgtrigger = document.querySelector( '[data-dialog]' ),
			somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
			dlg = new DialogFx( somedialog );
		var searchText = "Type the word and press enter";
		if (search_placeholder != '') { searchText = search_placeholder; } 
		jQuery('.dialog__content #s').attr("placeholder", searchText);	
		dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );
	})();
});
/*	Search END */		
	
/* Post filter START */	
if (jQuery(".pego-isotope-wrapper").length > 0) {	
jQuery(document).ready(function(){

 jQuery(function() {
	var container = jQuery(".pego-isotope-wrapper");
	      container.isotope({
			itemSelector : ".isotope-item",
			layoutMode: "masonry",
			transitionDuration: "0.7s"	
      });
      var optionSets = jQuery(".option-set"),
          optionLinks = optionSets.find("a");

      optionLinks.click(function(){
        var $this = jQuery(this);
        
        if ( $this.hasClass("selected") ) {
          return false;
        }
        var optionSet = $this.parents(".option-set");
        optionSet.find(".selected").removeClass("selected");
        $this.addClass("selected");
  
        var options = {},
            key = optionSet.attr("data-option-key"),
            value = $this.attr("data-option-value");
     
        value = value === "false" ? false : value;
        options[ key ] = value;
        if ( key === "layoutMode" && typeof changeLayoutMode === "function" ) {
         
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          container.isotope( options );
        }
        
        return false;
      });
	
	
 });
});  

jQuery(window).load(function(){
	var container = jQuery(".pego-isotope-wrapper");
	    container.isotope({
		itemSelector : ".isotope-item",
		layoutMode: "masonry",
		transitionDuration: "0.7s"	
    });
});

jQuery(window).load(function(){
 	setTimeout(function(){
		var container = jQuery(".pego-isotope-wrapper");
	        container.isotope({
			itemSelector : ".isotope-item",
			layoutMode: "masonry",
			transitionDuration: "0.7s"	
      });
	  },700);
});  



(function($,sr){

  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;

      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null;
          };

          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);

          timeout = setTimeout(delayed, threshold || 100);
      };
  }
  // smartresize 
  jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');


jQuery(window).smartresize(function(){
	"use strict";
  	var container = jQuery(".pego-isotope-wrapper");
	    container.isotope({
		itemSelector : ".isotope-item",
		layoutMode: "masonry",
		transitionDuration: "0.7s"	
    });
});
}
/* Post filter END */	

/* Scroll to top START */	
jQuery(document).ready(function(){
	jQuery('.scrollup').click(function () {
		jQuery('body,html').animate({ scrollTop: 0 }, 800);
		return false;
	});
});
/* Scroll to top END */	

/* Sticky header START */	
jQuery(document).ready(function(){ 
	pego_sticky_nav();
});

var orgElementPos = jQuery('.menu-header1').offset();
orgElementTop = orgElementPos.top;  
jQuery(window).scroll(function() {
	pego_sticky_nav();
});

function pego_sticky_nav() {
  if (jQuery(window).scrollTop() >= (orgElementTop)) { 
  	jQuery('.header-wrapper-both-menus .header-wrapper.header2').addClass("showme");
   } else {
   	jQuery('.header-wrapper-both-menus .header-wrapper.header2').removeClass("showme");
   }
}
/* Sticky header END */	