$(function(){
  $(window).on("beforeunload",function(e){
    // return "閉じるボタン 画面遷移時に挙動";
  });
});

/**
 * 単一のhttpParamを含みつつ、post送信を実行します。
 * @param string アクション XXX.php
 * @param string paramName name名称
 * @param string | integer paramValue hiddenタグの値
 * ※実装サンプル onclick="execPost('XXX.php','paramName','paramValue');"
 */
function execPost(action, paramName, paramValue) {
  // フォームの生成
  var form = document.createElement("form");
  form.setAttribute("action", action);
  form.setAttribute("method", "post");
  form.style.display = "none";
  document.body.appendChild(form);
  // httpParam設定
  var input = document.createElement('input');
  input.setAttribute('type', 'hidden');
  input.setAttribute('name', paramName);
  input.setAttribute('value', paramValue);
  form.appendChild(input);

  // submit
  form.submit();
}

/**
 * httpParamを含まず、post送信を実行します。
 * @param string アクション XXX.php
 * ※実装サンプル onclick="execPost('XXX.php');"
 */
function execPostNonParam(action) {
  // フォームの生成
  var form = document.createElement("form");
  form.setAttribute("action", action);
  form.setAttribute("method", "post");
  form.style.display = "none";
  document.body.appendChild(form);
  form.submit();
 }

/**
 * ラジオボタンにチェックされているチェック項目の値を取得します。
 * @param string paramName or ブランク
 */
function getValueOfCheckedRadioBtn(paramName){
  let radios = document.getElementsByName(paramName);
  for (let i = 0; i < radios.length; i++){
    if(radios[i].checked){
      return radios[i].value;
    }
  }
  return "";
}