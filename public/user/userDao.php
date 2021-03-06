<?php
require_once('../cmn/util/DB.php');

/** ユーザータイプ 普通 */
define("USER_TYPE_NORMAL", 10);
/** ユーザータイプ お試し */
define("USER_TYPE_TRIAL", 20);

/**
 * ユーザー情報を取得します。
 *
 * @param integer $user_id ユーザーID
 * @return ユーザー情報
 */
function selectUserById($user_id)
{
    try {
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * ユーザー情報を取得します。
 *
 * @param integer $show_id 表示用ユーザーID
 * @return ユーザー情報
 */
function selectUserByShowId($show_id)
{
    try {
        $sql = "SELECT * FROM user WHERE show_id = :show_id";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':show_id', $show_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * ユーザーを新規追加します。
 *
 * @param integer $show_id 表示用ユーザーID
 * @param string $user_name ユーザー名
 * @param string $password パスワード
 * @param integer $user_type ユーザータイプ
 * @return void
 */
function addUser($show_id, $user_name, $password, $user_type)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    try {
        $sql = "INSERT INTO user (show_id, name, password, type) VALUE (:show_id, :name, :password, :type)";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':show_id', $show_id, PDO::PARAM_STR);
        $stmt->bindValue(':name', $user_name, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':type', $user_type, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
}

/**
 * ユーザー情報 表示用IDとユーザー名を更新します。
 *
 * @param integer $user_id ユーザーID
 * @param string $show_id 表示用ユーザーID
 * @param string $user_name ユーザ名
 * @return boolean 更新成功 true or 更新失敗 false
 */
function updateUser_showIdAndName($user_id, $show_id, $user_name)
{
    try {
        $sql = "UPDATE user SET show_id='".$show_id."', name='".$user_name."' WHERE id=".$user_id.";";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':show_id', $show_id, PDO::PARAM_STR);
        $stmt->bindValue(':name', $user_name, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * ユーザー情報 パスワードを更新します。
 *
 * @param integer $user_id ユーザーID
 * @param string $user_pass パスワード
 * @return boolean 更新成功 true or 更新失敗 false
 */
function updateUser_pass($user_id, $user_pass)
{
    $user_pass = password_hash($user_pass, PASSWORD_DEFAULT);
    try {
        $sql = "UPDATE user SET password='".$user_pass."' WHERE id=".$user_id.";";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':password', $user_pass, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}
