<?php

require_once('../cmn/util/includeCmnUtils.php');

// session
session_start();
$_SESSION['page_title'] = "ざつメモについて";

?>

<html>
 <head>
  <meta charset="UTF-8">
  <?php include('../cmn/headerTag.php'); ?>
  <link rel="stylesheet" type="text/css" href="css/about.css?<?php echo getVersion();?>">
 </head>
 <body>
  <?php include('../cmn/header.php'); ?>    
  <div class="about_main">
    <div class="card">
      <div class="card-body">
        <label>バージョン：<?php echo getVersion(); ?></label>
      </div>
    </div>
    <div class="text-center"><a href="../memo/memoListView.php">メモリスト画面へ移動する</a></div>
  </div>
  <?php include('../cmn/bodyUnderCmn.php'); ?>
</body>
</html>