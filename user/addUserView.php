<?php
include('../cmn/util/csrfUtils.php');
?>
<html>
  <head>
    <meta charset="UTF-8">
    <?php include('../cmn/headerTag.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/userAccount.css">
  </head>
  <body>
    <div class="user__account__add">
      <h1>ユーザー登録</h1>
      <form action="addUser.php" method="POST" class="form-group">
        <input type="text" name="newUser_id" class="form-control user__account__add__input" placeholder="ID">
        <input type="text" name="newUser_name" class="form-control user__account__add__input" placeholder="ユーザー名(任意)">
        <input type="password" name="newUser_password" class="form-control user__account__add__input" placeholder="PassWord">
        <input type="hidden" name="csrf_token" value="<?php echo setCsrfToken();?>">
        <input type="submit" class="btn btn-primary user__account__add__submit" value="新規ユーザー作成">
      </form>
      <div><a href="../login/loginView.php">既存ユーザーでのログインはこちらから</a></div>
    </div>
</body>
</html>