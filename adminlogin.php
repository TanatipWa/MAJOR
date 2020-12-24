<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
    unset($_SESSION['UserNameAdmin']);

    //$_SESSION['check'] = false;

    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>THAITICKETMAJOR</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vender/jquery/jquery.slim.min.js"></script>
    <script src="vender/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="css/all.css">

    <!-- Custom styles for this template -->
    <link href="css/userlogin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <center>
                            <img src="img/ttm-logo.png" width="260" height="80">
                        </center>
                        <h5 class="card-title text-center">ADMIN</h5>
                        <form class="form-signin" action="checkadmin.php" method="post">
                            <div class="form-label-group">
                                <input type="text" name="Username" class="form-control" placeholder="Username" required autofocus>
                                <label for="inputEmail">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="Password" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                            

                        </form>
        
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>