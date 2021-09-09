<article id="post-<?php the_ID();//現在の投稿のIDを表示する。必ずループの中で使用する ?>" <?php post_class('news');//現在の投稿の種別に応じたクラス属性を表示する（引数１：別途追加するクラス名、引数２：表示される投稿のID（省略時は現在の投稿）） ?>>
  <div class="news_pic">
    <a href="<?php the_permalink();//投稿の個別ページのURL（パーマリンク）を表示する ?>">
      <?php if ( has_post_thumbnail() ) ://投稿記事にアイキャッチ画像が設定されているかを調べる ?>
        <?php the_post_thumbnail('medium', array("alt" => get_the_title(), "class" => "news_image", "loading" => "lazy"));//現在の投稿のアイキャッチ画像を表示する（引数１：画像のサイズ「thumbnail（サムネイル）、medium（中サイズ）、large（大サイズ）、full（フルサイズ※画像元サイズ）、array(100,100)（配列で他のサイズを指定）」、引数２：アイキャッチ画像取得時の属性。文字列、または連想配列で指定する） ?>
      <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="" loading="lazy">
      <?php endif; ?>
    </a>
  </div>
  <div class="news_meta">
    <?php the_category();//記事が属するカテゴリーへのリンクを表示。必ずループ中で使用する（引数１：カテゴリーへのリンクを区切る文字列。デフォルトではulタグとliタグでリンクを表示する、引数２：記事が子カテゴリーに属するときの表示方法。"、'single'、'multiple'のいずれかを指定、引数３：表示される投稿のID（省略時は現在の投稿）） ?>
    <time class="news_time" datetime="<?php the_time('Y-m-d');//パラメータで指定したフォーマットで投稿時刻を表示する（引数１：フォーマットを指定する文字列。省略時は管理画面の[設定]→[一般設定]のフォーマットが適用される。巻末の「日付と時刻の書式」参照） ?>"><?php the_time('Y年m月d日'); ?></time>
  </div>
  <dl>
    <dt class="news_title"><a href="<?php the_permalink(); ?>"><?php the_title();//現在の投稿のタイトルを表示、または取得する。必ずループの中で使用する（引数１：タイトルの前に置くテキスト（省略可）、引数２：タイトルの後に置くテキスト（省略可）、引数３：タイトルを表示するかどうか。trueなら表示（初期値はtrue）） ?></a></dt>
    <dd class="news_desc">
      <?php the_excerpt();//現在の投稿の抜枠を表示する。本文中の「続きを読む」ブロックまでのテキストを表示します。「続きを読む」ブロックがない場合は、55文字までを自動的に抜枠文として表示できます。55文字を超えた場合は、文末に「…」がつきます ?>
      <p class="readMore"><a href="<?php the_permalink(); ?>" class="readMore_button">Read More</a></p>
    </dd>
  </dl>
</article>