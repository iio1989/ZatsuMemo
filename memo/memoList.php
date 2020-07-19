<?php

include('memoEntity.php');
include('../cmn/cmnUtils.php');

// session
session_start();
$user_id = $_SESSION['user_id'];

// 新規登録関連 パラメータ
$new_memo = getParam_checkExists('new_memo');
$new_title = getParam_checkExists('new_title');

// 削除登録関連 パラメータ
$del_memoId = getParam_checkExists('del_memoId');

// 更新登録関連 パラメータ
$update_memoId = getParam_checkExists('update_memoId');
$update_title = getParam_checkExists('update_title');
$update_memo = getParam_checkExists('update_memo');

// 新規登録実行
saveNewMemo($user_id, $new_memo, $new_title);
// 削除登録実行
delMemo($del_memoId);
// 更新登録実行
updateMemo($user_id, $update_memoId, $update_title, $update_memo);
// メモリスト取得
$memo = getMemo($user_id);

?>
<html>
<head><meta charset="UTF-8"></head>
<body>
    <!-- タイトル -->
    <h1>memo画面</h1>
    <p>ログインしたId：<?php echo $user_id; ?></p>
    <div>memoListDiv</div>
    <!-- 新規登録form -->
    <form action="memoList.php" method="post">
        <input type="text" name="new_title">
        <textarea name="new_memo"></textarea>
        <input type="submit" value="新規登録">
    </form>
    <!-- メモ一覧 -->
    <hr>
    <?php if ($memo == "") { ?>
    <div>登録されているメモはありません。</div>
    <?php
    } else {
        include('parts/memoListDiv.php');
    }
    ?>
    <div><a href="../login/logOut.php">ログインアウト</a></div>
</body>
</html>