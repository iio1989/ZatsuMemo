<?php

/**
 * $_POST[$pn]の形式で、パラメータを取得します。
 * 尚、取得時にパラメータが存在するか確認します。
 *
 * @param [type] $pn パラメータ名
 * @return パラメータ or null
 */
function getParam_checkExists($pn)
{
    $postName = $pn;
    if (isset($_POST[$postName])) {
        return $_POST[$postName];
    } else {
        return null;
    }
}

function hsc($targetStr)
{
    return htmlspecialchars($targetStr, ENT_QUOTES, "UTF-8");
}
