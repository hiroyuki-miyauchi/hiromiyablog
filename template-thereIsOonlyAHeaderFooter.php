<?php
/**
 * Template Name: ヘッダー・フッターのみあり
 * Description: heder、footer以外何もない状態、HTMLを直接入力してコンテンツを作成する為のテンプレートです。
 */
?>
<?php get_header(); // headerファイルを読み込む ?>
<?php the_content(); // 記事の本文すべて、または一部を表示する（引数１：ページを分割したいときに表示される区切りの文字。省略時は（more…）が表示される、引数２：ページを分割するかどうか。trueで分割、falseで分割しない（省略時はfalse）、引数３：現バージョンでは使われていない） ?>
<?php get_footer(); // footerファイルを読み込む ?>
