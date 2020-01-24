<?php
require_once('../models/connection.php');
require_once('../models/users-functions.php');


$name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES);
$lname = htmlspecialchars(strip_tags($_POST['lname']), ENT_QUOTES);
$username = htmlspecialchars(strip_tags($_POST['username']), ENT_QUOTES);
$pass = htmlspecialchars(strip_tags($_POST['pass']), ENT_QUOTES);
// $passCoded = md5($pass);
$passCoded = password_hash($pass, PASSWORD_BCRYPT);
$passRep = htmlspecialchars(strip_tags($_POST['passRep']), ENT_QUOTES);
// $passCodedRep = md5($passRep);
// $passCodedRep = password_hash($passRep, PASSWORD_BCRYPT);
$email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES);
$adress = htmlspecialchars(strip_tags($_POST['adress']), ENT_QUOTES);
$postCode = htmlspecialchars(strip_tags($_POST['postCode']), ENT_QUOTES);

if (isset($errors)) {
  unset($errors);
}

$ifExistsUsername = getUserByUsername($username);
$ifExistsEmail = getUserByEmail($email);

if ($ifExistsUsername == false && $ifExistsEmail == false && $pass == $passRep) {
  createUser($username, $passCoded, $name, $lname, $email, $adress, $postCode);
} else {
  if ($ifExistsUsername == true) {
    $errors['username'] = "error";
  }
  if ($ifExistsEmail == true) {
    $errors['email'] = "error";
  }
  if ($pass != $passRep) {
    $errors['pass'] = "error";
  }
  echo json_encode($errors);
}
