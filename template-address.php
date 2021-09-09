<?php
/**
 * Template Name: 住所付きお問合せテンプレート
 * Description: サイドバーに住所も表示されるテンプレート
 */
?>

<?php get_header();//headerファイルを読み込む ?>

  <?php if ( have_posts() ) ://現在のWordPressクエリにループできる記事があるかどうかをチェックする ?>
    <?php while ( have_posts() ) : the_post();//ループ中の投稿情報をグローバル変数の$postにロードし、関連するグローバル変数を設定する ?>
      <h1 class="pageTitle"><?php the_title();//現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?><span><?php echo strtoupper($post->post_name);//グローバル変数「$post」に入っている表示する記事の情報から、「$post->post_name」と記述する事でスラックを表示する。スラッグは小文字なので「strtoupper」関数で大文字にする事ができる ?></span></h1>

      <?php get_template_part('template-parts/breadcrumb');// パンくずのPHPファイルを読み込む ?>

      <main class="main">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-9">
              <div class="content">
                <?php the_content();//記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>
              </div>
            </div>

            <div class="col-12 col-md-3">
              <div class="address">
                <div class="address_map">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3240.332798729691!2d139.7333802!3d35.6934272!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c5e412329bb%3A0x7db38e6732953dc!2z44CSMTYyLTA4NDYg5p2x5Lqs6YO95paw5a6_5Yy65biC6LC35bem5YaF55S677yS77yR4oiS77yR77yT!5e0!3m2!1sja!2sjp!4v1566456578905!5m2!1sja!2sjp"
                    frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
                <table class="address_table">
                  <tbody>
                    <tr>
                      <th>所在地</th>
                      <td>東京都新宿区市谷左内町21-13</td>
                    </tr>
                    <tr>
                      <th>電話番号</th>
                      <td>03-1234-5678</td>
                    </tr>
                    <tr>
                      <th>営業時間</th>
                      <td>17:00～翌2:00(L.O.翌1:00)</td>
                    </tr>
                    <tr>
                      <th>定休日</th>
                      <td>日曜日<br>※営業時間・定休日は変更となる場合がございます。</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer();//footerファイルを読み込む ?>