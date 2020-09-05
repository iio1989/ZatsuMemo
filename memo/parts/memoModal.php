<!-- Modal -->
<div class="modal fade memoEditModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin: 10px;"  value="editModel-<?php print $memoRowId; ?>">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Modal in form  -->  
        <form class="card-body" action="memoListPage.php" method="post">
          <!-- Button trigger modal -->
          <input type="text" class="modal_memo_title col-12" name="update_title">
          <textarea class="col-12" name="update_memo" rows="18"></textarea>
          <div class="memo_card" style="display: flex;flex-wrap: wrap;">
            <input type="hidden" id="update_memoId" class="memo_card_param modal_memo_update_id" name="update_memoId">
            <input type="submit" class="btn btn-success col-12" name="updateMemo" value="update">
            <input type="hidden" id="del_memoId" class="modal_memo_del_id" name="del_memoId">
            <input type="submit" class="btn btn-warning col-12" name="delMemo" value="delMemo">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>