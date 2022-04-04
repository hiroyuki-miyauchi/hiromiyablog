$(document).ready(function() {
  var canvasData, dataUrl, mEvent;
  $('#captureBtn').on('click', function(){
    $('html,body').css('overflow-y','hidden');
    html2canvas(document.querySelector(".contentCenter"), {
      //width: 562,
      allowTaint: false, //クロスオリジン画像がキャンバスを汚すのを許すかどうか
      useCORS: true, //CORSを使用してサーバーからイメージをロードするかどうか
      taintTest: true,
      removeContainer: true
    }).then(canvas => {
      //document.body.appendChild(canvas);
      canvasData = canvas;
      
      dataUrl = canvasData.toDataURL("image/png");// PNG形式
      mEvent = document.createEvent("MouseEvents");
      mEvent.initMouseEvent("click", true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
      previewImg = document.createElementNS("http://www.w3.org/1999/xhtml", "a");
      previewImg.href = dataUrl;
      previewImg.download = "preview_image";
      previewImg.dispatchEvent(mEvent);
    });
    $('html,body').css('overflow-y','');
  });
});
