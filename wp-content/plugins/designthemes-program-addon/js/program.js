jQuery.noConflict();
jQuery(document).ready(function($){

	// Program Sorting
	$(window).smartresize(function(){
		var $container = $(".dt-sc-fitness-program-container");
		if( $container.length) {
			$($container).each(function(){
				$(this).css({overflow:'hidden'}).isotope({itemSelector : '.column',masonry: { gutterWidth: 23 } });
			});
		}
	});

	$(window).load(function(){

		var $container = $(".dt-sc-fitness-program-container");

		if( $container.length) {
			$($container).each(function(){
				$(this).isotope({
					filter: '*',
					masonry: { gutterWidth: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
			});
		}

		if($("div.dt-sc-fitness-program-sorting").length){
			$("div.dt-sc-fitness-program-sorting a").on('click',function(){
				$("div.dt-sc-fitness-program-sorting a").removeClass("active-sort");
				$(this).addClass("active-sort");
				var selector = $(this).attr('data-filter');
				var $container = $(this).parents(".dt-sc-fitness-program-sorting").next(".dt-sc-fitness-program-container");

				$container.isotope({
					filter: selector,
					masonry: { gutterWidth: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});				
				return false;
			});
		}
	});

	/* bmi calculation */
	$('form[name="frmbmi"]').submit(function(){
		var This = $(this);
		var fet = This.find('input[name="txtfeet"]').val();
		var inc = This.find('input[name="txtinches"]').val();
		var tinc = ( parseInt(fet) * 12 ) + parseInt(inc);
			
		var lbs = This.find('input[name="txtlbs"]').val();
			
		var bmi = ( parseFloat(lbs) / (tinc * tinc) ) * 703;
			
		This.find('input[name="txtbmi"]').val(parseFloat(bmi).toFixed(1));
		return false;
	});

	/* bmi class */
	if($('.fancyInline').length > 0) {
		var str = $('.fancyInline').attr('href');
		str = str.substr(0, 4);
		if(str !== 'http') {
			$('.fancyInline').fancybox({
				scrolling: 'no',
				width: 'auto',
				height: 'auto'
			});
		}
	}
});
