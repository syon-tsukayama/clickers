<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>くりっかー</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
body
{
    padding-top: 50px;
}
        </style>
        <script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/Chart.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">くりっかー</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="page-header">
                <h3>回答結果グラフ</h3>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <canvas id="sample" class="col-md-12"></canvas>
                    <script>
var doughnutData = [
　　{
　　　value: 30,
　　　color:"#d9534f"
　　},
　　{
　　　value: 50,
　　　color: "#f0ad4e"
　　},
　　{
　　　value: 120,
　　　color: "#5bc0de"
　　},
   {
　　　value: 50,
　　　color: "#5cb85c"
　　}
];

var myDoughnut = new Chart(document.getElementById("sample").getContext("2d")).Doughnut(doughnutData);
                    </script>
                </div>

                <div class="col-md-4"></div>
            </div>
        </div>
    </body>

</html>
