<?php
$args = array(
  'post_type' => 'post', // 投稿記事だけを指定
  'posts_per_page' => 3, // 最新記事を○件表示
  'cat' => array(-1, -3), // 指定カテゴリIDの除外（-をつけると除外）
);
$the_query = new WP_Query( $args ); // 「$the_query」変数に「new WP_Query(配列)」の形でクエリを記述し格納
?>
<?php if ( $the_query->have_posts() ) : // $the_queryにループできる記事があるかどうかをチェックする ?>
<aside class="archive">
  <h2 class="archive_title">最新記事</h2>
  <ul class="archive_list">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </li>
    <?php endwhile; ?>
  </ul>
</aside>
<?php endif; ?>
<?php wp_reset_postdata(); // 投稿データをリセットする（new WP_Query()を使うとWordPressループで使われているグローバルな投稿データが変わるため、リセットする必要があるためです。独自のWordPressループを作ったときには、whileが終わった段階でwp_reset_postdata()でリセットしておいた方が良い） ?>
