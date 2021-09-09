jQuery(function($) {
  // Navi
  var $menu = $('.header_menu');
  var $slideNav = $('.header_links');
  var $scrollpos;
  $menu.on('click', function() {
    if ($menu.hasClass('is-active') == false) {
      $slideNav.addClass('is-active');
      $menu.addClass('is-active');
      $scrollpos = $(window).scrollTop();
      $('body').addClass('is-fixed').css({'top': -$scrollpos});
    } else {
      $slideNav.find('.header_nav').hide();
      $slideNav.removeClass('is-active');
      $menu.removeClass('is-active');
      $('body').removeClass('is-fixed').css({'top': 0});
      $("html, body").animate({scrollTop: $scrollpos}, 0, "swing");
      setTimeout(function() {
        $slideNav.find('.header_nav').show();
      }, 1000);
    }
  });

  // PageTop
  $('.js-pagetop').on('click', function(){
    $("html, body").animate({scrollTop: 0}, 500, "swing"); // 0.5秒かけてページトップへ戻る
  });

  // ページ内遷移
  $('a[href^="#"]').on('click', function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    if (window.innerWidth < 768) {
      //$("html, body").animate({scrollTop:position - (document.querySelectorAll('header')[0].offsetHeight)}, speed, "swing"); // SP時
      $("html, body").animate({scrollTop:position}, speed, "swing"); // SP時
    } else {
      $("html, body").animate({scrollTop:position}, speed, "swing"); // PC時
    }
    return false;
  });
});

jQuery(function($) {
  // もっと見るボタン（クリック時にコンテンツ表示）
  var showNum = 0; // 最初に表示しておく件数
  var addNum = 100; // クリックごとに表示したい件数
  var target = '.moreTarget';
  var btn = $('.moreButton');

  $(target).removeClass('is-show');

  $(target + ':nth-child(n + ' + (showNum + 1) + ')').addClass('is-hidden');

  btn.on('click', function () {
    $(target + '.is-hidden').slice(0, addNum).removeClass('is-hidden').addClass('is-show');
    
    if ($(target + '.is-hidden').length == 0) {
      btn.fadeOut(0);
    }
  });
});

// スクロール時にページトップに戻るボタン表示
(function () { // 即時実行関数（グローバル汚染対策）
  var el = {}; // 配列・変数用（巻き上げ防止の為、冒頭にて宣言）

  el.requiredHTMLs = { // 必須
    targetElement: document.querySelectorAll('.js-displayWhenScrolling'), // 表示させるボタン要素のセレクタを取得
    endTargetElement: document.querySelectorAll('.pagetop'), // 指定した要素まできたら非表示にする位置のセレクタを取得
  };

  window.addEventListener('scroll', function () {
    el.requiredHTMLs.endTargetElement = el.requiredHTMLs.endTargetElement;
    el.scrollValue = window.pageYOffset; // 現在のスクロール量の取得
    el.clientRect = el.requiredHTMLs.endTargetElement[0].getBoundingClientRect(); // 要素の位置座標を取得
    el.endTarget = el.scrollValue + el.clientRect.top; // 画面の上端から、要素の上端までの距離
    el.documentHeight = document.documentElement.clientHeight; // ドキュメント全体の高さを取得（表示領域部分の高さ）

    for (var i = 0; i < el.requiredHTMLs.targetElement.length; ++i) {
      if (el.scrollValue + el.documentHeight > el.endTarget) { // 指定要素の位置まできたら
        el.requiredHTMLs.targetElement[0].classList.remove('is-active');
      } else if (el.scrollValue > el.documentHeight) { // 一画面分スクロールしたら
        el.requiredHTMLs.targetElement[0].classList.add('is-active');
      } else {
        el.requiredHTMLs.targetElement[0].classList.remove('is-active');
      }
    }
  }, false);
}());
