<?php get_header();//headerファイルを読み込む ?>

  <h1 class="pageTitle">メニュー<span>MENU</span></h1>

  <?php get_template_part('template-parts/breadcrumb');// パンくずのPHPファイルを読み込む ?>

  <main class="main">
    <section class="sec">
      <div class="container">
        <div class="sec_header">
          <h2 class="title title-jp">フード</h2>
          <span class="title title-en">FOOD</span>
        </div>
        <div class="row justify-content-center">

          <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <div class="col-md-3">
                <?php get_template_part('template-parts/loop', 'menu');//ヘッダー、フッター、サイドバー以外の任意のテンプレートパーツを読み込む（引数１：一般テンプレートのスラッグ名（必須）、引数２：特定テンプレートの名前（省略可能）） ?>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </div>
    </section>
  </main>

<?php get_footer();//footerファイルを読み込む ?>
