<!DOCTYPE html>
<html lang="en">

<head>

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
    <link href="css/register.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        <center>
                            <img src="img/ttm-logo.png" width="260" height="80">
                        </center>
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin" method="post" action="saveuser.php">
                            <div class="form-label-group">
                                <input type="email" name="inputUserame" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputUserame">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="inputConfirmPassword" class="form-control" placeholder="Password" required>
                                <label for="inputConfirmPassword">Confirm password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name="inputName" class="form-control" placeholder="Name" required>
                                <label for="inputName">Name</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name="inputSurname" class="form-control" placeholder="Surname" required>
                                <label for="inputSurname">Surname</label>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                            <hr class="my-4">
                            <a class="d-block text-center mt-2 small" href="userlogin.php">Sign In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>