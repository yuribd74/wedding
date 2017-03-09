jQuery("document").ready(function($){

	$('div.dt-sc-doctors-sorting > a').click(function(e){
		$("div.dt-sc-doctors-sorting > a").removeClass("active-sort");
		$(this).addClass("active-sort");
		doctor_filter();
		e.preventDefault();
	});

	$("select[name=department-filter]").change(function(){
		doctor_filter();
	});


	function doctor_filter() {
		var $data = {
			'action' : 'dt_sc_filter_doctors',
			'data'	: { 
				'title': $('div.dt-sc-doctors-sorting > a.active-sort').html(),
				'tax': $("select[name=department-filter]").val(),
				'column' : $('div.dt-sc-doctors-container').data('column')
			}
		};

		jQuery.ajax({
			url: dttheme_urls.ajaxurl,
			data: $data,
			beforeSend: function() {
				$("div.dt-sc-doctors-container").html('<div class="dt-sc-loading"></div>');
			},
			success: function( response ) {
				$("div.dt-sc-doctors-container").html(response).fadeIn();	
			}
		});
	}
});