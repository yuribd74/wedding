(function ($) {

	if(typeof vc === 'undefined' || typeof window.VcColumnView==='undefined')
    	return false;

    var Shortcodes = vc.shortcodes;

	window.DTAccordionTabView = window.VcColumnView.extend( {
		events: {
			'click > [data-element_type] > .vc_controls .vc_control-btn-delete': 'deleteShortcode',
			'click > [data-element_type] >  .vc_controls .vc_control-btn-prepend': 'addElement',
			'click > [data-element_type] >  .vc_controls .vc_control-btn-edit': 'editElement',
			'click > [data-element_type] > .vc_controls .vc_control-btn-clone': 'clone',
			'click > [data-element_type] > .wpb_element_wrapper > .vc_empty-container': 'addToEmpty'
		},
		setContent: function () {
			this.$content = this.$el.find( '> [data-element_type] > .wpb_element_wrapper > .vc_container_for_children' );
		},
		changeShortcodeParams: function ( model ) {
			var params;

			window.DTAccordionTabView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			if ( _.isObject( params ) && _.isString( params.title ) ) {
				this.$el.find( '> h3 .tab-label' ).text( params.title );
			}
		},
		setEmpty: function () {
			$( '> [data-element_type]', this.$el ).addClass( 'vc_empty-column' );
			this.$content.addClass( 'vc_empty-container' );
		},
		unsetEmpty: function () {
			$( '> [data-element_type]', this.$el ).removeClass( 'vc_empty-column' );
			this.$content.removeClass( 'vc_empty-container' );
		}
	} );    

})(window.jQuery);