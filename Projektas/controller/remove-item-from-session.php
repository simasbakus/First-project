<?php
session_start();

$itemId = $_POST['id'];
if (isset($_SESSION["items"][$itemId])) {
  unset($_SESSION["items"][$itemId]);
}
