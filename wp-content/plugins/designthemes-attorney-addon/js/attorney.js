jQuery("document").ready(function($){

	$('div.dt-sc-attorney-sorting > a').click(function(e){

		e.preventDefault();

		$("div.dt-sc-attorney-sorting > a").removeClass("active-sort");
		$(this).addClass("active-sort");

		$filter = $('div.dt-sc-attorney-sorting > a.active-sort').data('filter');

		if(typeof $filter === 'undefined'){
			$filter = $('div.dt-sc-attorney-sorting > a.active-sort').html();
		}

		var $data = {
			'action' : 'dt_sc_filter_attorneys',
			'data'	: { 
				'title': $filter,
				'type' : $('div.dt-sc-attorneys-container').data('type')
			}
		};

		jQuery.ajax({
			url: dttheme_urls.ajaxurl,
			data: $data,
			beforeSend: function() {
				$("div.dt-sc-attorneys-container").html('<div class="dt-sc-loading"></div>');
			},
			success: function( response ) {
				$("div.dt-sc-attorneys-container").html(response).fadeIn();	
			}
		});
	});	
});