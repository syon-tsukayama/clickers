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
        <title>回答登録</title>
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
                    <h2>回答登録</h2>
        <?php
//        print_r($_SESSION);

//        print_r($_POST);

        // データベース接続処理
        $conn = connect_database();
        if($conn)
        {

            $question_id = trim($_POST['question_id']);
            if(isset($_POST['answer_1']))
            {
                $answer_id = 1;
            }
            elseif(isset($_POST['answer_2']))
            {
                $answer_id = 2;
            }
            elseif(isset($_POST['answer_3']))
            {
                $answer_id = 3;
            }
            elseif(isset($_POST['answer_4']))
            {
                $answer_id = 4;
            }
            else
            {
                $answer_id = 0;
            }

            $user_id = $_SESSION['user_id'];

            // 登録SQL
            $sql =<<<EOS
INSERT INTO `answer_results`
(`question_id`, `answer_id`, `user_id`, `created`, `updated`)
 VALUES (:question_id, :answer_id, :user_id, NOW(), NOW())
EOS;

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':question_id', $question_id);
            $stmt->bindValue(':answer_id', $answer_id);
            $stmt->bindValue(':user_id', $user_id);

            $result = $stmt->execute();

            if($result)
            {
            ?>
            <div class="alert alert-success" role="alert">
                <?php echo '登録成功'; ?>
            </div>
            <?php
            }
            else
            {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo '登録失敗'; ?>
            </div>
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
                    <a href="questions_index.php" class="btn btn-default">質問一覧へもどる</a>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>

</html>
