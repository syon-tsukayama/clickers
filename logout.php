<html>

    <head>
        <meta charset="UTF-8">
        <title>ログアウト</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h2>ログアウト</h2>

        <?php
        session_start();

        // 共通機能読み込み
        require_once('common.php');

        if(check_loggedin())
        {
            $_SESSION = array();

            if (isset($_COOKIE["PHPSESSID"]))
            {
                setcookie("PHPSESSID", '', time() - 1800, '/');
            }
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo 'ログアウト成功'; ?>
            </div>
        <?php
        }
        else
        {
        ?>
            <div class="alert alert-info" role="alert">
                <?php echo 'ログインしていません'; ?>
            </div>
        <?php
        }
        ?>
                    <a href="login_form.php" class="btn btn-default">ログインページへ</a>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>

</html>