/* slick slide */
var slick_vehicle = null;
var slick_vehicle_thumb = null;

$(function() {
    $('.summary-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        fade: true,
        asNavFor: '.summary-slider-thumb'
    });
   
    $('.summary-slider-thumb').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.summary-slider',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        vertical: true,
    });
   
    slick_vehicle = $('.vehicle-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		//autoplay: true,
		fade: true,
		asNavFor: '.vehicle-slider-thumb'
    });
    slick_vehicle_thumb = $('.vehicle-slider-thumb').slick({
		slidesToShow: 6,
		slidesToScroll: 1,
		asNavFor: '.vehicle-slider',
		dots: false,
		centerMode: true,
		focusOnSelect: true,
		vertical: true,
	});

	slick_vehicle.eq(0).slick("slickSetOption", 'autoplay', true, true);
     
	$('.tab-box ul.tab li a').click(function() {
		var idx = $(this).parent().attr('class').slice(4)-1;
		slick_vehicle.slick("slickSetOption", 'autoplay', false, true);
		
		slick_vehicle.eq(idx).animate({'z-index':1},1,function(){
			slick_vehicle.eq(idx).slick("slickGoTo", 0, true);
			slick_vehicle.eq(idx).slick("slickSetOption", 'autoplay', true, true);
		});
	});
});

/* calendar */
$('#calendar-open').click(function(){
    $(this).toggleClass('action');
    $('#calendar').fadeIn('slow');
});
$('.calendar-area td a').click(function(){
  $('#calendar').fadeToggle();
  $('.calendar-detail-area').fadeIn('slow');
  $('.calendar-search-area').fadeOut('slow');
});
$('.detail-btn-area-submit ul li a').click(function(){
  $('#calendar').fadeIn('slow');
  $('.calendar-search-area').fadeIn('slow');
  $('.calendar-detail-area').fadeOut('slow');
});
//modal
$(function(){
  $('.detail-btn-area-submit input').click(function(){
    $('body').append('<div class="modal-bg"></div>');
    modalResize();
    $('.modal-bg,.modal-main').fadeIn('slow');
      $('.modal-bg,.modal-main').click(function(){
          $('.modal-main,.modal-bg').fadeOut('slow',function(){
          $('.modal-bg').remove();
         });
        });
     $(window).resize(modalResize);
      function modalResize(){
        var w = $(window).width();
        var h = $(window).height();
          var cw = $('.modal-main').outerWidth();
          var ch = $('.modal-main').outerHeight();
            $('.modal-main').css({
              'left': ((w - cw)/2) + 'px',
              'top': ((h - ch)/2) + 'px'
          });
     }
   });
});