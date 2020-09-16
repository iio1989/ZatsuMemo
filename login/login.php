<?php

include('../cmn/util/cmnUtils.php');
include('../cmn/util/csrfUtils.php');

include('../cmn/util/DB.php');
include('../user/userDao.php');

error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_USER_DEPRECATED & ~ E_NOTICE);

session_start();
checkCsrTokenWhenLogin(getParam_checkExists('csrf_token')); // csrfチェック

/** @var httpParam 入力パスワード */
$password = getParam_checkExists('user_password');
/** @var httpParam 入力ユーザーID */
$user_id = getParam_checkExists('user_id');
/** @var userInfo ユーザー情報 */
$login_user = selectUser($user_id);

$errs = array();
if (!$login_user) { // ユーザー存在チェック
    $errs['login_error'] = "ユーザー情報が存在しません。";
}

if (!password_verify($password, $login_user["user_pass"])) { // パスワードNGパターン
    $errs['login_error'] = "パスワードもしくは、IDが合っていません。";
} else { // ログインOKパターン
    $_SESSION['user_password'] = $password;
    $_SESSION['login_user'] = $login_user;
    $_SESSION['csrf_token'] = $_POST['csrf_token'];
    header("Location: ../memo/memoListPage.php", true, 303);
    exit();
}
?>

<html>
<head><meta charset="UTF-8"></head>
<body>
    <h1>メモ画面遷移失敗</h1>
<?php if (isset($errs['login_error'])) { ?>
    <div><?php echo $errs['login_error']; ?></div>
<?php } else { ?>
    <div>エラーなし</div>
<?php } ?>
    <p>Id：<?php echo $userl_id;?></p>
    <p>PassWord：<?php echo $password; ?></p>
    <div><a href="loginPage.php">ログイン画面へ移動する</a></div>
    <div><a href="../user/addUserPage.php">ユーザー新規登録画面へ移動する</a></div>
</body>
</html>