
$(window).load(function(){
  // [clipboard.js]のインスタンスを作成
  var cp = new Clipboard(".copyBtn"); // [.cp]の要素に機能を実装する
  
  var centering = $(window).resize(centeringModalSyncer); //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
  
  //センタリングを実行する関数
  function centeringModalSyncer(){
    
    //変数を定義
    var w = $(window).width(); //画面(ウィンドウ)の幅を取得
    var h = $(window).height(); //画面(ウィンドウ)の高さを取得
    var cw = $("#modalContent").outerWidth(); // コンテンツ(#modalContent)の幅を取得
    var ch = $("#modalContent").outerHeight(); // コンテンツ(#modalContent)の高さを取得
    
    //センタリングを実行する
    $("#modalContent").css({"left": ((w - cw)/2) + "px","top": ((h - ch)/2) + "px"});
    
  }
  
  // コピーした時にアラートを表示する (成功時)
  cp.on("success",function(e) {
    //モーダルウィンドウを出現させるクリックイベント
    
    //キーボード操作などにより、オーバーレイが多重起動するのを防止する
    $(this).blur(); //ボタンからフォーカスを外す
    if( $("#modalOverlay")[0] ) return false; //新しくモーダルウィンドウを起動しない (防止策1)
    //if($("#modalOverlay")[0]) $("#modalOverlay").remove(); //現在のモーダルウィンドウを削除して新しく起動する (防止策2)
    
    //オーバーレイを出現させる
    $("#wrapper").append('<div id="modalOverlay"></div>');
    $("#modalOverlay").fadeIn("slow");
    
    //コンテンツをセンタリングする
    centeringModalSyncer();
    
    //コンテンツをフェードインする
    $("#modalContent").fadeIn("slow");
    
    //[#modalOverlay]、または[#modalClose]または[.returnBtn]をクリックしたら…
    $("#modalOverlay, #modalClose, .returnBtn").unbind().click(function(){
      
      //[#modalContent]と[#modalOverlay]をフェードアウトした後に…
      $("#modalContent, #modalOverlay").fadeOut("slow", function(){
        
        $('#modalOverlay').remove();	//[#modalOverlay]を削除する
        
      });
      
    });
    
    //モーダルを数秒後にフェードアウトする
    setTimeout(function(){
      
      //[#modalContent]と[#modalOverlay]をフェードアウトした後に…
      $("#modalContent, #modalOverlay").fadeOut("slow", function(){
        
        $('#modalOverlay').remove();	//[#modalOverlay]を削除する
        
      });
      
    }, 2000);
    
    //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
    centering
  });
  
  // コピーした時にアラートを表示する (失敗時)
  cp.on("error",function(e) {
    //モーダルウィンドウを出現させるクリックイベント
    
    //キーボード操作などにより、オーバーレイが多重起動するのを防止する
    $(this).blur(); //ボタンからフォーカスを外す
    if( $("#modalOverlay")[0] ) return false; //新しくモーダルウィンドウを起動しない (防止策1)
    //if($("#modalOverlay")[0]) $("#modalOverlay").remove(); //現在のモーダルウィンドウを削除して新しく起動する (防止策2)
    
    //オーバーレイを出現させる
    $("#wrapper").append('<div id="modalOverlay"></div>');
    $("#modalOverlay").fadeIn("slow");
    
    //コンテンツをセンタリングする
    centeringModalSyncer();
    
    //表示テキストを「コピーに失敗しました…」に変更
    $(".modalContentArea dl dd").text("コピーに失敗しました…");
    
    //コンテンツをフェードインする
    $("#modalContent").fadeIn("slow");
    
    //[#modalOverlay]、または[#modalClose]または[.returnBtn]をクリックしたら…
    $("#modalOverlay, #modalClose, .returnBtn").unbind().click(function(){
      
      //[#modalContent]と[#modalOverlay]をフェードアウトした後に…
      $("#modalContent, #modalOverlay").fadeOut("slow", function(){
        
        $('#modalOverlay').remove();	//[#modalOverlay]を削除する
        
      });
      
    });
    
    //モーダルを数秒後にフェードアウトする
    setTimeout(function(){
      
      //[#modalContent]と[#modalOverlay]をフェードアウトした後に…
      $("#modalContent, #modalOverlay").fadeOut("slow", function(){
        
        $('#modalOverlay').remove();	//[#modalOverlay]を削除する
        
      });
      
      //表示テキストを「コピーしました!!」にもどす
      setTimeout(function(){
        $(".modalContentArea dl dd").text("コピーしました!!");
      }, 500);
      
    }, 2000);
    
    //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
    centering
  });
});
