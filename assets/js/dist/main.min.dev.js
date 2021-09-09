"use strict";

jQuery(function (e) {
  var t,
      i = e(".header_menu"),
      s = e(".header_links");
  i.on("click", function () {
    0 == i.hasClass("is-active") ? (s.addClass("is-active"), i.addClass("is-active"), t = e(window).scrollTop(), e("body").addClass("is-fixed").css({
      top: -t
    })) : (s.find(".header_nav").hide(), s.removeClass("is-active"), i.removeClass("is-active"), e("body").removeClass("is-fixed").css({
      top: 0
    }), e("html, body").animate({
      scrollTop: t
    }, 0, "swing"), setTimeout(function () {
      s.find(".header_nav").show();
    }, 1e3));
  }), e(".js-pagetop").on("click", function () {
    e("html, body").animate({
      scrollTop: 0
    }, 500, "swing");
  }), e('a[href^="#"]').on("click", function () {
    var t = e(this).attr("href"),
        i = e("#" == t || "" == t ? "html" : t).offset().top;
    return window.innerWidth, e("html, body").animate({
      scrollTop: i
    }, 500, "swing"), !1;
  });
}), jQuery(function (e) {
  var t = ".moreTarget",
      i = e(".moreButton");
  e(t).removeClass("is-show"), e(t + ":nth-child(n + 1)").addClass("is-hidden"), i.on("click", function () {
    e(t + ".is-hidden").slice(0, 100).removeClass("is-hidden").addClass("is-show"), 0 == e(t + ".is-hidden").length && i.fadeOut(0);
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