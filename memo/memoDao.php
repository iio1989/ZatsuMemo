<?php

require_once('../cmn/util/DB.php');
require_once('memoUtils.php');

/**
 * メモ新規登録
 *
 * @param integer $user_id
 * @param string $new_memo
 * @param string $new_title
 * @return true or false
 */
function saveNewMemo($user_id)
{
    // 新規登録関連 パラメータ
    $new_title = getParam_checkExists('memoTitle');
    $new_memo = getParam_checkExists('memoBody');

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
function delMemo()
{
    // 削除登録関連 パラメータ
    $del_memoId = getParam_checkExists('delMemoId');
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
function updateMemo()
{

    // 更新登録関連 パラメータ
    $update_memoId = getParam_checkExists('update_memoId');
    $update_title = getParam_checkExists('memoTitle');
    $update_memo = getParam_checkExists('memoBody');

    if (checkBlunk($update_memoId)) {
        return;
    }
    try {
        // SQL作成
        $sql = "UPDATE memo SET memo_body='".$update_memo."', memo_title='".$update_title."' WHERE id=".$update_memoId.";";
        $stmt = getBaseSTMT($sql);
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
function getMemoList($user_id)
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

function getMemoListBySearch($user_id, $perfectMatch, $targetText)
{
    try {
        // SQL作成
        $sql = "SELECT * FROM memo WHERE create_user_id = :create_user_id AND ( memo_body LIKE :memo_body OR memo_title LIKE :memo_title ) order by id desc;";
        if ($perfectMatch === null || $perfectMatch === 0) {
            $targetText = "%".$targetText."%";
        }
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':create_user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':memo_body', $targetText, PDO::PARAM_STR);
        $stmt->bindValue(':memo_title', $targetText, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * メモ取得
 *
 * @param integer $memo_id
 * @return void
 */
function getMemo($memo_id)
{
    try {
        // SQL作成
        $sql = "SELECT * FROM memo WHERE id = :id;"; // show_id email LIMIT 1;
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':id', $memo_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}
