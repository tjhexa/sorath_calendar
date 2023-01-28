<?php

    $link = mysqli_connect("localhost","sorath_user","sorath","sorath_db");
    if (!$link)
    {
        echo "MySQL Error: " . mysqli_connect_error();
    }


?>