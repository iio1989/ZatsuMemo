<?php

define("TAG_BR", "<br>");

/**
 * ブランクチェックを行います。
 *
 * @param var $post_param
 * @return true or false
 */
function checkBlunk($post_param)
{
    if ($post_param === null) {
        return true;
    } elseif ($post_param === "") {
        echo "メモ内容が未入力です。"; // TODO:別途バリデーションチェックを実装します。
        return true;
    } else {
        return false;
    }
}

/**
 * Undocumented function
 *
 * @param [type] $targetMemo
 * @return void
 */
function delHtmlTagAndBrConvert($targetMemo)
{
    $targetMemo = str_replace(TAG_BR, "&#010;", $targetMemo);
    return strip_tags($targetMemo);
}

function memoBodyAbridgement($targetMemo)
{
    if (strlen($targetMemo) <= 20) {
        return $targetMemo;
    } else {
        $targetMemo = str_replace(TAG_BR, " ", $targetMemo);
        return substr(strip_tags($targetMemo), 0, 25);
    }
}
