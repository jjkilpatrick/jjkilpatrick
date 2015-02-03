"use strict";

jQuery(function($) {
	/*-----------------------------------------------------------------------------------*/
	/*	00. HELPER FUNCTIONS
	/*-----------------------------------------------------------------------------------*/

	function unLoadSite(time) {
		$('body').removeClass('site-loaded');
		$('.preloader').fadeIn(time);
	}

	function loadSite(time) {
		if( time == "" ) {
			time = 800;
		}
		
		$('body').addClass('site-loaded');
		$('.preloader').fadeOut(time);
	}

	function changeLogo(logo, logoURL, logoLightURL) {
		if( $('body').hasClass('nav-open') ||
			$('body').hasClass('background--dark') &&
			! $('body').hasClass('nav-scroll-active') ) {
			logo.attr('src', logoLightURL);
		} else {
			logo.attr('src', logoURL);
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*	01. PARALLAX
	/*-----------------------------------------------------------------------------------*/

	$('.parallax').each(function(index, el) {
		$(el).parallax("50%", 0.6);
	});

	/*-----------------------------------------------------------------------------------*/
	/*	02. HEADER NAVIGATION
	/*-----------------------------------------------------------------------------------*/

	// Open/Close navigation

	var logo = "";
	var logoURL = "";
	var logoLightURL = "";

	if( $('.site-logo').attr('data-light') ) {
		logo = $('.site-logo').find('img');
		logoURL = $('.site-logo').find('img').attr('src');
		logoLightURL = $('.site-logo').attr('data-light');

		changeLogo(logo, logoURL, logoLightURL);
	}

	$('.nav-toggle').on('click', function() {
		$('body').toggleClass('nav-open');

		if( $('.site-logo').attr('data-light') ) {
			changeLogo(logo, logoURL, logoLightURL);
		}
	});

	// Close navigation on clicking on a menu link

	$('.nav-menu a').on('click', function() {
		$('body').removeClass('nav-open');
	});

	// Scrolling menu change

	if( $('.nav-sticky').length ) {
		$(window).scroll(function() {
			if ($(window).scrollTop() >= 80) {
				$('body').addClass('nav-scroll-active');
			} else {
				$('body').removeClass('nav-scroll-active');
			}

			if( $('.site-logo').attr('data-light') ) {
				changeLogo(logo, logoURL, logoLightURL);
			}
		});
	}

	// Add scroll animation on anchor links

	$('.nav-menu a[href*=#]:not([href=#]), .tp-caption[href*=#]:not([href=#])').click(function() {
	  if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') 
	      || location.hostname === this.hostname) {
	    var target = $(this.hash);
	    var href = $.attr(this, 'href');
	    var mobile = 0;

	    if( $(window).width() < 992 ) {
	    	mobile = -75;
	    }
	    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	    if (target.length) {
	      $('html,body').animate({
	        scrollTop: target.offset().top + mobile
	      }, 1000, function () {
	          window.location.hash = href;
	      });
	      return false;
	    }
	  }
	});

	/*-----------------------------------------------------------------------------------*/
	/*	03. MEDIUM
	/*-----------------------------------------------------------------------------------*/

	var intro = $('#rev-slider-1 ul li:first'),
		image = intro.find('.medium-feed-image img').attr('src'),
		image = image.replace(/^.+\/([^\/]*)$/,'$1'),
		image = '_includes/images/headers/' + image,
		description = intro.find('.medium-feed-snippet').html(),
		link = intro.find('.medium-feed-link').attr('href'),
		dimensions = {
			width: window.innerWidth,
			height: Math.floor(window.innerWidth / 1.5)
		}

	intro.find('.header-image').attr('src', image).attr('data-lazyload', image);
	intro.find('.rev-heading-sm').append(description);
	intro.find('.tp-caption').attr('href', link);

	if ($('.tp-caption').width() >  $('#top').innerWidth()) {
	    console.log('overflown');
	}

	$('.medium-post').each(function(index, post) {
		var mediumImageURL = $(post).find('.medium-feed-image img').attr('src'),
			mediumSnippet = $(post).find('.medium-feed-snippet').html();

		$(post).css('background-image', 'url(' + mediumImageURL + ')');
		$(post).find('.author').html(mediumSnippet);
	});

	/*-----------------------------------------------------------------------------------*/
	/*	04. PORTFOLIO
	/*-----------------------------------------------------------------------------------*/

	if( $('.portfolio').length ) {
		var layoutMode = 'masonry';
		if( $('.portfolio-4-columns').length ) {
			layoutMode = 'fitRows';
		}
		var $portfolio = $('.portfolio').imagesLoaded( function() {
			$portfolio.isotope({
				itemSelector: '.portfolio-item',
				layoutMode: layoutMode
			}).isotope('layout');
		});

		$('.filter').on( 'click', 'button', function() {
			var filterValue = $(this).attr('data-filter');
			$portfolio.isotope({ filter: filterValue });

			$('.filter .selected').removeClass('selected');
			$(this).addClass('selected');
		});
	}

	if( $('.portfolio-ajax').length ) {
		$('.portfolio-ajax a').on('click', function(e) {
			var org = $(this);

			if( !org.hasClass('porftolio-post-close') ) {
				unLoadSite(100);
			}
			
			$.ajax({
			  url: $(this).attr('href'),
			  cache: false,
			  success: function(html) {
			    $('body').append('<div class="portfolio-content">' + html + '</div>');

				$('.porftolio-post-close').on('click', function() {
					$('body').removeClass('portfolio-ajax-active');
				});

				$('.porftolio-post-prev').on('click', function() {
					org.parent().prev().find('a').click();
				});

				$('.porftolio-post-next').on('click', function() {
					org.parent().next().find('a').click();
				});

			    $('portfolio-content').imagesLoaded(function() {
					$('body').addClass('portfolio-ajax-active');
					
					loadSite(500);
			    });
			    
			  }
			});

			e.preventDefault(); 
			return false;
		});
	}

	/*-----------------------------------------------------------------------------------*/
	/*	05. SLICK CAROUSEL (testimonials, projects)
	/*-----------------------------------------------------------------------------------*/

	$('.projects').slick();
	$('.testimonials').slick({
		dots: true,
		fade: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 5000
	});

	/*-----------------------------------------------------------------------------------*/
	/*	06. INSTAGRAM
	/*-----------------------------------------------------------------------------------*/

	$('.instagram').on('didLoadInstagram', function(event, response) {
		var instagram = {};
		var $url = 'https://api.instagram.com/v1/users/' + response.data[0].id.split('_')[1] + '/?access_token=1554589859.71ed503.20f8b92a2d31453a97db5384e33ce3f9';

		$.ajax({
			method : "GET",
			url : $url,
			dataType : "jsonp",
			jsonp : "callback",
			success : function(dataSuccess) {
				instagram.authorPhoto = dataSuccess.data.profile_picture;
				instagram.followers = dataSuccess.data.counts.followed_by;
				instagram.photos = dataSuccess.data.counts.media;
				instagram.username = dataSuccess.data.username;
				instagram.full_name = dataSuccess.data.full_name;

				var data = response.data;
				var tagNames = [];
				var tagNums = [];
				var tags = [];
				instagram.target = event.currentTarget.id;
				instagram.likes = 0;

				for(var i=0; i<data.length; i++) {
					instagram.likes += data[i].likes.count;

					/* Get tag names and how many are there */
					for(var j=0; j<data[i].tags.length; j++) {
						if(tagNames.indexOf(data[i].tags[j]) === -1) {
							tagNames.push(data[i].tags[j]);
							tagNums.push(1);
						} else {
							tagNums[tagNames.indexOf(data[i].tags[j])]++;
						}
					}
				};

				/* Sort tags array */
				for (var i = 0; i < tagNames.length; i++) { tags.push({ 'name': tagNames[i], 'value': tagNums[i] }); }
				tags.sort(function(a, b) { return b.value - a.value; });

				/* Add instagram photos */

				for(var i=0; i<12; i++) {
					$("#" + instagram.target + ' .instagram-images').append('<li style="background-image: url(' + data[i].images.low_resolution.url + ')"></li>');
				}

				/* Add Instagram User Information */
				$("#" + instagram.target + ' .instagram-author-photo').append('<img src="' + instagram.authorPhoto + '" alt="' + instagram.full_name + '" />');
				for(var i=0; i<4; i++) {
					$("#" + instagram.target + ' .instagram-tags').append('<a href="http://www.enjoygram.com/tag/' + tags[i].name + '" target="_blank">#' + tags[i].name + '</a> ');
				}
				$("#" + instagram.target + ' .instagram-author-tag').append('<a href="http://instagram.com/' + instagram.username + '" target="_blank">#' + instagram.username + '</a>');
				$("#" + instagram.target + ' .num-photos span').html(instagram.photos);
				$("#" + instagram.target + ' .num-followers span').html(instagram.followers);
				$("#" + instagram.target + ' .num-likes span').html(instagram.likes);
				$("#" + instagram.target + ' .instagram-follow').attr('href', 'http://instagram.com/' + instagram.username);
			}
		});
	});

	/*-----------------------------------------------------------------------------------*/
	/*	07. BLOG MASONRY
	/*-----------------------------------------------------------------------------------*/

	if( $('.blog-masonry').length ) {
		var $portfolio = $('.blog-masonry').imagesLoaded( function() {
			$portfolio.isotope({
				itemSelector: '.blog-masonry > div',
				layoutMode: 'masonry'
			});
		});
	}

	/*-----------------------------------------------------------------------------------*/
	/*	08. Preloader
	/*-----------------------------------------------------------------------------------*/

	$('.site').imagesLoaded( function() {
		loadSite();
	});

	setTimeout(loadSite, 10000);

	/*-----------------------------------------------------------------------------------*/
	/*	10. Fullscreen Section
	/*-----------------------------------------------------------------------------------*/

	function sectionFs() {
		if( $(window).height() > 400 ) {
			$('.section-fs, .section-fs-container').height($(window).height());
		} else {
			$('.section-fs, .section-fs-container').css('height', '');
		}
	}

	if( $('.section-fs').length ) {
		if ( $('.section-fs').eq(0).hasClass('background-dark') ) {
			$('body').addClass('background--dark');
		}

		$(".section-fs-container").onepage_scroll({
			sectionContainer: '.section-fs',
			loop: false,
			updateURL: true,
			afterMove: function(index) {
				if( $('.section-fs').eq(index).hasClass('background-dark') ) {
					$('body').addClass('background--dark');
				} else {
					$('body').removeClass('background--dark');
				}
			}
		});

		$('[data-nav="sections"] a').on('click', function() {
			$('.onepage-pagination [href="' + $(this).attr('href') + '"]').click();
		});

		sectionFs();

		$( window ).resize(function() {
			sectionFs();
		});

		//uses document because document will be topmost level in bubbling
		$(document).on('touchmove',function(e){
			if( $(window).height() > 400 ) {
				e.preventDefault();
			}
		});
		//uses body because jquery on events are called off of the element they are
		//added to, so bubbling would not work if we used document instead.
		$('body').on('touchstart','.scrollable',function(e) {
		  if (e.currentTarget.scrollTop === 0) {
		    e.currentTarget.scrollTop = 1;
		  } else if (e.currentTarget.scrollHeight === e.currentTarget.scrollTop + e.currentTarget.offsetHeight) {
		    e.currentTarget.scrollTop -= 1;
		  }
		});
		//prevents preventDefault from being called on document if it sees a scrollable div
		$('body').on('touchmove','.scrollable',function(e) {
		  e.stopPropagation();
		});
	}

	/*-----------------------------------------------------------------------------------*/
	/*	11. IE9 Placeholders
	/*-----------------------------------------------------------------------------------*/

	$.support.placeholder = ('placeholder' in document.createElement('input'))
	if (!$.support.placeholder) {
		$("[placeholder]").focus(function () {
			if ($(this).val() == $(this).attr("placeholder")) $(this).val("");
		}).blur(function () {
			if ($(this).val() == "") $(this).val($(this).attr("placeholder"));
		}).blur();

		$("[placeholder]").parents("form").submit(function () {
			$(this).find('[placeholder]').each(function() {
				if ($(this).val() == $(this).attr("placeholder")) {
					$(this).val("");
				}
			});
		});
	}
});

/*-----------------------------------------------------------------------------------*/
/*	12. GOOGLE MAPS
/*-----------------------------------------------------------------------------------*/

function map(element, location, zoom) {
	jQuery(element).gmap3({
		map: {
			options: {
				zoom: zoom,
				scrollwheel: false
			}
		},
		getlatlng:{
			address: location,
			callback: function(results) {
			if ( !results ) { return; }
			jQuery(this).gmap3('get').setCenter(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
			jQuery(this).gmap3({
				marker: {
					latLng:results[0].geometry.location,
				}
			});
			}
		}
	});
}