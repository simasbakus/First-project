<?php
require_once('header.php');
require_once('../models/connection.php');
require_once('../models/categories-functions.php');
require_once('../models/images-functions.php');
require_once('../models/items-functions.php');
require_once('../models/order_detail-functions.php');
require_once('../models/orders-functions.php');
require_once('../models/users-functions.php');
require_once('../models/items-in-categories-functions.php');
?>

<div class="container-fluid">
  <header class="row ml-2 mt-2">
    <form class="" action="admin-control-panel.php" method="get">
      <input type="submit" name="page" value="Items">
      <input type="submit" name="page" value="Users">
      <input type="submit" name="page" value="Orders">
    </form>
    <form class="ml-5" action="page-index.php" method="post">
      <input type="submit" name="" value="Home">
    </form>
  </header>
  <?php
  if (isset($_COOKIE["logedin"])) {
    $user = getUser($_COOKIE["logedin"]);
    if ($user['privilliges'] == 1) {

      // display all items
      if ($_GET["page"] == "Items") {
        $items = getItems();
        $item = mysqli_fetch_assoc($items);
        echo "<form class='row my-4 mx-2' action='admin-control-panel.php?page=addItem' method='post'>
                <input type='submit' value='Add new item' class='col btn btn-outline-secondary'>
              </form>";
        while ($item) {
          $images = getImages($item['id']);
          $image = mysqli_fetch_assoc($images);
          $catIds = getCategorieSubTable($item['id']);
          $catIdArray = mysqli_fetch_assoc($catIds);
          $catId = $catIdArray['categorie_id'];
          echo "<div class='row my-4 mx-2 d-flex align-items-center'>
                  <h6 class='col-1'>Id: $item[id]</h6>
                  <h6 class='col-1'>$item[name]</h6>
                  <h6 class='col-1'>$item[maker]</h6>
                  <h6 class='col-1'>$item[price] EUR</h6>
                  <h6 class='col-1'>Qty: $item[quantity]</h6>";
          while ($catId) {
            $cat = getCategorie($catId);
            echo "<div class='col'>
                    <h6>Main cat: $cat[main_cat_name]</h6>
                    <h6>Sub cat: $cat[sub_cat_name]</h6>
                  </div>";
            $catId = mysqli_fetch_assoc($catIds);
          }
          while ($image) {
            echo "<div class='col-1'>
                    <p>Img id: $image[id]</p>
                    <img src='../images/$image[img_name]' height='50px' width='auto'>
                    <p>Pos: $image[position]</p>
                  </div>";
            $image = mysqli_fetch_assoc($images);
          }
          echo   "<form class='mr-2' action='admin-control-panel.php?page=update&id=$item[id]' method='post'>
                    <input type='submit' value='update' class='btn btn-outline-secondary'>
                  </form>
                  <form class='' action='../controller/delete-item.php?id=$item[id]' method='post'>
                    <input type='submit' value='delete' class='btn btn-outline-danger'>
                  </form>
                </div><hr>";
          $item = mysqli_fetch_assoc($items);
        }
        echo "<form class='row my-4 mx-2' action='admin-control-panel.php?page=addItem' method='post'>
                <input type='submit' value='Add new item' class='col btn btn-outline-secondary'>
              </form>";
      }


      // create new item
      if ($_GET['page'] == "addItem") {
        echo "<form class='col mt-4 ml-2' action='../controller/create-new-item.php' method='post'>
                <input class='row mb-2' type='text' value='' name='itemName' placeholder='Item Name' required>
                <input class='row mb-2' type='text' value='' name='aboutItem' placeholder='About item' required>
                <input class='row mb-2' type='text' value='' name='itemMaker' placeholder='Item Maker' required>
                <div class='row mb-2'>
                  <input class='' type='text' value='' name='itemPrice' placeholder='Item Price' required>
                  <p>Eur</p>
                </div>
                <div class='row mb-2'>
                  <input class='' type='text' value='' name='itemQty' placeholder='Item Quantity' required>
                  <p>Quantity</p>
                </div>
                <input class='row mb-2' type='text' value='' name='mainCatName' placeholder='Main category item`s in' required>
                <input class='row mb-2' type='text' value='' name='subCatName' placeholder='Sub category item`s in' required>
                <input class='row mb-2 btn btn-outline-secondary' type='submit' value='Add item images' name=''>
              </form>";
      }


      // add item images
      if ($_GET['page'] == "createItemImages") {
        echo "<h4 class='row mt-4 ml-2'>Add item images</h4>
              <div class='row mt-4 ml-2'>
                <form class='' action='../controller/upload-image.php' method='post' enctype='multipart/form-data'>
                  <input type='file' name='file[]'' value='' multiple>
                  <input type='submit' name='submit' value='Upload images'>
                </form>
              </div>";
      }


      // check item images positions
      if ($_GET['page'] == "checkItemImages") {
        echo "<h4 class='row mt-4 ml-2'>Check item images positions</h4>
              <div class='row'>
                <form class='col mt-4 ml-2'action='../controller/update-image-position.php' method='post'>";
        $items = getItemsDescending(1);
        $item = mysqli_fetch_assoc($items);
        $images = getImages($item['id']);
        $image = mysqli_fetch_assoc($images);
        $i = 1;
        while ($image) {
          echo "  <p class='row'>Image position</p>
                  <input class='row mb-2' value='$image[position]' name='itemImage$i'>
                  <img class='row mb-2' src='../images/$image[img_name]' height='50px' width='auto'>";
          $i++;
          $image = mysqli_fetch_assoc($images);
        }
        echo "    <input class='row mb-2' type='submit' value='Complete'>
                </form>
              </div>";
      }



      // update item
      if ($_GET['page'] == "update") {

        $item = getItem($_GET['id']);
        echo "<form class='col mt-4 ml-2' action='../controller/update-item.php' method='post'>
                <input class='row mb-2' type='hidden' value='$item[id]' name='itemId' required>
                <input class='row mb-2' type='text' value='$item[name]' name='itemName' required>
                <input class='row mb-2' type='text' value='$item[about]' name='aboutItem' required>
                <input class='row mb-2' type='text' value='$item[maker]' name='itemMaker' required>
                <div class='row mb-2'>
                  <input class='' type='text' value='$item[price]' name='itemPrice' required>
                  <p>Eur</p>
                </div>
                <div class='row mb-2'>
                  <input class='' type='text' value='$item[quantity]' name='itemQty' required>
                  <p>Quantity</p>
                </div>";

        $categoriesSide = getCategorieSubTable($item['id']);
        $categorieSide = mysqli_fetch_assoc($categoriesSide);
        while ($categorieSide) {
          $categorie = getCategorie($categorieSide['categorie_id']);
          echo "<input class='row mb-2' type='text' value='$categorie[main_cat_name]' name='mainCatName' required>
                <input class='row mb-2' type='text' value='$categorie[sub_cat_name]' name='subCatName' required>";
          $categorieSide = mysqli_fetch_assoc($categoriesSide);
        }

        $images = getImages($item['id']);
        $image = mysqli_fetch_assoc($images);
        while ($image) {
          echo "<div class='row mb-2'>
                  <img class='col-1' src='../images/$image[img_name]' height='50px' width='auto'>
                  <input type='submit' class='col-1 ml-2 btn btn-outline-danger btn-delete-img' value='Delete'>
                </div>";
          $image = mysqli_fetch_assoc($images);
        }

        echo "  <input class='row mb-2 btn btn-outline-secondary' type='submit' value='Update item' name=''>
              </form>";
      }
      

      // display users
      if ($_GET['page'] == "Users") {
        $users = getUsers();
        $user = mysqli_fetch_assoc($users);
        echo "<div class='row my-4 mx-2 d-flex align-items-center text-center'>
                <p class='col-0'>Id</p>
                <p class='col-1'>username</p>
                <p class='col-1'>Name</p>
                <p class='col-1'>Last name</p>
                <p class='col-2'>email</p>
                <p class='col-1'>Adress</p>
                <p class='col-1'>Postal code</p>
                <p class='col-1'>Privilliges</p>
                <p class='col-2'>Last login</p>
                <p class='col-1'>Actions</p>
              </div><hr>";
        while ($user) {
          echo "<div class='row my-4 mx-2 d-flex align-items-center text-center'>
                  <h6 class='col-0'>$user[id]</h6>
                  <h6 class='col-1'>$user[user_name]</h6>
                  <h6 class='col-1'>$user[name]</h6>
                  <h6 class='col-1'>$user[lname]</h6>
                  <h6 class='col-2'>$user[email]</h6>
                  <h6 class='col-1'>$user[adress]</h6>
                  <h6 class='col-1'>$user[post_code]</h6>
                  <h6 class='col-1'>$user[privilliges]</h6>
                  <h6 class='col-2'>$user[last_log_in]</h6>
                  <form class='mr-2' action='../controller/add-user-privilliges.php?id=$user[id]' method='post'>
                    <input type='submit' value='+' class='btn btn-outline-success'>
                  </form>
                  <form class='mr-2' action='../controller/remove-user-privilliges.php?id=$user[id]' method='post'>
                    <input type='submit' value='-' class='btn btn-outline-secondary'>
                  </form>
                  <form class='mr-2' action='../controller/delete-user.php?id=$user[id]' method='post'>
                    <input type='submit' value='delete' class='btn btn-outline-danger'>
                  </form>
                </div>";
        $user = mysqli_fetch_assoc($users);
        }
      }

      // display Orders
      if ($_GET['page'] == "Orders") {
        $orders = getOrders();
        $order = mysqli_fetch_assoc($orders);
        echo "<div class='row my-4 mx-2 d-flex align-items-center text-center'>
                <p class='col-0'>Id</p>
                <p class='col-2'>Name</p>
                <p class='col-1'>Last Name</p>
                <p class='col-2'>email</p>
                <p class='col-1'>Adress</p>
                <p class='col-1'>Postal code</p>
                <p class='col-1'>Total price EUR</p>
                <p class='col-1'>User id</p>
                <p class='col-1'>Date</p>
              </div><hr>";
        while ($order) {
          echo "<div>
                  <div class='row my-4 mx-2 d-flex align-items-center text-center'>
                    <h6 class='col-0'>$order[id]</h6>
                    <h6 class='col-2'>$order[name]</h6>
                    <h6 class='col-1'>$order[lname]</h6>
                    <h6 class='col-2'>$order[email]</h6>
                    <h6 class='col-1'>$order[adress]</h6>
                    <h6 class='col-1'>$order[post_code]</h6>
                    <h6 class='col-1'>$order[total_price]</h6>
                    <h6 class='col-1'>$order[user_id]</h6>
                    <h6 class='col-1'>$order[order_date]</h6>
                    <button class='show-admin-order-details btn btn-outline-info mr-1'>Show details</button>
                    <button class='hide-admin-order-details btn btn-outline-warning'>Hide details</button>
                  </div>
                  <div class='row admin-order-details py-2'>";
          $orderDetails = getOrderDetails($order['id']);
          $orderDetail = mysqli_fetch_assoc($orderDetails);
          while ($orderDetail) {
            $item = getItem($orderDetail['item_id']);
            $totalPerItem = $item['price'] * $orderDetail['quantity'];
            echo "  <div class=col>
                      <div class='row my-4 mx-2 d-flex align-items-center text-center'>
                        <h6 class='col-1'>Item id: $orderDetail[item_id]</h6>
                        <h6 class='col-2'>Item name: $item[name]</h6>
                        <h6 class='col-2'>Item maker: $item[maker]</h6>
                        <h6 class='col-2'>Price per unit: $item[price] EUR</h6>
                        <h6 class='col-1'>Qty: $orderDetail[quantity]</h6>
                        <h6 class='col-1'>$totalPerItem EUR</h6>
                      </div>
                    </div>";
            $orderDetail = mysqli_fetch_assoc($orderDetails);
          }
          echo "</div></div><hr>";
          $order = mysqli_fetch_assoc($orders);
        }
      }






    }
  } else {
    echo "<h1>Cia nieko nera</h1>";
  }
  ?>
</div>



<?php include('footer.php'); ?>
