<?php
/** バージョンナンバー MAJOR */
define("VERSION_NUMBER_MAJOR", 1);
/** バージョンナンバー MINOR */
define("VERSION_NUMBER_MINOR", 0);
/** バージョンナンバー PATCH */
define("VERSION_NUMBER_PATCH", 0);

/**
 * バージョン番号を取得します。
 *
 * @return int バージョン番号
 */
function getVersion()
{
    return VERSION_NUMBER_MAJOR.".".VERSION_NUMBER_MINOR.".".VERSION_NUMBER_PATCH;
}
