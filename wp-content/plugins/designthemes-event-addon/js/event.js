jQuery.noConflict();
jQuery(document).ready(function($){

	// Event Sorting
	$(window).smartresize(function(){
		var $container = $(".dt-sc-events-isotope");
		if( $container.length) {
			$($container).each(function(){
				$(this).css({overflow:'hidden'}).isotope({itemSelector : '.column',masonry: { gutterWidth: 23 } });
			});
		}
	});

	$(window).load(function(){

		var $container = $(".dt-sc-events-isotope");

		if( $container.length) {
			$($container).each(function(){
				$(this).isotope({
					filter: '*',
					masonry: { gutterWidth: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
			});
		}

		if($("div.dt-sc-event-sorting").length){
			$("div.dt-sc-event-sorting a").on('click',function(){
				$("div.dt-sc-event-sorting a").removeClass("active-sort");
				$(this).addClass("active-sort");
				var selector = $(this).attr('data-filter');
				var $container = $(this).parents(".dt-sc-event-sorting").next(".dt-sc-events-isotope");

				$container.isotope({
					filter: selector,
					masonry: { gutterWidth: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});				
				return false;
			});
		}
	});
});