<?php
session_start();

//        print_r($_SESSION);
// 共通機能読み込み
require_once('common.php');

if(!check_loggedin())
{
    header('Location: http://localhost/clickers/login_form.php');
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
