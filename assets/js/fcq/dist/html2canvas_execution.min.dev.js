"use strict";

$(document).ready(function () {
  var e, t;
  $("#captureBtn").on("click", function () {
    $("html,body").css("overflow-y", "hidden"), html2canvas(document.querySelector(".contentCenter"), {
      allowTaint: !1,
      useCORS: !0,
      taintTest: !0,
      removeContainer: !0
    }).then(function (n) {
      e = n.toDataURL("image/png"), (t = document.createEvent("MouseEvents")).initMouseEvent("click", !0, !1, window, 0, 0, 0, 0, 0, !1, !1, !1, !1, 0, null), previewImg = document.createElementNS("http://www.w3.org/1999/xhtml", "a"), previewImg.href = e, previewImg.download = "preview_image", previewImg.dispatchEvent(t);
    }), $("html,body").css("overflow-y", "");
  });
});