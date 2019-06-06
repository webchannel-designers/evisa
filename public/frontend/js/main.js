var siteScript = {
	init: function() {
		this.stickyHeader();
		this.subnav();
		this.homeSlider();
		/*this.travelSlider();
		this.countSlider();
		this.feedbackSlider();
		this.spotCaption();
		this.customSelect();*/
		this.eqHeight();
		// this.scrollToTop();
		/*this.resize();*/
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
		$('.navbar-nav .nav-item').hover(function(){
			$(this).find('.dropdown-menu, > ul').stop().slideDown();
		}, function(){
			$(this).find('.dropdown-menu, > ul').stop().slideUp();
		});

		if ($(window).outerWidth() < 992) {
			$('.page-nav .no-link').click(function(e){
				$(this).find('.dropdown-menu, > ul').stop().slideToggle();
				return false;
			});
		}

		$('.hamburger').click(function(){
			$('body').toggleClass('nav-on');
			$(this).toggleClass('is-active');
		});

		$('.map .location-list li a').click(function(e){
			$(this).parent().stop().addClass('active').siblings().removeClass('active');

			e.preventDefault();
		});

		// $('.nav-service .dropdown-menu a[href*=\\#]').on('click', function(e) {

		// 	var target = this.hash;
		// 	var $target = $(target);
		// 	console.log(targetname);
		// 	var targetname = target.slice(1, target.length);

		// 	if (document.getElementById(targetname) != null) {
		// 		e.preventDefault();
		// 	}
		// 	$('html, body').stop().animate({
		// 		'scrollTop': $target.offset().top - 97

		// 	}, 900, 'swing', function() {
		// 		window.location.hash = target;
		// 	});
		// });
		"use strict"; // Start of use strict
		// Smooth scrolling using jQuery easing
		$('.nav-service .dropdown-menu a[href*="#"]:not([href="#"])').click(function(e) {
			if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: (target.offset().top - 98)
					}, 1000, "easeInOutExpo");
					// return false;
					// e.preventDefault();
				}
			}
		});

		// Closes responsive menu when a scroll trigger link is clicked
		$('.nav-service .dropdown-menu a').click(function() {
			$('.navbar-collapse').collapse('hide');
		});

		// Activate scrollspy to add active class to navbar items on scroll
		$('body').scrollspy({
			target: '#mainNav',
			offset: 54
		});
	},

	/*subnav: function() {
		$('.hamburger').click(function(){
			$('body').toggleClass('nav-on');
			$(this).toggleClass('is-active');
		});
	},
*/
	homeSlider: function() {
		if ($.fn.owlCarousel) {
			$(".home-slider").owlCarousel({
				animateOut: 'fadeOut',
			    items:1,
			    autoplay: true,
			    dots: true
			});
		}
	},

	eqHeight: function() {
		// var maxHeight1 = 0;
		// $('.about-slider .item .content').each(function() {
		// 	maxHeight1 = ($(this).outerHeight() > maxHeight1) ? $(this).outerHeight() : maxHeight1;
		// });
		// $('.about-slider .item .content').css("height", maxHeight1);
		var maxHeight1 = 0;
		$('.why-visa .item .why-border').each(function() {
			maxHeight1 = ($(this).outerHeight() > maxHeight1) ? $(this).outerHeight() : maxHeight1;
		});
		$('.why-visa .item .why-border').css("height", maxHeight1);
	},

}

$(document).ready(function() {
	  $('.gridtab-1').gridtab({
	      grid: 3,
	      tabPadding: 0,
	      borderWidth: 10,
	      contentPadding: 40,
	      responsive: [{
	          breakpoint: 991,
	          settings: {
	              grid: 2,
	              contentPadding: 30
	          }
	      }, {
	          breakpoint: 767,
	          settings: {
	              grid: 2,
	              contentPadding: 20
	          }
	      }, {
	          breakpoint: 520,
	          settings: {
	              grid: 2
	          }
	      }]
	  });

});

/*=======Payment gateway======*/

$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary1').addClass('btn-default1');
          $item.addClass('btn-primary1');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary1').trigger('click');
});



// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
'use strict';

window.addEventListener('load', function() {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');

  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
}, false);
})();

/*=======Payment gateway======*/



/*=======counter======*/
    $(".incr-btn").on("click", function (e) {
        var $button = $(this);
        var oldValue = $button.parent().find('.quantity').val();
        $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
        if ($button.data('action') == "increase") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below 1
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
                $button.addClass('inactive');
            }
        }
        $button.parent().find('.quantity').val(newVal);
        e.preventDefault();
    });
/*=======counter======*/





$(function() {
	siteScript.init();
});