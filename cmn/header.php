<?php
// ページタイトル設定処理
$page_title = "";
if (isset($_SESSION['page_title'])) {
    $page_title = $_SESSION['page_title'];
}
?>
<nav class="navbar navbar-light bg-light fixed-top">
  <div style="display: flex;">
    <img src="../cmn/image/zatsu_kanji_1.png" width="40" height="40" class="d-inline-block align-top" alt="">
    <div class="navbar-brand">&nbsp;<?php echo $page_title; ?></div>
  </div>
  <div style="display: flex;">
    <div class="navbar-brand">ログインID： <?php echo $login_user["show_id"]; ?></div>
    <div class="navbar-brand">ユーザ名： <?php echo $login_user["name"]; ?></div>    
    <div class="dropdown dropleft">
      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">メニュー</button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../memo/memoListPage.php">メモリスト</a>
        <a class="dropdown-item" href="../user/userAccountPage.php">アカウント</a>
        <a class="dropdown-item" href="../settings/settingsPage.php">設定</a>
        <a class="dropdown-item" href="../special/specialPage.php">追加コンテンツ</a>
        <a class="dropdown-item" href="../about/aboutPage.php">ざつメモについて</a>
        <a class="dropdown-item" href="../login/logOut.php">ログアウト</a>
      </div>
    </div>
  </div>
</nav>