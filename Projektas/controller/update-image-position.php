<?php

require_once('../models/connection.php');
require_once('../models/images-functions.php');
require_once('../models/items-functions.php');

$i = 1;

$items = getItemsDescending(1);
$item = mysqli_fetch_assoc($items);
$images = getImages($item['id']);
$image = mysqli_fetch_assoc($images);
while ($image) {
  updateImage($image['id'], $image['img_name'], $_POST["itemImage$i"], $image['item_id']);
  $i++;
  $image = mysqli_fetch_assoc($images);
}
header('Location: ../view/admin-control-panel.php?page=Items');
