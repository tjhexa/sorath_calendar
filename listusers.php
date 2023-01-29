<!DOCTYPE HTML>

<html>

<head>
    <title>Registration</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">


    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

     <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>   

<style>

    </style>
</head>

<body>



    <?php

    include "database.php";
    include "restricted.php";



    if (isset($_COOKIE['is_admin'])) {

        $is_admin = $_COOKIE['is_admin'];
        if ($is_admin == 0) {
            echo "Unauthorized access! Please contact administrator.";
            exit;
        }
    }

    ?>

    
<?php

include "headerbar.php";

?>
    <div class="container">
        <h2>User List</h2>
        <p>All available sorath portal users list:</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Is Admin?</th>
                    <th scope="col">Can Edit Events?</th>
                    <th scope="col">Date Added</th>
                    <th scope="col">Is Deleted?</th>
                </tr>
            </thead>
            <tbody>


                <?php
                $sql = "SELECT * FROM users";
                $users_query = mysqli_query($link, $sql);



                //while ($users_query = mysqli_fetch_array($users_query)) {
                while ($row = $users_query->fetch_assoc()) {
                    //echo $row['is_admin'];
                    ?>
                    
                    <tr class="<?php if ($row['is_admin'] == 1) {
                        echo "success";
                    } else if ($row['is_deleted'] == 1){
                        echo "danger";
                    } else {
                        echo "";
                    } ?>">
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['phone']; ?>
                        </td>

                        <td>
                            <?php if ($row['is_admin'] == 1) {
                                echo "YES";
                            } else {
                                echo "No";
                            }
                            ; ?>
                        </td>

                        <td>
                            <?php if ($row['can_edit'] == 1) {
                                echo "YES";
                            } else {
                                echo "No";
                            }
                            ; ?>
                        </td>

                        <td>
                            <?php echo $row['date_added']; ?>
                        </td>
                        <td>
                            <?php if ($row['is_deleted'] == 1) {
                                echo "YES";
                            } else {
                                echo "No";
                            }
                            ; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

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