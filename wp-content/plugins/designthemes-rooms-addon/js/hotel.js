jQuery.noConflict();
jQuery(document).ready(function($){

	// Menu Sorting
	$(window).smartresize(function(){
		var $container = $(".dt-sc-rooms-container");
		if( $container.length) {
			$($container).each(function(){
				$(this).css({overflow:'hidden'}).isotope({itemSelector : '.column',masonry: { gutterWidth: 23 } });
			});
		}
	});

	$(window).load(function(){

		var $container = $(".dt-sc-rooms-container");

		if( $container.length) {
			$($container).each(function(){
				$(this).isotope({
					filter: '*',
					masonry: { gutterWidth: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
			});
		}

		if($("div.dt-sc-hotel-room-sorting").length){
			$("div.dt-sc-hotel-room-sorting a").on('click',function(){
				$("div.dt-sc-hotel-room-sorting a").removeClass("active-sort");
				$(this).addClass("active-sort");
				var selector = $(this).attr('data-filter');
				var $container = $(this).parents(".dt-sc-hotel-room-sorting").next(".dt-sc-rooms-container");

				$container.isotope({
					filter: selector,
					masonry: { gutterWidth: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
				return false;
			});
		}
	});
	
	if($('#booknow_wrapper').length > 0) {
		$('.btn-book').each(function(){
			$(this).fancybox({
				scrolling: 'no',
				width: 'auto',
				height: 'auto'
			});
			$(this).click(function(){
				$('#hidroomname').val($(this).attr('title'));
			});
		});
	}

	// Ajax Submit
	$('.booknow-frm, .reserve-frm').submit(function () {

		var This = $(this);
        var data_value = null;
		
		if($(This).valid()) {
			var action = $(This).attr('action');

			data_value = decodeURI($(This).serialize());
			$.ajax({
                 type: "POST",
                 url:action,
                 data: data_value,
                 success: function (response) {
                   $('#ajax_message').html(response);
                   $('#ajax_message').slideDown('slow');
                   if (response.match('success') !== null){ $(This).slideUp('slow'); }
                 }
            });
        }
        return false;
    });

	$('#txtarrivedate, #txtchkindate, #txtchkoutdate').datepicker({
		dateFormat: 'dd-M-yy',
		minDate: 0,
		numberOfMonths: 1
	});

	// Room slider
	if( $(".dt-room-single-slider").find("li").length > 1 ) {
		$(".dt-room-single-slider").bxSlider({ auto:false, video:true, useCSS:false, pagerCustom: '#bx-pager', autoHover:true, adaptiveHeight:true, controls:false });
	}

});