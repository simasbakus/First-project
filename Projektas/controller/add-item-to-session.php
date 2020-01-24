<?php
session_start();
if (isset($_POST["qty"])) {
  $itemQty = $_POST["qty"];
  $itemId = $_POST["id"];
  if ($itemQty > 0 && $itemQty < 201) {
    if (isset($_SESSION["items"][$itemId])) {
          $_SESSION["items"][$itemId]["qty"] += $itemQty;
    } else {
      $_SESSION["items"][$itemId] = array("id" => $itemId, "qty" => $itemQty);
    }
  }
} else {
  $itemId = $_POST["id"];
  if (isset($_SESSION["items"][$itemId])) {
    $_SESSION["items"][$itemId]["qty"]++;
  } else {
    $_SESSION["items"][$itemId] = array("id" => $itemId, "qty" => 1);
  }
}
