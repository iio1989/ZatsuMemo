<nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">memoList</span>
</nav>
<div class="col-12" style="display: flex;flex-wrap: wrap;">

<?php foreach ($memo as $row) {
    $memoRowId = $row['id'];
    $memoRowTitle = $row['memo_title'];
    $memoRowBody = $row['memo_body']; ?>

  <div class="card col-6">
    <form class="card-body" action="memoListPage.php" method="post">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-outline-light" data-toggle="modal"
      data-target=".memoEditModal" data-memo-id="<?php print $memoRowId; ?>" data-memo-title="<?php print $memoRowTitle; ?>" 
      data-memo-title="<?php print $memoRowTitle; ?>" data-memo-body="<?php print $memoRowBody; ?>"
      style="float: right;">
        <img src="../cmn/lib/bootstrap-4.5.0-dist/icon/box-arrow-up.svg" alt="" width="32" height="32" title="Bootstrap">
      </button>
      <input type="text" class="col-12" name="update_title" value="<?php print $memoRowTitle; ?>">
      <textarea class="col-12" name="update_memo" rows="10"><?php print $memoRowBody; ?></textarea>
      <div class="memo_card" style="display: flex;flex-wrap: wrap;">
        <input type="hidden" id="update_memoId" class="memo_card_param" name="update_memoId" value="<?php print $memoRowId; ?>">
        <input type="submit" class="btn btn-success col-12" name="updateMemo" value="update">
        <input type="hidden" id="del_memoId" name="del_memoId" value="<?php print $memoRowId; ?>">
        <input type="submit" class="btn btn-warning col-12" name="delMemo" value="delMemo">
      </div>
    </form>
  </div>
  <?php
} ?>
<!-- -->
</div>