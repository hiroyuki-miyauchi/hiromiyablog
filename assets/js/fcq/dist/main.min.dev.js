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
jQuery(function (e) {
  e(document).ready(function () {
    var t = 0,
        n = {};

    function o() {
      n.windowWidth = e(window).width(), n.poweredModalWidth = n.poweredModal.outerWidth(), n.poweredModal.css({
        left: (n.windowWidth - n.poweredModalWidth) / 2 + "px",
        top: "50px"
      });
    }

    n.contentArea = e("#contentArea"), n.preArea = e("#preArea"), n.fixedArea = e("#fixedArea"), n.fixedAreaHeight = n.fixedArea.outerHeight(), n.footerContent = "", n.headerContent = '&lt;html&gt;&lt;head&gt;&lt;meta http-equiv="Content-Type" content="text/html; charset=shift_jis"&gt;&lt;meta http-equiv="Content-Script-Type" content="text/javascript"&gt;&lt;title&gt;HTMLメルマガテンプレート&lt;/title&gt;&lt;/head&gt;&lt;body link="#243F8F" vlink="#243F8F" alink="#FFC822" leftmargin="0" topmargin="0" bottommargin="0" marginwidth="0" marginheight="0" text="#222222" style="color:#222222; font-family:&lsquo;ＭＳ Ｐゴシック&lsquo;,&lsquo;MS PGothic&lsquo;,&lsquo;ヒラギノ角ゴ Pro W3&lsquo;,&lsquo;Hiragino Kaku Gothic Pro&lsquo;,sans-serif; border: 1px solid #CCC;"&gt;&lt;!-- center --&gt;&lt;div align="center"&gt;&lt;table align="center" width="560" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CCC; background-color: #FFFFFF;"&gt;&lt;tbody&gt;&lt;!--header--&gt;&lt;tr&gt;&lt;td align="center" style="background-color: #2C2D87;"&gt;&lt;p style="color: #FFFFFF; font-size: 30px; font-weight: bold; line-height: 150%; padding: 20px 0; margin: 0;"&gt;Free Creative Quickly&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;!--/header--&gt;&lt;tr&gt;&lt;td align="left" valign="top" style="background-color: #FFFFFF; padding: 20px 20px 10px;"&gt;&lt;table width="520" border="0" cellspacing="0" cellpadding="0"&gt;&lt;tbody&gt;\n', n.footerCopyright = '&lt;/tbody&gt;&lt;/table&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align="right" style="height:32px; min-height:32px; background-color: #272884; padding: 10px 11px 10px;"&gt;&lt;p style="color: #FFFFFF; font-size:10px; line-height:100%; margin: 0;"&gt;Copyright hiroyuki miyauchi&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;!-- /center --&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;', n.clickEvent = "click", n.ua = navigator.userAgent, n.ua.indexOf("iPhone") > 0 || n.ua.indexOf("iPod") > 0 || n.ua.indexOf("Android") > 0 && n.ua.indexOf("Mobile") > 0 ? n.clickEvent = "touchend" : (n.ua.indexOf("iPad") > 0 || n.ua.indexOf("Android") > 0) && (n.clickEvent = "touchend"), e(".contentImgBtn").on(n.clickEvent, function () {
      n.contentNumber = e(this).attr("id"), e.when(e.ajax({
        type: "GET",
        url: "/demo/free-creative-quickly-parts-list/",
        dataType: "html",
        timeout: 1e3,
        success: function success(t) {
          n.contentNumberAfter = "#" + n.contentNumber, n.contentAreaAfter = e(t).find(n.contentNumberAfter).html(), n.contentArea.append(n.contentAreaAfter), "" === n.footerContent && (n.footerContent = e(t).find("#con14").html(), n.footerContent = n.footerContent.replace(/</g, "&lt;"), n.footerContent = n.footerContent.replace(/>/g, "&gt;"));
        }
      })).done(function () {
        n.scrollValue = n.contentArea.children(":last").offset().top, n.lastConH = n.contentArea.children(":last").outerHeight(), n.lastConHAfer = (n.lastConH - 20) / 2, e("body").append('<a href="javascript:void(0)" class="leftRemove" style="top:' + (n.scrollValue + n.lastConHAfer) + 'px;"><span><span><span></span></span></span></a>'), e("body, html").animate({
          scrollTop: n.scrollValue - n.fixedAreaHeight - 20
        }, 400, "swing");
      }).fail(function () {
        return !1;
      });
    }), e("#generationBtn").on(n.clickEvent, function () {
      e.when(n.preAreaValue = n.contentArea.html(), n.preAreaValue = n.preAreaValue.replace(/^\n/gm, ""), n.preAreaValue = n.preAreaValue.replace(/</g, "&lt;"), n.preAreaValue = n.preAreaValue.replace(/>/g, "&gt;"), n.preArea.children("pre").empty(), n.preArea.children("pre").append(n.headerContent), n.preArea.children("pre").append(n.preAreaValue), n.preArea.children("pre").append(n.footerContent), n.preArea.children("pre").append(n.footerCopyright)).done(function () {
        n.preArea.slideDown(400), n.preAreaTarget = n.preArea.offset().top, e("body, html").animate({
          scrollTop: n.preAreaTarget - n.fixedAreaHeight - 20
        }, 400, "swing"), setTimeout(function () {
          !function () {
            var e = document.getElementById("copy001").innerText,
                t = "【K】000000index.html",
                n = new Uint8Array([239, 187, 191]),
                o = new Blob([n, e], {
              type: "text/html"
            }),
                l = document.createElement("a");
            l.download = t, l.target = "_blank", window.navigator.msSaveBlob ? window.navigator.msSaveBlob(o, t) : window.URL && window.URL.createObjectURL ? (l.href = window.URL.createObjectURL(o), document.body.appendChild(l), l.click(), document.body.removeChild(l)) : window.webkitURL && window.webkitURL.createObject ? (l.href = window.webkitURL.createObjectURL(o), l.click()) : window.open("data:text/html;base64," + window.Base64.encode(e), "_blank");
          }();
        }, 400);
      }).fail(function () {
        return !1;
      });
    }), e("#allReset").on(n.clickEvent, function () {
      e.when(n.preValue = n.preArea.children("pre").text().length, n.contentArea.empty(), e(".leftRemove").remove()).done(function () {
        n.preValue > 0 && n.preArea.slideUp(0).children("pre").empty(), e("body, html").animate({
          scrollTop: 0
        }, 400, "swing");
      }).fail(function () {
        return !1;
      });
    }), e("#resetBtn").on(n.clickEvent, function () {
      e.when(n.contentValue = n.contentArea.children().length, n.preValue = n.preArea.children("pre").text().length, n.contentArea.children(":last").remove(), e(".leftRemove:last").remove()).done(function () {
        n.preValue > 0 && n.preArea.slideUp(0).children("pre").empty(), n.contentValue > 1 ? (n.scrollValue = n.contentArea.children(":last").offset().top, e("body, html").animate({
          scrollTop: n.scrollValue - n.fixedAreaHeight - 20
        }, 400, "swing")) : e("body, html").animate({
          scrollTop: 0
        }, 400, "swing");
      }).fail(function () {
        return !1;
      });
    }), e(document).on(n.clickEvent, ".leftRemove", function () {
      e.when(n.leftRemoveValue = e(".leftRemove").length, n.leftRemoveIndex = e(".leftRemove").index(this), e(".leftRemove").eq(n.leftRemoveIndex).remove(), n.contentArea.children().eq(n.leftRemoveIndex).remove(), n.contentValue = n.contentArea.children().length).done(function () {
        if (1 === n.leftRemoveValue) e("body, html").animate({
          scrollTop: 0
        }, 400, "swing");else for (t = 0; t < n.contentValue; ++t) {
          n.scrollValue = n.contentArea.children(":eq(" + t + ")").offset().top, n.leftConH = n.contentArea.children(":eq(" + t + ")").outerHeight(), n.leftConHAfer = (n.leftConH - 20) / 2, e(".leftRemove").eq(t).attr("style", "top:" + (n.scrollValue + n.leftConHAfer) + "px;");
        }
      }).fail(function () {
        return !1;
      });
    }), e("#naviOpenClose").on(n.clickEvent, function () {
      e(this).toggleClass("close"), e(this).prev("#naviArea").slideToggle();
    }), n.poweredModal = e("#poweredModal"), e("#powered p span").on(n.clickEvent, function () {
      e("#wrapper").append('<div id="modalOverlay"></div>'), e("#modalOverlay").fadeIn("slow"), o(), n.poweredModal.fadeIn("slow");
    }), e(document).on(n.clickEvent, "#modalOverlay, #poweredModal", function () {
      e("#modalOverlay, #poweredModal").fadeOut("slow", function () {
        e("#modalOverlay").remove();
      });
    }), e(window).resize(o), e(window).on("scroll", function () {
      n.scrollT = e(window).scrollTop(), n.fixedS = n.fixedArea.offset().top, n.scrollT > n.fixedS ? n.fixedArea.addClass("fixed") : (n.fixedArea.removeClass("fixed"), e("#naviOpenClose").removeClass("close"), e("#naviArea").slideDown());
    });
  });
});