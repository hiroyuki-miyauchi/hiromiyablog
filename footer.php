<div class="pagetop js-pagetop"><i class="fas fa-angle-up"></i>PAGE TOP</div>
<div class="pageTop js-pagetop js-displayWhenScrolling"><span class="pageTop_icon"></span></div>

<?php if ( is_home() ) : // homeのみ読み込み ?>
  <?php get_template_part('template-parts/fixed-homeNavigation'); // 固定ナビゲーションを読み込む（ホーム・サイドバーなし） ?>
<?php elseif ( is_page(array('42', '44', '38', '94', '303')) ) : ?>
  <?php get_template_part('template-parts/fixed-homeNavigation'); // 固定ナビゲーションを読み込む（ホーム・サイドバーなし） ?>
<?php else : // home以外読み込み ?>
  <?php get_template_part('template-parts/fixed-navigation'); // 固定ナビゲーションを読み込む（ホーム・サイドバーあり） ?>
<?php endif; ?>

</div><!-- /#wrapper end -->

<footer class="footer">
  <div class="footer_container">
    <div class="footer_inner">
      <nav>
        <?php
        $args = array(
          'menu' => 'global-navigation', // 管理画面で作成したメニューの名前
          'menu_class' => '', // メニューを構成するulタグのクラス名
          'container' => false, // <ul>タグを囲んでいる<div>タグを削除
        );
        wp_nav_menu($args);
        ?>
      </nav>
      <p class="footer_privacyPolicy"><?php the_privacy_policy_link(); // プライバシーポリシーのパーマリンクを取得 ?></p>

      <ul class="footer_sns">
        <li class="footer_snsList"><a href="https://twitter.com/hiromiyablog" target="_blank" rel="noopener noreferrer" class="footer_snsLink"><i class="fab fa-twitter"></i></a></li>
        <li class="footer_snsList"><a href="https://www.facebook.com/hiromiyablog" target="_blank" rel="noopener noreferrer" class="footer_snsLink"><i class="fab fa-facebook-f"></i></a></li>
        <li class="footer_snsList"><a href="https://www.instagram.com/hiromiyablog/" target="_blank" rel="noopener noreferrer" class="header_snsLink"><i class="fab fa-instagram"></i></a></li>
      </ul>

      <div class="footer_copyright">
        <small>&copy; 2020 - <?php echo date('Y'); // 現在の西暦を取得 ?> <?php bloginfo('name'); // サイトのタイトルを取得 ?></small>
      </div>
    </div>
  </div>
</footer>

<?php // JS
if ( is_home() ) {
  // トップページのみ読み込み
} else if ( is_page(array('42', '44', '38', '94', '303')) ) {
  // 固定ページ関係のみ読み込み
}else {
  // その他、投稿ページなど
  wp_enqueue_script('hiromiyablog-accordion', get_template_directory_uri() . '/assets/js/accordion.min.js', array( 'jquery' ), '1.0.0', true);
}

wp_enqueue_script('jquery'); // jQueryを読み込む
wp_enqueue_script('hiromiyablog-main', get_template_directory_uri() . '/assets/js/main.min.js', array( 'jquery' ), '1.0.0', true);
wp_enqueue_script('hiromiyablog-fixedNavigation', get_template_directory_uri() . '/assets/js/fixedNavigation.min.js', array( 'jquery' ), '1.0.0', true);

if ( is_home() ) {
  // トップページのみ読み込み
  //wp_enqueue_style('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.0.0');
  //wp_enqueue_script('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.0.0', true);
  //wp_enqueue_script('hiromiyablog-home', get_template_directory_uri() . '/assets/js/home.min.js', array( 'jquery' ), '1.0.0', true);
} else if ( is_page(array('42', '44', '38', '94', '303')) ) {
  // 固定ページ関係のみ読み込み
}else {
  // その他、投稿ページなど
}
?>

<?php wp_footer(); // WordPressのプラグインなどの機能が使えなくなるので入れるのが推奨されている ?>

<!-- Google AdSense -->
<!-- <script data-ad-client="ca-pub-4705807784297073" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- /Google AdSense end -->

<!-- twitter -->
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<!-- /twitter end -->

<!-- facebook -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v9.0" nonce="q0TmWWYs"></script>
<!-- /facebook end -->

<!-- hatena bookmark -->
<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<!-- /hatena bookmark end -->

<!-- LINE -->
<script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<!-- /LINE end -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-179107583-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-179107583-3');
</script>
<!-- /Global site tag (gtag.js) - Google Analytics end -->

<?php if ( get_field('html_codes_body') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('html_codes_body') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
<?php if ( get_field('css_codes_body') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('css_codes_body') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
<?php if ( get_field('javascript_codes_body') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('javascript_codes_body') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
</body>
</html>