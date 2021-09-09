<?php get_header();//headerファイルを読み込む ?>

  <h2 class="pageTitle">メニュー<span>MENU</span></h2>

  <?php get_template_part('template-parts/breadcrumb');// パンくずのPHPファイルを読み込む ?>

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <main class="main">
        <section class="sec">
          <div class="container">
            <div class="article article-menu">
              <div class="row">
                <div class="col-12 col-md-6">
                  <h2 class="article_title"><?php the_title();//現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?></h2>
                  <div class="content">
                    <?php the_content();//記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="article_pic">
                    <?php
                    $pic = get_field('pic'); // 特定のキーからカスタムフィールドの値を取得する（引数１：カスタムフィールド名、引数２：データを取得したい投稿のID（省略可）、引数３：定型フォーマットを生成するかどうか。デフォルトはtrue。falseにするとデータベースの情報がそのまま出力される）
                    $pic_url = $pic['sizes']['large']; // 大サイズ画像のURL
                    ?>
                    <img src="<?php echo $pic_url; // 画像を表示 ?>" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>

            <div class="info">
                <div class="container">
                    <ul class="info_list">
                        <li>
                            <b>価格</b>
                            <span><?php the_field('price'); // 入力されたテキスト表示する ?></span>
                        </li>
                        <li>
                            <b>カロリー</b>
                            <span><?php echo number_format( get_field('calorie') ); // ３桁ごとにカンマで区切りにして表示する ?> kcal</span>
                        </li>
                        <li>
                            <b>アレルギー</b>
                            <span>
                              <?php
                              $allergies = get_field('allergies'); // カスタムフィールドの値を配列で取得する
                              foreach ($allergies as $key => $allergy) { // foreachを使って配列を表示
                                echo $allergy;
                                if ( $allergy != end( $allergies ) ) { // 配列の最後の値以外は、最後に「、」を出力するようにend関数を使用する
                                  echo '、';
                                }
                              }
                              ?>
                            </span>
                        </li>
                        <li>
                            <b>予約</b>
                            <?php if ( get_field('reservation') ) : // if文でget_field('reservation')の条件判定を行い、チェックがされているときはtrueの方に、チェックがないときはfalseの方を表示する ?>
                              <span>必要あり</span>
                            <?php else : ?>
                              <span>必要なし</span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
      </main>
    <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer();//footerファイルを読み込む ?>
