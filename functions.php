<?php

//body要素の直後に何かを挿入する際に使用するwp_body_openアクションを実行する
add_action( 'wp_body_open', function() {
});


/**
 * <title>タグを出力する
 */
add_theme_support( 'title-tag' );


/**
 * タイトルの区切り文字を変更、「$separatpr」の値を変更で変更される
 */
// add_filter('document_title_separator', 'my_document_title_separator');
// function my_document_title_separator($separatpr) {
//   $separatpr = '-';
//   return $separatpr;
// }


/**
 * タイトルの区切り文字を変更、「$separatpr」の値を変更で変更される
 */
add_filter('document_title_parts', 'my_document_title_parts');
function my_document_title_parts( $title ) {
  if ( is_home() ) {
    unset($title['tagline']); // タグラインを削除
    $title['title'] = 'hiromiyablog'; // タイトルテキスト変更
  }
  return $title;
}


/**
 * アイキャッチ画像を使用可能にする
 */
add_theme_support( 'post-thumbnails' );


/**
 * カスタムメニュー機能を使用可能にする
 */
add_theme_support( 'menus' );


/**
 * ブロックエディターにCSSを適用する
 */
add_action( 'after_setup_theme', 'my_editor_suport' );
function my_editor_suport() {
  add_theme_support( 'editor-styles' );
  add_editor_style( 'assets/css/editor-style.css' );
}


/**
 * コメントフォームの「名前」「メールアドレス」「ウェブサイト」を削除
 * add_filterの第１引数に「comment_form_default_fields」を指定、第２引数に変更を加えるために定義した関数名を指定する。
 */
add_filter('comment_form_default_fields', 'my_comment_form_default_fields');
function my_comment_form_default_fields( $args ) {
  $args['notes'] = ''; // 「タイトルしたのコメント」項目を削除
  $args['author'] = ''; // 「名前」項目を削除
  $args['email'] = ''; // 「メールアドレス」項目を削除
  $args['url'] = ''; // 「サイト」項目を削除
  $args['cookies'] = ''; // 「保存チェック」項目を削除
  return $args;
}


/**
 * フィルターを共通化する
 */
add_action( 'wp', 'my_wpautop' );
function my_wpautop() {
  if ( is_page('contact') ) {
    remove_filter('the_content', 'wpautop');// フィルターフックに付加されている関数を除去する（引数１：除去したい関数が追加されているフィルターフック名、引数２：除去したいコールバック関数、引数３：関数の優先順位（初期値：10））
  }
}


/**
 * JetPackを使って関連記事を表示
 */

/**
 * 関連記事を自動表示を止める（通常ページ下部に挿入される）
 */
function jetpackme_remove_rp() {
  if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
      $jprp = Jetpack_RelatedPosts::init();
      $callback = array( $jprp, 'filter_add_target_to_dom' );
      remove_filter( 'the_content', $callback, 40 );
  }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );

/**
 * 関連記事の表示件数を変更する（$options['size']の数値を変更）
 */
function jetpackme_more_related_posts( $options ) {
  $options['size'] = 3;
  return $options;
}
add_filter( 'jetpack_relatedposts_filter_options', 'jetpackme_more_related_posts' );


/**
 * 特定の記事を関連記事として表示させない
 */
// function jetpackme_exclude_related_post( $exclude_post_ids, $post_id ) {
//   // $post_id は現在関連記事を取得している元の投稿
//   $exclude_post_ids[] = 1037; // post_id 1037 を除外
//   $exclude_post_ids[] = 1038; // post_id 1038 も除外
//   return $exclude_post_ids;
// }
// add_filter( 'jetpack_relatedposts_filter_exclude_post_ids', 'jetpackme_exclude_related_post' );

/**
 * 特定のカテゴリーを関連記事として表示させない
 */
// function jetpackme_filter_exclude_category( $filters ) {
//   $filters[] = array( 'not' => array( 'term' => array( 'category.slug' => 'clear' ) ) );
//   return $filters;
// }
// add_filter( 'jetpack_relatedposts_filter_filters', 'jetpackme_filter_exclude_category' );

/**
 * 特定の投稿で関連記事を表示しないようにする（is_singleのとこにIDを指定）
 */
