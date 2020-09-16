<div class="modal fade" id="memoSearchModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">メモ検索</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="memoListPage.php" method="post">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchMatchType" value="0">
            <label class="form-check-label" for="inlineRadio1">部分一致</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchMatchType" value="1">
            <label class="form-check-label" for="inlineRadio2">完全一致</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="memoModalSearchText" placeholder="タイトル・メモ本文中 文字列">
          </div>
          <div class="form-group">
            <label>タグ選択</label>
            <select multiple class="form-control" readonly><option>未実装</option></select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="作成日・更新日 未実装" readonly>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="execSearchMemoPost('memoListPage.php','searchMatchType','memoModalSearchText');">検索実行</button>
      </div>
    </div>
  </div>
</div>