<div class="breadcrumb">
  <div class="breadcrumb_inner">
    <?php
    if ( function_exists( 'bcn_display' ) ) {// 指定した関数が定義されているかを調べる（引数１：関数名。定義されている場合はtrue、ない場合はfalseが返る）
      bcn_display();// Breadcrumb NavXTプラグインが用意している関数を実行しパンくずを実行した箇所に表示
    }
    ?>
  </div>
</div>