// function jetpackme_no_related_posts( $options ) {
//   if ( is_single( array( 17, 19, 1, 11 ) ) ) {
//       $options['enabled'] = false;
//   }
//   return $options;
// }
// add_filter( 'jetpack_relatedposts_filter_options', 'jetpackme_no_related_posts' );


/**
 * OGP設定（SNS）
 */
function my_meta_ogp() {
  if ( is_front_page() || is_home() || is_singular() ) {
  
    /*初期設定*/
    
    // 画像 （アイキャッチ画像が無い時に使用する代替画像URL）
    $ogp_image = 'https://hiromiyablog.com/wp-content/themes/hiromiyablog/assets/img/home/main_visual.jpg';
    // Twitterのアカウント名 (@xxx)
    $twitter_site = '@hiromiyablog';
    // Twitterカードの種類（summary_large_image または summary を指定）
    $twitter_card = 'summary_large_image';
    // Facebook APP ID
    $facebook_app_id = '225891415820082';
    
    /*初期設定 ここまで*/
    
    global $post;
    $ogp_title = '';
    $ogp_description = '';
    $ogp_url = '';
    $html = '';
    if ( is_singular() ) {
      // 記事＆固定ページ
      setup_postdata( $post );
      $ogp_title = $post->post_title;
      $ogp_description = mb_substr(get_the_excerpt(), 0, 100);
      $ogp_url = get_permalink();
      wp_reset_postdata();
    } else if ( is_front_page() || is_home() ) {
      // トップページ
      $ogp_title = get_bloginfo('name');
      $ogp_description = get_bloginfo('description');
      $ogp_url = home_url();
    }
    
    // og:type
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';
    
    // og:image
    if ( is_singular() && has_post_thumbnail() ) {
      $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
      $ogp_image = $ps_thumb[0];
    }
    
    // 出力するOGPタグをまとめる
    $html = "\n";
    $html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
    $html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
    $html .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
    $html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
    $html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
    $html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    $html .= '<meta name="twitter:card" content="' . $twitter_card . '">' . "\n";
    $html .= '<meta name="twitter:site" content="' . $twitter_site . '">' . "\n";
    $html .= '<meta property="og:locale" content="ja_JP">' . "\n";
    
    if ( $facebook_app_id != "" ) {
      $html .= '<meta property="fb:app_id" content="' . $facebook_app_id . '">' . "\n";
    }
    
    echo $html;
  }
}
// headタグ内にOGPを出力する
add_action( 'wp_head', 'my_meta_ogp' );


/**
 * 投稿の抜き枠の設定
 * テンプレートタグ（<?php the_excerpt(); ?>）
 */

/**
 * 抜粋の長さを変更
 */
function custom_excerpt_length( $length ) {
  return 120; // 単語数の入力
}   
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * 文末の[...]を変更・削除
 */
