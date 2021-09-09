"use strict";

!function () {
  var e = 0,
      o = {};

  for (key in o.requiredHTMLs = {
    bottomElement: document.querySelectorAll(".js-accordionBottom"),
    accordionBoxElement: document.querySelectorAll(".js-accordionBox")
  }, o.requiredHTMLs) {
    if (null === o.requiredHTMLs[key] || 0 === o.requiredHTMLs[key].length) return void console.log("必須セレクタ「" + key + "」が取得できていません。");
  }

  for (e = 0; e < o.requiredHTMLs.accordionBoxElement.length; ++e) {
    o.requiredHTMLs.accordionBoxElement[e].style.height = o.requiredHTMLs.accordionBoxElement[e].offsetHeight + "px";
  }

  window.addEventListener("load", function () {
    for (o.eventFlag = !1, o.activeIndex = null, e = 0; e < o.requiredHTMLs.bottomElement.length; ++e) {
      o.requiredHTMLs.bottomElement[e].addEventListener("click", function () {
        o.eventFlag || (o.eventFlag = !0, o.index = [].slice.call(o.requiredHTMLs.bottomElement).indexOf(this), this.classList.toggle("close"), o.requiredHTMLs.accordionBoxElement[o.index].classList.toggle("close"), o.activeIndex = o.index, o.eventFlag = !1);
      }, !1);
    }
  }, !1);
}();