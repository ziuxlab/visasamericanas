(function($){

    "use strict";
    
    // don't need to set this in every scroll
    var scrollticker; 
    
    var rtl 	= $('body').hasClass('rtl');
    var simple	= $('body').hasClass('style-simple');
 
    /* ---------------------------------------------------------------------------
	 * Sticky header
	 * --------------------------------------------------------------------------- */
    var topBarTop = '61px';
    var mfn_header_height = 0;
    
    // header height
    function mfn_stickyH(){

    	if( $('body').hasClass('header-below') ){
	    	// header below slider
	    	mfn_header_height = $('.mfn-main-slider').innerHeight() + $('#Header').innerHeight();
	    } else {
	    	// default
	    	mfn_header_height = $('#Top_bar').innerHeight() + $('#Action_bar').innerHeight();
	    }
    	
    }
    
    // init
	function mfn_sticky(){
		if( $('body').hasClass('sticky-header') ){	
			var start_y = mfn_header_height;
			var window_y = $(window).scrollTop();
	
			if( window_y > start_y ){
				if( ! ($('#Top_bar').hasClass('is-sticky'))){
					
					var adminBarH = ( $('body').hasClass('admin-bar') ) ? '32px' : 0;
					
					$('.header-below   		.header_placeholder').css('height', $('#Top_bar').innerHeight());
					$('.header-classic 		.header_placeholder').css('height', $('#Top_bar').innerHeight());
					$('.header-plain 		.header_placeholder').css('height', $('#Top_bar').innerHeight());
					$('.header-stack   		.header_placeholder').css('height', $('#Top_bar').innerHeight());
					
					$('.header-split:not(.header-semi) .header_placeholder').css('height', $('#Top_bar').innerHeight());
					
					$('.minimalist-header 	.header_placeholder').css('height', $('#Top_bar').innerHeight());
					
					$('#Top_bar')
						.addClass('is-sticky')
						.css('top',-60)
						.animate({
							'top': adminBarH
						},300);
					
					// Header width
					mfn_header();
				}
			}
			else {
				if($('#Top_bar').hasClass('is-sticky')) {
					$('.header_placeholder').css('height',0);
					$('#Top_bar')
						.removeClass('is-sticky')
						.css('top', topBarTop);
					
					// Header width
					mfn_header();
				}	
			}
		}
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Back To Top | Sticky - show on scroll
	 * --------------------------------------------------------------------------- */
	function backToTopSticky(){

		if( $('#back_to_top.sticky.scroll').length ){			
			var el = $('#back_to_top.sticky.scroll');
		
			// Clear Timeout if one is pending
			if( scrollticker ){
				window.clearTimeout(scrollticker);
				scrollticker = null;
			}
				
			el.addClass('focus');
		
			// Set Timeout
			scrollticker = window.setTimeout(function(){
				el.removeClass('focus');
			}, 1500); // Timeout in msec
			
		}

	}
	
	
	/* ---------------------------------------------------------------------------
	 * Sidebar | Height
	 * --------------------------------------------------------------------------- */
	function mfn_sidebar(){
		if( $('.with_aside .four.columns').length ){
			var maxH = $('#Content .sections_group').height() - 20;
			$('.with_aside .four.columns .widget-area').each(function(){
				$(this).css( 'min-height', 0 );
				if( $(this).height() > maxH ){
					maxH = $(this).height();
				}
			});
			$('.with_aside .four.columns .widget-area').css( 'min-height', maxH + 'px' );
		}
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Equal Columns | Height
	 * --------------------------------------------------------------------------- */
	function mfn_equalH(){
		$('.section.equal-height .wrap').each(function(){
			var maxH = 0;
			$('> .column', $(this) ).each(function(){
				$(this).css( 'height', 'auto' );
				if( $(this).height() > maxH ){
					maxH = $(this).height();
				}
			});
			$('> .column', $(this) ).css( 'height', maxH + 'px' );
		});
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Sliding Footer | Height
	 * --------------------------------------------------------------------------- */
	function mfn_footer(){
		
		// Fixed, Sliding
		if( $('.footer-fixed #Footer, .footer-sliding #Footer').length ){
			
			var footerH = $('#Footer').height() - 1;
			$('#Content').css( 'margin-bottom', footerH + 'px' );
			
		}
		
		// Stick to bottom
		if( $('.footer-stick #Footer').length ){
			
			var headerFooterH 	= $('#Header_wrapper').height() + $('#Footer').height();
			var documentH 		= $(document).height() - $('#wpadminbar').innerHeight();
					
			if( ( documentH <= $(window).height() ) && ( headerFooterH <= $(window).height() ) ){ 
				$('#Footer').addClass('is-sticky');
			} else {
				$('#Footer').removeClass('is-sticky');
			}
			
		}
		
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Header width
	 * --------------------------------------------------------------------------- */
	function mfn_header(){
		var rightW = $('.top_bar_right').innerWidth();
		var parentW = $('#Top_bar .one').innerWidth() - 10;
		var leftW = parentW - rightW;
		$('.top_bar_left, .menu > li > ul.mfn-megamenu').width( leftW );
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Full Screen Section
	 * --------------------------------------------------------------------------- */
	function mfn_sectionH(){
		var windowH = $(window).height();
		$('.section.full-screen').each(function(){
			var section = $(this);
			var wrapper = $('.section_wrapper',section);
			section
				.css( 'padding', 0 )
				.css( 'min-height', windowH + 5 );			// QuickFIX | next/prev section
//				.height( windowH + 5 );						// old version
			var padding = ( windowH + 5 - wrapper.height() ) / 2;
			wrapper
				.css( 'padding-top', padding + 10 )			// 20 = column margin-bottom / 2
				.css( 'padding-bottom', padding - 10 );
		});
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Contact Form 7 | Popup
	 * --------------------------------------------------------------------------- */
	function cf7popup( hash ){
		if( hash && $( hash ).length ){	
			var id = $( hash ).closest('.popup-content').attr('id');
//			console.log(id);
			$('a.popup-link[href="#'+ id +'"]:not(.once)')
				.addClass('once')
				.click();
			
		}
	}
	
	
	/* ---------------------------------------------------------------------------
	 * # Hash smooth navigation
	 * --------------------------------------------------------------------------- */
	function hashNav(){
		
		// # window.location.hash
		var hash = window.location.hash;
		
		// Contact Form 7 in popup
		if( hash.indexOf("wpcf7") > -1 ){
			cf7popup( hash );
		}
		
		if( hash && $(hash).length ){	
			
			var stickyH = $('.sticky-header #Top_bar').innerHeight();
			var tabsHeaderH = $(hash).siblings('.ui-tabs-nav').innerHeight();
			
			$('html, body').animate({ 
				scrollTop: $(hash).offset().top - stickyH - tabsHeaderH
			}, 500);
		}
	}
	
	
	/* ---------------------------------------------------------------------------
	 * One Page | Scroll Active
	 * --------------------------------------------------------------------------- */
	function onePageActive(){
		if( $('body').hasClass('one-page') ){	
			
			var stickyH	= $('.sticky-header #Top_bar').innerHeight();
			var windowT = $(window).scrollTop();
			var start	= windowT + stickyH + 1;		
			var first = false;
			
			$('div[data-id]').each(function(){
				
				if( $(this).visible( true ) ){		
					if( !first ){
						first = $(this);
					} else if( ( $(this).offset().top < start ) && ( $(this).offset().top > first.offset().top ) ) {
						first = $(this);
					}
				}

				if( first ){
					var newActive = first.attr('data-id');        
			        var active = '[data-hash="'+ newActive +'"]';
			        
			        if( newActive ){
				        var menu = $('#menu');
				        menu.find('li').removeClass('current-menu-item current-menu-parent current-menu-ancestor current_page_item current_page_parent current_page_ancestor');
				        $( active, menu ).closest('li').addClass('current-menu-item');
			        }
				}
			
			});
	        
		}
	}
	
	
	/* ---------------------------------------------------------------------------
	 * niceScroll | Padding right fix for short content
	 * --------------------------------------------------------------------------- */
	function niceScrollFix(){
		var el = $('body > .nicescroll-rails');
		if( el.length ){
			if( el.is(":visible") ){
				$('body').addClass('nice-scroll');
			} else {
				$('body').removeClass('nice-scroll');
			}
		}
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Zoom Box | Vertical Align
	 * --------------------------------------------------------------------------- */
	function zoomBoxVerticalAlign(){
		$('.zoom_box').each(function(){
			
            var el = $(this);
            var elH = el.height(); 
            var desc = el.find('.desc_wrap');
            var descH = desc.height(); 
            
            var padding = ( elH - descH ) / 2;
            
            desc.css( 'padding-top', padding +'px' );

        });
	}

	
	/* --------------------------------------------------------------------------------------------------------------------------
	 * $(document).ready
	 * ----------------------------------------------------------------------------------------------------------------------- */
	$(document).ready(function(){
	
		// #Top_bar ---------------------
		$('#Top_bar').removeClass( 'loading' );
		
		topBarTop = parseInt($('#Top_bar').css('top'), 10);
		if( topBarTop < 0 ) topBarTop = 61;
		topBarTop = topBarTop + 'px';


		/* ---------------------------------------------------------------------------
		 * Content sliders
		 * --------------------------------------------------------------------------- */
		mfnSliderContent();
		mfnSliderOffer();
		mfnSliderOfferThumb();
		mfnSliderBlog();
		mfnSliderClients();
		mfnSliderPortfolio();
		mfnSliderShop();
		mfnSliderTestimonials();
		
		
		/* ---------------------------------------------------------------------------
		 * Responsive menu
		 * --------------------------------------------------------------------------- */
		$('.responsive-menu-toggle').click(function(e){
			e.preventDefault();
			var el = $(this)
			var menu = $('#Top_bar #menu');
			var menuWrap = menu.closest('.menu_wrapper');
			el.toggleClass('active');
			
			if( el.hasClass('is-sticky') && el.hasClass('active') && ( $(window).width() < 768 ) ){
				var top = 0;
				if( menuWrap.length ){
					top = menuWrap.offset().top - $('#wpadminbar').innerHeight();				
				}
				$('body,html').animate({
					scrollTop: top
				}, 200);
			}

			menu.stop(true,true).slideToggle(200);
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Overlay menu
		 * --------------------------------------------------------------------------- */
		$('.overlay-menu-toggle').click(function(e){
			e.preventDefault();
			
			$(this).toggleClass('focus');
			$('#Overlay').stop(true,true).fadeToggle(500);
			
			var menuH = $('#Overlay nav').height() / 2;
			$('#Overlay nav').css( 'margin-top', '-' + menuH + 'px' );	
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Main menu
		 * --------------------------------------------------------------------------- */
		
		// Muffin Menu -------------------------------
		$("#menu > ul.menu").muffingroup_menu({
			addLast	: true,
			arrows	: true
		});
		
		$("#secondary-menu > ul.secondary-menu").muffingroup_menu();
		
		mfn_stickyH()
		mfn_sticky();

		
		/* ---------------------------------------------------------------------------
		 * Menu | OnePage - remove active
		 * Works with .scroll class
		 * Since 4.8 replaced with admin option: Page Options / One Page [function: onePageMenu()]
		 * --------------------------------------------------------------------------- */
		function onePageScroll(){
			if( ! $('body').hasClass('one-page') ){
				var menu = $('#menu');
				
				if( menu.find('li.scroll').length > 1 ){
					menu.find('li.current-menu-item:not(:first)').removeClass('current-menu-item currenet-menu-parent current-menu-ancestor current-page-ancestor current_page_item current_page_parent current_page_ancestor');
					
					// menu item click
					menu.find('a').click(function(){
						$(this).closest('li').siblings('li').removeClass('current-menu-item currenet-menu-parent current-menu-ancestor current-page-ancestor current_page_item current_page_parent current_page_ancestor');
						$(this).closest('li').addClass('current-menu-item');
					});
				}
			}
		}
		onePageScroll();
		
		
		/* ---------------------------------------------------------------------------
		 * Fix | Sticky Header Height
		 * --------------------------------------------------------------------------- */
		function fixStickyHeaderH(){
			var stickyH = 0;
			
			// FIX | sticky top bar height
			var topBar = $('.sticky-header #Top_bar');
			if( topBar.hasClass('is-sticky') ){
				stickyH = $('.sticky-header #Top_bar').innerHeight();
			} else {
				topBar.addClass('is-sticky');
				stickyH = $('.sticky-header #Top_bar').innerHeight();
				topBar.removeClass('is-sticky');
			}	

			// FIX | responsive 
			var responsive = $('.responsive-menu-toggle');
			if( responsive.length ){
				if( responsive.is(":visible") ){
					stickyH = 0;
				}
			}
			
			return stickyH;
		}
		
		
		/* ---------------------------------------------------------------------------
		 * One Page | Menu with Active on Scroll
		 * --------------------------------------------------------------------------- */
		function onePageMenu(){
			if( $('body').hasClass('one-page') ){
				
				var menu = $('#menu');
				
				// remove active
				menu.find('li').removeClass('current-menu-item currenet-menu-parent current-menu-ancestor current-page-ancestor current_page_item current_page_parent current_page_ancestor');

				// add attr [data-hash] & [data-id]
				$('a[href]', menu).each(function(){	

					var url = $(this).attr( 'href' );
					if( url && url.split('#')[1] ){

						// data-hash
						var hash = '#' + url.split('#')[1];
						if( hash && $(hash).length ){	// check if element with specified ID exists
							$(this).attr( 'data-hash', hash );
							$(hash).attr( 'data-id', hash );
						}
						
						// Visual Composer
						var vcHash = '#' + url.split('#')[1];
						var vcClass = '.vc_row.' + url.split('#')[1];
						if( vcClass && $(vcClass).length ){	// check if element with specified Class exists
							$(this).attr( 'data-hash', vcHash );
							$(vcClass).attr( 'data-id', vcHash );
						}
						
					}
					
				});
				
				// click
				$('#menu a[data-hash]').click(function(e){
					e.preventDefault(); // only with: body.one-page
					
					// active
					menu.find('li').removeClass('current-menu-item');
					$(this).closest('li').addClass('current-menu-item');
	
					var hash = $(this).attr('data-hash');
					hash = '[data-id="'+ hash +'"]';

					var tabsHeaderH = $(hash).siblings('.ui-tabs-nav').innerHeight();

					$('html, body').animate({ 
						scrollTop: $(hash).offset().top - fixStickyHeaderH() - tabsHeaderH
					}, 500);
					
				});
				
			}
		};
		onePageMenu();

		
		/* ---------------------------------------------------------------------------
		 * Creative Header
		 * --------------------------------------------------------------------------- */
		var cHeader 	= 'body:not(.header-open) #Header_creative';
		var cHeaderEl 	= $( cHeader );
		var cHeaderCurrnet;
		
		function creativeHeader(){
			
			$('.creative-menu-toggle').click(function(e){
				e.preventDefault();
				
				cHeaderEl.addClass('active')
				
				if( $('body').hasClass('header-rtl') ){
					cHeaderEl.animate({ 'right':-1 }, 500);
				} else {
					cHeaderEl.animate({ 'left':-1 }, 500);
				}
				
				
				cHeaderEl.find('.creative-wrapper').fadeIn(500);
				cHeaderEl.find('.creative-menu-toggle, .creative-social').fadeOut(500);
			});
		
		}
		creativeHeader();
		
		$(document).on('mouseenter', cHeader, function() {
			cHeaderCurrnet = 1;
		})
		
		$(document).on('mouseleave', cHeader, function() {
			cHeaderCurrnet = null;
		    setTimeout(function(){
		    	if ( ! cHeaderCurrnet ){
		    		
		    		cHeaderEl.removeClass('active');

		    		if( $('body').hasClass('header-rtl') ){
						cHeaderEl.animate({ 'right':-200 }, 500);
					} else {
						cHeaderEl.animate({ 'left':-200 }, 500);
					}
		    		
		    		cHeaderEl.find('.creative-wrapper').fadeOut(500);
		    		cHeaderEl.find('.creative-menu-toggle, .creative-social').fadeIn(500);
		    	}
		    }, 1000);
		});

		
		/* ---------------------------------------------------------------------------
		 * Breadcrumbs | Remove last item link
		 * --------------------------------------------------------------------------- */
		function breadcrumbsRemoveLastLink(){
			var el = $('.breadcrumbs.no-link').find('li').last();
			var text = el.text();
			el.html( text );
		}
		breadcrumbsRemoveLastLink();
        
        
        /* ---------------------------------------------------------------------------
         * Maintenance
         * --------------------------------------------------------------------------- */
        $('.downcount').each(function(){
        	var el = $(this);
        	el.downCount({
        		date	: el.attr('data-date'),
        		offset	: el.attr('data-offset')
        	});  
        }); 
        
        
        /* ---------------------------------------------------------------------------
         * Hover Items | .tooltip, .hover_box
         * --------------------------------------------------------------------------- */
        $('.tooltip, .hover_box').bind('touchstart', function(){
            $(this).toggleClass('hover');
        }).bind('touchend', function(){
            $(this).removeClass('hover');
        });
        
        
        /* ---------------------------------------------------------------------------
		 * Popup Contact
		 * --------------------------------------------------------------------------- */
		$("#popup_contact > a.button").click(function(e){
			e.preventDefault();
			$(this).parent().toggleClass('focus');
		});
		

        /* ---------------------------------------------------------------------------
		 * niceScroll
		 * --------------------------------------------------------------------------- */
        if( $('body').hasClass('nice-scroll-on') 
        	&& $(window).width() >= 768
        	&& ! navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/))
        {
        	$('html').niceScroll({
        		autohidemode		: false,
        		cursorborder		: 0,
        		cursorborderradius	: 5,
        		cursorcolor			: '#222222',
        		cursorwidth			: 10,
        		horizrailenabled	: false,
        		mousescrollstep		: ( window.mfn_nicescroll ) ? window.mfn_nicescroll : 40,
        		scrollspeed			: 60
        	});
        	
        	$('body').removeClass('nice-scroll-on').addClass('nice-scroll');
        	niceScrollFix();
	    }

        
        /* ---------------------------------------------------------------------------
		 * WP Gallery | @Rhasaun_RCCL: thanks for suggestion ;)
		 * --------------------------------------------------------------------------- */
		$('.gallery').each(function(){
			
			var el = $(this);
			var parentID = el.attr('id');
			
			$('> br', el).remove();
			
			$('.gallery-icon > a', el)
				.wrap('<div class="image_frame scale-with-grid"><div class="image_wrapper"></div></div>')
				.prepend('<div class="mask"></div>')
				.children('img' )
					.css('height', 'auto')
					.css('width', '100%');

			// Link | Media File
			if( el.hasClass( 'file' ) ){
				$('.gallery-icon a', el ).attr('rel', 'prettyphoto['+ parentID +']');
			}
			
			
			// Masonry
			if( el.hasClass( 'masonry' ) ){

				el.isotope({
					itemSelector	: '.gallery-item',
					layoutMode		: 'masonry',
					isOriginLeft	: rtl ? false : true
				});
				
			}
			
			
		});
		

		/* ---------------------------------------------------------------------------
		 * PrettyPhoto
		 * --------------------------------------------------------------------------- */
		var pretty = true;
		if( window.mfn_prettyphoto.disable ) pretty = false;
		if( window.mfn_prettyphoto.disableMobile && ( $(window).width() < 768 ) ) pretty = false;
			
		if( pretty ){
			$('a[rel^="prettyphoto"], .prettyphoto').prettyPhoto({
				default_width	: window.mfn_prettyphoto.width  ? window.mfn_prettyphoto.width  : 500,
				default_height	: window.mfn_prettyphoto.height ? window.mfn_prettyphoto.height : 344,
				show_title		: window.mfn_prettyphoto.title  ? window.mfn_prettyphoto.title  : false,
				theme			: window.mfn_prettyphoto.style  ? window.mfn_prettyphoto.style  : 'pp_default',
				deeplinking		: false,
				social_tools	: false
			});
		}
		
        
		/* ---------------------------------------------------------------------------
		 * Black & White
		 * --------------------------------------------------------------------------- */
		function mfn_greyscale(){
	        $('.greyscale .image_wrapper > a, .greyscale .client_wrapper .gs-wrapper, .greyscale.portfolio-photo a').has('img').BlackAndWhite({
	    		hoverEffect		: false,
	    		intensity		: 1			// opacity: 0, 0.1, ... 1
	    	});
		}
		mfn_greyscale();
		

		/* ---------------------------------------------------------------------------
		 * Sliding Top
		 * --------------------------------------------------------------------------- */
		$(".sliding-top-control").click(function(e){
			e.preventDefault();
			$('#Sliding-top .widgets_wrapper').slideToggle();
			$('#Sliding-top').toggleClass('active');
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Header Search
		 * --------------------------------------------------------------------------- */
		$("#search_button:not(.has-input), #Top_bar .icon_close").click(function(e){
			e.preventDefault();
			$('#Top_bar .search_wrapper').fadeToggle()
				.find('.field').focus();			
		});
	
		
		/* ---------------------------------------------------------------------------
		 * Alert
		 * --------------------------------------------------------------------------- */
		$(this).on('click', '.alert .close', function(e) {
			e.preventDefault();
			$(this).closest('.alert').hide(300);
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Buttons - mark Buttons with Icon & Label
		 * --------------------------------------------------------------------------- */
		$('a.button_js').each(function(){
			var btn = $(this);
			if( btn.find('.button_icon').length && btn.find('.button_label').length ){
				btn.addClass('kill_the_icon');
			}
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Posts sticky navigation
		 * --------------------------------------------------------------------------- */
		$('.fixed-nav').appendTo('body');
		
		
		/* ---------------------------------------------------------------------------
		 * Feature List
		 * --------------------------------------------------------------------------- */
		$('.feature_list').each(function(){
			var col = $(this).attr('data-col') ? $(this).attr('data-col') : 4;
			$(this).find('li:nth-child('+ col +'n):not(:last-child)').after('<hr />');
		});
		
		
		
//		$('.feature_list ul li:nth-child(4n):not(:last-child)').after('<hr />');
		
		
		/* ---------------------------------------------------------------------------
		 * IE fixes
		 * --------------------------------------------------------------------------- */
		function checkIE(){
			// IE 9
			var ua = window.navigator.userAgent;
	        var msie = ua.indexOf("MSIE ");
	        if( msie > 0 && parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))) == 9 ){
	        	$("body").addClass("ie");
			}
		}
		checkIE();
		
		
		/* ---------------------------------------------------------------------------
		 * Paralex Backgrounds
		 * --------------------------------------------------------------------------- */
		var ua = navigator.userAgent,
		isMobileWebkit = /WebKit/.test(ua) && /Mobile/.test(ua);
		
		if( ! isMobileWebkit && $(window).width() >= 768 ){
			
			if( window.mfn_parallax == 'stellar' ){
				
				// Stellar
				$.stellar({
					horizontalScrolling	: false,
					responsive			: true
				});
		
			} else {

				// Enllax
				$(window).enllax();
				
			}

		} else {
			
			$('.section[data-enllax-ratio], .section[data-stellar-ratio]').css( 'background-attachment' , 'scroll' );
		
		}
		
		
		/* ---------------------------------------------------------------------------
		 * Ajax | Load More
		 * --------------------------------------------------------------------------- */
		$('.pager_load_more').click(function(e){
			e.preventDefault();
			
			var el = $(this);
			var pager = el.closest('.pager_lm');
			var href = el.attr('href');
			
			// index | for many items on the page
			var index = $('.lm_wrapper').index(el.closest('.isotope_wrapper').find('.lm_wrapper'));

			el.fadeOut(50);
			pager.addClass('loading');
			
			$.get( href, function(data){

				// content
				var content = $('.lm_wrapper:eq('+ index +')', data).wrapInner('').html();

				if( $('.lm_wrapper:eq('+ index +')').hasClass('isotope') ){
					// isotope
					$('.lm_wrapper:eq('+ index +')').append( $(content) ).isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
				} else {
					// default
					$( content ).hide().appendTo('.lm_wrapper:eq('+ index +')').fadeIn(1000);
				}
				
				// next page link
				href = $( '.pager_load_more:eq('+ index +')', data ).attr('href');		
				pager.removeClass('loading');					
				if( href ){
					el.fadeIn();
					el.attr( 'href', href );
				}

				// refresh some staff -------------------------------
				
				mfn_jPlayer();
				
				iframesHeight();
				
				mfn_sidebar();
				
				mfn_greyscale();


				// isotope fix: second resize
				
				setTimeout(function(){
					$('.lm_wrapper.isotope').isotope( 'layout');
				},1000);
				
				
			});

		});
	
		
		/* ---------------------------------------------------------------------------
		 * Blog & Portfolio filters
		 * --------------------------------------------------------------------------- */
		$('.filters_buttons .open').click(function(e){
			e.preventDefault();
			var type = $(this).closest('li').attr('class');
			$('.filters_wrapper').show(200);
			$('.filters_wrapper ul.'+ type).show(200);
			$('.filters_wrapper ul:not(.'+ type +')').hide();
		});
		
		$('.filters_wrapper .close a').click(function(e){
			e.preventDefault();
			$('.filters_wrapper').hide(200);
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Portfolio List - next/prev buttons
		 * --------------------------------------------------------------------------- */
		$('.portfolio_next_js').click(function(e){
			e.preventDefault();
			
			var stickyH = $('#Top_bar.is-sticky').innerHeight();
			var item = $(this).closest('.portfolio-item').next();
			
			if( item.length ){
				$('html, body').animate({ 
					scrollTop: item.offset().top - stickyH
				}, 500);
			}
		});
		
		$('.portfolio_prev_js').click(function(e){
			e.preventDefault();
			
			var stickyH = $('#Top_bar.is-sticky').innerHeight();
			var item = $(this).closest('.portfolio-item').prev();
			
			if( item.length ){
				$('html, body').animate({ 
					scrollTop: item.offset().top - stickyH
				}, 500);
			}
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Tabs
		 * --------------------------------------------------------------------------- */
		$(".jq-tabs").tabs();

		
		/* ---------------------------------------------------------------------------
		 * Smooth scroll
		 * --------------------------------------------------------------------------- */
		$('.scroll > a, a.scroll').click(function(){
			var url = $(this).attr('href');
			var hash = '#' + url.split('#')[1];

			var tabsHeaderH = $(hash).siblings('.ui-tabs-nav').innerHeight();
			
			if( hash && $(hash).length ){
				$('html, body').animate({ 
					scrollTop: $(hash).offset().top - fixStickyHeaderH() - tabsHeaderH
				}, 500);
			}
		});

		
		/* ---------------------------------------------------------------------------
		 * Muffin Accordion & FAQ
		 * --------------------------------------------------------------------------- */
		$('.mfn-acc').each(function(){
			var el = $(this);
			
			if( el.hasClass('openAll') ){
				// show all -----------
				
				el.find('.question')
					.addClass("active")
					.children(".answer")
						.show();
				
			} else {
				// show one -----------
				
				var active_tab = el.attr('data-active-tab');
				if( el.hasClass('open1st') ) active_tab = 1;
				
				if( active_tab ){
					el.find('.question').eq( active_tab - 1 )
						.addClass("active")
						.children(".answer")
							.show();
				}
				
			}	
		});

		$(".mfn-acc .question > .title").click(function(){	
			
			if($(this).parent().hasClass("active")) {
				
				$(this).parent().removeClass("active").children(".answer").slideToggle(200);
				
			} else {
				
				if( ! $(this).closest('.mfn-acc').hasClass('toggle') ){
					$(this).parents(".mfn-acc").children().each(function() {
						if($(this).hasClass("active")) {
							$(this).removeClass("active").children(".answer").slideToggle(200);
						}
					});
				}
				$(this).parent().addClass("active");
				$(this).next(".answer").slideToggle(200);
				
			}
			
			setTimeout(function(){
				mfn_sidebar();
			},200)
			
		});

		
		/* ---------------------------------------------------------------------------
		 * jPlayer
		 * --------------------------------------------------------------------------- */
		function mfn_jPlayer(){
			$('.mfn-jplayer').each(function(){
				var m4v = $(this).attr('data-m4v');
				var poster = $(this).attr('data-img');
				var swfPath = $(this).attr('data-swf');
				var cssSelectorAncestor = '#' + $(this).closest('.mfn-jcontainer').attr('id');
				
				$(this).jPlayer({
					ready	: function () {
						$(this).jPlayer('setMedia', {
							m4v		: m4v,
							poster	: poster
						});
					},
					play	: function () { // To avoid both jPlayers playing together.
						$(this).jPlayer('pauseOthers');
					},
					size: {
						cssClass	: 'jp-video-360p',
						width		: '100%',
						height		: '360px'
					},
					swfPath				: swfPath,
					supplied			: 'm4v',
					cssSelectorAncestor	: cssSelectorAncestor,
					wmode				: 'opaque'
				});
			});
		}
		mfn_jPlayer();
		
		
		/* ---------------------------------------------------------------------------
		 * Love
		 * --------------------------------------------------------------------------- */
		$('.mfn-love').click(function() {
			var el = $(this);
			if( el.hasClass('loved') ) return false;
			
			var post = {
				action: 'mfn_love',
				post_id: el.attr('data-id')
			};
			
			$.post(window.mfn_ajax, post, function(data){
				el.find('.label').html(data);
				el.addClass('loved');
			});

			return false;
		});	
		
		
		/* ---------------------------------------------------------------------------
		 * Go to top
		 * --------------------------------------------------------------------------- */	
		$('#back_to_top').click(function(){
			$('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});		
		
		
		/* ---------------------------------------------------------------------------
		 * Section navigation
		 * --------------------------------------------------------------------------- */	
		$('.section .section-nav').click(function(){
			var el = $(this);
			var section = el.closest('.section');

			if( el.hasClass('prev') ){
				// Previous Section -------------
				if( section.prev().length ){	
					jQuery('html, body').animate({
						scrollTop: section.prev().offset().top
					}, 500);
				}
			} else {
				// Next Section -----------------
				if( section.next().length ){	
					jQuery('html, body').animate({
						scrollTop: section.next().offset().top
					}, 500);
				}			
			}
		});
		
		
		/* ---------------------------------------------------------------------------
		 * WooCommerce
		 * --------------------------------------------------------------------------- */	
		function addToCart(){
			$('body').on('click', '.add_to_cart_button', function(){
				$(this)
					.closest('.product')
						.addClass('adding-to-cart')
						.removeClass('added-to-cart');
			});

			$('body').bind('added_to_cart', function() {
				$('.adding-to-cart')
					.removeClass('adding-to-cart')
					.addClass('added-to-cart');
			});
		}
		addToCart();
		
		
		/* ---------------------------------------------------------------------------
		 * Iframe height
		 * --------------------------------------------------------------------------- */		
		function iframeHeight( item, ratio ){
			var itemW = item.width();
			var itemH = itemW * ratio;
			if( itemH < 147 ) itemH = 147;
			item.height(itemH);
		}
		
		function iframesHeight(){
			iframeHeight($(".blog_wrapper .post-photo-wrapper .mfn-jplayer, .blog_wrapper .post-photo-wrapper iframe, .post-related .mfn-jplayer, .post-related iframe, .blog_slider_ul .mfn-jplayer, .blog_slider_ul iframe"), 0.78);	// blog - list			
			iframeHeight($(".single-post .single-photo-wrapper .mfn-jplayer, .single-post .single-photo-wrapper iframe" ), 0.4);	// blog - single
			
			iframeHeight($(".section-portfolio-header .mfn-jplayer, .section-portfolio-header iframe" ), 0.4);	// portfolio - single
		}
		iframesHeight();

		
		/* ---------------------------------------------------------------------------
		 * Debouncedresize
		 * --------------------------------------------------------------------------- */
		$(window).bind("debouncedresize", function() {
			
			iframesHeight();
			
			// Isotope | Relayout
			$('.masonry.isotope').isotope();
			$('.masonry.gallery').isotope( 'layout');
			
			// carouFredSel wrapper Height set
			mfn_carouFredSel_height();

			// Sliding Footer | Height
			mfn_footer();
			
			// Header Width
			mfn_header();
			
			// Sidebar Height
			mfn_sidebar();
			
			// Full Screen Section
			mfn_sectionH();
			
			// niceScroll | Padding right fix for short content
			niceScrollFix();
			
			// Zoom Box | Vertical Align
			zoomBoxVerticalAlign();
			
			// Equal Columns | Height
			mfn_equalH();
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Isotope
		 * --------------------------------------------------------------------------- */
		
		// Isotope | Fiters
		function isotopeFilter( domEl, isoWrapper ){
			var filter = domEl.attr('data-rel');
			isoWrapper.isotope({ filter: filter });
		}
		
		// Isotope | Fiters | Click
		$('.isotope-filters .filters_wrapper').find('li:not(.close) a').click(function(e){
			e.preventDefault();

			var filters = $(this).closest('.isotope-filters');
			var parent  = filters.attr('data-parent');
			
			if( parent ){
				parent = filters.closest( '.' + parent );
				var isoWrapper = parent.find('.isotope').first()
			} else {
				var isoWrapper = $('.isotope');
			}
			
			filters.find('li').removeClass('current-cat');
			$(this).closest('li').addClass('current-cat');

			isotopeFilter( $(this), isoWrapper );
		});

		
		// Isotope | Fiters | Reset
		$('.isotope-filters .filters_buttons').find('li.reset a').click(function(e){
			e.preventDefault();
			
			$('.isotope-filters .filters_wrapper').find('li').removeClass('current-cat');
			isotopeFilter( $(this), $('.isotope') );
		});
		
		
		// carouFredSel wrapper | Height
		mfn_carouFredSel_height();
		
		// Sidebar | Height
		mfn_sidebar();
		
		// Sliding Footer | Height
		mfn_footer();
		
		// Header | Width
		mfn_header();

		// Full Screen Section
		mfn_sectionH();
		
		// Navigation | Hash
		hashNav();
		
		// Equal Columns | Height
		mfn_equalH();
	});
	
	
	/* --------------------------------------------------------------------------------------------------------------------------
	 * $(window).scroll
	 * ----------------------------------------------------------------------------------------------------------------------- */
	$(window).scroll(function(){
		
		// Header | Sticky
		mfn_sticky();
		
		// Back to top | Sticky
		backToTopSticky();
		
		// One Page | Scroll | Active Section
		onePageActive();
	});
	
	
	/* --------------------------------------------------------------------------------------------------------------------------
	 * $(window).load
	 * ----------------------------------------------------------------------------------------------------------------------- */
	$(window).load(function(){

		/* ---------------------------------------------------------------------------
		 * Isotope
		 * --------------------------------------------------------------------------- */
		// Portfolio - Isotope
		$('.portfolio_wrapper .isotope:not( .masonry-flat, .masonry-hover )').isotope({
			itemSelector	: '.portfolio-item',
			layoutMode		: 'fitRows',
			isOriginLeft	: rtl ? false : true
		});
		
		// Portfolio - Masonry Flat
		$('.portfolio_wrapper .masonry-flat').isotope({
			itemSelector	: '.portfolio-item',
			percentPosition	: true,
			masonry			: {
				columnWidth: 1
		    },
		    isOriginLeft	: rtl ? false : true
		});

		// Blog & Portfolio - Masonry
		$('.isotope.masonry, .isotope.masonry-hover').isotope({
			itemSelector	: '.isotope-item',
			layoutMode		: 'masonry',
			isOriginLeft	: rtl ? false : true
		});
		
		// Portfolio | Active Category
		function portfolioActive(){
			var el 		= $('.isotope-filters .filters_wrapper')
			var active 	= el.attr('data-cat');
			
			if( active ){
				el.find('li.'+active).addClass('current-cat');
				$('.isotope').isotope({ filter: '.category-' + active });
			}
		}
		portfolioActive();

		
		/* ---------------------------------------------------------------------------
		 * Chart
		 * --------------------------------------------------------------------------- */
		$('.chart').waypoint({
			offset		: '100%',
			triggerOnce	: true,
			handler		: function(){
				
				var color = $(this).attr('data-color');
				var lineW = simple ? 4 : 8;
				
				$(this).easyPieChart({
					animate		: 1000,
					barColor	: color,
					lineCap		: 'circle',
					lineWidth	: lineW,
					size		: 140,
					scaleColor	: false,
					trackColor	: '#f8f8f8'
				});
				
			}
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Skills
		 * --------------------------------------------------------------------------- */
		$('.bars_list').waypoint({
			offset		: '100%',
			triggerOnce	: true,
			handler		: function(){
				$(this).addClass('hover');
			}
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Progress Icons
		 * --------------------------------------------------------------------------- */
		$('.progress_icons').waypoint({
			offset		: '100%',
			triggerOnce	: true,
			handler		: function(){
				
				var el = $(this);
				var active = el.attr('data-active');
				var color = el.attr('data-color');
				var icon = el.find('.progress_icon');
				var timeout = 200;		// timeout in milliseconds
				
				icon.each(function(i){
					if( i < active ){
						var time = (i+1) * timeout; 
						setTimeout(function(){
							$(icon[i])
								.addClass('themebg')
								.css('background-color',color);
						},time );	
						
					}
				});
				
			}
		});
		
		
		/* ---------------------------------------------------------------------------
		 * Animate Math [counter, quick_fact, etc.]
		 * --------------------------------------------------------------------------- */
		$('.animate-math .number').waypoint({
			offset		: '100%',
			triggerOnce	: true,
			handler		: function(){
				var el			= $(this);
				var duration	= Math.floor((Math.random()*1000)+1000);
				var to			= el.attr('data-to');

				$({property:0}).animate({property:to}, {
					duration	: duration,
					easing		:'linear',
					step		: function() {
						el.text(Math.floor(this.property));
					},
					complete	: function() {
						el.text(this.property);
					}
				});
			}
		});
		
		// Full Screen Section
		mfn_sectionH();
		
		// Navigation | Hash
		hashNav();
		
		// FIX | Revolution Slider Width OnLoad
		$(window).trigger('resize');

		// Sidebar | Height
		setTimeout(function(){
			mfn_sidebar();
		},10);
	});
	

	/* --------------------------------------------------------------------------------------------------------------------------
	 * $(document).mouseup
	 * ----------------------------------------------------------------------------------------------------------------------- */
	$(document).mouseup(function(e){
		
		// search
		if( $("#searchform").has(e.target).length === 0 ){
			if( $("#searchform").hasClass('focus') ){
				$(this).find('.icon_close').click();
			}
		}
		
	});
	
	
	/* ---------------------------------------------------------------------------
	 * Sliders configuration
	 * --------------------------------------------------------------------------- */
	
	// carouFredSel wrapper Height set -------------------------------------------
	function mfn_carouFredSel_height(){
		$('.caroufredsel_wrapper > ul').each(function(){
			var el = $(this);
			var maxH = 0;
			el.children('li').each(function(){				
				if( $(this).innerHeight() > maxH ){
					maxH = $(this).innerHeight();
				}
			});
//			console.log(maxH);
			el.closest('.caroufredsel_wrapper').height( maxH );
		});
		
	}
	
	// --- Slider ----------------------------------------------------------------
	function mfnSliderContent(){	
		$('.content_slider_ul').each(function(){

			if( $(this).closest('.content_slider').hasClass('carousel') ){
				var style = { min:1, max:6};
			} else {
				var style = 1;
			}

			// Init carouFredSel
			$( this ).carouFredSel({
				circular	: true,
				responsive	: true,
				items		: {
					width	: 380,
					visible	: style
				},
				scroll		: {
					duration	: 500,
					easing		: 'swing'
				},
				prev        : {
					button		: function(){
						return $(this).closest('.content_slider').find('.slider_prev');
					}
				},
				next        : {
					button		: function(){
						return $(this).closest('.content_slider').find('.slider_next');
					}
				},
				pagination	: {
					container	: function(){
						return $(this).closest('.content_slider').find('.slider_pagination');
					}
				},
				auto		: {
					play			: window.mfn_sliders.slider ? true : false,
					timeoutDuration	: window.mfn_sliders.slider ? window.mfn_sliders.slider : 2500,
				},
				swipe		: {
					onTouch		: true,
					onMouse		: true,
					onBefore	: function(){
						$(this).find('a').addClass('disable');
						$(this).find('li').trigger('mouseleave');
					},
					onAfter		: function(){
						$(this).find('a').removeClass('disable');
					}
				}
			});
			
			// Disable accidental clicks while swiping
			$(this).on('click', 'a.disable', function() {
				return false; 
			});
		});
	}
	
	
	// --- Testimonials ----------------------------------------------------------------
	function mfnSliderTestimonials(){	
		$('.testimonials_slider_ul').each(function(){
			
			// Init carouFredSel
			$(this).carouFredSel({
				circular	: true,
				responsive	: true,
				items		: {
					visible	: 1,
					width	: 100
				},
				scroll		: {
					duration	: 500,
					easing		: 'swing'
				},
				prev        : {
					button		: function(){
						return $(this).closest('.testimonials_slider').find('.slider_prev');
					}
				},
				next        : {
					button		: function(){
						return $(this).closest('.testimonials_slider').find('.slider_next');
					}
				},
				pagination	: {
					container	: function(){
						return $(this).closest('.testimonials_slider').find('.slider_pager');
					},
					anchorBuilder : false
				},
				auto		: {
					play			: window.mfn_sliders.testimonials ? true : false,
					timeoutDuration	: window.mfn_sliders.testimonials ? window.mfn_sliders.testimonials : 2500,
				},
				swipe		: {
					onTouch		: true,
					onMouse		: true,
					onBefore	: function(){
						$(this).find('a').addClass('disable');
						$(this).find('li').trigger('mouseleave');
					},
					onAfter		: function(){
						$(this).find('a').removeClass('disable');
					}
				}
			});
			
			// Disable accidental clicks while swiping
			$(this).on('click', 'a.disable', function() {
				return false; 
			});
		});
	}
	
	
	// --- Offer -----------------------------------------------------------------
	function mfnSliderOffer(){	
		$('.offer_ul').each(function(){
			
			// Init carouFredSel
			$(this).carouFredSel({
				circular	: true,
				responsive	: true,
				items		: {
					visible	: 1,
					width	: 100
				},
				scroll		: {
					duration	: 500,
					easing		: 'swing',
					onAfter		: function(){
						$(this).closest('.offer').find('.current').text($(this).triggerHandler("currentPosition")+1);
					}
				},
				prev        : {
					button		: function(){
						return $(this).closest('.offer').find('.slider_prev');
					}
				},
				next        : {
					button		: function(){
						return $(this).closest('.offer').find('.slider_next');
					}
				},
				auto		: {
					play			: window.mfn_sliders.offer ? true : false,
					timeoutDuration	: window.mfn_sliders.offer ? window.mfn_sliders.offer : 2500,
				},
				swipe		: {
					onTouch		: true,
					onMouse		: true,
					onBefore	: function(){
						$(this).find('a').addClass('disable');
						$(this).find('li').trigger('mouseleave');
					},
					onAfter		: function(){
						$(this).find('a').removeClass('disable');
						$(this).closest('.offer').find('.current').text($(this).triggerHandler("currentPosition")+1);
					}
				}
			});
			
			// Disable accidental clicks while swiping
			$(this).on('click', 'a.disable', function() {
				return false; 
			});
			
			// Items count
			var count = $(this).children('.offer_li').length;
			$(this).closest('.offer').find('.count').text(count);
		});
	}
	
	
	// --- Offer Thumb -----------------------------------------------------------------
	function mfnSliderOfferThumb_Pager(nr) {
		var thumb = $('.offer_thumb').find('.offer_thumb_li.id_'+ nr +' .thumbnail img').attr('src');			
	    return '<a href="#'+ nr +'"><img src="'+ thumb +'" alt="'+ nr +'" /></a>';
	}
	
	function mfnSliderOfferThumb(){	
		$('.offer_thumb_ul').each(function(){
			
			// Init carouFredSel
			$(this).carouFredSel({
				circular	: true,
				responsive	: true,
				items		: {
					visible	: 1,
					width	: 100
				},
				pagination	: {
				 	container		: $(this).closest('.offer_thumb').find('.slider_pagination'),
				 	anchorBuilder	: mfnSliderOfferThumb_Pager
				},
				scroll		: {
					duration	: 500,
					easing		: 'swing',
					onAfter		: function(){
						$(this).closest('.offer_thumb').find('.current').text($(this).triggerHandler("currentPosition")+1);
					}
				},
				auto		: {
					play			: window.mfn_sliders.offer ? true : false,
					timeoutDuration	: window.mfn_sliders.offer ? window.mfn_sliders.offer : 2500,
				},
				swipe		: {
					onTouch		: true,
					onMouse		: true,
					onBefore	: function(){
						$(this).find('a').addClass('disable');
						$(this).find('li').trigger('mouseleave');
					},
					onAfter		: function(){
						$(this).find('a').removeClass('disable');
						$(this).closest('.offer_thumb').find('.current').text($(this).triggerHandler("currentPosition")+1);
					}
				}
			});
			
			// Disable accidental clicks while swiping
			$(this).on('click', 'a.disable', function() {
				return false; 
			});
		});
	}
	
	
	// --- Blog ------------------------------------------------------------------	
	function mfnSliderBlog(){	
		$('.blog_slider_ul').each(function(){
			
			// Init carouFredSel
			$(this).carouFredSel({
				circular	: true,
				responsive	: true,
				items		: {
					width : 380,
					visible	: {
						min		: 1,
						max		: 4
					}
				},
				scroll		: {
					duration	: 500,
					easing		: 'swing'
				},
				prev        : {
					button		: function(){
						return $(this).closest('.blog_slider').find('.slider_prev');
					}
				},
				next        : {
					button		: function(){
						return $(this).closest('.blog_slider').find('.slider_next');
					}
				},
				pagination	: {
					container	: function(){
						return $(this).closest('.blog_slider').find('.slider_pagination');
					}
				},
				auto		: {
					play			: window.mfn_sliders.blog ? true : false,
					timeoutDuration	: window.mfn_sliders.blog ? window.mfn_sliders.blog : 2500,
				},
				swipe		: {
					onTouch		: true,
					onMouse		: true,
					onBefore	: function(){
						$(this).find('a').addClass('disable');
						$(this).find('li').trigger('mouseleave');
					},
					onAfter		: function(){
						$(this).find('a').removeClass('disable');
					}
				}
			});
			
			// Disable accidental clicks while swiping
			$(this).on('click', 'a.disable', function() {
				return false; 
			});
		});
	}
	
	
	// --- Clients ------------------------------------------------------------------	
	function mfnSliderClients(){	
		$('.clients_slider_ul').each(function(){
			
			// Init carouFredSel
			$(this).carouFredSel({
				circular	: true,
				responsive	: true,
				items		: {
					width : 380,
					visible	: {
						min		: 1,
						max		: 4
					}
				},
				scroll		: {
					duration	: 500,
					easing		: 'swing'
				},
				prev        : {
					button		: function(){
						return $(this).closest('.clients_slider').find('.slider_prev');
					}
				},
				next        : {
					button		: function(){
						return $(this).closest('.clients_slider').find('.slider_next');
					}
				},
				pagination	: {
					container	: function(){
						return $(this).closest('.clients_slider').find('.slider_pagination');
					}
				},
				auto		: {
					play			: window.mfn_sliders.clients ? true : false,
					timeoutDuration	: window.mfn_sliders.clients ? window.mfn_sliders.clients : 2500,
				},
				swipe		: {
					onTouch		: true,
					onMouse		: true,
					onBefore	: function(){
						$(this).find('a').addClass('disable');
						$(this).find('li').trigger('mouseleave');
					},
					onAfter		: function(){
						$(this).find('a').removeClass('disable');
					}
				}
			});
			
			// Disable accidental clicks while swiping
			$(this).on('click', 'a.disable', function() {
				return false; 
			});
		});
	}
	
	
	// --- Shop ------------------------------------------------------------------	
	function mfnSliderShop(){	
		$('.shop_slider_ul').each(function(){
			
			// Init carouFredSel
			$(this).carouFredSel({
				circular	: true,
				responsive	: true,
				items		: {
					width : 380,
					visible	: {
						min		: 1,
						max		: 4
					}
				},
				scroll		: {
					duration	: 500,
					easing		: 'swing'
				},
				prev        : {
					button		: function(){
						return $(this).closest('.shop_slider').find('.slider_prev');
					}
				},
				next        : {
					button		: function(){
						return $(this).closest('.shop_slider').find('.slider_next');
					}
				},
				pagination	: {
					container	: function(){
						return $(this).closest('.shop_slider').find('.slider_pagination');
					}
				},
				auto		: {
					play			: window.mfn_sliders.shop ? true : false,
					timeoutDuration	: window.mfn_sliders.shop ? window.mfn_sliders.shop : 2500,
				},
				swipe		: {
					onTouch		: true,
					onMouse		: true,
					onBefore	: function(){
						$(this).find('a').addClass('disable');
						$(this).find('li').trigger('mouseleave');
					},
					onAfter		: function(){
						$(this).find('a').removeClass('disable');
					}
				}
			});
			
			// Disable accidental clicks while swiping
			$(this).on('click', 'a.disable', function() {
//				return false; 
			});
		});
	}
	
	
	// --- Portfolio -------------------------------------------------------------
	function mfnSliderPortfolio(){	
		$('.portfolio_slider_ul').each(function(){
			
			// Init carouFredSel
			$(this).carouFredSel({
				circular	: true,
				responsive	: true,
				items		: {
					width : 380,
					visible	: {
						min		: 1,
						max		: 5
					}
				},
				scroll		: {
					duration	: 600,
					easing		: 'swing'
				},
				prev        : {
					button		: function(){
						return $(this).closest('.portfolio_slider').find('.slider_prev');
					}
				},
				next        : {
					button		: function(){
						return $(this).closest('.portfolio_slider').find('.slider_next');
					}
				},
				auto		: {
					play			: window.mfn_sliders.portfolio ? true : false,
					timeoutDuration	: window.mfn_sliders.portfolio ? window.mfn_sliders.portfolio : 2500,
				},
				swipe		: {
					onTouch		: true,
					onMouse		: true,
					onBefore	: function(){
						$(this).find('a').addClass('disable');
						$(this).find('li').trigger('mouseleave');
					},
					onAfter		: function(){
						$(this).find('a').removeClass('disable');
					}
				}
			});
			
			// Disable accidental clicks while swiping
			$(this).on('click', 'a.disable', function() {
				return false; 
			});
		});
	}

})(jQuery);
