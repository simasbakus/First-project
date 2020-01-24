<?php


// iesko konkrecios eilutes kurios id = $nr
function getOrderDetail($nr) {
  $sqlCommand = "SELECT * FROM order_detail WHERE id = '$nr' ";
  $resultsSqlObject = mysqli_query(getConnection(), $sqlCommand);
  if ($resultsSqlObject == false && DEBUG_MODE > 0) {
    echo "ERROR === order_detail id not found";
  } else {
    $resultsArray = mysqli_fetch_assoc($resultsSqlObject);
    // test
    // print_r($resultsArray)
    return $resultsArray;
  }
}


// isveda visas eilutes (arba kiek bus nurodyta vietoj $limit) kuriose order_id = $orderId
function getOrderDetails($orderId, $limit = 9999) {
  $sqlCommand = "SELECT * FROM order_detail WHERE order_id = '$orderId' LIMIT $limit";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no order details found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

// sukuria nauja order_detail eilute
// $orderId - uzsakymo nr
// $itemId - prekes
// $quantity - prekiu kiekis
function createOrderDetail($orderId, $itemId, $quantity) {
  $sqlCommand = "INSERT INTO order_detail VALUES (NULL, '$orderId', '$itemId', $quantity)";
  $create = mysqli_query(getConnection(), $sqlCommand);
  if ($create == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to create order detail";
  }
}

// istrina uzsakyma kurio id = $nr
function deleteOrderDetail($nr) {
  $sqlCommand = "DELETE FROM order_detail WHERE id = '$nr' ";
  $delete = mysqli_query(getConnection(), $sqlCommand);
  if ($delete == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to delete order detail";
  }
}

// redaguoja order_detail eilute kurios id = $nr
// atnaujina kintamuosius:
// $orderId - uzsakymo nr
// $itemId - prekes
// $quantity - prekiu kiekis
function updateOrderDetail($nr, $orderId, $itemId, $quantity) {
  $sqlCommand = " UPDATE orders
                  SET order_id = '$orderId', item_id = '$itemId', quantity = '$quantity'
                  WHERE id = '$nr'
                  LIMIT 1 ";
  $update = mysqli_query(getConnection(), $sqlCommand);
  if ($update == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to update order detail";
  }
}
