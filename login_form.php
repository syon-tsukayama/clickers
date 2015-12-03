<html>

    <head>
        <meta charset="UTF-8">
        <title>ログインページ</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>ログイン</h2>
                    <div class="well">

        <form action="login.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-4 control-label">ログイン名：</label>
                <div class="col-sm-8">
                    <input type="text" name="username" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">パスワード：</label>
                <div class="col-sm-8">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-default">ログイン</button>
                </div>
            </div>
        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>

</html>
