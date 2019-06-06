var siteScript = {
	init: function() {
		this.subnav();
		this.homeSlider();
		this.eventSlider();
		this.committeeSlider();
		this.spotCaption();
		// this.spotlightHeight();
		this.customSelect();
		this.otherAnimation();
		this.eqHeight();
		this.resize();
	},

	subnav: function() {
		$('header .page-nav ul li').hover(function(){
			$(this).toggleClass("hover");
			$(this).find('.subnav').stop().slideDown();
		}, function(){
			$(this).find('.subnav').stop().slideUp();
		});

		$('nav.page-nav li').each(function(){
			$(this).find('.subnav').parent().addClass('sub');
		});

		$('.nav-trigger').on('click', function(){
			$('body').toggleClass('on');
		});

		$('.page-overlay').on('click', function(){
			$('body').removeClass('on');
		});

		$('.mobile-menu ul li a').on('tap', function(){
			$(this).parent('li').find('.subnav').stop().slideToggle();
		});
	},

	homeSlider: function() {
		if ($.fn.owlCarousel) {
			$("#home-slider").owlCarousel({

				navigation: true, 
				slideSpeed: 300,
				paginationSpeed: 400,
				transitionStyle : "fade",
				singleItem: true,
				autoPlay: true

			});
		}
	},

	otherAnimation: function() {
		$('.page-about .readmore').click(function(e){
			$(this).toggleClass('on');
			$(this).parent().find('.hidden-temp').stop().slideToggle();

			e.preventDefault();
		});
	},

	eventSlider: function() {
		if ($.fn.owlCarousel) {
			$("#event-slider, #team-slider").owlCarousel({
				navigation: true,
				autoPlay: 5000, 
				items : 2,
				itemsDesktop : [1199,2],
				itemsDesktopSmall : [979,1],
				itemsTablet : [768,1]
			});
		}
	},
	
	committeeSlider: function() {
		if ($.fn.owlCarousel) {
			$("#committee-slider").owlCarousel({
				navigation: true,
				autoPlay: 5000, 
				items : 3,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]
			});
		}
	},

	spotlightHeight: function() {
        var windW = $(window).width();
        var windH = $(window).outerHeight();
        var headerH = $('header').outerHeight();
        var newHeight = windH-headerH;
        var sections = $('.page-spotlight .item')
        $(sections).css('height', newHeight);
    },

	spotCaption: function() {
		$(window).load(function(){
			var itemH = $('.page-spotlight .item').outerHeight();
			var capH = $('.page-spotlight .item .caption').outerHeight();
			var itemNH = itemH/2;
			var capNH = capH/2;
			var newH = itemNH-capNH;
			$('.page-spotlight .item .caption').css({
				top: itemNH-capNH
			});
		});
	},

	customSelect: function() {
		if ($.fn.selectBoxIt) {
			$("select").selectBoxIt();
		}
	},
	
	eqHeight: function() {
		var maxHeight1 = 0;
		$('.event-slider .item-detail .title').each(function() {
			maxHeight1 = ($(this).outerHeight() > maxHeight1) ? $(this).outerHeight() : maxHeight1;
		});
		$('.event-slider .item-detail .title').css("height", maxHeight1);
		
		var maxHeight2 = 0;
		$('.event-slider .item-detail .content').each(function() {
			maxHeight2 = ($(this).outerHeight() > maxHeight2) ? $(this).outerHeight() : maxHeight2;
		});
		$('.event-slider .item-detail .content').css("height", maxHeight2);

	},

	resize: function() {
		$(window).on('resize', function(){
			$('.page-spotlight .item .caption').css({
				top: 'auto'
			});
			var itemH = $('.page-spotlight .item').outerHeight();
			var capH = $('.page-spotlight .item .caption').outerHeight();
			var itemNH = itemH/2;
			var capNH = capH/2;
			var newH = itemNH-capNH;
			$('.page-spotlight .item .caption').css({
				top: itemNH-capNH
			});

			$('.event-slider .item-detail .title, .event-slider .item-detail .content').css("height", 'auto');
			siteScript.eqHeight();
		});
	}
}

$(function() {
	siteScript.init();
});