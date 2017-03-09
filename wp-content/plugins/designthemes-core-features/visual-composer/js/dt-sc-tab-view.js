(function ($) {

	if(typeof vc === 'undefined' || typeof window.VcColumnView==='undefined')
    	return false;

    var Shortcodes = vc.shortcodes;

	window.DTTabView = window.VcColumnView.extend( {
		events: {
			'click > .vc_controls .vc_control-btn-delete': 'deleteShortcode',
			'click > .vc_controls .vc_control-btn-prepend': 'addElement',
			'click > .vc_controls .vc_control-btn-edit': 'editElement',
			'click > .vc_controls .vc_control-btn-clone': 'clone',
			'click > .wpb_element_wrapper > .vc_empty-container': 'addToEmpty'
		},
		render: function () {
			var params = this.model.get( 'params' );
			window.DTTabView.__super__.render.call( this );
			/**
			 * @deprecated 4.4.3
			 * @see composer-atts.js vc.atts.tab_id.addShortcode
			 */
			if ( ! params.tab_id/* || params.tab_id.indexOf('def') != -1*/ ) {
				params.tab_id = (Date.now() + '-' + Math.floor( Math.random() * 11 ));
				this.model.save( 'params', params );
			}
			this.id = 'tab-' + params.tab_id;
			this.$el.attr( 'id', this.id );
			return this;
		},
		ready: function ( e ) {
			window.DTTabView.__super__.ready.call( this, e );
			this.$tabs = this.$el.closest( '.wpb_tabs_holder' );
			var params = this.model.get( 'params' );
			return this;
		},
		changeShortcodeParams: function ( model ) {
			var params;

			window.DTTabView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			if ( _.isObject( params ) && _.isString( params.title ) && _.isString( params.tab_id ) ) {
				$( '.ui-tabs-nav [href="#tab-' + params.tab_id + '"]' ).text( params.title );
			}
		},
		deleteShortcode: function ( e ) {
			_.isObject( e ) && e.preventDefault();
			var answer = confirm( window.i18nLocale.press_ok_to_delete_section ),
				parent_id = this.model.get( 'parent_id' );
			if ( true !== answer ) {
				return false;
			}
			this.model.destroy();
			if ( ! vc.shortcodes.where( { parent_id: parent_id } ).length ) {
				var parent = vc.shortcodes.get( parent_id );
				parent.destroy();
				return false;
			}
			var params = this.model.get( 'params' ),
				current_tab_index = $( '[href=#tab-' + params.tab_id + ']', this.$tabs ).parent().index();
			$( '[href=#tab-' + params.tab_id + ']' ).parent().remove();
			var tab_length = this.$tabs.find( '.ui-tabs-nav li:not(.add_tab_block)' ).length;
			if ( 0 < tab_length ) {
				this.$tabs.tabs( 'refresh' );
			}
			if ( current_tab_index < tab_length ) {
				this.$tabs.tabs( "option", "active", current_tab_index );
			} else if ( 0 < tab_length ) {
				this.$tabs.tabs( "option", "active", tab_length - 1 );
			}

		},
		cloneModel: function ( model, parent_id, save_order ) {
			var new_order,
				model_clone,
				params,
				tag;

			new_order = _.isBoolean( save_order ) && true === save_order ? model.get( 'order' ) : parseFloat( model.get( 'order' ) ) + vc.clone_index;
			params = _.extend( {}, model.get( 'params' ) );
			tag = model.get( 'shortcode' );

			if ( 'dt_sc_tab' === tag ) {
				_.extend( params,
					{ tab_id: Date.now() + '-' + this.$tabs.find( '[data-element_type=dt_sc_tab]' ).length + '-' + Math.floor( Math.random() * 11 ) } );
			}

			model_clone = Shortcodes.create( {
				shortcode: tag,
				parent_id: parent_id,
				order: new_order,
				cloned: true,
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