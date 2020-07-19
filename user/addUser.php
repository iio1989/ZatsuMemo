<?php

include('userEntity.php');

error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_USER_DEPRECATED & ~ E_NOTICE);

$newUserId = $_POST['newUser_id'];
$password = $_POST['newUser_password'];

// パスワード復元
$password = password_hash($password, PASSWORD_DEFAULT);

// ユーザー追加処理実行
addUser($newUserId, $password);

?>

<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1>ユーザー登録が完了しました。</h1>
  <p>Id：<?php echo $newUserId;?>
  </p>
  <p>PassWord：<?php echo $password;?>
  </p>
  <a href="addUserPage.php">新規登録画面に戻る</a>
  <a href="../login/loginPage.php">ログイン画面に移動する</a>
</body>
</html>
