<?php

include "database.php";

if (isset($_POST['op'])) {

    $op = $_POST['op'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if ($op == "login") {
        $sql = "SELECT id,name,is_admin,can_edit,is_deleted, can_add FROM users WHERE email='$email' AND PASSWORD('$pass') = password";
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
            $db_is_admin = $row[2];
            $db_can_edit = $row[3];
            $db_is_deleted = $row[4];

            $db_can_add = $row[5];
            //echo "<br><br>ID: $db_id  Name: $db_name";

            setcookie("auth_id", "$db_id");
            setcookie("auth_email", "$email");
            setcookie("auth_username", "$db_name");

            setcookie("is_admin", "$db_is_admin");
            setcookie("can_edit", "$db_can_edit");
            setcookie("is_deleted", "$db_is_deleted");
            setcookie("can_add", "$db_can_add");

            //echo "Success! Cookie value: " . $_COOKIE['auth_id'];
            header("Location:index.php");

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <style>
      

      
      

      
    </style>
</head>

<body class="my-login-page">
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Login In Failed.</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Invalid Email/Password. Please try again.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-info">OK</button>
                </div>
            </div>
        </div>
    </div>
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
                        <!-- <div class="panel panel-danger">
                                    <div class="panel-heading">Login error</div>
                                    <div class="panel-body">Wrong login or password</div>
                                </div> -->
                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('#myModal').modal('show');
                            });
                        </script>

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