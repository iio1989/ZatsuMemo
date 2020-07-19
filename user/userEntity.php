<?php

include('../cmn/DB.php');

/**
 * ユーザー作成 entity関数
 *
 * @param integer $user_id
 * @param string $password
 * @return void
 */
function addUser($user_id, $password)
{
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
