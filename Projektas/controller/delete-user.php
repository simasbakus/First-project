<?php

require_once('../models/connection.php');
require_once('../models/users-functions.php');

if (isset($_COOKIE['logedin'])) {
  $user = getUser($_COOKIE['logedin']);
  if ($user['privilliges'] == 1) {

    deleteUser($_GET['id']);
    header('Location: ../view/admin-control-panel.php?page=Users');


  }
}
