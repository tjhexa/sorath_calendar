<?php

if (isset($_COOKIE['auth_id'])) {

    $id = $_COOKIE['auth_id'];
    $email = $_COOKIE['auth_email'];
    $username_loggedin = $_COOKIE['auth_username'];
    $user_is_admin = $_COOKIE['is_admin'];
    $user_is_deleted = $_COOKIE['is_deleted'];
    $user_can_edit = $_COOKIE['can_edit'];
    $user_can_add = $_COOKIE['can_add'];

    $sql = "SELECT id FROM users WHERE id='$id' AND email='$email'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 0) {        
        header("Location: login.php");
        exit;
    }
} else {
    //echo "Unauthorized access! Please Login.";
    header("Location: login.php");
    exit;
}

?>