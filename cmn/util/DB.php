<?php

/**
 * PDOStatementクラスのインスタンスを取得します。
 *
 * @param string $sql
 * @return $stmt
 */
function getBaseSTMT($sql)
{
    $path = "../cmn/conf/db.ini";
    $config = parse_ini_file($path, false);

    $dsn = $config['dsn'];
    $user = $config['db_user'];
    $pass = $config['db_pass'];

    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare($sql);

    return $stmt;
}
