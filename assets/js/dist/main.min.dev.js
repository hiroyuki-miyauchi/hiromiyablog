"use strict";

jQuery(function (e) {
  var t,
      s = e(".header_menu"),
      n = e(".header_links");
  s.on("click", function () {
    0 == s.hasClass("is-active") ? (n.addClass("is-active"), s.addClass("is-active"), t = e(window).scrollTop(), e("body").addClass("is-fixed").css({
      top: -t
    })) : (n.find(".header_nav").hide(), n.removeClass("is-active"), s.removeClass("is-active"), e("body").removeClass("is-fixed").css({
      top: 0
    }), e("html, body").animate({
      scrollTop: t
    }, 0, "swing"), setTimeout(function () {
      n.find(".header_nav").show();
    }, 1e3));
  }), e(".js-pagetop").on("click", function () {
    e("html, body").animate({
      scrollTop: 0
    }, 500, "swing");
  }), e('a[href^="#"]').on("click", function (t) {
    var s = e(this).attr("href"),
        n = e("#" == s || "" == s ? "html" : s),
        i = n.offset().top;
    return e.when(e("html, body").animate({
      scrollTop: i
    }, 500, "swing"), t.preventDefault()).done(function () {
      var t = n.offset().top;
      t === i || e("html, body").animate({
        scrollTop: t
      }, 10, "swing");
    }), !1;
  }), e(function () {
    var t = ".moreTarget",
        s = e(".moreButton");
    e(t).removeClass("is-show"), e(t + ":nth-child(n + 1)").addClass("is-hidden"), s.on("click", function () {
      e(t + ".is-hidden").slice(0, 100).removeClass("is-hidden").addClass("is-show"), 0 == e(t + ".is-hidden").length && s.fadeOut(0);
    });
  });
}), function () {
  var e = {};
  e.requiredHTMLs = {
    targetElement: document.querySelectorAll(".js-displayWhenScrolling"),
    endTargetElement: document.querySelectorAll(".pagetop")
  }, window.addEventListener("scroll", function () {
    e.requiredHTMLs.endTargetElement = e.requiredHTMLs.endTargetElement, e.scrollValue = window.pageYOffset, e.clientRect = e.requiredHTMLs.endTargetElement[0].getBoundingClientRect(), e.endTarget = e.scrollValue + e.clientRect.top, e.documentHeight = document.documentElement.clientHeight;

    for (var t = 0; t < e.requiredHTMLs.targetElement.length; ++t) {
      e.scrollValue + e.documentHeight > e.endTarget ? e.requiredHTMLs.targetElement[0].classList.remove("is-active") : e.scrollValue > e.documentHeight ? e.requiredHTMLs.targetElement[0].classList.add("is-active") : e.requiredHTMLs.targetElement[0].classList.remove("is-active");
    }
  }, !1);
}();