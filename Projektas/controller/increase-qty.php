<?php
session_start();

$itemId = $_POST['id'];
if (isset($_SESSION["items"][$itemId])) {
  $_SESSION["items"][$itemId]["qty"]++;
}
