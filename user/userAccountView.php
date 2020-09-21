<?php

include('../user/userDao.php');
include('../cmn/util/cmnUtils.php');

session_start();
$_SESSION['page_title'] = "アカウント";

/** @var httpSession ログインユーザー情報 */
$login_user = $_SESSION['login_user'];
/** @var ログインユーザーID */
$login_user_id = $login_user["id"];

if (isset($_POST["new_user_show_id"])) {
    updateUser_showIdAndName($login_user_id, $_POST["new_user_show_id"], $_POST["new_user_name"]);
    $updateUser = selectUserById($login_user_id);
    $_SESSION['login_user'] = $updateUser;
    $login_user = $updateUser;
} elseif (isset($_POST["new_user_pass"]) and isset($_POST["new_user_pass_re"])) {
    if ($_POST["new_user_pass"] !== $_POST["new_user_pass_re"]) {
        $_POST["new_pass_err"] = true;
    } else {
        updateUser_pass($login_user_id, $_POST["new_user_pass"]);
    }
}
?>
<html>
  <head>
    <meta charset="UTF-8">
    <?php include('../cmn/headerTag.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/userAccount.css">
  </head>
  <body>
    <?php include('../cmn/header.php'); ?>
    <div class="user__account__form">
      <form class="form__id__name" method="post">
        <div>ユーザーID：<input type="text" class="form-control" name="new_user_show_id" placeholder="ユーザーID" value="<?php echo $login_user["show_id"]; ?>"></div>
        <div>ユーザー名：<input type="text" class="form-control" name="new_user_name" placeholder="ユーザー名" value="<?php echo $login_user["name"]; ?>"></div>
        <input type="submit" class="btn btn-primary" value="更新" style="width: 100%;">
      </form>
      <form class="form__pass" method="post">
        <?php if (isset($_POST["new_pass_err"])) { ?>
        <div>エラー パスワード新 と パスワード再の入力内容が異なります。</div>
        <?php } ?>
        <div>パスワード(新)<input type="password" class="form-control" name="new_user_pass" placeholder="パスワード(新)"></div>
        <div>パスワード(再)<input type="password" class="form-control" name="new_user_pass_re" placeholder="パスワード(再)"></div>
        <input type="submit" class="btn btn-primary" value="更新" style="width: 100%;">
      </form>
      <div class="text-center"><a href="../memo/memoListView.php">メモリスト画面へ移動する</a></div>
    </div>
    <?php include('../cmn/bodyUnderCmn.php'); ?>
  </body>
</html>