<?php

include "database.php";

if (isset($_POST['op'])) {

    $op = $_POST['op'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if ($op == "login") {
        $sql = "SELECT id,name FROM users WHERE email='$email' AND PASSWORD('$pass') = password";
        $result = mysqli_query($link, $sql);

        // FAILED LOGIN
        if (mysqli_num_rows($result) == 0) {
            //echo "Nothing found here";
            $failed = 1;
        }

        // SUCCESS LOGIN
        else {
            //echo "Found! Login OK!";
            $row = $result->fetch_row();

            $db_id = $row[0];
            $db_name = $row[1];

            //echo "<br><br>ID: $db_id  Name: $db_name";

            setcookie("auth_id", "$db_id");
            setcookie("auth_email", "$email");

            //echo "Success! Cookie value: " . $_COOKIE['auth_id'];
            header("Location:private.php");

            exit;
        }



    }
}
?>
<!DOCTYPE HTML>

<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <style>
        html,
        body {
            height: 100%;
        }

        body.my-login-page {
            background-color: #f7f9fb;
            font-size: 14px;
        }

        .my-login-page .brand {
            width: 90px;
            height: 90px;
            overflow: hidden;
            border-radius: 50%;
            margin: 40px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
            position: relative;
            z-index: 1;
        }

        .my-login-page .brand img {
            width: 100%;
        }

        .my-login-page .card-wrapper {
            width: 400px;
        }

        .my-login-page .card {
            border-color: transparent;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
        }

        .my-login-page .card.fat {
            padding: 10px;
        }

        .my-login-page .card .card-title {
            margin-bottom: 30px;
        }

        .my-login-page .form-control {
            border-width: 2.3px;
        }

        .my-login-page .form-group label {
            width: 100%;
        }

        .my-login-page .btn.btn-block {
            padding: 12px 10px;
        }

        .my-login-page .footer {
            margin: 40px 0;
            color: #888;
            text-align: center;
        }

        @media screen and (max-width: 425px) {
            .my-login-page .card-wrapper {
                width: 90%;
                margin: 0 auto;
            }
        }

        @media screen and (max-width: 320px) {
            .my-login-page .card.fat {
                padding: 0;
            }

            .my-login-page .card.fat .card-body {
                padding: 15px;
            }
        }
    </style>
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="img/sorath_logo.png" alt="logo">
                    </div>
                    <?php
                    if (!empty($failed) && $failed == 1) {
                        ?>
                        <div class="panel panel-danger">
                            <div class="panel-heading">Login error</div>
                            <div class="panel-body">Wrong login or password</div>
                        </div>

                        <?php
                    }
                    ?>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>
                            <form method="POST" class="my-login-validation" novalidate="" action=login.php>

                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password
                                        <!-- <a href="forgot.html" class="float-right">
                                            Forgot Password?
                                        </a> -->
                                    </label>
                                    <input id="password" type="password" class="form-control" name="pass" required
                                        data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="remember" id="remember"
                                            class="custom-control-input">
                                        <label for="remember" class="custom-control-label">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <!-- <div class="mt-4 text-center">
                                    Don't have an account? <a href="registration.php">Create One</a>
                                </div> -->
                                <input type="hidden" name="op" value="login" />

                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2023 &mdash; Sorath Resorts
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
</body>

</html>