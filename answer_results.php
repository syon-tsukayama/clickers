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
        <script src="./js/Chart.js"></script>
    </head>

    <body>
        <?php

        // データベース接続処理
        $conn = connect_database();
        if($conn)
        {
//            echo '接続成功';
            $question_id = trim($_GET['question_id']);

            // 検索SQL
            $sql =<<<EOS
SELECT `id`, `answer_id`, `user_id` FROM `answer_results`
WHERE `question_id` = :question_id
EOS;

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':question_id', $question_id);

            $result = $stmt->execute();

            ?>
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>回答ID</td>
                    <td>ユーザID</td>
                </tr>
            <?php
            // 集計用配列初期化
            $sum_answers = array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0
                );
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                // 回答件数+1
                $sum_answers[$row['answer_id']]++;
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['answer_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                </tr>
                <?php
            }
            ?>
            </table>


            <table border="1">
                <tr>
                    <td>回答ID</td>
                    <td>件数</td>
                </tr>
                <?php
                foreach($sum_answers as $answer_id => $count_value)
                {
                ?>
                <tr>
                    <td><?php echo $answer_id; ?></td>
                    <td><?php echo $count_value; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>

            <canvas id="myChart" width="400" height="400"></canvas>

            <script type="text/javascript">
var data = [
    {
        value: <?php echo $sum_answers[1] ?>,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "回答１"
    },
    {
        value: <?php echo $sum_answers[2] ?>,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "回答２"
    },
    {
        value: <?php echo $sum_answers[3] ?>,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "回答３"
    },
    {
        value: <?php echo $sum_answers[4] ?>,
        color: "black",
        highlight: "#FFC870",
        label: "回答４"
    }
];
var myDoughnutChart = new Chart(document.getElementById("myChart").getContext("2d")).Doughnut(data);
            </script>

            <a href="questions_index.php">質問一覧へもどる</a>
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
    </body>

</html>