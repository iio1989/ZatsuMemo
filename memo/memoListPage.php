<?php

include('memoDao.php');
include('../cmn/util/cmnUtils.php');

// session
session_start();
$_SESSION['page_title'] = "メモリスト";

/** @var httpSession ログインユーザー情報 */
$login_user = $_SESSION['login_user'];

if (isset($_POST["delMemo"])) {
    //登録する時の処理
    delMemo();
} elseif (isset($_POST["updateMemo"])) {
    updateMemo();
} else {
    saveNewMemo($login_user["id"]);
}

// メモリスト取得
$memo = getMemo($login_user["id"]);

?>
<html>
<head>
    <meta charset="UTF-8">
    <?php include('../cmn/headerTag.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/memo.css">
</head>
<body>
    <?php include('../cmn/header.php'); ?>
    <!-- 新規登録form -->
    <form action="memoList.php" method="post" class="new__memo__form">
        <p>
            <a class="btn btn-light new__memo__save__btn" data-toggle="collapse" href="#collapseNewMemoForm"
             role="button" aria-expanded="true" aria-controls="collapseExample">入力フォーム(open/close)</a>
        </p>
        <div class="collapse show" id="collapseNewMemoForm">
            <div class="form-group">
                <input type="text" class="form-control" name="new_title" placeholder="メモタイトル">
                <textarea class="form-control" name="new_memo" placeholder="タイトル内容" rows="10"></textarea>
            </div>
            <input type="submit" class="btn btn-primary new__memo__save__btn" value="新規登録">
        </div>
    </form>
    <!-- メモ一覧 -->
    <?php if ($memo == "") { ?>
    <div>登録されているメモはありません。</div>
    <?php
    } else {
        include('parts/memoListDiv.php');
        include('parts/memoModal.php');
    }
    ?>
    <div><a href="../login/logOut.php">ログインアウト</a></div>
    <?php include('../cmn/bodyUnderCmn.php'); ?>
    <!-- 専用JS -->
    <script type="text/javascript" src="js/memo.js"></script>
</div>

</body>
</html>