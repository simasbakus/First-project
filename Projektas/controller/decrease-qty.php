<?php
session_start();

$itemId = $_POST['id'];
if (isset($_SESSION["items"][$itemId])) {
  if ($_SESSION["items"][$itemId]["qty"] > 1) {
    $_SESSION["items"][$itemId]["qty"]--;
  }
}
