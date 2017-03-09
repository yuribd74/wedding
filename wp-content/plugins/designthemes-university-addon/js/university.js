jQuery("document").ready(function($){
	$('div.dt-sc-faculty-sorting > a').click(function(e){

		e.preventDefault();

		$("div.dt-sc-faculty-sorting > a").removeClass("active-sort");
		$(this).addClass("active-sort");

		$filter = $('div.dt-sc-faculty-sorting > a.active-sort').data('filter');

		if(typeof $filter === 'undefined'){
			$filter = $('div.dt-sc-faculty-sorting > a.active-sort').html();
		}

		var $data = {
			'action' : 'dt_sc_filter_university_faculty',
			'data'	: { 
				'title': $filter,
				'type' : $('div.dt-sc-faculty-container').data('type')
			}
		};

		jQuery.ajax({
			url: dttheme_urls.ajaxurl,
			data: $data,
			beforeSend: function() {
				$("div.dt-sc-faculty-container").html('<div class="dt-sc-loading"></div>');
			},
			success: function( response ) {
				$("div.dt-sc-faculty-container").html(response).fadeIn();	
			}
		});
	});
});