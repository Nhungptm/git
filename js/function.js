/*textnode-deleat*/
jQuery(function($){
$('ul,ol,li,.pager,.pager a')
  .contents()
  .filter(function(){ return this.nodeType == 3 && !/\S/.test(this.data) })
  .remove();
})


/* main-slide */
$(function() {
  $('.main-slider').fadeIn(500);
  $('.main-slider').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    autoplay: true,
    accessibility: false,
    arrows: false,
  });
});

/* max-images */
$(function(){
$('.main-visual li a').maximage();
});

/* navi-opacity-cancel */
$(function(){
  var fix    = $('#vivid-trigger');
  var fixTop = fix.offset().top;
  $(window).scroll(function () {
    if($(window).scrollTop() >= fixTop) {
      $('header').addClass('vivid');
    } else {
      $('header').removeClass('vivid');
    }
  });
});

/* search-tag */
var tab = {
  dur: 300,
  cr: 0,
  start: function() {
    $('.tab-box ul.tab li a').click(function() {
    $('.tab-box ul.tab li a').removeClass('select');
    $(this).addClass('select');
      var idx = $(this).parent().attr('class').slice(4)-1;
      if (tab.anim!==true && idx!==tab.cr) {
        tab.anim = true;
        $('.tab-box').removeClass('tab-box-cr-'+(tab.cr+1)).addClass('tab-box-cr-'+(idx+1));
        $('.tab-box .box .content-'+(tab.cr+1)).addClass('content-switch').fadeOut(tab.dur);
        $('.tab-box .box .content-'+(idx+1)).fadeIn(tab.dur, function() {
          $('.tab-box .box .content-'+(tab.cr+1)).removeClass('content-switch')
          tab.cr = idx;
          tab.anim = false;
        });
      }
      return false;
    });
  }
};

$(function() {
	tab.start();
});


/* search prop */
$(document).ready(function(){
  $("select[name='place']").change(function(){
      if($(":selected").val()=="地域を選択"){
        $("select[name='place2']").attr("disabled","disabled");
        }else{
          $("select[name='place2']").removeAttr("disabled");
          }
    });
});

/* language-select */
$(function(){
  $(".lang-area dt").on("click", function() {
    $(this).next().slideToggle();
  });
});

/* sp-menu */
$(document).ready(function() {
  $('.sp-search-btn').click(function(){
      $(this).toggleClass('open');
      $('.common-search-area').toggleClass('draw');
  });
});

/* header-height */
$(document).ready(function() {
  var headheight = $('header').height();
  $('#main-content').css('padding-top',headheight+'px');
});

/* anchor-acroll */
$(function () {
  $('a[href^=#]').click(function(){
    var headerHight = $("header").innerHeight(); //ヘッダの高さ
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top-headerHight; //ヘッダの高さ分位置をずらす
    var off
    $("html, body").animate({scrollTop:position}, 550, "swing");
    return false;
  });
});

/*submit*/
$('.reload-cancel').click(function(e) {
  return e.preventDefault();
});

//submit-action
function setSendEnable(strName, boolEnable){
var elm = document.getElementsByName(strName).item(0);
    elm.disabled = !boolEnable;
}

//Datepicker calendar
$(function() {
    $.datepicker.setDefaults( $.datepicker.regional[ "ja" ] );
    var date = new Date;
    date.setMonth(date.getMonth() + 4, 0); 
    $('.search-calendar').datepicker({
      firstDay: 1,
      dateFormat: 'yy年mm月dd日 (DD)',
      dayNames: ['日', '月', '火', '水', '木', '金', '土'],
      minDate: '0y',
      maxDate: date,
      beforeShowDay: function(date) {
       var dateStr =
    [date.getFullYear(),date.getMonth()+1,date.getDate()].join('-');
       var holidayName = ktHolidayName(dateStr);
       if(holidayName)
       return [true, "date-holiday"];
       return  [true];
     },
     showAnim: ''
    });
});

$(function () {
 var headerHight = 100; //ヘッダの高さ
 $('a[href^=#]').click(function(){
     var href= $(this).attr("href");
       var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top-headerHight; //ヘッダの高さ分位置をずらす
     $("html, body").animate({scrollTop:position}, 550, "swing");
        return false;
   });
});

/*$('.tab-box ul.tab li a').click(function(){
  $.getScript('http://localhost:8888/airport-tourisum/wp-content/themes/airport-tourism/js/vehicle-slider.js', function() {
    $('.block').css( 'background', 'pink');
    $('.vehicle-slider').slick('setPosition');
  });
});*/

(function($) {
  $.getScriptsSequencial = function(scripts, callback) {
    var f = function(i) {
      $.getScript(scripts[i], function(){
        if (i+1 < scripts.length) {
          f(i+1);
        } else {
          callback();
        }
      });
    };
    f(0);
  };
})(jQuery);

/* validation */

  $(function(){
    $("#contactform").validationEngine('attach', {
    promptPosition:"topLeft"
  });
  });
  
  $(function(){
  $('input.required').each(function(){
    if(this.value == ""){
      $(this).css("background-color","rgb(249, 219, 219)");
    } else {
      $(this).css("background-color","#ffffff");
    }
  });
  $('input.required').blur(function(){
    if(this.value == ""){
      $(this).css("background-color","rgb(249, 219, 219)");
    } else {
      $(this).css("background-color","#ffffff");
    }
  });
  $('input.required').focus(function(){
    if(this.value == ""){
      $(this).css("background-color","#ffffff");
    } else {
      $(this).css("background-color","#ffffff");
    }
  });
  });
  
  $(function(){
  $('textarea.required').each(function(){
    if(this.value == ""){
      $(this).css("background-color","rgb(249, 219, 219)");
    } else {
      $(this).css("background-color","#ffffff");
    }
  });
  $('textarea.required').blur(function(){
    if(this.value == ""){
      $(this).css("background-color","rgb(249, 219, 219)");
    } else {
      $(this).css("background-color","#ffffff");
    }
  });
  $('textarea.required').focus(function(){
    if(this.value == ""){
      $(this).css("background-color","#ffffff");
    } else {
      $(this).css("background-color","#ffffff");
    }
  });
  });


/* matchHeight */
$(function() {
  $('.home-flow-list li').matchHeight();
  $('.home-service-list li').matchHeight();
  $('.plan-list article').matchHeight();
});

//青木追加

//オプションなしのときの価格
var price= 20000;    //PHAN 変更
price = Number(price);　//　PHAN 変更

$(function() {
  $(document).on("change", "#option select", function(){
      var total = price;
      $("#option select").each(function() {
        console.log($(this).val());
        if($(this).val() !== null) total += Number($(this).val());
      });
      console.log(total);
      //$('#total').html('<input type="hidden" value="' + total + '">' + total.toLocaleString());
  //PHAN 追加
      $('#total').html(total.toLocaleString());
      $('#total2').val(total.toLocaleString());

  });
});