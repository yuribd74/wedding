(function ($) {
	if(typeof vc === 'undefined' || typeof vc.shortcode_view === 'undefined')
		return false;

	var Shortcodes = vc.shortcodes;

	window.DTAccordionView = vc.shortcode_view.extend( {
		adding_new_tab: false,
		events: {
			'click .add_tab': 'addTab',
			'click > .vc_controls .column_delete, > .vc_controls .vc_control-btn-delete': 'deleteShortcode',
			'click > .vc_controls .column_edit, > .vc_controls .vc_control-btn-edit': 'editElement',
			'click > .vc_controls .column_clone,> .vc_controls .vc_control-btn-clone': 'clone'
		},
		render: function () {
			window.DTAccordionView.__super__.render.call( this );
			// check user role to add controls
			if ( ! this.hasUserAccess() ) {
				return this;
			}
			this.$content.sortable( {
				axis: "y",
				handle: "h3",
				stop: function ( event, ui ) {
					// IE doesn't register the blur when sorting
					// so trigger focusout handlers to remove .ui-state-focus
					ui.item.prev().triggerHandler( "focusout" );
					$( this ).find( '> .wpb_sortable' ).each( function () {
						var shortcode = $( this ).data( 'model' );
						shortcode.save( { 'order': $( this ).index() } ); // Optimize
					} );
				}
			} );
			return this;
		},
		changeShortcodeParams: function ( model ) {
			var params, collapsible;

			window.DTAccordionView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			collapsible = _.isString( params.collapsible ) && 'yes' === params.collapsible ? true : false;
			if ( this.$content.hasClass( 'ui-accordion' ) ) {
				this.$content.accordion( "option", "collapsible", collapsible );
			}
		},
		changedContent: function ( view ) {
			if ( this.$content.hasClass( 'ui-accordion' ) ) {
				this.$content.accordion( 'destroy' );
			}
			var collapsible = _.isString( this.model.get( 'params' ).collapsible ) && 'yes' === this.model.get( 'params' ).collapsible ? true : false;
			this.$content.accordion( {
				header: "h3",
				navigation: false,
				autoHeight: true,
				heightStyle: "content",
				collapsible: collapsible,
				active: false === this.adding_new_tab && true !== view.model.get( 'cloned' ) ? 0 : view.$el.index()
			} );
			this.adding_new_tab = false;
		},
		addTab: function ( e ) {
			e.preventDefault();
			// check user role to add controls
			if ( ! this.hasUserAccess() ) {
				return false;
			}
			this.adding_new_tab = true;
			vc.shortcodes.create( {
				shortcode: 'dt_sc_accordion_tab',
				params: { title: window.i18nLocale.section },
				parent_id: this.model.id
			} );
		},
		_loadDefaults: function () {
			window.DTAccordionView.__super__._loadDefaults.call( this );
		}
	} );

})(window.jQuery);