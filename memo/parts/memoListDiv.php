<!-- メモリスト -->
<div class="col-3">
<?php foreach ($memoList as $row) {
    $memoRowId = $row['id']; ?>
  <div class="card list-group-item-action" style="min-width: 25rem;">
    <div align="right">
      <img src="../cmn/lib/bootstrap-4.5.0-dist/icon/x-square.svg" width="25" height="25" title="メモ削除"
       class="memoList__leftFrame__btn" onclick="execPost('memoListView.php','delMemoId','<?php echo $memoRowId; ?>');">
    </div>
    <div class="card-body memoList__leftFrame__card" onclick="execPost('memoListView.php','selectMemoId','<?php echo $memoRowId; ?>');">
      <h5 class="card-title"><?php echo substr(strip_tags($row['title']), 0, 24); ?></h5>
      <p class="card-text"><?php echo memoBodyAbridgement($row['body']); ?></p>
      <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['update_date']; ?></h6>
    </div>
  </div>
<?php
} ?>
</div>