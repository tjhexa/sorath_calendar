<?php
    setcookie("auth_id","");
    setcookie("auth_email","");


    setcookie("auth_username", "");

    setcookie("is_admin", "");
    setcookie("can_edit", "");
    setcookie("is_deleted", "");
    setcookie("can_add", "");

    header("Location: login.php");
    exit();

?>