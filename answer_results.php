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
        <title>回答結果</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="./js/Chart.js"></script>
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
                    <h2>回答結果</h2>
        <?php
        // 集計用配列初期化
        $sum_answers = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0
            );

        // データベース接続処理
        $conn = connect_database();
        if($conn)
        {
//            echo '接続成功';
            $question_id = trim($_GET['question_id']);

            // 検索SQL
            $sql =<<<EOS
SELECT `id`, `name`, `content`, `answer_1`, `answer_2`, `answer_3`, `answer_4` FROM `questions`
WHERE `id` = :question_id
EOS;
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':question_id', $question_id);

            $question = array();

            $result = $stmt->execute();
            if($result)
            {
                $question = $stmt->fetch(PDO::FETCH_ASSOC);
            }

            // 検索SQL
            $sql =<<<EOS
SELECT `id`, `answer_id`, `user_id` FROM `answer_results`
WHERE `question_id` = :question_id
EOS;

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':question_id', $question_id);

            $answers = array();

            $result = $stmt->execute();
            if($result)
            {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    // 回答件数+1
                    $sum_answers[$row['answer_id']]++;

                    $answers[] = $row;
                }
            }
            ?>
                    <a href="questions_index.php" class="btn btn-default">質問一覧へもどる</a>

                    <div class="row">
                        <div class="col-md-7">
                            <canvas id="myChart" width="400" height="400" style="width: 100%;height: auto;"></canvas>
                            <script type="text/javascript">
var data = [
    {
        value: <?php echo $sum_answers[1] ?>,
        color:"#337ab7",
        highlight: "#2e6da4",
        label: "回答１［<?php echo $question['answer_1'] ?>］"
    },
    {
        value: <?php echo $sum_answers[2] ?>,
        color: "#5cb85c",
        highlight: "#4cae4c",
        label: "回答２［<?php echo $question['answer_2'] ?>］"
    },
    {
        value: <?php echo $sum_answers[3] ?>,
        color: "#f0ad4e",
        highlight: "#eea236",
        label: "回答３［<?php echo $question['answer_3'] ?>］"
    },
    {
        value: <?php echo $sum_answers[4] ?>,
        color: "#d9534f",
        highlight: "#d43f3a",
        label: "回答４［<?php echo $question['answer_4'] ?>］"
    }
];
var myDoughnutChart = new Chart(document.getElementById("myChart").getContext("2d")).Doughnut(data);
                            </script>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>質問内容</th>
                                            <td><?php echo $question['content']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>回答ID</th>
                                                <th>回答</th>
                                                <th>件数</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($sum_answers as $answer_id => $count_value)
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $answer_id; ?></td>
                                                <td><?php echo $question['answer_' . $answer_id]; ?></td>
                                                <td><?php echo $count_value; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                           <tr>
                                                <th>ID</th>
                                                <th>回答ID</th>
                                                <th>ユーザID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($answers as $row)
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['answer_id']; ?></td>
                                                <td><?php echo $row['user_id']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="questions_index.php" class="btn btn-default">質問一覧へもどる</a>

                </div>
                <div class="col-md-1"></div>

        <?php
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
    </body>

</html>