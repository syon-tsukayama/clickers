<?php
session_start();

// 共通機能読み込み
require_once('common.php');
?>
<html>

    <head>
        <meta charset="UTF-8">
        <title>ログイン結果</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <p class="navbar-text pull-right"><a href="logout.php" class="navbar-link">ログアウト</a></p>
        </nav>

        <div class="container">
            <div class="page-header">
                <h3>ログイン結果</h3>
            </div>
            <?php
            // データベース接続処理
            $conn = connect_database();

            if($conn)
            {
                // 検索SQL
                $sql =<<<EOS
SELECT `id`, `username` FROM `users`
WHERE `username` = :username AND `password` = :password
EOS;

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $_POST['username']);
            $stmt->bindValue(':password', $_POST['password']);

            $result = $stmt->execute();
            if($result)
            {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if(isset($row['id']) && is_numeric($row['id']) && $row['id'] > 0)
                {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['username'];
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo 'ログイン成功'; ?>
                </div>
                <a href="questions_index.php" class="btn btn-default">質問一覧</a>
                <?php
                }
                else
                {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo 'ログイン失敗'; ?>
                </div>
                <a href="login_form.php" class="btn btn-default">ログインページへ</a>
                <?php
                }
            }
            else
            {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo 'ログイン失敗'; ?>
                </div>
                <a href="login_form.php" class="btn btn-default">ログインページへ</a>
            <?php
            }
        }
        else
        {
        ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo 'データベース接続失敗'; ?>
                </div>
                <a href="login_form.php" class="btn btn-default">ログインページへ</a>
        <?php
        }
        ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>

</html>
