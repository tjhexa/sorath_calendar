<?php

  try {
    $auth = new PDO('mysql:host=localhost;dbname=sorath_db;charset=utf8', 'sorath_user', 'sorath');
  }
  catch(Exception $error) {
    die('Error : ' . $error->getMessage());
  }

?>