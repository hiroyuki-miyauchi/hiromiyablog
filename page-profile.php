<?php get_header();//headerファイルを読み込む ?>

  <?php if ( have_posts() ) ://現在のWordPressクエリにループできる記事があるかどうかをチェックする ?>
    <?php while ( have_posts() ) : the_post();//ループ中の投稿情報をグローバル変数の$postにロードし、関連するグローバル変数を設定する ?>
      <main class="main main-lp">
        <div class="container">
          <section class="profile">
            <header class="profile_header">
              <h1 class="profile_headerTitle">プロフィール<span>PROFILE</span></h1>
              <div class="profile_desc">
                <p class="profile_descText"><?php the_field('desc'); // 入力されたテキスト表示する ?></p>
              </div>
            </header>

            <div class="profile_body">
              <div class="profile_inner">
                <div class="profile_content">
                  <div class="profile_imageBox">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile/hiro.jpg" alt="" loading="lazy" class="profile_image">
                  </div>
                  <div class="profile_textBox">
                    <h2 class="profile_title">hiromiya（宮内 裕幸）</h2>
                    <p class="profile_text">某企業でフロントエンドエンジニアとして活躍！<br>独学からはじめ、HTML、CSS、JavaScriptなどを中心にweb関連の仕事をしています。<br>真面目で内気なオタク男子と思われたりしており、<br>内気な心の中には宇宙より壮大な好奇心が秘められているかもしれないです！笑<br>※<a href="https://www.wantedly.com/id/h_miyauchi_0410" target="_blank" rel="noopener noreferrer">Wantedlyプロフィール</a></p>
                  </div>
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
                <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-default">お問い合わせフォーム<i class="fas fa-angle-right"></i></a>
              </div>
            </div>
          </section>
        </div>
      </main>
    <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer();//footerファイルを読み込む ?>