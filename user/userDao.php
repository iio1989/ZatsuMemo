<?php

require_once('../cmn/util/DB.php');

/**
 * ユーザー作成 entity関数
 *
 * @param integer $user_id
 * @param string $password
 * @return void
 */
function addUser($user_id, $password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    try {
        $sql = "INSERT INTO user (show_id, user_name, user_pass) VALUE (:show_id, :user_name, :user_pass)";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':show_id', $user_id, PDO::PARAM_STR);
        $stmt->bindValue(':user_name', "hogename", PDO::PARAM_STR);
        $stmt->bindValue(':user_pass', $password, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
}

/**
 * ユーザー情報取得関数
 *
 * @param integer $user_id
 * @return ユーザー情報
 */
function selectUser($user_id)
{
    try {
        $sql = "SELECT * FROM user WHERE show_id = :show_id";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':show_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * ユーザー情報取得関数
 *
 * @param integer $user_id
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
 * Undocumented function
 *
 * @param [type] $user_id
 * @param [type] $show_id
 * @param [type] $user_name
 * @return void
 */
function updateUser_idAndName($user_id, $show_id, $user_name)
{
    try {
        $sql = "UPDATE user SET show_id='".$show_id."', user_name='".$user_name."' WHERE id=".$user_id.";";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':show_id', $show_id, PDO::PARAM_STR);
        $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * Undocumented function
 *
 * @param [type] $user_id
 * @param [type] $user_pass
 * @return void
 */
function updateUser_pass($user_id, $user_pass)
{
    $user_pass = password_hash($user_pass, PASSWORD_DEFAULT);
    try {
        $sql = "UPDATE user SET user_pass='".$user_pass."' WHERE id=".$user_id.";";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':user_pass', $user_pass, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}
