<?php get_header(); // headerファイルを読み込む ?>

  <div class="pageTitle noText"></div>

  <?php get_template_part('template-parts/breadcrumb'); // パンくずのPHPファイルを読み込む ?>

  <main class="main">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-9">
          <?php if ( have_posts() ) : // 現在のWordPressクエリにループできる記事があるかどうかをチェックする ?>
            <?php while ( have_posts() ) : the_post(); // ループ中の投稿情報をグローバル変数の$postにロードし、関連するグローバル変数を設定する ?>
            <article id="post-<?php the_ID(); // 現在の投稿のIDを表示する。必ずループの中で使用する ?>" <?php post_class('article'); // 現在の投稿の種別に応じたクラス属性を表示する（引数１：別途追加するクラス名、引数２：表示される投稿のID（省略時は現在の投稿）） ?>>
              <header class="article_header">
                <h1 class="article_title"><?php the_title(); // 現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?></h1>
              </header>

              <div class="browsingHistory">
                <div class="browsingHistory_inner browsingHistory_inner-noTitle">
                  <?php readpost_typecheack(50); // この設定だと最新(n)件の閲覧履歴（キャッシュ）を表示 ?>
                </div>
              </div>
            </article>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>

        <div id="sideNavigation" class="col-12 col-md-3 js-sideNavigation">
          <?php get_template_part('template-parts/side-navigation'); // サイドナビを読み込む ?>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); // footerファイルを読み込む ?>