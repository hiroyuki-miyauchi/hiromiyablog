<?php get_header(); // headerファイルを読み込む ?>

  <?php if ( is_home() ): ?>
  <div class="mainVisual">
    <div class="mainVisual_item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/main_visual.jpg')">
      <div class="mainVisual_itemInner">
        <p class="mainVisual_desc"><?php bloginfo('description'); ?></p>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <section class="sec">
    <div class="container">
      <header class="sec_header">
        <h2 class="title">最新情報<span>NEWS</span></h2>
      </header>

      <div class="row">
        <?php
        $args = array(
          'post_type' => 'post', // 投稿記事だけを指定
          'posts_per_page' => 3, // 最新記事を○件表示
          'cat' => array(-1, -3), // 指定カテゴリIDの除外（-をつけると除外）
        );
        $the_query = new WP_Query( $args ); // 「$the_query」変数に「new WP_Query(配列)」の形でクエリを記述し格納
        ?>
        <?php if ( $the_query->have_posts() ) : // $the_queryにループできる記事があるかどうかをチェックする ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="col-md-4">
              <?php get_template_part('template-parts/loop', 'news'); // ヘッダー、フッター、サイドバー以外の任意のテンプレートパーツを読み込む（引数１：一般テンプレートのスラッグ名（必須）、引数２：特定テンプレートの名前（省略可能）） ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); // 投稿データをリセットする（new WP_Query()を使うとWordPressループで使われているグローバルな投稿データが変わるため、リセットする必要があるためです。独自のWordPressループを作ったときには、whileが終わった段階でwp_reset_postdata()でリセットしておいた方が良い） ?>
      </div>

      <!-- <p class="sec_btn">
        <?php
        //$news = get_term_by('slug', 'news', 'category'); // ID、名前、スラッグを指定してカテゴリー・タグなどのターム情報を取得する（引数１：'ID'、'slug'、'name'などの検索する値のフィールド名、引数２：検索する値、引数３：'category'、'post_tag'のようなタクソノミー名、引数４：OBJECT、ARRAY_A、ARRAY_Nの中から出力時の型を指定（省略時はOBJECT）、引数５：フィルター名（省略時は'raw'））
        //$news_link = get_term_link($news, 'category'); // カテゴリーなどのタームページのリンクを取得（引数１：タームのIDかオブジェクトを指定、引数２：タクソノミー名を指定）
        ?>
        <a href="<?php //echo $news_link; ?>" class="btn btn-default">最新情報の一覧<i class="fas fa-angle-right"></i></a>
      </p> -->

    </div>
  </section>

  <section class="sec bg-gray">
    <div class="container">
      <header class="sec_header">
        <h2 class="title">次回予告<span>NEXT TIME PREVIEW</span></h2>
      </header>

      <div class="nextTimePreview">
        <ul class="nextTimePreview_inner">
        <?php
          $args = array(
            'post_type'      => 'post', // 投稿タイプの指定、post（投稿）・page（固定ページ）・revision（履歴）・pnav_menu_item（ナビゲーションメニュー）・カスタム投稿タイプ（任意のカスタム投稿タイプ名）
            'post_status'    => array( 'draft', 'pending', 'future' ), // 投稿ステータスの指定、publish（公開された投稿もしくは固定ページ）・pending（レビュー待ちの投稿）・draft（下書きの投稿）・auto-draft（コンテンツのない、新規作成された投稿）・future（予約公開設定された投稿）・private（ログインしていないユーザーからは見えない投稿）・inherit（リビジョン：履歴）・trash（ゴミ箱に入った投稿）・any（'trash' と 'auto-draft' を除き、すべてのステータスの投稿）
            'cat' => array( -1, -3 ), // カテゴリーの指定（カテゴリIDを指定。省きたいものは -（マイナス）を付けて指定。）
            //'category_name' => 'info, code', // カテゴリーの指定（カテゴリスラッグを指定。, 区切りで指定するとそれらのいずれかを持つ投稿を、+ 区切りで指定するとそれら全てを持つ投稿を取得できる。）
            //'category__and' => array( 1, 6 ), // カテゴリーの指定（カテゴリIDを配列で指定。指定したIDのカテゴリをすべて含む投稿を取得できる。）
            //'category__in' => array( 1, 6 ), // カテゴリーの指定（カテゴリIDを配列で指定。指定したIDのカテゴリのいずれかを含む投稿を取得できる。）
            //'category__not_in' => array( 19, 23 ), // カテゴリーの指定（カテゴリIDを配列で指定。指定したIDのカテゴリを含まない投稿を取得できる。）
            'order'          => 'ASC', // 昇順（ASC） or 降順（DESC）の指定
            'orderby'        => 'date', // 何順で並べるかの指定、title（タイトル）・date（日付）・modified（更新日）・ID（投稿ID）・rand（ランダム）・comment_count（コメント数）・author（著者）
            'posts_per_page' => 3 // 取得する投稿数の指定（全件表示したい場合は-1を指定）
          );
          $the_query = new WP_Query( $args );
          if($the_query->have_posts()): // 現在のWordPressクエリにループできる記事があるかどうかをチェックする
        ?>
        <?php while($the_query->have_posts()): $the_query->the_post(); ?>
          <?php get_template_part('template-parts/loop', 'nextTimePreview'); // ヘッダー、フッター、サイドバー以外の任意のテンプレートパーツを読み込む（引数１：一般テンプレートのスラッグ名（必須）、引数２：特定テンプレートの名前（省略可能）） ?>
        <?php endwhile; ?>
        <?php else: // 投稿データが取得できない場合の処理 ?>
          <li class="nextTimePreview_list">
            <p class="nextTimePreview_undecided">次回掲載予定の記事は現在未定です、予定決まり次第こちらに表記致します。</p>
          </li>
        <?php endif; wp_reset_postdata(); ?>
        </ul>
      </div>

    </div>
  </section>

  <section class="sec">
    <div class="container">
      <header class="sec_header">
        <h2 class="title">カテゴリー<span>CATEGORY</span></h2>
      </header>

      <div class="row category">
        <div class="col-md-6 category_list">
          <a href="<?php echo esc_url( get_category_link( 10 ) ); // このカテゴリーのURLを取得 ?>" class="bnr" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/programming.jpg')">
            <div class="bnr_inner">プログラミング<span>PROGRAMMING</span></div>
          </a>
        </div>
        <div class="col-md-6 category_list">
          <a href="<?php echo esc_url( get_page_link( 384 ) ); // この固定ページのURLを取得 ?>" class="bnr" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/demo.jpg')">
            <div class="bnr_inner">デモページ一覧<span>DEMO PAGE LIST</span></div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="sec bg-gray">
    <div class="container">
      <header class="sec_header">
        <h2 class="title">タグ一覧<span>TAG</span></h2>
      </header>

      <div class="tags">
        <ul class="tags_listBox">
          <?php
          $args = array(
            'orderby' => 'count',
            'order' => 'desc',
            'number' => 30
          );
          $tags = get_terms('post_tag', $args);
          foreach($tags as $value) {
            echo '<li class="tags_list"><a href="'. get_tag_link($value->term_id) .'" class="tags_link">'. $value->name .' <span>('. $value->count .')</span></a></li>';
          }
          ?>
        </ul>
      </div>

    </div>
  </section>

  <section class="sec">
    <div class="container">
      <header class="sec_header">
        <h2 class="title">閲覧履歴<span>BROWSING HISTORY</span></h2>
      </header>

      <div class="browsingHistory browsingHistory-frontPage">
        <div class="browsingHistory_inner browsingHistory_inner-frontPage browsingHistory_inner-noTitle">
          <?php readpost_typecheack(3); // この設定だと最新(n)件の閲覧履歴（キャッシュ）を表示 ?>
        </div>
      </div>
    </div>
  </section>

  <section class="sec bg-gray">
    <div class="container">
      <header class="sec_header">
        <h2 class="title">サイト情報<span>INFORMATION</span></h2>
      </header>

      <div class="row">
        <div class="col-md-6">
          <a href="<?php echo get_permalink( 38 ); // 投稿または固定ページのパーマリンクを取得する。（引数１：投稿または固定ページなどの記事ID、引数２：投稿名あるいは固定ページ名を保持するかどうか（デフォルトはfalse）） ?>" class="bnr" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/about.jpg')">
            <div class="bnr_inner">このサイトについて<span>ABOUT</span></div>
          </a>
        </div>

        <div class="col-md-6">
          <a href="<?php echo get_permalink( 94 ); ?>" class="bnr" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/profile.jpg')">
            <div class="bnr_inner">プロフィール<span>PROFILE</span></div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="sec sec-bg">
    <div class="sec_inner">
      <header class="sec_header">
        <h2 class="title">お問い合わせ<span>CONTACT</span></h2>
      </header>

      <div class="sec_body contact">
        <!-- <div class="contact_icon">
          <i class="fas fa-phone"></i>
        </div> -->
        <div class="contact_body">
          <p>
            お気軽にお問い合わせ、またはご相談ください
            <!-- <span>03-1234-5678</span> -->
          </p>
        </div>
      </div>

      <div class="sec_btn">
        <a href="<?php echo home_url( '/contact/' ); ?>" class="btn btn-default">お問い合わせ<i class="fas fa-angle-right"></i></a>
      </div>
    </div>
  </section>

<?php get_footer(); // footerファイルを読み込む ?>
