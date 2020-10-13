<?php

require_once('../cmn/util/includeCmnUtils.php');
include('userDao.php');

error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_USER_DEPRECATED & ~ E_NOTICE);

session_start();
checkCsrTokenWhenLogin(getParam_checkExists('csrf_token')); // csrfチェック

$newUserId = getParam_checkExists('newUser_id');
$password = getParam_checkExists('newUser_password');
$newUserName = getParam_checkExists('newUser_name');
if ($newUserName === "") {
    $newUserName = "名無し";
}

/** @var array エラー情報 */
$errs = array();
if ($newUserId === "" || $password === "") { // ユーザー存在チェック
    $errs['addUser_error'] = "ID or パスワード が未入力です。";
} else {
    if (selectUserByShowId($newUserId)) {
        $errs['addUser_error'] = "入力されたIDは既に存在するため、ユーザーを作成できませんでした。別のIDを入力してください。";
    } else {
        // ユーザー追加処理実行
        addUser($newUserId, $newUserName, $password, USER_TYPE_NORMAL);
        $_SESSION['login_user'] = selectUserByShowId($newUserId);
        $_SESSION['csrf_token'] = $_POST['csrf_token'];
        header("Location: ../memo/memoListView.php", true, 303);
        exit();
    }
}
?>

<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1>エラー発生</h1>
<?php if (isset($errs['addUser_error'])) { ?>
  <p><?php echo $errs['addUser_error'] ?></p>  
<?php } else {?>
  <p>エラーが発生し、ユーザー登録を行えませんでした。</p>
<?php }?>
  <div><a href="addUserView.php">新規登録画面に戻る</a></div>
  <div><a href="../login/loginView.php">ログイン画面に移動する</a></div>
</body>
</html>
