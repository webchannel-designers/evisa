var siteScript = {
	init: function() {
		this.stickyHeader();
		this.subnav();
		this.homeSlider();
		this.productSlider();
		this.featuredSlider();
		this.gallery();
		this.customSelect();
		this.eqHeight();
		this.resize();
	},

	stickyHeader: function() {
		var spotH = $('#home-slider').outerHeight();
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
				$('header').addClass("sticky");
			} else {
				$('header').removeClass("sticky");
			}
		});
	},

	subnav: function() {
		// if ($(window).outerWidth() > 991) {
		// 	$('.dropdown').hover(function(){
		// 		$(this).find('> .dropdown-toggle').next('.dropdown-menu').stop().slideDown();
		// 	}, function(){
		// 		$(this).find('> .dropdown-toggle').next('.dropdown-menu').stop().slideUp();
		// 	});
		// } else {
		// 	$('.dropdown').click(function(){
		// 		$(this).find('> .dropdown-toggle').next('.dropdown-menu').stop().slideDown();
		// 	}, function(){
		// 		$(this).find('> .dropdown-toggle').next('.dropdown-menu').stop().slideUp();
		// 	});
			
		// };
		$('.dropdown-menu ul > li > a.dropdown-toggle').click(function(e){
			$(this).parents('li.dropdown').addClass('show');
			// $(this).parent().find('.drop').stop().toggle()
			return false;
		});
	},

	homeSlider: function() {
		if ($.fn.owlCarousel) {
			$(".home-slider").owlCarousel({
				animateOut: 'fadeOut',
			    items:1,
			    loop: true,
			    autoplay: true,
			    dots: false,
			    navText: [],
			    nav: true
			});
		}
	},

	productSlider: function() {
		if ($.fn.owlCarousel) {
			$(".product-slider").owlCarousel({
			    items:2,
			    autoplay: true,
			    dots: true,
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:2
			        },
			        1000:{
			            items:2
			        }
			    }
			});
		}
	},

	featuredSlider: function() {
		if ($.fn.owlCarousel) {
			$(".featured-slider").owlCarousel({
			    autoplay: true,
			    dots: false,
			    nav: true,
			    navText: [],
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:5
			        }
			    }
			});
		}
	},

	gallery: function() {
		if ($.fn.owlCarousel) {
			$(".gallery").owlCarousel({
			    autoplay: true,
			    dots: false,
			    items:1,
			    nav: true,
			    navText: []
			});
		}
	},

	customSelect: function() {
		if ($.fn.selectBoxIt) {
			$("select").selectBoxIt();
		}
	},
	
	eqHeight: function() {
		var maxHeight1 = 0;
		$('.title-wrapper .eqHeight').each(function() {
			maxHeight1 = ($(this).outerHeight() > maxHeight1) ? $(this).outerHeight() : maxHeight1;
		});
		// $('.title-wrapper .eqHeight').css("height", maxHeight1);
	},

	resize: function() {
		$(window).on('resize', function(){

		});
	}
}

$(function() {
	siteScript.init();
});