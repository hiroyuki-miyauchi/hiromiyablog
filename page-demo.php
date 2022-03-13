<?php get_header(); // headerファイルを読み込む ?>

  <h1 class="pageTitle"><?php the_title();//現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?><span><?php echo strtoupper($post->post_name);//グローバル変数「$post」に入っている表示する記事の情報から、「$post->post_name」と記述する事でスラックを表示する。スラッグは小文字なので「strtoupper」関数で大文字にする事ができる ?></span></h1>

  <?php get_template_part('template-parts/breadcrumb'); // パンくずのPHPファイルを読み込む ?>

  <main class="main">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-9">
          <?php if ( have_posts() ) : // 現在のWordPressクエリにループできる記事があるかどうかをチェックする ?>
            <?php while ( have_posts() ) : the_post(); // ループ中の投稿情報をグローバル変数の$postにロードし、関連するグローバル変数を設定する ?>
            <article id="post-<?php the_ID(); // 現在の投稿のIDを表示する。必ずループの中で使用する ?>" <?php post_class('article'); // 現在の投稿の種別に応じたクラス属性を表示する（引数１：別途追加するクラス名、引数２：表示される投稿のID（省略時は現在の投稿）） ?>>

              <div class="article_body">
                <div class="content">
                  <?php the_content(); // 記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>
                </div>

                <?php //comments_template(); // 投稿ページや固定ページのコメント情報を取得し、コメント欄の表示・投稿用のテンプレートファイルを読み込む（引数１：コメントテンプレート（デフォルトはcomments.php）、引数２：各コメントを区切る場合はtrueを指定する） ?>
              </div>

            </article>
            <?php endwhile; ?>
          <?php endif; ?>

          <div class="googleAdSenseHorizontal">
            <?php get_template_part('template-parts/googleAdSense-horizontal'); // 「GoogleA dSense」横長タイプを読み込む ?>
          </div>

          <div class="browsingHistory">
            <div class="browsingHistory_inner">
              <h2 class="browsingHistory_title">閲覧履歴</h2>
              <?php readpost_typecheack(3); // この設定だと最新(n)件の閲覧履歴（キャッシュ）を表示 ?>
            </div>
          </div>
        </div>

        <div id="sideNavigation" class="col-12 col-md-3 js-sideNavigation">
          <?php get_template_part('template-parts/side-navigation'); // サイドナビを読み込む ?>
          <div class="fixedNavigationClose js-fixedNavigationClose">
            <div class="fixedNavigationClose_inner">
              <span class="fixedNavigationClose_line fixedNavigationClose_lineTop"></span>
              <span class="fixedNavigationClose_line fixedNavigationClose_lineBottom"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); // footerファイルを読み込む ?>