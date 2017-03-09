(function ($) {
	if(typeof vc === 'undefined' || typeof vc.shortcode_view === 'undefined')
		return false;

	var Shortcodes = vc.shortcodes;

	window.DTTabsView = vc.shortcode_view.extend( {
		new_tab_adding: false,
		events: {
			'click .add_tab': 'addTab',
			'click > .vc_controls .vc_control-btn-delete': 'deleteShortcode',
			'click > .vc_controls .vc_control-btn-edit': 'editElement',
			'click > .vc_controls .vc_control-btn-clone': 'clone'
		},
		initialize: function ( params ) {
			window.DTTabsView.__super__.initialize.call( this, params );
			_.bindAll( this, 'stopSorting' );
		},
		render: function () {
			window.DTTabsView.__super__.render.call( this );
			this.$tabs = this.$el.find( '.wpb_tabs_holder' );
			this.createAddTabButton();
			return this;
		},
		ready: function ( e ) {
			window.DTTabsView.__super__.ready.call( this, e );
		},
		createAddTabButton: function () {
			var new_tab_button_id = (Date.now() + '-' + Math.floor( Math.random() * 11 ));
			this.$tabs.append( '<div id="new-tab-' + new_tab_button_id + '" class="new_element_button"></div>' );
			this.$add_button = $( '<li class="add_tab_block"><a href="#new-tab-' + new_tab_button_id + '" class="add_tab" title="' + window.i18nLocale.add_tab + '"></a></li>' ).appendTo( this.$tabs.find( ".tabs_controls" ) );
		},
		addTab: function ( e ) {
			e.preventDefault();
			// check user role to add controls
			if ( ! this.hasUserAccess() ) {
				return false;
			}
			this.new_tab_adding = true;
			var tab_title = window.i18nLocale.tab,
				tabs_count = this.$tabs.find( '[data-element_type=dt_sc_tab]' ).length,
				tab_id = (Date.now() + '-' + tabs_count + '-' + Math.floor( Math.random() * 11 ));
			vc.shortcodes.create( {
				shortcode: 'dt_sc_tab',
				params: { title: tab_title, tab_id: tab_id },
				parent_id: this.model.id
			} );
			return false;
		},
		stopSorting: function ( event, ui ) {
			var shortcode;
			this.$tabs.find( 'ul.tabs_controls li:not(.add_tab_block)' ).each( function ( index ) {
				var href = $( this ).find( 'a' ).attr( 'href' ).replace( "#", "" );
				shortcode = vc.shortcodes.get( $( '[id=' + $( this ).attr( 'aria-controls' ) + ']' ).data( 'model-id' ) );
				vc.storage.lock();
				shortcode.save( { 'order': $( this ).index() } ); // Optimize
			} );
			shortcode && shortcode.save();
		},
		changedContent: function ( view ) {
			var params = view.model.get( 'params' );
			if ( ! this.$tabs.hasClass( 'ui-tabs' ) ) {
				this.$tabs.tabs( {
					select: function ( event, ui ) {
						return ! $( ui.tab ).hasClass( 'add_tab' );
					}
				} );
				this.$tabs.find( ".ui-tabs-nav" ).prependTo( this.$tabs );
				// check user role to add controls
				if ( this.hasUserAccess() ) {
					this.$tabs.find( ".ui-tabs-nav" ).sortable( {
						axis: ('vc_tour' === this.$tabs.closest( '[data-element_type]' ).data( 'element_type' ) ? 'y' : 'x'),
						update: this.stopSorting,
						items: "> li:not(.add_tab_block)"
					} );
				}
			}
			if ( true === view.model.get( 'cloned' ) ) {
				var cloned_from = view.model.get( 'cloned_from' ),
					$tab_controls = $( '.tabs_controls > .add_tab_block', this.$content ),
					$new_tab = $( "<li><a href='#tab-" + params.tab_id + "'>" + params.title + "</a></li>" ).insertBefore( $tab_controls );
				this.$tabs.tabs( 'refresh' );
				this.$tabs.tabs( "option", 'active', $new_tab.index() );
			} else {
				$( "<li><a href='#tab-" + params.tab_id + "'>" + params.title + "</a></li>" )
					.insertBefore( this.$add_button );
				this.$tabs.tabs( 'refresh' );
				this.$tabs.tabs( "option",
					"active",
					this.new_tab_adding ? $( '.ui-tabs-nav li', this.$content ).length - 2 : 0 );

			}
			this.new_tab_adding = false;
		},
		cloneModel: function ( model, parent_id, save_order ) {
			var new_order, model_clone, params, tag;

			new_order = _.isBoolean( save_order ) && true === save_order ? model.get( 'order' ) : parseFloat( model.get( 'order' ) ) + vc.clone_index;
			params = _.extend( {}, model.get( 'params' ) );
			tag = model.get( 'shortcode' );

			if ( 'dt_sc_tab' === tag ) {
				_.extend( params,
					{ tab_id: Date.now() + '-' + this.$tabs.find( '[data-element-type=dt_sc_tab]' ).length + '-' + Math.floor( Math.random() * 11 ) } );
			}

			model_clone = Shortcodes.create( {
				shortcode: tag,
				id: vc_guid(),
				parent_id: parent_id,
				order: new_order,
				cloned: ('dt_sc_tab' !== tag), // TODO: review this by @say2me
				cloned_from: model.toJSON(),
				params: params
			} );

			_.each( Shortcodes.where( { parent_id: model.id } ), function ( shortcode ) {
				this.cloneModel( shortcode, model_clone.get( 'id' ), true );
			}, this );
			return model_clone;
		}
	} );


})(window.jQuery);