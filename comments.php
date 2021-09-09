<section class="comments">
<?php
$comment_form_args = array(
  // 'fields' => '', // コメント入力フォーム以外のフィールドを表示するWordPressのフィルター関数
  // 'comment_field' => '', // コメント入力フォームを表示するHTML
  // 'must_log_in' => '', // ログインしたユーザーのみコメントを付けられるようにしたときのHTML
  // 'logged_in_as' => '', // 「[ユーザー名]」として「ログインしています。ログアウトしますか？」という部分のHTML
  'comment_notes_before' => '', // コメント欄の前に表示するHTML
  // 'comment_notes_after' => '', // コメント欄の後ろに表示するHTML
  // 'id_form' => '', // formタグのid名
  // 'id_submit' => '', // submitタグのid名
  'title_reply' => 'コメント投稿フォーム', // 「コメントを残す」の表示テキスト
  // 'title_reply_to' => '', // コメントに対する「返信」の表示テキスト
  // 'cancel_reply_link' => '', // コメントに対する「返信」のキャンセルの表示テキスト
  // 'label_submit' => '', // 送信ボタンの表示テキスト
);
comment_form( '$comment_form_args' ); // コメントフォームを表示する（引数１：表示方法のパラメータを格納した配列、引数２：記事ID。デフォルトは表示しているページの記事ID）
if ( have_comments() ) : // コメントの状況を調べる。コメントが投稿されているときはtrue、投稿されていないときはfalseが返る
?>
  <p><?php comments_number('コメントはありません。', 'コメントが１件あります。', 'コメントが%件あります。'); // 投稿されているコメント数とテキストを表示する（引数１：コメントが０件の場合に表示する内容、引数２：コメントが１件の場合に表示する内容、引数３：コメントが２件以上の場合に表示するテキスト。%記号がコメント数と置き換えられる、引数４：%に代入するコメントの数（使用しない）） ?></p>
  <ol class="commentlist">
    <?php
    $wp_list_comments_args = array(
      'avatar_size' => '50' // アバターサイズを変更する（デフォルト値32px）※単位px
    );
    wp_list_comments( '$wp_list_comments_args' ); // 投稿されたコメントの一覧を表示する（引数１：表示方法に関するパラメータを格納した配列）
    ?>
  </ol>
<?php
$paginate_comments_links_args = array(
  'prev_text' => '←前のコメントページ', // 前へのテキスト変更（デフォルトは「≪前へ」）
  'next_text' => '次のコメントページ→', // 次へのテキスト変更（デフォルトは「次へ≫」）
);
paginate_comments_links( '$paginate_comments_links_args' ); // 分割されたページのページングリストを表示する（引数１：表示方法のパラメータを格納した配列、またはパラメータ名＝値）
endif;
?>
</section>
