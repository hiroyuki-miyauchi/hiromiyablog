"use strict";

/*
 * MIT License
 *
 * Copyright (c) 2022 hiroyuki.miyauchi
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
(function () {
  // 即時実行関数（グローバル汚染対策）
  jQuery(function ($) {
    //この中で$使えるよー
    //処理 - 実行タイミング：HTML読み込み完了時
    $(document).ready(function () {
      var i = 0; // for文用変数の定義
      //let j = 0; // 上記内処理でfor文を使用している箇所のfor文用変数定義

      var el = {}; // 配列・変数用（巻き上げ防止の為、冒頭にて宣言）
      //let fns = {}; // 関数用（巻き上げ防止の為、冒頭にて宣言）
      //let key;

      el.contentArea = $('#contentArea');
      el.preArea = $('#preArea');
      el.fixedArea = $('#fixedArea');
      el.fixedAreaHeight = el.fixedArea.outerHeight();
      el.footerContent = '';
      el.headerContent = '&lt;html&gt;&lt;head&gt;&lt;meta http-equiv="Content-Type" content="text/html; charset=shift_jis"&gt;&lt;meta http-equiv="Content-Script-Type" content="text/javascript"&gt;&lt;title&gt;HTMLメルマガテンプレート&lt;/title&gt;&lt;/head&gt;&lt;body link="#243F8F" vlink="#243F8F" alink="#FFC822" leftmargin="0" topmargin="0" bottommargin="0" marginwidth="0" marginheight="0" text="#222222" style="color:#222222; font-family:&lsquo;ＭＳ Ｐゴシック&lsquo;,&lsquo;MS PGothic&lsquo;,&lsquo;ヒラギノ角ゴ Pro W3&lsquo;,&lsquo;Hiragino Kaku Gothic Pro&lsquo;,sans-serif; border: 1px solid #CCC;"&gt;&lt;!-- center --&gt;&lt;div align="center"&gt;&lt;table align="center" width="560" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CCC; background-color: #FFFFFF;"&gt;&lt;tbody&gt;&lt;!--header--&gt;&lt;tr&gt;&lt;td align="center" style="background-color: #2C2D87;"&gt;&lt;p style="color: #FFFFFF; font-size: 30px; font-weight: bold; line-height: 150%; padding: 20px 0; margin: 0;"&gt;Free Creative Quickly&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;!--/header--&gt;&lt;tr&gt;&lt;td align="left" valign="top" style="background-color: #FFFFFF; padding: 20px 20px 10px;"&gt;&lt;table width="520" border="0" cellspacing="0" cellpadding="0"&gt;&lt;tbody&gt;\n';
      el.footerCopyright = '&lt;/tbody&gt;&lt;/table&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align="right" style="height:32px; min-height:32px; background-color: #272884; padding: 10px 11px 10px;"&gt;&lt;p style="color: #FFFFFF; font-size:10px; line-height:100%; margin: 0;"&gt;Copyright hiroyuki miyauchi&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;!-- /center --&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;'; //PC・SPイベント切り替え

      el.clickEvent = 'click';
      el.ua = navigator.userAgent;

      if (el.ua.indexOf('iPhone') > 0 || el.ua.indexOf('iPod') > 0 || el.ua.indexOf('Android') > 0 && el.ua.indexOf('Mobile') > 0) {
        el.clickEvent = 'touchend';
      } else if (el.ua.indexOf('iPad') > 0 || el.ua.indexOf('Android') > 0) {
        el.clickEvent = 'touchend';
      } else {} //「contentImgBtn」ボタンのクリックイベント


      $('.contentImgBtn').on(el.clickEvent, function () {
        el.contentNumber = $(this).attr('id');
        $.when($.ajax({
          type: 'GET',
          url: '/demo/free-creative-quickly-parts-list/',
          dataType: 'html',
          timeout: 1000,
          success: function success(data) {
            el.contentNumberAfter = '#' + el.contentNumber;
            el.contentAreaAfter = $(data).find(el.contentNumberAfter).html();
            el.contentArea.append(el.contentAreaAfter);
            /*if (el.contentNumber === "con6") {
              $('.checkpointArea li').matchHeight();
              $('.media').addClass('itemMatchHeight');
              $('.itemMatchHeight ul li').matchHeight();
              $('.itemMatchHeight ul li div dl dd').matchHeight();
              $('.media ul li:nth-child(odd)').addClass('odd');
              $('.media ul li:nth-child(even)').addClass('even');
            }*/

            if (el.footerContent === '') {
              el.footerContent = $(data).find('#con14').html();
              el.footerContent = el.footerContent.replace(/</g, '&lt;');
              el.footerContent = el.footerContent.replace(/>/g, '&gt;');
            }
          }
        })).done(function () {
          el.scrollValue = el.contentArea.children(':last').offset().top;
          el.lastConH = el.contentArea.children(':last').outerHeight();
          el.lastConHAfer = (el.lastConH - 20) / 2;
          $('body').append('<a href="javascript:void(0)" class="leftRemove" style="top:' + (el.scrollValue + el.lastConHAfer) + 'px;"><span><span><span></span></span></span></a>');
          $('body, html').animate({
            scrollTop: el.scrollValue - el.fixedAreaHeight - 20
          }, 400, 'swing');
        }).fail(function () {
          return false;
        });
      }); //「HTMLを生成」ボタン

      $('#generationBtn').on(el.clickEvent, function () {
        $.when(el.preAreaValue = el.contentArea.html(), el.preAreaValue = el.preAreaValue.replace(/^\n/gm, ''), el.preAreaValue = el.preAreaValue.replace(/</g, '&lt;'), el.preAreaValue = el.preAreaValue.replace(/>/g, '&gt;'), el.preArea.children('pre').empty(), el.preArea.children('pre').append(el.headerContent), el.preArea.children('pre').append(el.preAreaValue), el.preArea.children('pre').append(el.footerContent), el.preArea.children('pre').append(el.footerCopyright)).done(function () {
          el.preArea.slideDown(400);
          el.preAreaTarget = el.preArea.offset().top;
          $('body, html').animate({
            scrollTop: el.preAreaTarget - el.fixedAreaHeight - 20
          }, 400, 'swing');
          setTimeout(function () {
            htmlDownload();
          }, 400);
        }).fail(function () {
          return false;
        });
      }); //「全てリセット」ボタン

      $('#allReset').on(el.clickEvent, function () {
        $.when(el.preValue = el.preArea.children('pre').text().length, el.contentArea.empty(), $('.leftRemove').remove()).done(function () {
          if (el.preValue > 0) {
            el.preArea.slideUp(0).children('pre').empty();
          }

          $('body, html').animate({
            scrollTop: 0
          }, 400, 'swing');
        }).fail(function () {
          return false;
        });
      }); //「１つ前に戻す」ボタン

      $('#resetBtn').on(el.clickEvent, function () {
        $.when(el.contentValue = el.contentArea.children().length, el.preValue = el.preArea.children('pre').text().length, el.contentArea.children(':last').remove(), $('.leftRemove:last').remove()).done(function () {
          if (el.preValue > 0) {
            el.preArea.slideUp(0).children('pre').empty();
          }

          if (el.contentValue > 1) {
            el.scrollValue = el.contentArea.children(':last').offset().top;
            $('body, html').animate({
              scrollTop: el.scrollValue - el.fixedAreaHeight - 20
            }, 400, 'swing');
          } else {
            $('body, html').animate({
              scrollTop: 0
            }, 400, 'swing');
          }
        }).fail(function () {
          return false;
        });
      }); //「leftRemove」ボタン

      $(document).on(el.clickEvent, '.leftRemove', function () {
        $.when(el.leftRemoveValue = $('.leftRemove').length, el.leftRemoveIndex = $('.leftRemove').index(this), $('.leftRemove').eq(el.leftRemoveIndex).remove(), el.contentArea.children().eq(el.leftRemoveIndex).remove(), el.contentValue = el.contentArea.children().length).done(function () {
          if (el.leftRemoveValue === 1) {
            $('body, html').animate({
              scrollTop: 0
            }, 400, 'swing');
          } else {
            for (i = 0; i < el.contentValue; ++i) {
              el.scrollValue = el.contentArea.children(':eq(' + i + ')').offset().top;
              el.leftConH = el.contentArea.children(':eq(' + i + ')').outerHeight();
              el.leftConHAfer = (el.leftConH - 20) / 2;
              $('.leftRemove').eq(i).attr('style', 'top:' + (el.scrollValue + el.leftConHAfer) + 'px;');
            }
          }
        }).fail(function () {
          return false;
        });
      }); //「naviArea」開閉ボタン

      $('#naviOpenClose').on(el.clickEvent, function () {
        $(this).toggleClass('close');
        $(this).prev('#naviArea').slideToggle();
      }); //「poweredModal」クリックイベント

      el.poweredModal = $('#poweredModal');

      function centeringPoweredModal() {
        el.windowWidth = $(window).width();
        el.poweredModalWidth = el.poweredModal.outerWidth();
        el.poweredModal.css({
          'left': (el.windowWidth - el.poweredModalWidth) / 2 + 'px',
          'top': 50 + 'px'
        });
      }

      $('#powered p span').on(el.clickEvent, function () {
        $("#wrapper").append('<div id="modalOverlay"></div>');
        $("#modalOverlay").fadeIn("slow");
        centeringPoweredModal();
        el.poweredModal.fadeIn('slow');
      });
      $(document).on(el.clickEvent, '#modalOverlay, #poweredModal', function () {
        $('#modalOverlay, #poweredModal').fadeOut('slow', function () {
          $('#modalOverlay').remove();
        });
      });
      $(window).resize(centeringPoweredModal); //「fixedArea」スクロールイベント

      $(window).on('scroll', function () {
        el.scrollT = $(window).scrollTop();
        el.fixedS = el.fixedArea.offset().top;

        if (el.scrollT > el.fixedS) {
          el.fixedArea.addClass('fixed');
        } else {
          el.fixedArea.removeClass('fixed');
          $('#naviOpenClose').removeClass('close');
          $('#naviArea').slideDown();
        }
      });
    }); //HTMLファイルダウンロード処理

    function htmlDownload() {
      //ダウンロードしたいコンテンツ、MIMEType、ファイル名
      var content = document.getElementById('copy001').innerText;
      var mimeType = 'text/html';
      var name = '【K】000000index.html'; //BOMは文字化け対策

      var bom = new Uint8Array([0xEF, 0xBB, 0xBF]);
      var blob = new Blob([bom, content], {
        type: mimeType
      });
      var a = document.createElement('a');
      a.download = name;
      a.target = '_blank';

      if (window.navigator.msSaveBlob) {
        //for IE
        window.navigator.msSaveBlob(blob, name);
      } else if (window.URL && window.URL.createObjectURL) {
        //for Firefox
        a.href = window.URL.createObjectURL(blob);
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
      } else if (window.webkitURL && window.webkitURL.createObject) {
        //for Chrome
        a.href = window.webkitURL.createObjectURL(blob);
        a.click();
      } else {
        //for Safari
        window.open('data:' + mimeType + ';base64,' + window.Base64.encode(content), '_blank');
      }
    }
  }); // スクロール時にページトップに戻るボタン表示
  // (function () { // 即時実行関数（グローバル汚染対策）
  //   let el = {}; // 配列・変数用（巻き上げ防止の為、冒頭にて宣言）
  //   el.requiredHTMLs = { // 必須
  //     targetElement: document.querySelectorAll('.js-displayWhenScrolling'), // 表示させるボタン要素のセレクタを取得
  //     endTargetElement: document.querySelectorAll('.pagetop'), // 指定した要素まできたら非表示にする位置のセレクタを取得
  //   };
  //   window.addEventListener('scroll', function () {
  //     el.requiredHTMLs.endTargetElement = el.requiredHTMLs.endTargetElement;
  //     el.scrollValue = window.pageYOffset; // 現在のスクロール量の取得
  //     el.clientRect = el.requiredHTMLs.endTargetElement[0].getBoundingClientRect(); // 要素の位置座標を取得
  //     el.endTarget = el.scrollValue + el.clientRect.top; // 画面の上端から、要素の上端までの距離
  //     el.documentHeight = document.documentElement.clientHeight; // ドキュメント全体の高さを取得（表示領域部分の高さ）
  //     for (i = 0; i < el.requiredHTMLs.targetElement.length; ++i) {
  //       if (el.scrollValue + el.documentHeight > el.endTarget) { // 指定要素の位置まできたら
  //         el.requiredHTMLs.targetElement[0].classList.remove('is-active');
  //       } else if (el.scrollValue > el.documentHeight) { // 一画面分スクロールしたら
  //         el.requiredHTMLs.targetElement[0].classList.add('is-active');
  //       } else {
  //         el.requiredHTMLs.targetElement[0].classList.remove('is-active');
  //       }
  //     }
  //   }, false);
  // }());
})();