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
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	
	
	/***************************************
	******** HEADER SECTION *********
	****************************************/
	//Logo
	wp.customize("azera_shop_logo", function(value) {
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.navbar-brand' ).removeClass( 'azera_shop_only_customizer' );
				$( '.header-logo-wrap' ).addClass( 'azera_shop_only_customizer' );
			}
			else {
				$( '.navbar-brand' ).addClass( 'azera_shop_only_customizer' );
				$( '.header-logo-wrap' ).removeClass( 'azera_shop_only_customizer' );
			}
				
            $(".navbar-brand img").attr( "src", to );
			
        } );
    });


	//Show Header Logo
	wp.customize('azera_shop_header_logo', function( value ){
		value.bind(function( to ) {
			if( to != '' ) {
				$('#parallax_header .only-logo').removeClass( 'azera_shop_only_customizer' );
			} else {
				$('#parallax_header .only-logo').addClass( 'azera_shop_only_customizer' );
			}
			$( '#parallax_header .only-logo img' ).attr('src', to);
		});
		
	});
	
	//Title
	wp.customize("azera_shop_header_title", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '#parallax_header .intro-section h1' ).removeClass( 'azera_shop_only_customizer' );
			}
			else {
				$( '#parallax_header .intro-section h1' ).addClass( 'azera_shop_only_customizer' );
			}
			$( '#parallax_header .intro-section h1' ).text( to );
	    } );
		
    });
	
	//Subtitle
	wp.customize("azera_shop_header_subtitle", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '#parallax_header .intro-section h5' ).removeClass( 'azera_shop_only_customizer' );
			} else {
				$( '#parallax_header .intro-section h5' ).addClass( 'azera_shop_only_customizer' );
			}
			$( '#parallax_header .intro-section h5' ).text( to );
		} );
		
    });
	
	//Button text
	wp.customize("azera_shop_header_button_text", function(value) {
		
        value.bind(function( to ) {

			if( to != '' ) {
				$( '#parallax_header .button a' ).removeClass( 'azera_shop_only_customizer' );
			} else {
				$( '#parallax_header .button a' ).addClass( 'azera_shop_only_customizer' );
			}
			$( '#parallax_header .button a' ).text( to );
		} );
		
    });


	//Button link
	wp.customize("azera_shop_header_button_link", function(value) {
		
        value.bind(function( to ) {
			$( '#parallax_header .button a' ).attr( 'href', to );
		} );
		
    });	
	

	/******************************************************
	************* OUR STORY SECTION ****************
	*******************************************************/
	//Title
	wp.customize("azera_shop_our_story_title", function(value) {
		
        value.bind(function( to ) {
			
			if( to != '' ) {
				$( '.brief' ).removeClass( 'azera_shop_only_customizer' );
				$( '.brief .content-section h2' ).removeClass( 'azera_shop_only_customizer' );
				$( '.brief .content-section .colored-line-left').removeClass(  'azera_shop_only_customizer' );
				$( '.brief .content-section h2' ).text( to );
			}
			else {
				$( '.brief .content-section h2' ).addClass( 'azera_shop_only_customizer' );
				$( '.brief .content-section .colored-line-left').addClass(  'azera_shop_only_customizer' );
				if( $('.brief .brief-content-two').hasClass('azera_shop_only_customizer') && $('.brief .content-section .brief-content-text').hasClass('azera_shop_only_customizer') ){
					$( '.brief' ).addClass( 'azera_shop_only_customizer' );
				}
			}
	    } );
		
    });
	
	wp.customize("azera_shop_our_story_text",function(value) {
		
		value.bind(function( to ) {
			if( to != '' ) {
				$( '.brief' ).removeClass( 'azera_shop_only_customizer' );
				$( '.brief .content-section .brief-content-text' ).removeClass( 'azera_shop_only_customizer' );
				$( '.brief .content-section .brief-content-text' ).html( to );
			} else {
				$( '.brief .content-section .brief-content-text' ).addClass( 'azera_shop_only_customizer' );
				if( $( '.brief .content-section h2' ).hasClass('azera_shop_only_customizer') && $('.brief .brief-content-two').hasClass('azera_shop_only_customizer') ){
					$( '.brief' ).addClass( 'azera_shop_only_customizer' );
				}
			}
			
		});
		
	});
	
	wp.customize("azera_shop_our_story_image",function(value) {
		
		value.bind(function( to ) {
			if( to != '' ) {
				$( '.brief' ).removeClass( 'azera_shop_only_customizer' );
				$('.brief .brief-content-two').removeClass( 'azera_shop_only_customizer' );
				$( '.brief .brief-content-two .brief-image-right img' ).attr('src', to);
			} else {
				$('.brief .brief-content-two').addClass( 'azera_shop_only_customizer' );
				if( $( '.brief .content-section h2' ).hasClass('azera_shop_only_customizer') && $('.brief .content-section .brief-content-text').hasClass('azera_shop_only_customizer') ){
					$( '.brief' ).addClass( 'azera_shop_only_customizer' );
				}
			}
		});
		
	});

	/******************************************************
	*********** OUR SERVICES SECTION ***********************
	*******************************************************/
	
	
	//Title
	wp.customize("azera_shop_our_services_title", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.services' ).removeClass( 'azera_shop_only_customizer' );
				$( '.services .section-header h2' ).removeClass( 'azera_shop_only_customizer' );
				$('.services .section-header .colored-line' ).removeClass( 'azera_shop_only_customizer' );
				$( '.services .section-header h2' ).text( to );
			}
			else {
				$( '.services .section-header h2' ).addClass( 'azera_shop_only_customizer' );
				$('.services .section-header .colored-line' ).addClass( 'azera_shop_only_customizer' );
				if($( '.services .section-header .sub-heading' ).hasClass('azera_shop_only_customizer') && isEmpty($('.azera_shop_grid_column_1')) && isEmpty($('.azera_shop_grid_column_2')) && isEmpty($('.azera_shop_grid_column_3')) ){
					$( '.services' ).addClass( 'azera_shop_only_customizer' );
				}
			}
	    } );
		
    });
	
	//Subtitle
	wp.customize("azera_shop_our_services_subtitle", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.services' ).removeClass( 'azera_shop_only_customizer' );
				$( '.services .section-header .sub-heading' ).removeClass( 'azera_shop_only_customizer' );
				$( '.services .section-header .sub-heading' ).text( to );
			} else {
				$( '.services .section-header .sub-heading' ).addClass( 'azera_shop_only_customizer' );
				if($( '.services .section-header h2' ).hasClass('azera_shop_only_customizer')  && isEmpty($('.azera_shop_grid_column_1')) && isEmpty($('.azera_shop_grid_column_2')) && isEmpty($('.azera_shop_grid_column_3'))){
					$( '.services' ).addClass( 'azera_shop_only_customizer' );
				}
			}
		} );
		
    });

	
	/******************************************************
	*********** OUR TEAM SECTION **************
	*******************************************************/
	//Title
	wp.customize("azera_shop_our_team_title", function(value) {
		
        value.bind(function( to ) {
			
			if( to != '' ) {
				$( '.team' ).removeClass( 'azera_shop_only_customizer' );
				$( '.team .section-header h2' ).removeClass( 'azera_shop_only_customizer' );
				$( '.team .section-header .colored-line' ).removeClass( 'azera_shop_only_customizer' );
				$( '.team .section-header h2' ).text( to );
			} else {
				$( '.team .section-header h2' ).addClass( 'azera_shop_only_customizer' );
				$( '.team .section-header .colored-line' ).addClass( 'azera_shop_only_customizer' );
				if( $( '.team .section-header .sub-heading' ).hasClass( 'azera_shop_only_customizer' ) && isEmpty($('.team .team-member-wrap')) ){
					$( '.team' ).addClass( 'azera_shop_only_customizer' );
				}
			}
	    } );
		
    });
	
	//Subtitle
	wp.customize("azera_shop_our_team_subtitle", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.team' ).removeClass( 'azera_shop_only_customizer' );
				$( '.team .section-header .sub-heading' ).removeClass( 'azera_shop_only_customizer' );
				$( '.team .section-header .sub-heading' ).text( to );
			} else {
				$( '.team .section-header .sub-heading' ).addClass( 'azera_shop_only_customizer' );
				if( $( '.team .section-header h2' ).hasClass('azera_shop_only_customizer') && isEmpty($('.team .team-member-wrap')) ){
					$( '.team' ).addClass( 'azera_shop_only_customizer' );
				}
			}
		} );
		
    });
	

	/******************************************************
	******** HAPPY CUSTOMERS SECTION ***********
	*******************************************************/
	//Title
	wp.customize("azera_shop_happy_customers_title", function(value) {
		
        value.bind(function( to ) {
			
			if( to != '' ) {
				$( '.testimonials' ).removeClass( 'azera_shop_only_customizer' );
				$( '.testimonials .section-header h2' ).removeClass( 'azera_shop_only_customizer' );
				$( '.testimonials .section-header .colored-line' ).removeClass( 'azera_shop_only_customizer' );
				$( '.testimonials .section-header h2' ).text( to );
			} else {
				$( '.testimonials .section-header h2' ).addClass( 'azera_shop_only_customizer' );
				$( '.testimonials .section-header .colored-line' ).addClass( 'azera_shop_only_customizer' );
				if( $( '.testimonials .section-header .sub-heading').hasClass('azera_shop_only_customizer') && isEmpty($('.testimonials .testimonials-wrap .azera_shop_grid_column_1')) && isEmpty($('.testimonials .testimonials-wrap .azera_shop_grid_column_2')) && isEmpty($('.testimonials .testimonials-wrap .azera_shop_grid_column_3'))){
					$( '.testimonials' ).addClass( 'azera_shop_only_customizer' );
				}
			}
	    } );
		
    });
	
	//Subtitle
	wp.customize("azera_shop_happy_customers_subtitle", function(value) {
		
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.testimonials' ).removeClass( 'azera_shop_only_customizer' );
				$( '.testimonials .section-header .sub-heading' ).removeClass( 'azera_shop_only_customizer' );
				$( '.testimonials .section-header .sub-heading' ).text( to );
			} else {
				$( '.testimonials .section-header .sub-heading' ).addClass( 'azera_shop_only_customizer' );
				if( $( '.testimonials .section-header h2').hasClass('azera_shop_only_customizer') && isEmpty($('.testimonials .testimonials-wrap .azera_shop_grid_column_1')) && isEmpty($('.testimonials .testimonials-wrap .azera_shop_grid_column_2')) && isEmpty($('.testimonials .testimonials-wrap .azera_shop_grid_column_3')) ){
					$( '.testimonials' ).addClass( 'azera_shop_only_customizer' );
				}
			}
		} );
		
    });

	/******************************************************
	**************** RIBBON SECTION *****************
	*******************************************************/
	
	wp.customize( 'azera_shop_ribbon_background', function( value ) {
		value.bind( function( to ) {
			
			if ( '' != to ) {
				$( '.ribbon-wrap' ).attr( 'style','background-image:url('+to+')' );
			} else {
				$( '.ribbon-wrap' ).removeAttr('style');
			}
			
		} );
	} );	
	
	
	
	//Title
	wp.customize("azera_shop_ribbon_title", function(value) {
		
        value.bind(function( to ) {

			if( to != '' ) {
				$( '.ribbon-wrap' ).removeClass( 'azera_shop_only_customizer' );
				$( '.ribbon-wrap h2' ).removeClass( 'azera_shop_only_customizer' );
				$( '.ribbon-wrap h2' ).text( to );
			} else {
				$( '.ribbon-wrap h2' ).addClass( 'azera_shop_only_customizer' );
				if( $( '.ribbon-wrap button' ).hasClass( 'azera_shop_only_customizer' ) ){
					$( '.ribbon-wrap' ).addClass( 'azera_shop_only_customizer' );
				}
			}
		} );
		
    });
	
	
	//Button text
	wp.customize("azera_shop_button_text", function(value) {
		
        value.bind(function( to ) {

			if( to != '' ) {
				$( '.ribbon-wrap' ).removeClass( 'azera_shop_only_customizer' );
				$( '.ribbon-wrap button' ).removeClass( 'azera_shop_only_customizer' );
				$( '.ribbon-wrap button' ).text( to );
			} else {
				$( '.ribbon-wrap button' ).addClass( 'azera_shop_only_customizer' );
				if( $( '.ribbon-wrap h2' ).hasClass( 'azera_shop_only_customizer' ) ){
					$( '.ribbon-wrap' ).addClass( 'azera_shop_only_customizer' );
				}
			}
		} );
		
    });


	//Button link
	wp.customize("azera_shop_button_link", function(value) {
		
        value.bind(function( to ) {
			$( '#ribbon button' ).attr( 'onclick', to );
		} );
		
    });

	/********************************************************
	 ******************** SHOP SECTION **********************
	 *******************************************************/
	
	//Title
	wp.customize("azera_shop_shop_section_title", function(value) {

		value.bind(function( to ) {
			if( to != '' ) {
				$( '.shop' ).removeClass( 'azera_shop_only_customizer' );
				$( '.shop .section-header h2' ).removeClass( 'azera_shop_only_customizer' );
				$('.shop .section-header .colored-line' ).removeClass( 'azera_shop_only_customizer' );
				$( '.shop .section-header h2' ).text( to );
			}
			else {
				$( '.shop .section-header h2' ).addClass( 'azera_shop_only_customizer' );
				$('.shop .section-header .colored-line' ).addClass( 'azera_shop_only_customizer' );
			}
		} );

	});


	//Subtitle
	wp.customize("azera_shop_shop_section_subtitle", function(value) {

		value.bind(function( to ) {
			if( to != '' ) {
				$( '.shop' ).removeClass( 'azera_shop_only_customizer' );
				$( '.shop .section-header .sub-heading' ).removeClass( 'azera_shop_only_customizer' );
				$( '.shop .section-header .sub-heading' ).text( to );
			} else {
				$( '.shop .section-header .sub-heading' ).addClass( 'azera_shop_only_customizer' );
			}
		} );

	});

	/* Blog header */
	wp.customize("azera_shop_blog_header_title", function(value) {
		value.bind(function( to ) {
			$( '.archive-top-big-title' ).html( to );
		} );
	});
	wp.customize("azera_shop_blog_header_subtitle", function(value) {
		value.bind(function( to ) {
			$( '.archive-top-text' ).html( to );
		} );
	});
	wp.customize("azera_shop_blog_header_image", function(value) {
		value.bind(function( to ) {
			$(".archive-top").css('background-image', 'url(' + to + ')');
		} );
	});


	/***************************************
	******** FOOTER SECTION ****************
	****************************************/
	//Copyright
	wp.customize("azera_shop_copyright", function(value) {
        value.bind(function( to ) {
			if( to != '' ) {
				$( '.azera_shop_copyright_content' ).removeClass( 'azera_shop_only_customizer' );
			} else {
				$( '.azera_shop_copyright_content' ).addClass( 'azera_shop_only_customizer' );
			}
			
			$( '.azera_shop_copyright_content' ).text( to );
	    } );
    });
	
	function isEmpty( el ){
		return ($.trim(el.html()) === '' ? true : false);
	}
	
} )( jQuery );
