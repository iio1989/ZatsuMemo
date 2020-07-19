<?php

include('../cmn/cmnUtils.php');
include('../cmn/DB.php');

error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_USER_DEPRECATED & ~ E_NOTICE);
  
/** @var httpParam 入力パスワード */
$password = getParam_checkExists('user_password');
/** @var httpParam 入力ユーザーID */
$user_id = getParam_checkExists('user_id');

// 未入力チェック
$errs = array();
if (checkPass($user_id, $password)) {
    $errs['user_password'] = "パスワードもしくは、IDが合っていません。";
} else { // ログインOKパターン
    session_start();
    $_SESSION['user_password'] = $password;
    $_SESSION['user_id'] = $user_id;
    header("Location: ../memo/memoList.php", true, 303);
    exit();
}

/**
 * パスワードチェックを行います。
 *
 * @param integer $user_id
 * @param string $password
 * @return boolean true or false
 */
function checkPass($user_id, $password)
{
    try {
        // SQL作成
        $sql = "SELECT * FROM user WHERE show_id = :show_id";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':show_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $data["user_pass"])) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
    <h1>メモ画面遷移失敗</h1>
<?php if (isset($errs['password'])) { ?>
    <div><?php echo $errs['password']; ?></div>
<?php } else { ?>
    <div>エラーなし</div>
<?php } ?>
    <p>Id：<?php echo $userl_id;?></p>
    <p>PassWord：<?php echo $password; ?></p>
</body>
</html>