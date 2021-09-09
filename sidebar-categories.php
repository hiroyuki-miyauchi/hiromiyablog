<aside class="archive">
  <h2 class="archive_title">カテゴリ 一覧</h2>
  <ul class="archive_list">
    <?php
    $args = array(
      'title_li' => '', // カテゴリーリストの外側に表示するタイトルと表示形式。デフォルトは “_Categories”。このパラメータを中味を空で指定すると、カテゴリーリストの外側には何も表示しません。
      'exclude' => '-19,-23',
      'orderby' => 'slug', // カテゴリーのリストのソート（並び順）。name＝カテゴリー名のアルファベット順（初期値）、ID＝カテゴリーID、slug＝カテゴリースラッグ、count＝カテゴリーの投稿数、term_group＝タームグループ
      'order' => 'ASC', // カテゴリーのソート順（並び順）。ASC＝昇順（初期値）、DESC＝降順
      'show_count' => '0', // 各カテゴリーに属する投稿数を表示させるかどうか。1 (true)＝表示、0 (false)＝非表示（初期値）
      'hide_empty' => '1' // 投稿のないカテゴリーも表示させるか否か。1 (true)＝空カテゴリーを隠す（初期値）、0 (false)＝全て表示
    );
    wp_list_categories( $args ); // カテゴリーページへのリンク一覧を表示する（$args= title：見出し（省略時は「カテゴリー」）、show_count：投稿数を表示するかどうか。表示する場合はtrue（省略時はfalse）、depth：ulタグとliタグを使用した階層付きでマークアップされたHTMLを表示するか。liタグのみで階層なしの場合はfalseを指定、orderby：ソート対象。対象には'ID'、'name'、'slug'、'count'、'term_group'を使用（省略時は'name'）、order：ソート順。'ASC'は昇順、'DESC'は降順（省略時は'ASC'）、hide_empty：投稿記事がないカテゴリーを表示するかどうか。表示する場合はfalse（省略時はtrue））
    ?>
  </ul>
</aside>