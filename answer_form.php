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
                <h3>回答ページ</h3>
            </div>

            <form action="answer.php" method="post" class="form-horizontal" role="form">

                <div class="form-group">
                    <label class="col-md-2 control-label">質問内容</label>
                    <div class="col-md-4">
                        <p class="form-control-static">
                            ろんごの色？
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">回答１</label>
                    <div class="col-md-4">
                        <p class="form-control-static">赤</p>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="answer_1" value="回答" class="btn btn-danger" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">回答２</label>
                    <div class="col-md-4">
                        <p class="form-control-static">緑</p>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="answer_2" value="回答" class="btn btn-warning" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">回答３</label>
                    <div class="col-md-4">
                        <p class="form-control-static">黄</p>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="answer_3" value="回答" class="btn btn-info" />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">回答４</label>
                    <div class="col-md-4">
                        <p class="form-control-static">白</p>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="answer_4" value="回答" class="btn btn-success" />
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>
