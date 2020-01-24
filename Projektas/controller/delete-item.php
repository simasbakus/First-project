<?php
require_once('../models/connection.php');
require_once('../models/items-functions.php');
require_once('../models/images-functions.php');
require_once('../models/items-in-categories-functions.php');
require_once('../models/users-functions.php');

if (isset($_COOKIE['logedin'])) {
  $user = getUser($_COOKIE['logedin']);
  if ($user['privilliges'] == 1) {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      deleteItem($id);

      $images = getImages($id);
      $image = mysqli_fetch_assoc($images);
      while ($image) {
        deleteImage($image['id']);
        $image = mysqli_fetch_assoc($images);
      }

      deleteItemConnectionToCategory($id);

      header('Location: ../view/admin-control-panel.php?page=Items');
    } elseif (isset($_GET['itemId'])) {

      $id = $_GET['itemId'];
      $catId = $_GET['cat'];
      deleteItem($id);

      $images = getImages($id);
      $image = mysqli_fetch_assoc($images);
      while ($image) {
        deleteImage($image['id']);
        $image = mysqli_fetch_assoc($images);
      }

      deleteItemConnectionToCategory($id);

      header("Location: ../view/page-results.php?id=$catId");
    }




  }
}
