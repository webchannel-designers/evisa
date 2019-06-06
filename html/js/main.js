var siteScript = {
	init: function() {
		/*this.stickyHeader();*/
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

	subnav: function() {
		$('.hamburger').click(function(){
			$('body').toggleClass('nav-on');
			$(this).toggleClass('is-active');
		});
	},

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
	      grid: 4,
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
	              grid: 1,
	              contentPadding: 20
	          }
	      }, {
	          breakpoint: 520,
	          settings: {
	              grid: 1
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