<?php get_header(); // headerファイルを読み込む ?>

  <div class="pageTitle">最新情報</div>

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
                  <div class="article_meta">
                    <?php the_category(); // 記事が属するカテゴリーへのリンクを表示。必ずループ中で使用する（引数１：カテゴリーへのリンクを区切る文字列。デフォルトではulタグとliタグでリンクを表示する、引数２：記事が子カテゴリーに属するときの表示方法。"、'single'、'multiple'のいずれかを指定、引数３：表示される投稿のID（省略時は現在の投稿）） ?>
                    <time class="news_time" datetime="<?php the_time('Y-m-d'); // パラメータで指定したフォーマットで投稿時刻を表示する（引数１：フォーマットを指定する文字列。省略時は管理画面の[設定]→[一般設定]のフォーマットが適用される。巻末の「日付と時刻の書式」参照） ?>"><?php the_time('Y年m月d日'); ?></time>
                  </div>
                </header>

                <div class="article_body">
                  <div class="content">
                    <?php the_content(); // 記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>
                  </div>

                  <?php //comments_template(); // 投稿ページや固定ページのコメント情報を取得し、コメント欄の表示・投稿用のテンプレートファイルを読み込む（引数１：コメントテンプレート（デフォルトはcomments.php）、引数２：各コメントを区切る場合はtrueを指定する） ?>
                </div>

                <div class="postLinks">
                  <div class="postLink postLink-prev"><?php previous_post_link('<i class="fas fa-chevron-left"></i>%link'); // 前後の記事へのリンクとタイトルを表示する（引数１：リンクの前後に追加する文字。デフォルトは「≪%link」「%link≫」、引数２：表示するリンクのテキスト。デフォルトは記事のタイトル、引数３：表示させたくない記事のカテゴリーID。複数カテゴリーを除外する場合は配列、もしくはカンマ区切りにする、引数４：タクソノミー（CHAPTER5の5-03参照）。$in_same_termがtrueの場合に有効。デフォルトはcategory） ?></div>
                  <div class="postLink postLink-next"><?php next_post_link('%link<i class="fas fa-chevron-right"></i>'); ?></div>
                </div>
              </article>
            <?php endwhile; ?>
          <?php endif; ?>

          <div class="relatedArticle">
            <div class="relatedArticle_inner">
              <h3 class="relatedArticle_title">あなたにオススメの記事</h3>
              <div class="row">
                <?php
                $args = array(
                  'posts_per_page' => 3, // 表示する件数
                  'orderby' => 'date', // 日付でソート
                  'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
                  'category_name' => 'mind' // 表示したいカテゴリーのスラッグを指定
                  //'tag' => 'aesthetics' // 表示したいタグのスラッグを指定
                );
                $posts = get_posts( $args );
                ?>
                  <?php if ( $posts ): ?>
                    <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                      <div class="col-md-4">
                        <?php get_template_part('template-parts/loop', 'news'); // ヘッダー、フッター、サイドバー以外の任意のテンプレートパーツを読み込む（引数１：一般テンプレートのスラッグ名（必須）、引数２：特定テンプレートの名前（省略可能）） ?>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            </div>
          </div><!-- /relatedArticle end -->
        </div>

        <div class="col-12 col-md-3">
          <?php get_template_part('template-parts/side-navigation'); // サイドナビを読み込む ?>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); // footerファイルを読み込む ?>