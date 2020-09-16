<!-- メモリスト -->
<div class="col-3">
<?php foreach ($memoList as $row) {
    $memoRowId = $row['id'];
    $memoRowTitle = $row['memo_title'];
    $memoRowBody = $row['memo_body']; ?>
  <div class="card list-group-item-action" style="min-width: 25rem;">
    <div align="right">
      <img src="../cmn/lib/bootstrap-4.5.0-dist/icon/x-square.svg" width="25" height="25" title="メモ削除" style="padding-right: 5px;padding-top: 5px;cursor:pointer;" onclick="execPost('memoListPage.php','delMemoId','<?php print $memoRowId; ?>');">
    </div>
    <div class="card-body" style="cursor:pointer;padding-top:1;max-height:120px;" onclick="execPost('memoListPage.php','selectMemoId','<?php print $memoRowId; ?>');">
      <h5 class="card-title"><?php print substr(strip_tags($memoRowTitle), 0, 24); ?></h5>
      <p class="card-text"><?php print memoBodyAbridgement($memoRowBody); ?></p>
      <h6 class="card-subtitle mb-2 text-muted">2020/9/7</h6>
    </div>
  </div>
<?php
} ?>
<!-- -->
</div>