var slick_summary = null;
var slick_thumb = null;
var slick_vehicle = null;
var slick_vehicle_thumb = null;

$(function() {
    slick_summary = $('.summary-slider');
    slick_summary.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        fade: true,
        asNavFor: '.summary-slider-thumb'
    });
    slick_thumb = $('.summary-slider-thumb');
    slick_thumb.slick({
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
        autoplay: true,
        fade: true,
        initialSlide: 0,
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
          initialSlide: 0,
      });
    
  });
$('.tab-box ul.tab li a').click(function() {
    slick_vehicle.slick('slickGoTo', 0);
    slick_vehicle_thumb.slick('slickGoTo', 0);
});



//$('.tab-box ul.tab li a').click(function(){
//    $.getScript('http://centraltourist.azurewebsites.net/wp-content/themes/airport-tourism/js/slick.min.js', function() {
//    $('.block').css( 'background', 'pink');
//    $('.vehicle-slider').slick('reinit');
//    $('.vehicle-slider').slick('setPosition');
//    //$('.slick-initialized .slick-slide').removeClass('slick-current slick-active');
//    //$('.slick-initialized .slick-slide').css({'opacity':'0','transition':'opacity 500ms ease 0s','z-index':'998'});
//    //$('.slick-initialized .slick-slide:first-child').addClass('slick-current slick-active');
//    //$('.slick-initialized .slick-slide:first-child').css({'opacity':'1','transition':'','z-index':'999'});
    
//  });
//});


/*$(window).load(function () {
  $(function() {
      $('.tab-box ul.tab li a[rel^="tab-switch-"]').on('click',function(){
          //すべてのli要素の class="active" を取り除いて
          $('.tab-box ul.tab li a').removeClass('select');
          //クリックされたa要素の親要素になるliだけにactive付与(ボタンCSS変更)
          $(this).parent().addClass("select");

          $('.vehicle-image-area').css('visibility', 'hidden');
          $('.vehicle-image-area').css('height', '0px');
          $(this.hash).css('visibility', 'visible');
          $(this.hash).css('height', 'auto');
          return false;
      });

      //$('.tab-box ul.tab li a[rel^="tab-switch-"]:eq(0)').trigger('click');
  })*/





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
