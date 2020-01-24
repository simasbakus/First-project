<?php
require_once('../models/connection.php');
require_once('../models/users-functions.php');

$username = htmlspecialchars(strip_tags($_POST['username']), ENT_QUOTES);
$pass = htmlspecialchars(strip_tags($_POST['pass']), ENT_QUOTES);
// $passCoded = md5($pass);
if (isset($login)) {
  unset($login);
}
$user = getUserByUsername($username);
if ($user == true && password_verify($pass, $user['pass'])) {
  setcookie("logedin" , $user['id'], time() + (86400 * 30), "/");
  updateUser($user['id'], $user['user_name'], $user['pass'], $user['name'], $user['lname'], $user['email'], $user['adress'], $user['post_code'], $user['privilliges']);
} else {
  $login["login"] = "false";
  echo json_encode($login);
}
