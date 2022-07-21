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
<title><?php the_title(); ?></title>
<?php if( get_field('keywords') ) : // カスタムフィールドの「keywords」があるか判定 ?>
<meta name="keywords" content="hiromiya,プログラミング,独学,初心者,<?php the_field('keywords'); ?>">
<?php else : ?>
<meta name="keywords" content="hiromiyablog,hiromiya,ヒロミヤ,blog,html,css,javascript,jquery,wordpress,プログラミング,独学,初心者,経験,復習,学び,備忘録">
<?php endif; ?>
<link rel="icon" href="https://i0.wp.com/hiromiyablog.com/wp-content/uploads/2021/06/cropped-logo.jpg?fit=32%2C32&amp;ssl=1" sizes="32x32">
<link rel="icon" href="https://i0.wp.com/hiromiyablog.com/wp-content/uploads/2021/06/cropped-logo.jpg?fit=192%2C192&amp;ssl=1" sizes="192x192">
<link rel="apple-touch-icon" href="https://i0.wp.com/hiromiyablog.com/wp-content/uploads/2021/06/cropped-logo.jpg?fit=180%2C180&amp;ssl=1">
<meta name="msapplication-TileImage" content="https://i0.wp.com/hiromiyablog.com/wp-content/uploads/2021/06/cropped-logo.jpg?fit=270%2C270&amp;ssl=1">
<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/assets/css/default.min.css' type='text/css' media='all' />
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
<body>

<?php the_content(); // 記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>

<div class="googleAdSenseHorizontal">
  <?php get_template_part('template-parts/googleAdSense-multiplex'); // 「GoogleA dSense」横長タイプを読み込む ?>
</div><!-- /.googleAdSenseHorizontal -->

<?php if ( get_field('html_codes_body') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('html_codes_body') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
<?php if ( get_field('css_codes_body') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('css_codes_body') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
<?php if ( get_field('javascript_codes_body') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('javascript_codes_body') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>

<!-- Google AdSense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4705807784297073" crossorigin="anonymous"></script>
<!-- /Google AdSense end -->

<style>
.googleAdSenseHorizontal {
  text-align: center;
  margin: 150px auto;
}
</style>
</body>
</html>