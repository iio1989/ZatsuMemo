<?php

include('memoDao.php');
include('../cmn/util/cmnUtils.php');
include('../cmn/util/csrfUtils.php');

session_start();
$_SESSION['page_title'] = "メモリスト"; // ページヘッダ文字列設定用

checkCsrToken(getSessionParam_checkExists('csrf_token')); // csrfチェック

/** @var httpSession ログインユーザー情報 */
$login_user = $_SESSION['login_user'];

$selectMemo = "";
$memoList = "";
if (isset($_POST["selectMemoId"])) {
    // 既存メモForm表示処理
    if ($_POST["selectMemoId"] !== "") { // メモ一覧よりメモを選択している場合、メモ内容をFormに反映する。
        $selectMemo = getMemo($_POST["selectMemoId"]);
    }
    $memoList = getMemoList($login_user["id"]);
} elseif (isset($_POST["delMemoId"])) {
    delMemo(); // メモ削除処理
    $memoList = getMemoList($login_user["id"]);
} elseif (isset($_POST["updateMemo"])) {
    updateMemo(); // 既存メモ更新処理
    $memoList = getMemoList($login_user["id"]);
} elseif (isset($_POST["memoModalSearchText"])) { // 検索実行時
    $memoList = getMemoListBySearch($login_user["id"], getParam_checkExists("searchMatchType"), getParam_checkExists("memoModalSearchText"));
} elseif (isset($_POST["memoBody"])) {
    saveNewMemo($login_user["id"]); // 新規メモ作成
    $memoList = getMemoList($login_user["id"]);
} else {
    $memoList = getMemoList($login_user["id"]); // メモリスト取得(初期表示、新規メモ作成・更新処理・メモ削除後の更新表示)
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <?php include('../cmn/headerTag.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/memo.css">
    <link rel="stylesheet" type="text/css" href="../cmn/lib/trix-editor/trix.css">
    <script type="text/javascript" src="../cmn/lib/trix-editor/trix.js"></script>
</head>
<body>
    <!-- ヘッダー -->
    <?php include('../cmn/header.php'); ?>
    <!-- メモリスト(optionボタン込み) + メモフォーム  -->
    <div style="padding-top: 70px;display: flex;">
        <div class="memoListAndBtn">
            <!-- optionボタン -->
            <div class="" style="width:400px;height:55px;display: flex;float: right;padding-left: 15px;">
                <?php include('parts/memoListOptionBtn.php'); ?>
            </div>
            <!-- メモ一覧 -->
            <div style="width:200px;">
            <?php if ($memoList == "") { ?>
                <div>登録されているメモはありません。</div>
            <?php
                } else {
                    include('parts/memoListDiv.php');
                }
            ?>
            </div>
        </div>
        <!-- メモフォーム -->
        <div style="padding-left: 30px;width:70%;">
            <form class="form-group" action="memoListPage.php" method="post">
                <div class="form-group">
                    <input type="text" class="modal_memo_title form-control" name="memoTitle" value="<?php print $selectMemo["memo_title"]; ?>" placeholder="タイトル">
                </div>
                <div class="form-group">
                    <input id="x" type="hidden" name="memoBody" value="<?php print $selectMemo["memo_body"]; ?>">
                    <trix-editor input="x" class="col-12 form-control" name="memoBody" style="height: 70vh;overflow-y: auto;" placeholder="メモ本文"></trix-editor>
                </div>
                <input type="hidden" id="update_memoId" class="memo_card_param modal_memo_update_id" name="update_memoId" value="<?php print $selectMemo["id"]; ?>">
                <?php if ($selectMemo !== "") { ?>
                <input type="submit" class="btn btn-success col-12" name="updateMemo" value="更新">
                <?php } else {  ?>
                    <input type="submit" class="btn btn-primary col-12" name="saveMemo" value="新規登録">
                <?php } ?>
            </form>
        </div>
    </div>
<?php include('parts/memoSearchModal.php'); ?>
<?php include('../cmn/bodyUnderCmn.php'); ?>
<!-- 専用JS -->
<script type="text/javascript" src="js/memo.js"></script>
<script type="text/javascript" src="js/memoSearchModal.js"></script>
</body>
</html>