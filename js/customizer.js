/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	wp.customize('synapse_hide_title_tagline', function(value){
		value.bind(function( to ) {
			$( '#text-title-desc').toggle();
		});
	});

	//Socail Icons
    wp.customize( 'synapse_social_icon_style_set', function( value ) {
        value.bind( function( to ) {
            var	ChangeClass	=	'social-style ' + to;
            $( '.social-icons a' ).attr( 'class', ChangeClass );
        });
    });

    wp.customize( 'synapse_social_1', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(0)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'synapse_social_2', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(1)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'synapse_social_3', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(2)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'synapse_social_4', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(3)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'synapse_social_5', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(4)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'synapse_social_6', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(5)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'synapse_social_7', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('.social-icons' ).find( 'i:eq(6)' ).attr( 'class', ClassNew );
        });
    });

    //Featured Areas
	wp.customize('synapse_feat_post_slider_enable', function( value ) {
		value.bind(function( to ) {
			$('#slider-feat_posts').toggle();
		});
	});

    //Design & Layouts
    //Colors
    wp.customize( 'synapse_site_titlecolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).css( 'color', to );
        } );
    } );
    wp.customize( 'synapse_header_desccolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        } );
    } );

	//Footer
	wp.customize('synapse_fc_line_disable', function( value ) {
		value.bind(function( to ) {
			$('.footer_credit_line').toggle();
		});
	});
	wp.customize('synapse_footer_text', function( value ) {
		value.bind(function( to ) {
			$('.footer_custom_text').text( to );
		});
	});

    //Typography
    //Fonts
    wp.customize( 'synapse_title_font', function( value ) {
        value.bind( function( to ) {
            $( '.title-font, h1, h2, .section-title, .woocommerce ul.products li.product h3, #site-navigation a' ).css( 'font-family', to );
        } );
    } );
    wp.customize( 'synapse_body_font', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'font-family', to );
        } );
    } );

    wp.customize( 'synapse_content_page_post_fontsize_set', function( value ) {
        value.bind( function( to ) {
            $( '#primary-mono .entry-content' ).css( 'font-size', to );
        } );
    } );

    wp.customize( 'synapse_content_site_title_fontsize_set', function( value ) {
        value.bind( function( to ) {
            $( '.site-title' ).css( 'font-size', to + 'px' );
        } );
    } );

    wp.customize( 'synapse_content_site_desc_fontsize_set', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'font-size', to + 'px' );
        } );
    } );

} )( jQuery );
