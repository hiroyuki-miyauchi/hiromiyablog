<div class="fixedNavigation">
  <div class="fixedNavigation_inner">
    <ul class="fixedNavigation_listBox">
      <li class="fixedNavigation_list fixedNavigation_list-menu js-fixedNavigation" data-fixed-navigation-list="headerLinks"><i class="fas fa-bars"></i><span class="fixedNavigation_iconText">MENU</span></li>
      <li class="fixedNavigation_list fixedNavigation_list-search js-fixedNavigation" data-fixed-navigation-list="fixedNavigationSearch"><i class="fas fa-search"></i><span class="fixedNavigation_iconText">SEARCH</span></li>
      <li class="fixedNavigation_list fixedNavigation_list-pageTop js-fixedNavigation" data-fixed-navigation-list="pageTop"><i class="fas fa-chevron-circle-up"></i><span class="fixedNavigation_iconText">PAGE TOP</span></li>
    </ul>
  </div>
</div>

<div id="fixedNavigationSearch" class="fixedNavigationSearch">
  <div class="fixedNavigationSearch_inner">
    <?php get_search_form(); // 検索フォームを読み込む ?>
  </div>
  <div class="fixedNavigationClose js-fixedNavigationClose">
    <div class="fixedNavigationClose_inner">
      <span class="fixedNavigationClose_line fixedNavigationClose_lineTop"></span>
      <span class="fixedNavigationClose_line fixedNavigationClose_lineBottom"></span>
    </div>
  </div>
</div>