jQuery.noConflict();
jQuery(document).ready(function($){
	
	// Model Single Slider
	if( $(".dt-sc-model-single-slider").find("li").length > 1 ) {
		$(".dt-sc-model-single-slider").bxSlider({ auto:false, video:true, useCSS:false, adaptiveHeight:true, pager:false, nextText:'', prevText:'' });
	}
	
	// Model Sorting
	$(window).smartresize(function(){
		var $container = $(".dt-sc-model-sorting-elements").find(".dt-sc-model-container");
		if( $container.length) {
			$($container).each(function(){
				$(this).css({overflow:'hidden'}).isotope({itemSelector : '.column',masonry: { gutterWidth: 0 } });
			});
		}
	});

	$(window).load(function(){

		var $container = $(".dt-sc-model-sorting-elements").find(".dt-sc-model-container");
		if( $container.length) {
			$($container).each(function(){
				$(this).isotope({
					filter: '*',
					masonry: { gutterWidth: 0 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
			});
		}

		if($("div.dt-sc-model-sorting").length){
			$("div.dt-sc-model-sorting a").on('click',function(){
				$("div.dt-sc-model-sorting a").removeClass("active-sort");
				$(this).addClass("active-sort");
				var selector = $(this).attr('data-filter');
				var $container = $(this).parents(".dt-sc-model-sorter").next(".dt-sc-model-sorting-elements").find(".dt-sc-model-container");

				$container.isotope({
					filter: selector,
					masonry: { gutterWidth: 0 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});				
				return false;
			});
		}
	});
});
