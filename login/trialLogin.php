<?php

require_once('../cmn/util/includeCmnUtils.php');
include('../user/userDao.php');

/** ユーザータイプ お試し */
define("TRIAL_USER_SHOW_ID", "TRIAL000X");

error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_USER_DEPRECATED & ~ E_NOTICE);

session_start();
checkCsrTokenWhenLogin(getParam_checkExists('csrf_token')); // csrfチェック

// ユーザー追加処理実行
addUser(TRIAL_USER_SHOW_ID, "お試しユーザー", "お試し", USER_TYPE_TRIAL);
$_SESSION['login_user'] = selectUserByShowId(TRIAL_USER_SHOW_ID);
$_SESSION['csrf_token'] = $_POST['csrf_token'];
header("Location: ../memo/memoListView.php", true, 303);
exit();

?>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1>エラー発生</h1>
  <p>エラーが発生し、お試しログインを行えませんでした。</p>
  <div><a href="addUserView.php">新規登録画面に戻る</a></div>
  <div><a href="../login/loginView.php">ログイン画面に移動する</a></div>
</body>
</html>