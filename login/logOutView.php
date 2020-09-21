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
    <link rel="stylesheet" type="text/css" href="css/login.css">
  </head>
  <body>
    <div class="login__main__div">
      <div>&nbsp;
		    <h1><img src="../cmn/image/zatsu_kanji_1.png" alt="LOGO">&nbsp;<span>ログアウト</span></h1>
	    </div>
      <div class="logOut__login__link"><a href="loginView.php">ログインはこちらから</a></div>
    </div>
  </body>
</html>