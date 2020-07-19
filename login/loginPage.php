<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>ログインページ</h1>
<?php if (isset($errs['user_password'])) { ?>
    <div>
<?php echo $errs['user_password']; ?>
    </div>
<?php } else { ?>
    <div>エラーなし</div>
<?php } ?>
    <form action="login.php" method="POST">
        <p>Id：<input type="text" name="user_id"></p>
        <p>PassWord：<input type="password" name="user_password"></p>
        <p><input type="submit" value="ログイン"></p>
    </form>
</body>
</html>