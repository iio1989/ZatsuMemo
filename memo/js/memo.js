$('.memoEditModal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  // Extract info from data-* attributes
  var memo_id = button.data('memoId')
  var memo_title = button.data('memoTitle')
  var memo_body = button.data('memoBody')

  var modal = $(this)
  modal.find('.modal-body .modal_memo_update_id').val(memo_id)
  modal.find('.modal-body .modal_memo_del_id').val(memo_id)
  modal.find('.modal-body .modal_memo_title').val(memo_title)
  modal.find('.modal-body textarea').val(memo_body)

})
