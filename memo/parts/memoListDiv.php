<div>memoList</div>
<ul>
  <?php foreach ($memo as $row) { ?>
  <div>
    <form action="memoList.php" method="post">
      <input type="hidden" id="update_memoId" name="update_memoId" value="<?php print $row['id']; ?>">
      <input type="text" name="update_title" value="<?php print $row['memo_title']; ?>">
      <textarea name="update_memo"><?php print $row['memo_body']; ?></textarea>
      <input type="submit" value="update">
    </form>
    <form action="memoList.php" method="post">
      <input type="hidden" id="del_memoId" name="del_memoId" value="<?php print $row['id']; ?>">
      <input type="submit" value="del">
    </form>
  </div>
  <?php } ?>
</ul>