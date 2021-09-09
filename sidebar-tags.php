<aside class="archive tags">
  <h2 class="archive_title tags_title">タグ 一覧</h2>
  <ul class="archive_list tags_listBox">
    <?php
    $args = array(
      'orderby' => 'count',
      'order' => 'desc',
      'number' => 30
    );
    $tags = get_terms('post_tag', $args);
    foreach($tags as $value) {
      echo '<li class="tags_list"><a href="'. get_tag_link($value->term_id) .'" class="tags_link">'. $value->name .' <span>('. $value->count .')</span></a></li>';
    }
    ?>
  </ul>
</aside>