<?php
if (isset($_COOKIE["logedin"])) {
  unset($_COOKIE["logedin"]);
  setcookie("logedin", "1", time() -3600, "/");
  header('Location: ../view/page-index.php');
}
