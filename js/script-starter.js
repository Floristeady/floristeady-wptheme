/*
	Site-specific scripts you might have.
	Note that <html> innately gets a class of "no-js".
*/


$(function () {

// Fade del load project and filter tag
	$(function () {
		$('.project').hide();//hide all the images on the page
		$('.wp-pagenavi').hide();
		
    });

			var i = 0; //initialize
			var int=0; //Internet Explorer Fix
		$(window).bind("load", function() { //The load event will only fire if the entire page or document is fully loaded
			int = setInterval(doThis, 200); //200 is the fade in speed in milliseconds
	 });
	
	function doThis() {
		var imgs = $('.project').length; //count the number of images on the page
			
		
		if (i >= imgs) { // Loop the images
			clearInterval(int); //When it reaches the last image the loop ends
			
		}
		   i++;//add 1 to the count
		   $('.project:hidden').eq(0).fadeIn(200); //fades in the hidden images one by one

		if (i == imgs) { 
			$('.wp-pagenavi').delay(2000).fadeIn(100);
			
			 $('.project a.img').BlackAndWhite({
			        hoverEffect : true, // default true
			        // set the path to BnWWorker.js for a superfast implementation
			        webworkerPath : false,
			        // for the images with a fluid width and height 
			        responsive:true,
			        // to invert the hover effect
			        invertHoverEffect: false,
			        speed: { //this property could also be just speed: value for both fadeIn and fadeOut
			            fadeIn: 200, // 200ms for fadeIn animations
			            fadeOut: 800 // 800ms for fadeOut animations
			        }
			  });
		}   
	}	
 
    
});

$(function () {
	$.fn.filterable = function(settings) {
		settings = $.extend({
			useHash: true,
			animationSpeed:600,
			show: { width: 'show', opacity: 'show' },
			hide: { width: 'hide', opacity: 'hide' },
			useTags: true,
			tagSelector: 'a.tag',
			selectedTagClass: 'current',
			allTag: 'all'
		}, settings);
		
		return $(this).each(function(){
		
			/* FILTER: select a tag and filter */
			$(this).bind("filter", function( e, tagToShow ){
				if(settings.useTags){
					$(settings.tagSelector).removeClass(settings.selectedTagClass);
					$(settings.tagSelector + '[href=' + tagToShow + ']').addClass(settings.selectedTagClass);
				}
				$(this).trigger("filterportfolio", [ tagToShow.substr(1) ]);
			});
		
			/* FILTERPORTFOLIO: pass in a class to show, all others will be hidden */
			$(this).bind("filterportfolio", function( e, classToShow ){
				if(classToShow == settings.allTag){
					$(this).trigger("show");
				}else{
					$(this).trigger("show", [ '.' + classToShow ] );
					$(this).trigger("hide", [ ':not(.' + classToShow + ')' ] );
				}
				if(settings.useHash){
					location.hash = '#' + classToShow;
				}
			});
			
			/* SHOW: show a single class*/
			$(this).bind("show", function( e, selectorToShow ){
				$(this).children(selectorToShow).animate(settings.show, settings.animationSpeed);
			});
			
			/* SHOW: hide a single class*/
			$(this).bind("hide", function( e, selectorToHide ){
				$(this).children(selectorToHide).animate(settings.hide, settings.animationSpeed);	
			});
			
			/* ============ Check URL Hash ====================*/
			if(settings.useHash){
				if(location.hash != '')
					$(this).trigger("filter", [ location.hash ]);
				else
					$(this).trigger("filter", [ '#' + settings.allTag ]);
			}
			
			/* ============ Setup Tags ====================*/
			if(settings.useTags){
				$(settings.tagSelector).click(function(){
					$('#portfolio').trigger("filter", [ $(this).attr('href') ]);
					
					$(settings.tagSelector).removeClass('current');
					$(this).addClass('current');
				});
			}
		});
	}
});


$(document).ready(function(){
	
	$('#portfolio').filterable();

});

/* hover tags */
$(function(){

	$("#top-content .tags a").hover(function(){
		$(this).stop().animate({ backgroundColor: '#969C9D', color: '#40E8C6' }, 300);
	}, function(){
		$(this).stop().animate({ backgroundColor: 'transparent', color: '#F9F9F9' }, 100);

	});
	
	
	/* project */
	$("#portfolio a.img").hover(function(){
		$(this).siblings('span.text').stop().animate({ height: '0',  opacity: '0' }, 300); 
	}, function(){
	    $(this).siblings('span.text').stop().animate({ height: '32px', opacity: '1' }, 300);
	});
	
	$("#portfolio a.title").hover(function(){
		$(this).stop().animate({ color: '#ebebeb' }, 300);
	}, function(){
		$(this).stop().animate({ color: '#ffffff' }, 100);

	});
	
	
});

	