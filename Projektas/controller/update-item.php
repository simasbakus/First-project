<?php

require_once('../models/connection.php');
require_once('../models/categories-functions.php');
require_once('../models/images-functions.php');
require_once('../models/items-functions.php');
require_once('../models/items-in-categories-functions.php');
require_once('../models/users-functions.php');


if (isset($_COOKIE['logedin'])) {
  $user = getUser($_COOKIE['logedin']);
  if ($user['privilliges'] == 1) {

        updateItem($_POST['itemId'], $_POST['itemName'], $_POST['aboutItem'], $_POST['itemMaker'], $_POST['itemPrice'], $_POST['itemQty']);


        $categories = getCategories($_POST['mainCatName']);
        $categorie = mysqli_fetch_assoc($categories);
        while ($categorie) {
          if ($categorie['sub_cat_name'] == $_POST['subCatName']) {
            updateItemConnectionToCat($_POST['itemId'], $categorie['id']);
          }
          $categorie = mysqli_fetch_assoc($categories);
        }


        


        header('Location: ../view/admin-control-panel.php?page=Items');

  }
}
