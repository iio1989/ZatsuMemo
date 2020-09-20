<?php
/** <br> */
define("TAG_BR", "<br>");
/** メモ数(20) */
define("MEMO_LENGTH_20", 20);
/** メモ数(25) */
define("MEMO_LENGTH_25", 25);

/**
 * ブランクチェックを行います。
 *
 * @param string $post_memo ポストされたメモの内容
 * @return boolean true(メモあり) or false(メモなし)
 */
function checkBlunk($post_memo)
{
    if ($post_memo === null) {
        return true;
    } elseif ($post_memo === "") {
        echo "メモ内容が未入力です。"; // TODO:別途バリデーションチェックを実装します。
        return true;
    } else {
        return false;
    }
}

/**
 * メモ内容の改行<br>タグを特殊コードに変換し、全てのタグを削除します。
 *
 * @param string $targetMemo メモ内容
 * @return string 加工後のメモ内容
 */
function delHtmlTagAndBrConvert($targetMemo)
{
    $targetMemo = str_replace(TAG_BR, "&#010;", $targetMemo);
    return strip_tags($targetMemo);
}

/**
 * メモの内容をメモ一覧への表示用に、
 * 文字数を25文字以下にして、全てのHTMLタグを削除した形で返却します。
 *
 * @param string $targetMemo メモ内容
 * @return string 加工後のメモ内容
 */
function memoBodyAbridgement($targetMemo)
{
    if (strlen($targetMemo) <= MEMO_LENGTH_20) {
        return $targetMemo;
    } else {
        $targetMemo = str_replace(TAG_BR, " ", $targetMemo);
        return substr(strip_tags($targetMemo), 0, MEMO_LENGTH_25);
    }
}
