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
                <h3>ログインページ</h3>
            </div>

            <form action="login.php" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-2 control-label">ログイン名</label>
                    <div class="col-md-4">
                        <input type="text" name="username" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">パスワード</label>
                    <div class="col-md-4">
                        <input type="text" name="password" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" value="ログイン" class="btn btn-primary" />
                    </div>
                </div>

            </form>
        </div>
    </body>

</html>