function new_excerpt_more( $more ) {
  return '…'; // 変更したい文字の入力
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


/**
 * ビジュアルエディタ―用スタイルシートを有効化
 */
add_editor_style( 'assets/css/editor-style.css' );
// function wpdocs_theme_add_editor_styles() {
//   add_editor_style( 'editor-style.css' );
// }
// add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


/**
 * オリジナルショートコードの作成・追加
 */

/**
 * SNS
 */
function sns_share_button_shortcode( $atts ) {
  $html = '<div class="snsShare"><div class="snsShare_inner"><ul class="snsShare_buttonBox">' . "\n";
  $html .= '  <li class="snsShare_list"><a href="https://twitter.com/share" class="twitter-share-button" data-show-count="horizontal">Tweet</a></li>' . "\n"; // twitter
  $html .= '  <li class="snsShare_list"><div class="fb-share-button" data-href="" data-lazy="true" data-layout="button" data-size="small"><a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fhiromiyablog.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div></li>' . "\n"; // facebook
  $html .= '  <li class="snsShare_list"><a href="https://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></li>' . "\n"; // hatena bookmark
  $html .= '  <li class="snsShare_list"><div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url="' . get_the_permalink() . '" data-color="default" data-size="small" data-count="false" style="display: none;"></div></li>' . "\n"; // LINE
  $html .= '</ul>' . "\n";
  $html .= '</div></div>';
  return $html;
}
add_shortcode( 'sns_share_button', 'sns_share_button_shortcode' );

/**
 * SNS
 */
function sns_share_button_shortcode_with_text( $atts ) {
  $html = '<div class="snsShare"><div class="snsShare_inner snsShare_inner-withText"><ul class="snsShare_buttonBox snsShare_buttonBox-withText">' . "\n";
  $html .= '  <li class="snsShare_list"><a href="https://twitter.com/share" class="twitter-share-button" data-show-count="horizontal">Tweet</a></li>' . "\n"; // twitter
  $html .= '  <li class="snsShare_list"><div class="fb-share-button" data-href="" data-lazy="true" data-layout="button" data-size="small"><a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fhiromiyablog.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div></li>' . "\n"; // facebook
  $html .= '  <li class="snsShare_list"><a href="https://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></li>' . "\n"; // hatena bookmark
  $html .= '  <li class="snsShare_list"><div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url="' . get_the_permalink() . '" data-color="default" data-size="small" data-count="false" style="display: none;"></div></li>' . "\n"; // LINE
  $html .= '</ul>' . "\n";
  $html .= '<div class="snsShare_text">結果をシェアする</div>'; // シェアテキスト
  $html .= '</div></div>';
  return $html;
}
add_shortcode( 'sns_share_button_with_text', 'sns_share_button_shortcode_with_text' );
 

/**
 * 「Google AdSense」、記事内ディスプレイ広告（横長タイプ）
 */
function google_adsense_article_advertisement_horizontal_type( $atts ) {
  $html = '<!-- 記事内ディスプレイ広告（横長タイプ） -->' . "\n";
  $html .= '<ins class="adsbygoogle"' . "\n";
  $html .= '  style="display:block"' . "\n";
  $html .= '  data-ad-client="ca-pub-4705807784297073"' . "\n";
  $html .= '  data-ad-slot="1813786109"' . "\n";
  $html .= '  data-ad-format="auto"' . "\n";
  $html .= '  data-full-width-responsive="true"></ins>' . "\n";
  $html .= '<script>' . "\n";
  $html .= '  (adsbygoogle = window.adsbygoogle || []).push({});' . "\n";
  $html .= '</script>';
  return $html;
}
add_shortcode( 'google_adsense_article_advertisement', 'google_adsense_article_advertisement_horizontal_type' );


/**
 * 「simple membership」プラグイン
 */

/**
 * 「simple membership」プラグインの会員レベルの取得
 */
// function simple_membership_membership_level( $atts ) {
//   $auth = SwpmAuth::get_instance(); // simple membershipのインスタンス生成
//   $rank = SwpmPermission::get_instance($auth->get('membership_level')); // simple membershipの会員レベル情報を取得
//   return $rank;
// }


/**
 * ウィジェット機能の有効化
 */
function my_theme_widgets_init() {
  register_sidebar( array(
    'name' => 'Main Sidebar',
    'id' => 'main-sidebar',
  ) );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );


/**
 * キャッシュを利用しての閲覧履歴機能の追加設定
 */

/**
 * キャッシュの設定
 */
add_action( 'get_header', 'readpost' );
function readpost() {
  global $browsing_histories;
  $browsing_histories = null;
  $set_this_ID = null;

  if ( is_single() ) {
    if ( isset( $_COOKIE['browsing_history'] ) ) { // cookie「postid_history」があるか判定
      $browsing_histories = explode( ",", $_COOKIE['browsing_history'] ); // cookieの値を呼び出し

      if ( $browsing_histories[0] != get_the_ID() ) { // 値の先頭が現在の記事IDか判定
        if ( count( $browsing_histories ) >= 50 ) {
          $set_browsing_histories = array_slice( $browsing_histories , 0, 49 );
        } else {
          $set_browsing_histories = $browsing_histories;
        }

        $set_this_ID = get_the_ID().','.implode( ",", $set_browsing_histories ); // 値の先頭が現在の記事IDでなければ文字列の一番最初に追加
        setcookie( 'browsing_history', $set_this_ID, time() + 60 * 60 * 24 * 365 * 1,'/' );
      } else {
        $set_this_ID = $_COOKIE['browsing_history'];
      }
    } else { // cookieがなければ、現在の記事IDを保存
      $set_this_ID = get_the_ID();
      setcookie( 'browsing_history', $set_this_ID, time() + 60 * 60 * 24 * 365 * 1,'/' );
    }
  } else { // 詳細ページ以外なら呼び出しのみ
    if ( isset( $_COOKIE['browsing_history'] ) ){
      $browsing_histories = explode( ",", $_COOKIE['browsing_history'] );
    }
  }

  $postread = explode( ",", $_COOKIE['browsing_history'] );
  $postread = array_unique( $postread );
  $postread = array_values( $postread );
  return $postread;
}

/**
 * 出力の設定
 */
function readpost_typecheack( $postnum ) {
  $postdate = readpost();
  $numlist = 0;
  $cnt = count($postdate); // 配列の要素の数を取得

  if ( !empty( $postdate ) ):
  ?>
  <ul class="browsingHistory_listBox">
  <?php
    foreach ( $postdate as $key => $val ):
      $posttype = get_post_type( $val );
      $cat = get_the_category( $val );
      $cat_ID = $cat[0]->cat_ID;

    if ( $posttype === "post" && $cat_ID != 19 && $cat_ID != 23 ): // ここで記事かどうかを見る。（特定カテゴリー出ないかも見る※後で追加）

    if ( $postnum == $numlist ){ break; }
  ?>
    <li class="browsingHistory_list">
      <div class="browsingHistory_imageBox">
        <a class="browsingHistory_link" href="<?php echo get_permalink( $val ); ?>">
          <img src="<?php echo get_the_post_thumbnail_url( $val, "thumbnail" ); ?>" alt="<?php echo get_the_title( $val ); ?>" class="browsingHistory_image" loading="lazy">
        </a>
      </div>
      <div class="browsingHistory_textBox">
        <p class="browsingHistory_text">
          <span class="browsingHistory_textCategory">
            <?php $cat = get_the_category( $val ); ?>
            <?php $cat = $cat[0]; ?>
            <?php echo get_cat_name( $cat->term_id ); ?>
          </span>
          <span class="browsingHistory_textDate"><time><?php echo get_the_date('Y年m月d日', $val); ?></time></span>
        </p>
        <p class="browsingHistory_textTitle">
          <a class="browsingHistory_link" href="<?php echo get_permalink( $val ); ?>"><?php echo get_the_title( $val ); ?></a>
        </p>
      </div>
      <?php //print_r( $postcustom ); ?>
    </li>
  <?php
    $numlist++;
    endif;
    endforeach;
  ?>
  </ul>
  <?php if($postnum <= $cnt): ?>
    <p class="browsingHistory_readMore"><a href="<?php echo get_page_link( 367 ); ?>" class="browsingHistory_readMoreLink">閲覧履歴一覧へ</a></p>
  <?php endif; ?>
  <?php if(is_page('browsing-history-list')): ?>
    <p class="browsingHistory_notes">※最大<?php echo $postnum ?>件までの閲覧履歴が表示されます。キャッシュを削除されますと閲覧履歴が削除されますのでご注意ください。</p>
  <?php endif; ?>
  <?php
  endif;
}


/**
 * pre_get_postsアクションフックの設定
 * 除外設定関係
 */

/**
 * 検索結果から特定のカテゴリを除外
 */
// function mycus_search_filter_cat_func( $query ) {
//   if ( $query->is_search() && $query->is_main_query() && ! $query->is_admin() ) {
//       $cat_id = array( '2', '3' );
//       $query->set( 'category__not_in', $cat_id );
//   }
//   return $query;
// }
// add_filter( 'pre_get_posts', 'mycus_search_filter_cat_func' );

/**
 * pre_get_postsで、特定のカテゴリの記事を除外する
 */
function my_pre_get_posts($query) {
  // 管理画面,メインクエリに干渉しないために必須
  if ( is_admin() || ! $query->is_main_query() ) { // is_admin()：現在のクエリが管理画面かどうかを判断する、is_main_query()：現在のクエリがメインクエリかどうかを判断する
    return;
  }

  if ( $query->is_home() ) { // トップページの場合に処理
    $query->set( 'posts_per_page', '3' ); // 除外したいカテゴリのID番号を指定
    return;
  } else { // それ以外の場合に処理
    $query->set( 'category__not_in',array(2, 3) ); // 除外したいカテゴリのID番号を指定
    return;
  }
}
add_action( 'pre_get_posts', 'my_pre_get_posts' );

?>