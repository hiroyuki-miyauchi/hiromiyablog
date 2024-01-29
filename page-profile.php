<?php get_header();//headerファイルを読み込む ?>

  <?php if ( have_posts() ) ://現在のWordPressクエリにループできる記事があるかどうかをチェックする ?>
    <?php while ( have_posts() ) : the_post();//ループ中の投稿情報をグローバル変数の$postにロードし、関連するグローバル変数を設定する ?>
      <main class="main main-lp">
        <div class="container">
          <?php the_content(); // 記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>

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
                <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-default">お問い合わせフォーム<i class="fas fa-angle-right"></i></a>
              </div>
            </div>
          </section>
        </div>
      </main>
    <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer();//footerファイルを読み込む ?>