<?php

include('../user/userDao.php');
include('../cmn/util/cmnUtils.php');

include('../memo/memoDao.php');
include('export/userMemoExport.php');

// session
session_start();
$_SESSION['page_title'] = "設定";

/** @var httpSession ログインユーザー情報 */
$login_user = $_SESSION['login_user'];

$login_user_id = $login_user["id"];
$login_user_name = $login_user["name"];

?>

<html>
<head>
    <meta charset="UTF-8">
    <?php include('../cmn/headerTag.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/special.css">
</head>
<body>
    <?php include('../cmn/header.php'); ?>    
    <div>
      <div>作成中</div>
      <div class="text-center"><a href="../memo/memoListView.php">メモリスト画面へ移動する</a></div>
    </div>
    <?php include('../cmn/bodyUnderCmn.php'); ?>
</body>
</html>