<?php

require_once('../models/connection.php');
require_once('../models/users-functions.php');

if (isset($_COOKIE['logedin'])) {
  $user = getUser($_COOKIE['logedin']);
  if ($user['privilliges'] == 1) {

    $user = getUser($_GET['id']);
    updateUser($_GET['id'], $user['user_name'], $user['pass'], $user['name'], $user['lname'], $user['email'], $user['adress'], $user['post_code'], 1);
    header('Location: ../view/admin-control-panel.php?page=Users');


  }
}
