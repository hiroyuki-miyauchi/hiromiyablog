"use strict";

// 固定ナビゲーションメニュー
(function () {
  // 即時実行関数（グローバル汚染対策）
  var i = 0; // for文用変数の定義

  var j = 0; // 上記内処理でfor文を使用している箇所のfor文用変数定義

  var el = {}; // 配列・変数用（巻き上げ防止の為、冒頭にて宣言）

  el.requiredHTMLs = {
    // 必須
    targetElement: document.querySelectorAll('.js-fixedNavigation'),
    // 固定ナビゲーション要素のセレクタを取得
    closeTargetElement: document.querySelectorAll('.js-fixedNavigationClose') // 閉じるボタン要素のセレクタを取得

  }; // 必須HTMLのセレクタが取得できなければ「console.log()」で教えてエスケープする

  for (key in el.requiredHTMLs) {
    // 存在確認
    if (el.requiredHTMLs[key] === null || el.requiredHTMLs[key].length === 0) {
      //if (el.isDev) {
      console.log('必須セレクタ「' + key + '」が取得できていません。'); // 開発者が開発用ドメインで閲覧時にのみconsoleにて教える
      //}

      return; // 現在このreturnが存在している関数の処理を値を返しつつ止める。JSでは値を返さないreturn文も許可されている構造になっているので何も返さないreturnはundifinedを返す。
    }
  }

  window.addEventListener('load', function () {
    // window loadのタイミングで発火
    el.eventFlag = false; // 固定ナビゲーションメニューの何かしらのイベントが発生しているかの判定用flag

    el.currentScrollFlag = false; // 固定用のスクロール値が取得されているかどうかの判定用flag

    for (i = 0; i < el.requiredHTMLs.targetElement.length; ++i) {
      el.requiredHTMLs.targetElement[i].addEventListener('click', function () {
        el.activeDataValue = this.getAttribute('data-fixed-navigation-list'); // HTMLに設定されているデータ属性値の取得

        if (el.currentDataValue === el.activeDataValue && el.activeDataValue != 'home' && el.activeDataValue != 'pageTop' && el.eventFlag) {
          // クリックされたボタンが現在「activeコンテンツ」かどうかとイベントが発生しているかを判断
          return; // 条件を満たした場合はここ以降の処理を中断
        }

        if (el.currentDataValue != el.activeDataValue) {
          closeEvent(); // 展開しているactiveコンテンツを閉じる
        }

        el.scrollTop = document.documentElement.scrollTop || document.body.scrollTop; // 現在のスクロール量を取得

        if (el.activeDataValue === 'home') {
          // 条件に一致したらトップページに遷移
          window.location.href = 'https://hiromiyablog.com/'; // 通常の遷移
          // window.open('https://hiromiyablog.com/', '_blank'); // 新しいタブを開き、ページを表示
        } else if (el.activeDataValue === 'pageTop') {
          // 条件に一致したらページ内トップにスムーススクロール
          if (el.eventFlag) {
            document.querySelectorAll('body')[0].classList.remove('is-fixed'); // bodyをスクロールさせないように現在のスクロール量で固定する為のclassを削除

            document.querySelectorAll('body')[0].style.top = 0 + 'px'; // bodyをスクロールさせないように現在のスクロール量で固定する為のstyleを0にし初期位置へ

            closeEvent(); // 展開しているactiveコンテンツを閉じる
          }

          if (el.currentScrollFlag && el.scrollTop === 0) {
            window.scrollTo(0, el.currentScrollTop); // bodyをスクロールさせないようにした時の現在のスクロール量の位置に戻す
          } // setTimeout(function () { // 遅延して処理
          //   window.scrollTo({ // ページトップに戻る（スクロールする）アニメーション
          //     top: 0,
          //     left: 0,
          //     behavior: 'smooth'
          //   });
          //   el.eventFlag = false; // イベントが発生していないリセットされた状態なのでfalseにする
          //   el.currentScrollFlag = false; // 固定用のスクロール値が取得されているかどうかの判定用flagをリセット
          // }, 100);


          jQuery(function ($) {
            $("html, body").animate({
              scrollTop: 0
            }, 500); // 0.5秒かけてページトップへ戻る
          });
          el.eventFlag = false; // イベントが発生していないリセットされた状態なのでfalseにする

          el.currentScrollFlag = false; // 固定用のスクロール値が取得されているかどうかの判定用flagをリセット
        } else {
          if (el.currentScrollFlag && el.scrollTop === 0) {
            document.querySelectorAll('body')[0].style.top = -el.currentScrollTop + 'px'; // bodyをスクロールさせないように現在のスクロール量で固定する為のstyleを付与
          } else {
            document.querySelectorAll('body')[0].style.top = -el.scrollTop + 'px'; // bodyをスクロールさせないように現在のスクロール量で固定する為のstyleを付与

            el.currentScrollTop = el.scrollTop; // 現在の固定用のスクロール値を代入
          }

          document.querySelectorAll('body')[0].classList.add('is-fixed'); // bodyをスクロールさせないように現在のスクロール量で固定する為のclassを付与

          document.getElementById(el.activeDataValue).classList.add('is-active');
          el.currentScrollFlag = true; // 固定用のスクロール値が取得されているかどうかの判定用flag

          el.eventFlag = true; // 最初のイベントが発生したら「is-active」classをリセットする条件分岐内が処理されるようにflagをtrueにする

          el.currentDataValue = el.activeDataValue; // 現在active中のコンテンツのdata属性値を代入
        }
      }, false);
    } // 閉じる（×）ボタンが押された時の処理


    for (i = 0; i < el.requiredHTMLs.closeTargetElement.length; ++i) {
      el.requiredHTMLs.closeTargetElement[i].addEventListener('click', function () {
        document.querySelectorAll('body')[0].classList.remove('is-fixed'); // bodyをスクロールさせないように現在のスクロール量で固定する為のclassを削除

        document.querySelectorAll('body')[0].style.top = 0 + 'px'; // bodyをスクロールさせないように現在のスクロール量で固定する為のstyleを0にし初期位置へ

        closeEvent(); // 展開しているactiveコンテンツを閉じる

        window.scrollTo(0, el.currentScrollTop); // bodyをスクロールさせないようにした時の現在のスクロール量の位置に戻す

        el.eventFlag = false; // イベントが発生していないリセットされた状態なのでfalseにする
      }, false);
    } // 展開しているactiveコンテンツを閉じる処理


    function closeEvent() {
      for (j = 0; j < el.requiredHTMLs.targetElement.length; ++j) {
        el.dataValue = el.requiredHTMLs.targetElement[j].getAttribute('data-fixed-navigation-list'); // HTMLに設定されているデータ属性値の取得

        if (el.dataValue != 'home' && el.dataValue != 'pageTop' && document.getElementById(el.dataValue).classList.contains('is-active')) {
          // 「dataValue」が「home」と「pageTop」以外で該当セレクタに「is-active」classが存在していたら削除
          document.getElementById(el.dataValue).classList.remove('is-active'); // HTMLに設定されているデータ属性値を元に「is-active」classをリセットする
        }
      }
    }
  }, false);
})();