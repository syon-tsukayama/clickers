<?php
/**
 * 共通機能
 */

/**
 * でーたべーす接続処理
 */
function connect_database()
{
    $dsn = 'mysql:dbname=clickers;host=localhost;charset=utf8';
    $db_username = 'root';
    $db_password = '';

    $conn = new PDO($dsn, $db_username, $db_password);

    return $conn;
}

/**
 * ログインチェック
 */
function check_loggedin()
{
    if(isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id']))
    {
        return true;
    }
    else
    {
        return false;
    }
}

