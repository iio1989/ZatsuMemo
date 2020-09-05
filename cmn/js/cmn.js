$(function(){
  $(window).on("beforeunload",function(e){
    // return "閉じるボタン 画面遷移時に挙動";
  });
});

/**
 * データをPOSTする
 * @param String アクション
 * @param paramName name名称
 * @param Object POSTデータ連想配列
 * 記述元Webページ http://fujiiyuuki.blogspot.jp/2010/09/formjspost.html
 * サンプルコード
 * <a onclick="execPost('/hoge', {'fuga':'fuga_val', 'piyo':'piyo_val'});return false;" href="#">POST送信</a>
 */
function execPost(action, paramName, data) {
 // フォームの生成
 var form = document.createElement("form");
 form.setAttribute("action", action);
 form.setAttribute("method", "post");
 form.style.display = "none";
 document.body.appendChild(form);
 // パラメタの設定
 data = document.getElementsByClassName(paramName + "_param");
 console.log(data);
//  if (data !== undefined) {
//   if(Array.isArray(data)){
//     // for (var d in data) {
//     for(let i=0; i<data.length; i++){
//      var input = document.createElement('input');
//      input.setAttribute('type', 'hidden');
//      input.setAttribute('name', paramName[i]);
//      input.setAttribute('value', data[d]);
//      form.appendChild(input);
//     }
//   }else{
//     var input = document.createElement('input');
//      input.setAttribute('type', 'hidden');
//      input.setAttribute('name', paramName);
//      input.setAttribute('value', data[0]);
//      form.appendChild(input);
//   }
//  }
 // submit
 form.submit();
 var test = 0;
}

/**
 * データをPOSTする
 * @param String アクション
 * @param paramName name名称
 * @param Object POSTデータ連想配列
 * 記述元Webページ http://fujiiyuuki.blogspot.jp/2010/09/formjspost.html
 * サンプルコード
 * <a onclick="execPost('/hoge', {'fuga':'fuga_val', 'piyo':'piyo_val'});return false;" href="#">POST送信</a>
 */
function execPostNonData(action, paramName) {
  // フォームの生成
  var form = document.createElement("form");
  form.setAttribute("action", action);
  form.setAttribute("method", "post");
  form.style.display = "none";
  document.body.appendChild(form);
  form.submit();
 }