<?php

require_once('../cmn/util/includeCmnUtils.php');
include('../user/userDao.php');
include('../memo/memoDao.php');
include('export/userMemoExport.php');

session_start();
$_SESSION['page_title'] = "追加コンテンツ";

/** @var httpSession ログインユーザー情報 */
$login_user = $_SESSION['login_user'];
/** @var ログインユーザーID */
$login_user_id = $login_user["id"];

if (isset($_POST["user_id"])) {
    csvExport(getMemoList($_POST["user_id"]));
}
?>
<html>
 <head>
  <meta charset="UTF-8">
  <?php include('../cmn/headerTag.php'); ?>
  <link rel="stylesheet" type="text/css" href="css/special.css?<?php echo getVersion();?>">
 </head>
 <body>
  <?php include('../cmn/header.php'); ?>    
  <div class="special_main">
    <div class="card">
      <div class="card-body">
        <!-- メモ全量Export -->
        <form action="specialView.php" method="post">
          <label>メモ全量text出力</label>
          <div>
            <input type="hidden" name="user_id" value="<?php echo $login_user_id; ?>">
            <input type="submit" class="btn btn-primary" value="出力" style="width: 100%;">
          </div>
        </form>
      </div>
    </div>
    <div class="text-center"><a href="../memo/memoListView.php">メモリスト画面へ移動する</a></div>
  </div>
  <?php include('../cmn/bodyUnderCmn.php'); ?>
</body>
</html>