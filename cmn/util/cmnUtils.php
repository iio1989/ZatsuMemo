<?php

/**
 * $_POST[$postName]の形式で、パラメータを取得します。
 * 取得時にパラメータが存在するか確認します。
 *
 * @param string $postName パラメータ名
 * @return パラメータ or null
 */
function getParam_checkExists($postName)
{
    if (isset($_POST[$postName])) {
        return $_POST[$postName];
    } else {
        return null;
    }
}

/**
 * $_SESSION[$sessionName]の形式で、パラメータを取得します。
 * 取得時にパラメータが存在するか確認します。
 *
 * @param string $sessionName パラメータ名
 * @return パラメータ or null
 */
function getSessionParam_checkExists($sessionName)
{
    if (isset($_SESSION[$sessionName])) {
        return $_SESSION[$sessionName];
    } else {
        return null;
    }
}

/**
 * 引数に対してエスケープ処理を行います。
 *
 * @param string $targetStr
 * @return エスケープ処理済みの引数
 */
function issetConvertHsc($targetStr, $setKey)
{
    if (isset($targetStr[$setKey])) {
        return htmlspecialchars($targetStr[$setKey], ENT_QUOTES, "UTF-8");
    } else {
        return "";
    }
}

/**
 * 引数に対してエスケープ処理を行います。
 *
 * @param string $targetStr 対象
 * @return エスケープ処理済みの引数
 */
function hsc($targetStr)
{
    return htmlspecialchars($targetStr, ENT_QUOTES, "UTF-8");
}

/**
 * 現在日時を取得します。
 *
 * @return DateTime 現在日時 format('Y-m-d H:i:s')
 */
function getNowDateTime()
{
    $time = new DateTime();
    return $time->format('Y-m-d H:i:s');
}
