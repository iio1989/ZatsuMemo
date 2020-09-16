function execSearchMemoPost(action, radioBtnName, textBoxId) {


  // フォームの生成
  var form = document.createElement("form");
  form.setAttribute("action", action);
  form.setAttribute("method", "post");
  form.style.display = "none";
  document.body.appendChild(form);

  let searchText = document.getElementById(textBoxId).value;
  if(searchText === ""){
    // submit
    form.submit();
    return;
  }

  var input = document.createElement('input');
  input.setAttribute('type', 'hidden');
  input.setAttribute('name', textBoxId);
  input.setAttribute('value', searchText);
  form.appendChild(input);
  
  // ラジオボタン選択状態取得
  let selectedRadioValue = getValueOfCheckedRadioBtn(radioBtnName);
  if(selectedRadioValue !== "" && selectedRadioValue !== undefined){
    // ラジオボタン
    input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', radioBtnName);
    input.setAttribute('value', selectedRadioValue);
    form.appendChild(input);
  }
  // submit
  form.submit();
}