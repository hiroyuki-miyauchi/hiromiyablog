<form action="<?php echo home_url('/'); ?>" method="get" class="search">
  <input type="text" name="s" value="<?php the_search_query();//検索が行われたときに、その検索キーワードを表示する ?>" placeholder="キーワードを入力" class="search_keywordInput">
  <label class="fas search_icon"><input name="submit" type="submit" value=""></label> 
</form>