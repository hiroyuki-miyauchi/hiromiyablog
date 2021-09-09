<li id="post-<?php the_ID(); // 現在の投稿のIDを表示する。必ずループの中で使用する ?>" <?php post_class('nextTimePreview_list'); // 現在の投稿の種別に応じたクラス属性を表示する（引数１：別途追加するクラス名、引数２：表示される投稿のID（省略時は現在の投稿）） ?>>
  <?php if ( has_post_thumbnail() ) : // 投稿記事にアイキャッチ画像が設定されているかを調べる ?>
    <div class="nextTimePreview_imageBox"><?php the_post_thumbnail("thumbnail", array("alt" => get_the_title(), "class" => "nextTimePreview_image", "loading" => "lazy")); // 現在の投稿のアイキャッチ画像を表示する（引数１：画像のサイズ「thumbnail（サムネイル）、medium（中サイズ）、large（大サイズ）、full（フルサイズ※画像元サイズ）、array(100,100)（配列で他のサイズを指定）」、引数２：アイキャッチ画像取得時の属性。文字列、または連想配列で指定する） ?></div>
  <?php else : ?>
    <div class="nextTimePreview_imageBox"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="" loading="lazy" class="nextTimePreview_image"></div>
  <?php endif; ?>
  <p class="nextTimePreview_title"><?php the_title(); // 現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?></p>
</li>