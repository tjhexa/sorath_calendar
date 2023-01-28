<!DOCTYPE HTML>

<html>

<head>
    <title>Registration</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <style>

    </style>
</head>

<body class="my-login-page">



    <?php

    include "database.php";


    if (isset($_POST['op'])) {

        $op = $_POST['op'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass1'];

        if ($op == "save") {
            // echo "$name - $email - $phone - $pass";
    
            $sql = "INSERT INTO users (name,email,phone,password)
                  VALUES ('$name','$email','$phone',PASSWORD('$pass'))";

            if (mysqli_connect_errno()) {
                echo ("Connect failed: %s " + mysqli_connect_error());
                exit();
            }

            if (!mysqli_query($link, $sql)) {
                echo ("Error message: %s " + mysqli_error($link));
            } else {
                ?>
                <div class="container p-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Success!</div>
                        <div class="panel-body">Your registration was successful. Please go to Login Page.</div>
                    </div>
                </div>
                <?php
            }

            /* close connection */
            mysqli_close($link);




        }
    }

    ?>

    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="img/sorath_logo.png" alt="logo">
                    </div>

                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register</h4>
                            <form method="POST" class="my-login-validation" novalidate="" action=registration.php>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Name is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control" name="phone" value="" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Phone is invalid
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="password">Password

                                    </label>
                                    <input id="pass1" type="password" class="form-control" name="pass1" required
                                        data-eye onChange="form.pass2.pattern=this.value">
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Confirm Password

                                    </label>
                                    <input id="pass2" type="password" class="form-control" name="pass2" required
                                        data-eye>
                                    <div class="invalid-feedback">
                                        Confirm Password is required & it should match with password.
                                    </div>
                                </div>



                                <div class="form-group m-0">
                                    <button type="submit" value="Save data" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>
                                <input type="hidden" name="op" value="save" />

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