<section class="menu">
  <a href="<?php the_permalink();//投稿の個別ページのURL（パーマリンク）を表示する ?>">
    <figure class="menu_pic">
      <?php if ( has_post_thumbnail() ) ://投稿記事にアイキャッチ画像が設定されているかを調べる ?>
        <?php the_post_thumbnail('medium');//現在の投稿のアイキャッチ画像を表示する（引数１：画像のサイズ「thumbnail（サムネイル）、medium（中サイズ）、large（大サイズ）、full（フルサイズ※画像元サイズ）、array(100,100)（配列で他のサイズを指定）」、引数２：アイキャッチ画像取得時の属性。文字列、または連想配列で指定する） ?>
      <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="" loading="lazy">
      <?php endif; ?>
    </figure>
    <h3 class="menu_title"><?php the_title();//現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?></h3>
    <p class="menu_price">800円</p>
    <div class="menu_desc">
      <?php the_excerpt();//現在の投稿の抜枠を表示する。本文中の「続きを読む」ブロックまでのテキストを表示します。「続きを読む」ブロックがない場合は、55文字までを自動的に抜枠文として表示できます。55文字を超えた場合は、文末に「…」がつきます ?>
    </div>
  </a>
</section>