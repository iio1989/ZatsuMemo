<?php

include('../user/userDao.php');
include('../cmn/util/cmnUtils.php');

include('../memo/memoDao.php');
include('export/userMemoExport.php');

// session
session_start();
$_SESSION['page_title'] = "追加コンテンツ";

/** @var httpSession ログインユーザー情報 */
$login_user = $_SESSION['login_user'];

$login_user_id = $login_user["id"];
$login_user_name = $login_user["user_name"];


if (isset($_POST["user_id"])) {
    csvExport(getMemoList($_POST["user_id"]));
}


?>

<html>
<head>
    <meta charset="UTF-8">
    <?php include('../cmn/headerTag.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/special.css">
</head>
<body>
    <?php include('../cmn/header.php'); ?>    
    <div class="special_main">
      <div class="card">
        <div class="card-body">
          <!-- メモ全量Export -->
          <form action="specialPage.php" method="post">
            <label>メモ全量text出力</label>
            <div>
              <input type="hidden" name="user_id" value="<?php print $login_user_id; ?>">
              <input type="submit" class="btn btn-primary" value="出力" style="width: 100%;">
            </div>
          </form>
        </div>
      </div>
      <div class="text-center"><a href="../memo/memoListPage.php">メモリスト画面へ移動する</a></div>
    </div>
    <?php include('../cmn/bodyUnderCmn.php'); ?>
    <script type="text/javascript" src="../cmn/js/special.js"></script>
</body>
</html>