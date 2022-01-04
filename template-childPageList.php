<?php
/**
 * Template Name: 子ページリスト
 * Description: heder、footer以外何もない状態、HTMLを直接入力してコンテンツを作成する為のテンプレートです。
 */
?>
<?php get_header(); // headerファイルを読み込む ?>

<?php if ( have_posts() ) : // 現在のWordPressクエリにループできる記事があるかどうかをチェックする ?>
  <?php while ( have_posts() ) : the_post(); // ループ中の投稿情報をグローバル変数の$postにロードし、関連するグローバル変数を設定する ?>
    <h1 class="pageTitle"><?php the_title(); // 現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?><span><?php echo strtoupper($post->post_name); // グローバル変数「$post」に入っている表示する記事の情報から、「$post->post_name」と記述する事でスラックを表示する。スラッグは小文字なので「strtoupper」関数で大文字にする事ができる ?></span></h1>

    <?php get_template_part('template-parts/breadcrumb'); // パンくずのPHPファイルを読み込む ?>

    <main class="main">
      <div class="container">
        <div class="content">
          <?php the_content(); // 記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>
          <?php
            $parent_id = get_the_ID(); // 今表示されている親ページのIDを取得
            $args = array( // 今表示している親ページに属する子ページのデータを取得
            'posts_per_page' => -1, // 何件取得するかを指定（「-1」だと「全部」取得）
            'post_type' => 'page', // 投稿タイプを指定（「page」は「固定ページ」を取得）
            'orderby' => 'menu_order', // WordPress管理画面で設定した並び順をもとに表示する
            'order' => 'ASC', // 「昇順」で表示する（「降順」に場合は、「DESC」と記述）
            'post_parent' => $parent_id, // どの親からデータを取得してくるか？を指定
            );

            $common_pages = new WP_Query( $args ); // 取得した子ページのデータを変数「common_pages」に格納
            if( $common_pages->have_posts() ): // 指定した子ページのデータを取得
              while( $common_pages->have_posts() ): $common_pages->the_post(); // 子ページデータ分を繰り返し処理
          ?>
            <a href="<?php the_permalink(); // 子ページのURLを取得 ?>">
              <div><?php the_post_thumbnail(); // 記事に紐付いたアイキャッチ画像を取得 ?></div>
              <p><?php the_title(); // 子ページのタイトルを取得 ?></p>
              <p><?php echo get_the_excerpt(); // 記事の抜粋データを取得（抜粋データがない場合には、記事の本文を出力） ?></p>
            </a>
          <?php
              endwhile;
              wp_reset_postdata(); // 今はサブクエリのデータを参照しているけど、参照をメインクエリに戻してという意味の処理
            endif;
          ?>
        </div>
      </div>
    </main>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); // footerファイルを読み込む ?>
