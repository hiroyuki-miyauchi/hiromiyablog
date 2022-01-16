<aside class="archive">
  <?php get_search_form(); // 検索フォームを読み込む ?>
</aside>
<!-- <?php //get_sidebar('googleAdSense'); // 「Google AdSense」の読み込み ?> -->
<!-- <aside class="archive" style="display: none !important;">
  <?php //echo do_shortcode('[swpm_login_form]'); // 「Simple Membership」のログインフォーム取得 ?>
</aside> -->
<?php get_sidebar('latests'); // 現在のテーマディレクトリからサイドバーファイルを読み込む（引数１：パラメータがあった場合、sidebar-'パラメータ'.phpファイルを読み込む） ?>
<?php get_sidebar('categories'); ?>
<?php get_sidebar('tags'); ?>
<?php get_sidebar('archives'); ?>