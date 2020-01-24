<?php
require_once('../models/connection.php');
require_once('../models/users-functions.php');

$name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES);
$lname = htmlspecialchars(strip_tags($_POST['lname']), ENT_QUOTES);
$adress = htmlspecialchars(strip_tags($_POST['adress']), ENT_QUOTES);
$postCode = htmlspecialchars(strip_tags($_POST['postCode']), ENT_QUOTES);

$user = getUser($_COOKIE['logedin']);
updateUser($_COOKIE['logedin'], $user['user_name'], $user['pass'], $name, $lname, $user['email'], $adress, $postCode);
header('Location: ../view/page-user.php?user-window=Settings');
