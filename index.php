<?php get_header(); // headerファイルを読み込む ?>

  <h1 class="pageTitle">最新情報</h1>

  <?php get_template_part('template-parts/breadcrumb'); // パンくずのPHPファイルを読み込む ?>

  <main class="main">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-9">
          <?php if ( is_month() ) : // 月別のアーカイブページが表示されている場合の条件分岐 ?>
            <h2 class="main_title"><?php the_time('Y年m月'); ?></h2>
          <?php else: ?>
            <h2 class="main_title"><?php wp_title('', true); ?></h2>
          <?php endif; ?>
          <div class="row">

            <?php if ( have_posts() ) : ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4">
                  <?php get_template_part('template-parts/loop', 'news'); // ヘッダー、フッター、サイドバー以外の任意のテンプレートパーツを読み込む（引数１：一般テンプレートのスラッグ名（必須）、引数２：特定テンプレートの名前（省略可能）） ?>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>

          </div>

          <?php if ( function_exists( 'wp_pagenavi' ) ) { wp_pagenavi(); }; // WP-PageNaviプラグインによるページナビゲーション（ページネーション）を表示 ?>
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