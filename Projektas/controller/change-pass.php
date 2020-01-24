<?php
require_once('../models/connection.php');
require_once('../models/users-functions.php');

$oldPass = htmlspecialchars(strip_tags($_POST['oldPass']), ENT_QUOTES);
$newPass = htmlspecialchars(strip_tags($_POST['newPass']), ENT_QUOTES);
$newPassCoded = password_hash($newPass, PASSWORD_BCRYPT);
$newPassRep = htmlspecialchars(strip_tags($_POST['newPassRep']), ENT_QUOTES);

if (isset($pass)) {
  unset($pass);
}

$user = getUser($_COOKIE['logedin']);
if (password_verify($oldPass, $user['pass']) && $newPass == $newPassRep) {
  updateUser($_COOKIE['logedin'], $user['user_name'], $newPassCoded, $user['name'], $user['lname'], $user['email'], $user['adress'], $user['post_code']);
} else {
  $pass['changePass'] = "error";
  echo json_encode($pass);
}
