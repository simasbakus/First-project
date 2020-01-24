<?php

require_once('../models/connection.php');
require_once('../models/items-functions.php');
require_once('../models/orders-functions.php');
require_once('../models/order_detail-functions.php');
require_once('../models/users-functions.php');
session_start();

$name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES);
$lname = htmlspecialchars(strip_tags($_POST['lname']), ENT_QUOTES);
$email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES);
$adress = htmlspecialchars(strip_tags($_POST['adress']), ENT_QUOTES);
$postCode = htmlspecialchars(strip_tags($_POST['postCode']), ENT_QUOTES);

$items = $_SESSION["items"];
$total = 0;
foreach ($items as $value) {
  $itemId = $value["id"];
  $itemQty = $value["qty"];
  $item = getItem($itemId);
  $sum = $itemQty * $item['price'];
  $total += $sum;
  $newQty = $item['quantity'] - $itemQty;
  updateItem($item['id'], $item['name'], $item['about'], $item['maker'], $item['price'], $newQty);

}
if (isset($_COOKIE["logedin"])) {
  $user = getUser($_COOKIE['logedin']);
  createOrder($name, $lname, $email, $adress, $postCode, $total, $user['id']);
} else {
  createOrder($name, $lname, $email, $adress, $postCode, $total);
}

$orders = getOrders(1);
$order = mysqli_fetch_assoc($orders);

foreach ($items as $value) {
  createOrderDetail($order['id'], $value['id'], $value['qty']);
}
session_destroy();
$message = 'Shopping successful, order has been sent';
echo "<script type='text/javascript'>
        alert('$message');
        location='../view/page-index.php';
      </script>";
