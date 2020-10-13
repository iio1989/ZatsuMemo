<?php include(dirname(__FILE__).'/public/cmn/util/includeCmnUtils.php'); ?>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../public/cmn/lib/bootstrap-4.5.0-dist/css/bootstrap.min.css?<?php echo getVersionIndexPage();?>">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self' 'unsafe-inline' <?php echo $_SERVER['HTTP_HOST'];?>; img-src 'self' data: <?php echo $_SERVER['HTTP_HOST'];?>;">
    <link rel="stylesheet" type="text/css" href="../public/login/css/login.css?<?php echo getVersionIndexPage();?>">
  </head>
  <body>
    <div class="login__main__div">
      <div>&nbsp;
        <h1><img src="../public/cmn/image/zatsu_kanji_1.png" alt="LOGO">&nbsp;<span>ざつメモ</span></h1>
      </div>
    <?php if (isset($errs['user_password'])) { ?>
      <div>
        <?php echo $errs['user_password']; ?>
      </div>
    <?php } ?>
      <form action="../public/login/login.php" method="POST" class="form-group login__form">
        <input type="text" class="form-control login__form__input" name="user_id" placeholder="ID">
        <input type="password" class="form-control login__form__input" name="user_password" placeholder="PassWord">
        <input type="hidden" name="csrf_token" value="<?php echo setCsrfToken();?>">
        <input type="submit" class="btn btn-success login__submit__btn" value="ログイン">
      </form>
      <form action="../public/login/trialLogin.php" method="POST">
        <input type="submit" class="btn btn-info login__submit__btn" value="お試しログイン">
        <input type="hidden" name="csrf_token" value="<?php echo setCsrfToken();?>">
      </form>
      <form action="../public/user/addUserView.php" method="POST" class="form-group">
        <input type="submit" class="btn btn-primary login__submit__btn" value="ユーザー作成 & ログイン">
      </form>
    </div>
  </body>
</html>