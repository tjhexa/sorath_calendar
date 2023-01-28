<?php

if (isset($_COOKIE['auth_id'])) {

    $id = $_COOKIE['auth_id'];
    $email = $_COOKIE['auth_email'];

    $sql = "SELECT id FROM users WHERE id='$id' AND email='$email'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "Unauthorized access!";
        exit;
    }
}else{
    echo "Unauthorized access! Please Login.";
    exit;
}

?>