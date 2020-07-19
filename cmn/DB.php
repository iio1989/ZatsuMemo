<?php

/**
 * PDOStatementクラスのインスタンスを取得します。
 *
 * @param string $sql
 * @return $stmt
 */
function getBaseSTMT($sql)
{
    $path = "db.ini";
    $config = parse_ini_file($path, false);

    $dsn = $config['dsn'];
    $user = $config['user'];
    $pass = $config['pass'];

    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare($sql);

    return $stmt;
}
