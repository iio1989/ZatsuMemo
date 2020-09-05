<?php
// セッション開始
session_start();
// セッション変数を全て削除
$_SESSION = array();
// セッションクッキーを削除
if (isset($_COOKIE["PHPSESSID"])) {
    //setcookie("PHPSESSID", '', time() - 1800, '/');
}
// セッションの登録データを削除
session_destroy();

?>

<html>
<head>
  <meta charset="UTF-8">
  <?php include('../cmn/headerTag.php'); ?>
</head>
<body>
  <div style="margin-left: auto;margin-right: auto;text-align: left;width: 400px;margin-top: 80px;">
      <div class="">&nbsp;
		  <h1><img src="../cmn/image/zatsu_kanji_1.png" alt="LOGO">&nbsp;<span>ログアウト</span></h1>
	  </div>
      <div style="margin-top: 50px;"><a href="loginPage.php">ログインはこちらから</a></div>
  </div>
</body>
</html>
