<?php
/**
 * Template Name: テンプレートなし
 * Description: heder、footerなし、最低限のもののみ読み込み。HTMLを直接入力してコンテンツを作成する為のテンプレートです。
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="hiroyuki miyauchi">
<?php if ( is_home() ) : // homeのみ読み込み ?>
  <meta name="keywords" content="hiromiyablog,hiromiya,ヒロミヤ,blog,html,css,javascript,jquery,wordpress,プログラミング,独学,初心者,経験,復習,学び,備忘録">
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/img/home/main_visual.jpg" as="image">
<?php else : // home以外読み込み ?>
  <?php if( get_field('keywords') ) : // カスタムフィールドの「keywords」があるか判定 ?>
  <meta name="keywords" content="hiromiya,プログラミング,独学,初心者<?php the_field('keywords'); ?>">
  <?php endif; ?>
  <?php if( get_the_post_thumbnail() ) : // アイキャッチ画像があるか判定 ?>
  <link rel="preload" href="<?php the_post_thumbnail_url(); // アイキャッチ画像のURLのみ取得 ?>" as="image">
  <?php endif; ?>
<?php endif; ?>

<?php // CSS（全ページ読み込み）
wp_enqueue_style('hiromiyablog-default', get_template_directory_uri() . '/assets/css/default.min.css', array(), '1.0.0');
?>

<?php wp_head(); // WordPressのプラグインなどの機能が使えなくなるので入れるのが推奨されている ?>

<?php if ( get_field('html_codes_head') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('html_codes_head') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
<?php if ( get_field('css_codes_head') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('css_codes_head') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
<?php if ( get_field('javascript_codes_head') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('javascript_codes_head') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); // body要素の直後に何かを挿入する際に使用するwp_body_openアクションを実行する ?>

<div id="wrapper">


<?php the_content(); // 記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>


<?php wp_footer(); // WordPressのプラグインなどの機能が使えなくなるので入れるのが推奨されている ?>

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