$(function(){
  $(window).on("beforeunload",function(e){
    // return "閉じるボタン 画面遷移時に挙動";
  });
});

/**
 * データをPOSTする
 * @param String アクション
 * @param paramName name名称
 * @param paramValue hiddenタグの値
 * 記述元Webページ http://fujiiyuuki.blogspot.jp/2010/09/formjspost.html
 * サンプルコード
 * <a onclick="execPost('/hoge', {'fuga':'fuga_val', 'piyo':'piyo_val'});return false;" href="#">POST送信</a>
 */
function execPost(action, paramName, paramValue) {
  // フォームの生成
  var form = document.createElement("form");
  form.setAttribute("action", action);
  form.setAttribute("method", "post");
  form.style.display = "none";
  document.body.appendChild(form);

  var input = document.createElement('input');
  input.setAttribute('type', 'hidden');
  input.setAttribute('name', paramName);
  input.setAttribute('value', paramValue);
  form.appendChild(input);

  // submit
  form.submit();
}

/**
 * データをPOSTする
 * @param String アクション
 * @param Object POSTデータ連想配列
 * 記述元Webページ http://fujiiyuuki.blogspot.jp/2010/09/formjspost.html
 * サンプルコード
 * <a onclick="execPost('/hoge', {'fuga':'fuga_val', 'piyo':'piyo_val'});return false;" href="#">POST送信</a>
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
  * 
  * @param {*} paramName 
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