<?php

include('../cmn/DB.php');

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
 * メモ新規登録
 *
 * @param integer $user_id
 * @param string $new_memo
 * @param string $new_title
 * @return true or false
 */
function saveNewMemo($user_id, $new_memo, $new_title)
{
    if (checkBlunk($new_memo)) {
        return;
    }
    try {
        // SQL作成
        $sql = "insert into memo (create_user_id, memo_body, memo_title) values (:create_user_id, :memo_body, :memo_title);";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':create_user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':memo_body', $new_memo, PDO::PARAM_STR);
        $stmt->bindValue(':memo_title', $new_title, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}


/**
 * メモ削除
 *
 * @param integer $del_memoId
 * @return true or false
 */
function delMemo($del_memoId)
{
    if (checkBlunk($del_memoId)) {
        return;
    }
    try {
        // SQL作成
        $sql = "DELETE FROM memo WHERE id = :id;";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':id', $del_memoId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * メモ更新登録
 *
 * @param integer $user_id
 * @param integer $update_memoId
 * @param string $update_title
 * @param string $update_memo
 * @return true or false
 */
function updateMemo($user_id, $update_memoId, $update_title, $update_memo)
{
    if (checkBlunk($update_memoId)) {
        return;
    }
    try {
        // SQL作成
        $sql = "UPDATE memo SET memo_body='".$update_memo."', memo_title='".$update_title."' WHERE id=".$update_memoId.";";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':create_user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':id', $update_memoId, PDO::PARAM_INT);
        $stmt->bindValue(':memo_body', $update_memo, PDO::PARAM_STR);
        $stmt->bindValue(':memo_title', $update_title, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * メモ一覧取得
 *
 * @param integer $user_id
 * @return void
 */
function getMemo($user_id)
{
    try {
        // SQL作成
        $sql = "SELECT * FROM memo WHERE create_user_id = :create_user_id order by id desc;"; // show_id email LIMIT 1;
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':create_user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}
