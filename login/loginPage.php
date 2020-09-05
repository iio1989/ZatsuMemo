<html>
<head>
  <meta charset="UTF-8">
  <?php include('../cmn/headerTag.php'); ?>
</head>
<body>
  <div style="margin-left: auto;margin-right: auto;text-align: left;width: 400px;margin-top: 80px;">
    <div>&nbsp;
		  <h1><img src="../cmn/image/zatsu_kanji_1.png" alt="LOGO">&nbsp;<span>ざつメモ</span></h1>
	  </div>
    <?php if (isset($errs['user_password'])) { ?>
    <div>
      <?php echo $errs['user_password']; ?>
    </div>
    <?php } ?>
    <form action="login.php" method="POST" class="form-group" style="width:400px;margin-top: 30px;">
      <input type="text" class="form-control" name="user_id" placeholder="ID" style="margin-top: 10px;">
      <input type="password" class="form-control" name="user_password" placeholder="PassWord" style="margin-top: 10px;">
      <input type="submit" class="btn btn-success" value="ログイン" style="margin-top: 10px;width:100%;">
    </form>
    <form>
    <input type="submit" class="btn btn-info" value="お試しログイン" style="margin-top: 10px;width:100%;">
    </form>
  </div>
</body>
</html>