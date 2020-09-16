<?php
/**
 * Undocumented function
 *
 * @return void
 */
function setCsrfToken()
{
    $token = sha1(uniqid(mt_rand(), true));
    $_SESSION["csrf_token"] = $token;
    return $token;
}

function checkCsrTokenWhenLogin($token)
{
    if (empty($_POST["csrf_token"]) || $_POST["csrf_token"] !== $token) {
        echo "不正なPOSTを検知したため、処理を終了します。<br><a href='loginPage.php'>ログインはこちらから</a>";
        exit;
    }
}

function checkCsrToken($token)
{
    if (empty($_SESSION["csrf_token"]) || $_SESSION["csrf_token"] !== $token) {
        echo "不正なPOSTを検知したため、処理を終了します。<br><a href='../login/loginPage.php'>ログインはこちらから</a>";
        exit;
    }
}
