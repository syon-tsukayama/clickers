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
        <title>回答入力</title>
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
                    <h2>回答入力</h2>

        <?php

        // データベース接続処理
        $conn = connect_database();
        if($conn)
        {
            $question_id = trim($_GET['question_id']);

            // 検索SQL
            $sql =<<<EOS
SELECT * FROM `questions` WHERE `id` = :question_id
EOS;

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':question_id', $question_id);

            $result = $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

//            print_r($row);
        ?>
        <form action="answer.php" method="post">
        <table class="table">
            <tr>
                <td>質問：</td>
                <td>
                    <?php echo $row['content']; ?>
                    <input type="hidden" name="question_id" value="<?php echo $row['id']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="answer_1" value="回答1" class="btn btn-primary">
                </td>
                <td>
                    <?php echo $row['answer_1']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="answer_2" value="回答2" class="btn btn-success">
                </td>
                <td>
                    <?php echo $row['answer_2']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="answer_3" value="回答3" class="btn btn-warning">
                </td>
                <td>
                    <?php echo $row['answer_3']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="answer_4" value="回答4" class="btn btn-danger">
                </td>
                <td>
                    <?php echo $row['answer_4']; ?>
                </td>
            </tr>
        </table>
        </form>
        <a href="questions_index.php" class="btn btn-default">質問一覧へもどる</a>

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
