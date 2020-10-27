<?php require_once('../cmn/util/includeCmnUtils.php'); ?>
<html>
  <head>
    <meta charset="UTF-8">
    <?php include('../cmn/headerTag.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/login.css?<?php echo getVersion();?>">
  </head>
  <body>
    <div class="login__main__div">
      <div>&nbsp;
        <h1><img src="../cmn/image/zatsu_kanji_1.png" alt="LOGO">&nbsp;<span>ざつメモ</span></h1>
      </div>
    <?php if (isset($errs['user_password'])) { ?>
      <div>
        <?php echo $errs['user_password']; ?>
      </div>
    <?php } ?>
      <form action="login.php" method="POST" class="form-group login__form">
        <input type="text" class="form-control login__form__input" name="user_id" placeholder="ID">
        <input type="password" class="form-control login__form__input" name="user_password" placeholder="PassWord">
        <input type="hidden" name="csrf_token" value="<?php echo setCsrfToken();?>">
        <input type="submit" class="btn btn-success login__submit__btn" value="ログイン">
      </form>
      <form action="trialLogin.php" method="POST">
        <input type="submit" class="btn btn-info login__submit__btn" value="お試しログイン" data-html="true"
         data-toggle="tooltip" data-placement="right" title="アカウント作成なしで、 <br /> お試しで機能を利用する場合、 <br /> こちらのボタンをクリックして下さい。">
        <input type="hidden" name="csrf_token" value="<?php echo setCsrfToken();?>">
      </form>
      <form action="../user/addUserView.php" method="POST" class="form-group">
        <input type="submit" class="btn btn-primary login__submit__btn" value="ユーザー作成 & ログイン">
      </form>
    </div>
    <?php include('../cmn/bodyUnderCmn.php'); ?>
    <script type="text/javascript" src="js/login.js?<?php echo getVersion();?>"></script>
  </body>
</html>