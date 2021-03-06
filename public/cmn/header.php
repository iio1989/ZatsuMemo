<nav class="navbar navbar-light bg-light fixed-top">
  <div style="display: flex;">
    <img src="../cmn/image/zatsu_kanji_6.png" width="40" height="40" class="d-inline-block align-top" alt="">
    <div class="navbar-brand">&nbsp;<?php echo getSessionParam_checkExists('page_title'); ?></div>
  </div>
  <div style="display: flex;">
    <div class="navbar-brand">ログインID： <?php echo issetConvertHsc($login_user, "show_id");?></div>
    <div class="navbar-brand">ユーザ名： <?php echo issetConvertHsc($login_user, "name");?></div>    
    <div class="dropdown dropleft">
      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">メニュー</button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../memo/memoListView.php">メモリスト</a>
        <a class="dropdown-item" href="../user/userAccountView.php">アカウント</a>
        <a class="dropdown-item" href="../settings/settingsView.php">設定</a>
        <a class="dropdown-item" href="../special/specialView.php">追加コンテンツ</a>
        <a class="dropdown-item" href="../about/aboutView.php">ざつメモについて</a>
        <a class="dropdown-item" href="../login/logOutView.php">ログアウト</a>
      </div>
    </div>
  </div>
</nav>