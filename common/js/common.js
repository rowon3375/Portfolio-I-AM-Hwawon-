/************************
 * 
 * hamburger menu 
 * 
************************/
$(function () {
  $(".hamburger").click(function () {
      $(this).toggleClass('active');
      $(".nav_menu").toggleClass('active');
      $("body").toggleClass('active');
      $("#scrollTop").toggleClass("display");
  });
});


/************************
 * 
 * top back scoll
 * 
************************/
$(function () {
  const pagetop = $("#scrollTop");
  pagetop.hide();

  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      pagetop.fadeIn();
    } else {
      pagetop.fadeOut();
    }
  });
  pagetop.click(function () {
    $("body,html").animate({
        scrollTop: 0,
      },800);
    return false;
  });
});

$(document).ready(function () {
  $('#scrollTop').hide();

  $(window).on("scroll", function () {
    //scroll height
    scrollHeight = $(document).height(); 

    //scroll position
    scrollPosition = $(window).height() + $(window).scrollTop();

    //footer position
    footHeight = $("footer").innerHeight();

    if (scrollHeight - scrollPosition <= footHeight) {
      $('#scrollTop').css({ position: 'absolute', top: '-17px', bottom: 'auto' });
      return false;
    } else {
      $('#scrollTop').css({ position: "fixed", bottom: "20px", top: "auto" });
    }
    return false;
  });
  return false;
});


/************************
 * 
 * a[#] no display
 * 
************************/
$('a[href^="#"]').on('click', function(){
  var href = $(this).attr("href");
  var target = $(href == "#" || href == "" ? 'html':href);
  var position = target.offset().top;

  $("html, body").animate({scrollTop: position}, 550, "swing");
  return false;
});


/************************
 * 
 * import line
 * 
************************/
$(document).ready(function() {
  // 下線を引くアクションを行ったか行ってないかのスイッチを配列で表現。
  var expantionswitch = ["off", "off"];

  $(window).scroll(function() {
    var expantion = $('.import_line_before');
    
    expantion.each(function(i) {
      //画面内でのimport_line_before位置取得）
      var ex_clientRect = $(this).get(0).getBoundingClientRect();
      
      //ページの上からどれだけ進んだか計る
      var wh = window.innerHeight;

      if (wh > ex_clientRect.top + 200 && expantionswitch[i] === "off") {
        $(this).addClass('import_line_after');
        //配列値onにする。これによって二度同じ動作をするのを防いでいる。
        expantionswitch[i] = "on";
      }
    });
  });
});


/************************
 * 
 * fadeUP　+ progress-bar
 * 
************************/
$(document).ready(function() {
  $(window).scroll(function() {
    var scrollPos = $(this).scrollTop();
    
    // 表示アニメーションを適用する要素を取得
    var aboutText = $('.fadeUp');
    
    // アニメーションを適用するためのクラスを定義
    var animationClass = 'fadeUp_show';
    
    // スクロール位置に応じてアニメーションを適用
    aboutText.each(function() {
      var elementOffset = $(this).offset().top;
      var windowHeight = $(window).height();
      
      if (scrollPos + windowHeight > elementOffset) {
        // 要素が画面内に入ったらアニメーションを追加
        $(this).addClass(animationClass);

        // 要素にfadeUp_showクラスが追加されたら、その中にある.progress-barの幅を設定
        if ($(this).hasClass(animationClass)) {
          $(this).find('.progress-bar').each(function() {
            var valuenow = $(this).attr('aria-valuenow');
            $(this).css('width', valuenow + '%');
          });
        }
      }
    });
  });
});


/************************
 * 
 * work category menu
 * 
************************/
$(function () {
  if ($(location).attr("pathname") === '/work/') {
   $('ul .cat-item-all a').css({ 'background-color': '#000000'});
   $('ul .cat-item-all a').css({ 'color': '#fff'});
 }});


