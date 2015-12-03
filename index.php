<?php
session_start();

// 共通機能読み込み
require_once('common.php');

if(!check_loggedin())
{
    $login_form_url = dirname($_SERVER['PHP_SELF']) . '/login_form.php';
    header('Location: ' . $login_form_url);
}
?>
<html>

    <head>
        <meta content="text/html; charset=utf-8">
        <title>テストページ</title>
    </head>

    <body>
        テストのページ
    </body>

</html>
