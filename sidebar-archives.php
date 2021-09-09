<aside class="archive">
  <h2 class="archive_title">アーカイブ 一覧</h2>
  <ul class="archive_list">
    <?php
    $args = array(
      'type' => 'monthly', // アーカイブ種別を指定（'daily'、'weekly'、'monthly'（月別）、'yearly'、'postbypost'、'alpha'など）
      'limit' => '10', // 表示件数（正数）
      'order' => 'DESC', // カテゴリーのソート順（並び順）。ASC＝昇順（初期値）、DESC＝降順
      //'show_post_count' => 'false' // 投稿件数を表示する場合はtrue、表示しない場合はfalse
    );
    wp_get_archives( $args );//アーカイブページへのリンク一覧を表示する（$args= type：表示するアーカイブリスト。文字列で指定する。'yearly'、'monthly'（デフォルト）、'daily'、'weekly'、'postbypost'（公開日時順）、'alpha'（タイトルのアルファベット順）、limit：取得するアーカイブ数（デフォルトは制限無し）、show_post_count：投稿数を表示するかどうか、echo：表示するかどうか）
    ?>
  </ul>
</aside>