<?php

require_once('../cmn/util/DB.php');
require_once('memoUtils.php');

/**
 * メモの新規登録を行います。
 *
 * @param integer $user_id 実行ユーザーID
 * @param [type] $new_title メモタイトル
 * @param [type] $new_memo メモ内容
 * @return boolean true 成功 or false 失敗
 */
function saveNewMemo($user_id, $new_title, $new_memo)
{
    if (checkBlunk($new_memo)) {
        return false;
    }
    try {
        $sql = "insert into memo (create_user_id, body, title) values (:create_user_id, :body, :title);";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':create_user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':body', $new_memo, PDO::PARAM_STR);
        $stmt->bindValue(':title', $new_title, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * メモの更新登録を行います。
 *
 * @param integer $user_id 実行ユーザーID
 * @param integer $update_memoId 対象メモID
 * @param string $update_title メモタイトル
 * @param string $update_memo メモ内容
 * @return boolean true 成功 or false 失敗
 */
function updateMemo($user_id, $update_memoId, $update_title, $update_memo)
{
    if (checkBlunk($update_memoId)) {
        return false;
    }
    try {
        $sql = "UPDATE memo SET body='".$update_memo."', title='".$update_title."', update_user_id='".$user_id."' WHERE id=".$update_memoId.";";
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':id', $update_memoId, PDO::PARAM_INT);
        $stmt->bindValue(':body', $update_memo, PDO::PARAM_STR);
        $stmt->bindValue(':title', $update_title, PDO::PARAM_STR);
        $stmt->bindValue(':update_user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * メモの削除を行います。
 *
 * @param integer $del_memoId 対象メモ
 * @return boolean true 成功 or false 失敗
 */
function delMemo($del_memoId)
{
    if (checkBlunk($del_memoId)) {
        return false;
    }
    try {
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
 * メモ一覧を取得します。
 *
 * @param integer $user_id 実行ユーザーID
 * @return memoObj | boolean memo配列 or false 失敗
 */
function getMemoList($user_id)
{
    try {
        $sql = "SELECT * FROM memo WHERE create_user_id = :create_user_id order by id desc;";
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

/**
 * 検索条件を基にメモ一覧を取得します。
 *
 * @param integer $user_id 実行ユーザーID
 * @param integer $perfectMatch 検索区分(0:部分一致 1:完全一致)
 * @param string $targetText 検索キーワード
 * @return memoObj | boolean memo配列 or false 失敗
 */
function getMemoListBySearch($user_id, $perfectMatch, $targetText)
{
    try {
        $sql = "SELECT * FROM memo WHERE create_user_id = :create_user_id AND ( body LIKE :body OR title LIKE :title ) order by id desc;";
        if ($perfectMatch === null || $perfectMatch === 0) {
            $targetText = "%".$targetText."%";
        }
        $stmt = getBaseSTMT($sql);
        $stmt->bindValue(':create_user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':body', $targetText, PDO::PARAM_STR);
        $stmt->bindValue(':title', $targetText, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
        return false;
    }
}

/**
 * 単一のメモを取得します。
 *
 * @param integer $memo_id メモID
 * @return memoObj | boolean memo or false 失敗
 */
function getMemoByMemoId($memo_id)
{
    try {
        $sql = "SELECT * FROM memo WHERE id = :id;";
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
