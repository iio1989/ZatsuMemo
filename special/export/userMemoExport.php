<?php

function csvExport($user_memoList)
{
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=userMemoList.csv');
 
    $stream = fopen('php://output', 'w');
    // ヘッダ出力
    $head_data = array(array('ID', 'タイトル', 'メモ本文','',''));
    fputcsv($stream, $head_data[0]);

    // メモデータ出力
    foreach ($user_memoList as $row) {
        fputcsv($stream, $row);
    }
    exit;
}
