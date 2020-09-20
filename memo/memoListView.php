<?php

include('memoDao.php');
include('../cmn/util/cmnUtils.php');
include('../cmn/util/csrfUtils.php');

session_start();
$_SESSION['page_title'] = "メモリスト"; // ページヘッダ文字列設定用
checkCsrToken(getSessionParam_checkExists('csrf_token')); // csrfチェック

/** @var httpSession ログインユーザー情報 */
$login_user = $_SESSION['login_user'];
/** @var memo リストで選択されたメモ */
$selectMemo = "";
/** @var array メモリスト */
$memoList = "";

if (isset($_POST["memoModalSearchText"])) { // メモ検索実行時
    $memoList = getMemoListBySearch(
        $login_user["id"],
        getParam_checkExists("searchMatchType"),
        getParam_checkExists("memoModalSearchText")
    );
} else {
    if (isset($_POST["selectMemoId"])) { // 既存メモForm表示処理
        if ($_POST["selectMemoId"] !== "") { // メモ一覧よりメモを選択している場合、メモ内容をFormに反映する。
            $selectMemo = getMemoByMemoId($_POST["selectMemoId"]);
        }
    } elseif (isset($_POST["delMemoId"])) { // メモ削除処理
        delMemo(getParam_checkExists('delMemoId'));
    } elseif (isset($_POST["updateMemo"])) { // 既存メモ更新処理
        updateMemo(
            $login_user["id"],
            getParam_checkExists('update_memoId'),
            getParam_checkExists('memoTitle'),
            getParam_checkExists('memoBody')
        );
    } elseif (isset($_POST["memoBody"])) { // 新規メモ作成
        saveNewMemo(
            $login_user["id"],
            getParam_checkExists('memoTitle'),
            getParam_checkExists('memoBody')
        );
    }
    $memoList = getMemoList($login_user["id"]);
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
  <div class="memoList__leftFrame">
    <div>
      <!-- optionボタン -->
      <div class="memoList__leftFrame__option"><?php include('parts/memoListOptionBtn.php'); ?></div>
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
    <div class="memo__form">
      <form class="form-group" action="memoListView.php" method="post">
        <div class="form-group">
          <input type="text" class="modal_memo_title form-control" name="memoTitle" value="<?php print $selectMemo["title"]; ?>" placeholder="タイトル">
        </div>
        <div class="form-group">
          <input id="memoBodyId" type="hidden" name="memoBody" value="<?php print $selectMemo["body"]; ?>">
          <trix-editor input="memoBodyId" class="col-12 form-control memo__form__editor" name="memoBody" placeholder="メモ本文"></trix-editor>
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
<!-- 機能専用JS -->
<script type="text/javascript" src="js/memoSearchModal.js"></script>
</body>
</html>