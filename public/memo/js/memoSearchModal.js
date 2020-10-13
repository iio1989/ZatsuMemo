/**
 * 検索実行用Function
 * 
 * @param string アクション XXX.php
 * @param integer radioBtnName ラジオボタン名称
 * @param string textBoxId テキストボックスID
 */
function execSearchMemoPost(action, radioBtnName, textBoxId) {
  // フォームの生成
  var form = document.createElement("form");
  form.setAttribute("action", action);
  form.setAttribute("method", "post");
  form.style.display = "none";
  document.body.appendChild(form);

  let searchText = document.getElementById(textBoxId).value;
  if(searchText === ""){
    form.submit(); // テキストボックス 未入力の場合、全件表示として処理します。
    return;
  }
  
  // httpParam設定
  var input = document.createElement('input');
  input.setAttribute('type', 'hidden');
  input.setAttribute('name', textBoxId);
  input.setAttribute('value', searchText);
  form.appendChild(input);
  
  // ラジオボタン選択状態取得
  let selectedRadioValue = getValueOfCheckedRadioBtn(radioBtnName);
  if(selectedRadioValue !== "" && selectedRadioValue !== undefined){
    // ラジオボタンの設定状況をhttpParamに設定
    input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', radioBtnName);
    input.setAttribute('value', selectedRadioValue);
    form.appendChild(input);
  }

  form.submit();
}