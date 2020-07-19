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
</head>
<body>
    <h1>ログアウトページ</h1>
    <div>ログアウトしました。</div>
    <div><?php echo $errs['user_password']; ?></div>
    <div>エラーなし</div>
    <a href="loginPage.php">ログインpege</a>
</body>
</html>