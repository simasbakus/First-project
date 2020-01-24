<?php include('header.php');
require_once('../models/connection.php');
require_once('../models/categories-functions.php');
require_once('../models/items-functions.php');
require_once('../models/images-functions.php');
require_once('../models/users-functions.php');
 ?>

        <div class="container-fluid">
          <!-- ******* HEADER ********* -->
          <header class="row mb-4">
            <img class="header" src="../images/header.jpg" alt="">
            <!-- ********** logo *********** -->
            <a class="logo col-2 ml-3 mt-2" href="page-index.php">
              <svg width="60" height="60" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
            </a>
            <!-- ********* navigation menu ******** -->
            <nav class="menu col-6 mt-4 mb-2">
              <ul class="row">
                <li class="col menu-item-1">
                  <h4 class="main-cat" style="cursor: pointer">MEN</h4>
                  <div class="drop-down-1">
                    <?php
                        $multiCat = getCategories("Men");
                        $cat = mysqli_fetch_assoc($multiCat);
                        while ($cat) {
                          echo "<a class='sub-cat' href='page-results.php?id=$cat[id]'>$cat[sub_cat_name]</a>";
                          $cat = mysqli_fetch_assoc($multiCat);
                        }
                     ?>
                  </div>
                </li>
                <li class="col menu-item-2">
                  <h4 class="main-cat" style="cursor: pointer">WOMEN</h4>
                  <div class="drop-down-2">
                    <?php
                        $multiCat = getCategories("Women");
                        $cat = mysqli_fetch_assoc($multiCat);
                        while ($cat) {
                          echo "<a class='sub-cat' href='page-results.php?id=$cat[id]'>$cat[sub_cat_name]</a>";
                          $cat = mysqli_fetch_assoc($multiCat);
                        }
                     ?>
                  </div>
                </li>
                <li class="col menu-item-3">
                  <h4 class="main-cat" style="cursor: pointer">CHILDREN</h4>
                  <div class="drop-down-3">
                    <?php
                        $multiCat = getCategories("Children");
                        $cat = mysqli_fetch_assoc($multiCat);
                        while ($cat) {
                          echo "<a class='sub-cat' href='page-results.php?id=$cat[id]'>$cat[sub_cat_name]</a>";
                          $cat = mysqli_fetch_assoc($multiCat);
                        }
                     ?>
                  </div>
                </li>
                <li class="col menu-item-4">
                  <h4 class="main-cat" style="cursor: pointer">ACCESSORIES</h4>
                  <div class="drop-down-4">
                    <?php
                        $multiCat = getCategories("Accessories");
                        $cat = mysqli_fetch_assoc($multiCat);
                        while ($cat) {
                          echo "<a class='sub-cat' href='page-results.php?id=$cat[id]'>$cat[sub_cat_name]</a>";
                          $cat = mysqli_fetch_assoc($multiCat);
                        }
                     ?>
                  </div>
                </li>
              </ul>
            </nav>
            <!-- ****** search, favorites, shopping cart ******* -->
            <div class="extra col d-flex justify-content-end">
              <div class="row">
                <input type="text" name="" value="" class="search-window mt-3" placeholder="Search">
                <button type="button" name="button" class="search-button col px-0 mr-3 mt-3">
                  <svg width="35" height="35" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                </button>
                <button type="button" name="button" class="login col px-0 mr-3 mt-3">
                  <svg width="35" height="35" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                </button>
                <form class="" action="page-shoppingcart.php" method="">
                  <button type="submit" name="button" value="" class="shopping-cart col px-0 mr-3 mt-3">
                    <svg width="35" height="35" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                  </button>
                </form>
              </div>
            </div>
            <?php
              if (isset($_COOKIE['logedin'])) {
                $user = getUser($_COOKIE['logedin']);
                echo "<div class='col user-window color'>
                        <h4 class='my-2'>Hello $user[user_name]</h4>
                        <form class='mb-2' action='page-user.php' method='get'>
                          <input class='settings-btn btn' type='submit' name='user-window' value='Settings'>
                        </form>
                        <form class='mb-2' action='page-user.php' method='get'>
                          <input class='user-orders-btn btn' type='submit' name='user-window' value='Orders'>
                        </form>
                        <form class='mb-2' action='../controller/logout.php' method='get'>
                          <input class='logout-btn btn' type='submit' value='Log out'>
                        </form>";
                if ($user['privilliges'] == true) {
                  echo "<form class='mb-2' action='admin-control-panel.php' method='get'>
                          <input class='control-panel-btn btn' type='submit' name='page' value='Control-panel'>
                        </form>";
                }
                echo "<input type='submit' name='' value='X' class='close-user btn'>
                    </div>";
              } else { ?>
                      <div class='login-window col'>
                        <div class='row mt-3'>
                          <h4 class='col ml-1'>Login</h4>
                          <h4 class='col'>New user?</h4>
                        </div>
                        <div class='row'>
                          <div class='col ml-3'>
                            <input class='row mb-2' type='text' name='username' value='' placeholder='username'>
                            <input class='row mb-2' type='password' name='pass' value='' placeholder='password'>
                            <input class='row login-btn btn' type='submit' name='' value='Login'>
                            <h5 class='row mb-2 login-failed'>Wrong username or password</h5>
                          </div>
                          <div class='col ml-4'>
                            <input class='row register-btn btn' type='submit' name='' value='Register'>
                          </div>
                          <input type='submit' name='' value='X' class='close-login btn'>
                        </div>
                      </div>
                      <div class='register-window col'>
                        <div class='row mt-3'>
                          <h4 class='col ml-1'>Register</h4>
                        </div>
                        <div class='row'>
                          <div class='col ml-3'>
                            <input class='row mb-2' type='text' name='name' value='' placeholder='Name' required autocomplete="off">
                            <input class='row mb-2' type='text' name='lname' value='' placeholder='Last Name' required autocomplete="off">
                            <input class='row mb-2' type='text' name='username' value='' placeholder='username' autocomplete="off">
                            <input class='row mb-2' type='password' name='pass' value='' placeholder='password' required>
                            <input class='row mb-2' type='password' name='passRep' value='' placeholder='repeat password' required>
                            <input class='row mb-2' type='email' name='email' value='' placeholder='Email' autocomplete="off">
                            <input class='row mb-2' type='text' name='adress' value='' placeholder='Adress' required autocomplete="off">
                            <input class='row mb-2' type='text' name='postCode' value='' placeholder='Postal code' required autocomplete="off">
                            <input class='row mb-2 submit-registration-btn btn' type='submit' name='' value='Register' autocomplete="off">
                            <h4 class='row mb-2 registration-successful'>Registration successful</h4>
                            <h4 class='row mb-2 fill-fields'>Please fill all the fields</h4>
                          </div>
                          <input type='submit' name='' value='X' class='close-register btn'>
                        </div>
                      </div> <?php
              }
            ?>
          </header>
          <!-- ******* MAIN SECTION ********* -->
          <main>
              <div class="row mt-5 d-flex justify-content-center">
                <?php
                  $itemId = $_GET['item'];
                  $item = getItem($itemId);
                  $imgs1 = getImages($itemId);
                  $imgs2 = getImages($itemId);
                  $img1 = mysqli_fetch_assoc($imgs1);
                  $img2 = mysqli_fetch_assoc($imgs2);
                  if ($item == true) {
                      // **************IMAGE SLIDER****************************
                    echo "<div id='carouselExampleIndicators' class='carousel slide col-5' data-ride='carousel'>
                            <ol class='carousel-indicators'>";
                            $i = 0;
                              while ($img1) {
                                if ($i == 0) {
                                  echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i' class='active'></li>";
                                } else {
                                  echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                                }
                                $i++;
                                $img1 = mysqli_fetch_assoc($imgs1);
                              }

                      echo "</ol>
                            <div class='carousel-inner'>";
                            $isFirst = true;
                              while ($img2) {
                                if ($isFirst == true) {
                                  echo "<div class='carousel-item active'>
                                          <img class='d-block w-100' src='../images/$img2[img_name]' height='350px'>
                                        </div>";
                                  $isFirst = false;
                                } else {
                                  echo "<div class='carousel-item'>
                                          <img class='d-block w-100' src='../images/$img2[img_name]' height='350px'>
                                        </div>";
                                }
                                $img2 = mysqli_fetch_assoc($imgs2);
                              }

                      echo "</div>
                              <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                <span class='sr-only'>Previous</span>
                              </a>
                              <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                <span class='sr-only'>Next</span>
                              </a>
                          </div>";
                        // *************************************************
                    echo "<div class='col-3 d-flex flex-column justify-content-between'>
                            <div>
                              <h3 class='text-center'>$item[name]</h3>
                              <h5 class='text-center'>$item[maker]</h5>
                              <p class='text-left'>$item[about]</p>
                            </div>
                            <h4 class='text-center'>$item[price] EUR</h4>
                            <h5>Qty: </h5>
                            <input type='number' name='' value='1' min='1' class='qty text-center'>
                            <input type='submit' name='' value='Add to cart' class='btn add-to-cart-item' itemId='$item[id]'>
                          </div>";
                  }
                ?>
              </div>
          </main>
          <!-- ******** Footer ****************** -->
          <footer class="row mt-4">
            <p class="col">&copy; Copyrights 2050 by nobody. All rights reversed.</p>
          </footer>


        </div>

<?php include('footer.php'); ?>
