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
        <meta charset="UTF-8">
        <title>質問一覧</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <p class="navbar-text pull-right">
                <?php echo $_SESSION['user_name']; ?>
                <a href="logout.php" class="navbar-link">ログアウト</a>
            </p>
        </nav>

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h2>質問一覧</h2>
        <?php

        // データベース接続処理
        $conn = connect_database();
        if($conn)
        {
//            echo '接続成功';

            // 検索SQL
            $sql =<<<EOS
SELECT `id`, `name` FROM `questions`
EOS;

            $stmt = $conn->prepare($sql);

            $result = $stmt->execute();
            ?>
            <table class="table table-striped table-hover">
                <tr>
                    <th>質問ID</th>
                    <th>質問名</th>
                    <th>操作</th>
                </tr>
            <?php
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <?php $href = 'answer_form.php?question_id='.$row['id']; ?>
                        <a href="<?php echo $href; ?>" class="btn btn-default">回答ページ</a>
                        <?php $href = 'answer_results.php?question_id='.$row['id'];?>
                        <a href="<?php echo $href; ?>" class="btn btn-default">回答結果ページ</a>
                    </td>
                </tr>

            <?php
            }
            ?>
            </table>
            <?php
        }
        else
        {
            echo '接続失敗';
        }
        ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>

</html>