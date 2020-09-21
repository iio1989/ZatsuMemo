<?php

/**
 * ユーザーのメモデータをcsv出力します。
 *
 * @param array $user_memoList ユーザーのメモリスト
 * @return void
 */
function csvExport($user_memoList)
{
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=userMemoList.csv');
 
    // ファイル一時ポインタ作成
    $stream = fopen('php://output', 'w');

    // ヘッダ出力
    $head_data = array(array('ID', 'タイトル', 'メモ本文','',''));
    fputcsv($stream, $head_data[0]); // ファイルポインタに書き込む

    // メモデータ出力
    foreach ($user_memoList as $row) {
        fputcsv($stream, $row);
    }
    exit;
}
