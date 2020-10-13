<?php
/**
 * バージョン番号を取得します。
 *
 * @return int バージョン番号
 */
function getVersion()
{
    $path = "../../conf/version.ini";
    $config = parse_ini_file($path, false);

    $major = $config['major'];
    $minor = $config['minor'];
    $patch = $config['patch'];
    return $major.".".$minor.".".$patch;
}

/**
 * バージョン番号を取得します。
 *
 * @return int バージョン番号
 */
function getVersionIndexPage()
{
    $path = dirname(__FILE__)."/../../../conf/version.ini";
    $config = parse_ini_file($path, false);

    $major = $config['major'];
    $minor = $config['minor'];
    $patch = $config['patch'];
    return $major.".".$minor.".".$patch;
}
