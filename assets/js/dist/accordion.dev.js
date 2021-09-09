"use strict";

// アコーディオン
(function () {
  // 即時実行関数（グローバル汚染対策）
  var i = 0; // for文用変数の定義

  var el = {}; // 配列・変数用（巻き上げ防止の為、冒頭にて宣言）

  el.requiredHTMLs = {
    // 必須
    bottomElement: document.querySelectorAll('.js-accordionBottom'),
    // 開閉ボタン要素のセレクタを取得
    accordionBoxElement: document.querySelectorAll('.js-accordionBox') // 開閉コンテンツ要素のセレクタを取得

  }; // 必須HTMLのセレクタが取得できなければ「console.log()」で教えてエスケープする

  for (key in el.requiredHTMLs) {
    // 存在確認
    if (el.requiredHTMLs[key] === null || el.requiredHTMLs[key].length === 0) {
      //if (el.isDev) {
      console.log('必須セレクタ「' + key + '」が取得できていません。'); // 開発者が開発用ドメインで閲覧時にのみconsoleにて教える
      //}

      return; // 現在このreturnが存在している関数の処理を値を返しつつ止める。JSでは値を返さないreturn文も許可されている構造になっているので何も返さないreturnはundifinedを返す。
    }
  } // アコーディオンコンテンツの初期化処理


  for (i = 0; i < el.requiredHTMLs.accordionBoxElement.length; ++i) {
    el.requiredHTMLs.accordionBoxElement[i].style.height = el.requiredHTMLs.accordionBoxElement[i].offsetHeight + 'px'; // 各「accordionBox」の高さの初期値を設定
    //el.requiredHTMLs.accordionBoxElement[i].classList.add('close'); // 各「accordionBox」が閉じた状態に設定（初期時は開いた状態にしたい際はこちらをコメントアウト、変更した際は「close」classのstyle調整が必要）
  }

  window.addEventListener('load', function () {
    // window loadのタイミングで発火
    el.eventFlag = false; // アコーディオンの何かしらのイベントが発生しているかの判定用flag

    el.activeIndex = null; // アクティブ中の要素のindex番号を格納
    // アコーディオンボタンクリック時のイベント処理

    for (i = 0; i < el.requiredHTMLs.bottomElement.length; ++i) {
      el.requiredHTMLs.bottomElement[i].addEventListener('click', function () {
        if (el.eventFlag) {
          // イベントが発生中か判定
          return; // イベントが発生している場合はここで処理中断
        }

        el.eventFlag = true; // イベントが発生中

        el.index = [].slice.call(el.requiredHTMLs.bottomElement).indexOf(this); // インデックスを変数indexへ格納する

        this.classList.toggle('close'); // ボタンの開閉状態を変更

        el.requiredHTMLs.accordionBoxElement[el.index].classList.toggle('close'); // 開閉コンテンツの開閉状態を変更

        el.activeIndex = el.index; // アクティブ中の要素のindex番号を格納

        el.eventFlag = false; // イベントが発生していない状態
      }, false);
    }
  }, false);
})();