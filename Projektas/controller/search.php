<?php
require_once('../models/connection.php');
require_once('../models/categories-functions.php');
require_once('../models/items-functions.php');
require_once('../models/images-functions.php');

$text = $_GET['text'];
$multiCat = getCategoriesSearch($text);
$catNr = mysqli_fetch_assoc($multiCat);
while ($catNr) {
  $multiItems = getItems("$catNr[id]");
  $item = mysqli_fetch_assoc($multiItems);
  while ($item) {
    $img = getImagePos1("$item[id]");
    echo "<div class='item card col-3 mb-5'>
            <a href='page-item.php?item=$item[id]' class='item'>
              <img src='../images/$img[img_name]' class='item-img' height='250px' width='100%'>
              <div class='item-body text-center'>
                <h3 class='title'>$item[name]</h3>
                <h4>$item[price] EUR</h4>
              </div>
            </a>
            <input type='submit' name='' value='Buy now' class='btn'>
          </div>";
    $item = mysqli_fetch_assoc($multiItems);
  }
  $catNr = mysqli_fetch_assoc($multiCat);
}
