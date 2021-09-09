<?php get_header();//headerファイルを読み込む ?>

  <?php if ( have_posts() ) ://現在のWordPressクエリにループできる記事があるかどうかをチェックする ?>
    <?php while ( have_posts() ) : the_post();//ループ中の投稿情報をグローバル変数の$postにロードし、関連するグローバル変数を設定する ?>
      <h1 class="pageTitle"><?php the_title();//現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?><span><?php echo strtoupper($post->post_name);//グローバル変数「$post」に入っている表示する記事の情報から、「$post->post_name」と記述する事でスラックを表示する。スラッグは小文字なので「strtoupper」関数で大文字にする事ができる ?></span></h1>

      <?php get_template_part('template-parts/breadcrumb');// パンくずのPHPファイルを読み込む ?>

      <main class="main">
        <div class="container">
          <div class="content">
            <?php the_content();//記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>
          </div>
        </div>
      </main>
    <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer();//footerファイルを読み込む ?>