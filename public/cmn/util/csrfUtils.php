<?php

/**
 * クロスサイトリクエストフォージェリ（CSRF）対応用のトークンをSESSIONに設定後、返却します。
 *
 * @return csrfトークン
 */
function setCsrfToken()
{
    $token = sha1(uniqid(mt_rand(), true));
    $_SESSION["csrf_token"] = $token;
    return $token;
}

/**
 * ログイン時のCSRFトークンのチェックを行います。
 * トークンを確認できない場合、メッセージを表示して処理を終了します。
 *
 * @param string $token csrfトークン
 * @return void
 */
function checkCsrTokenWhenLogin($token)
{
    if (empty($_POST["csrf_token"]) || $_POST["csrf_token"] !== $token) {
        echo "不正なPOSTを検知したため、処理を終了します。<br><a href='loginView.php'>ログインはこちらから</a>";
        exit;
    }
}

/**
 * CSRFトークンのチェックを行います。
 * トークンを確認できない場合、メッセージを表示して処理を終了します。
 *
 * @param string $token csrfトークン
 * @return void
 */
function checkCsrToken($token)
{
    if (empty($_SESSION["csrf_token"]) || $_SESSION["csrf_token"] !== $token) {
        echo "不正なPOSTを検知したため、処理を終了します。<br><a href='../login/loginView.php'>ログインはこちらから</a>";
        exit;
    }
}
