<?php


// iesko konkrecios eilutes kurios id = $nr
function getOrder($nr) {
  $sqlCommand = "SELECT * FROM orders WHERE id = '$nr' ";
  $resultsSqlObject = mysqli_query(getConnection(), $sqlCommand);
  if ($resultsSqlObject == false && DEBUG_MODE > 0) {
    echo "ERROR === order id not found";
  } else {
    $resultsArray = mysqli_fetch_assoc($resultsSqlObject);
    // test
    // print_r($resultsArray)
    return $resultsArray;
  }
}


// isveda visus vartotojus (arba kiek bus nurodyta vietoj $limit)
function getOrders($limit = 9999) {
  $sqlCommand = "SELECT * FROM orders ORDER BY id DESC LIMIT $limit";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no orders found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

// sukuria nauja uzsakyma.
// $name - vardas
// $lname - pavarde
// $email - el pastas
// $adress - adresas
// $postCode - pasto kodas
// $total - suma
// $userId - uzsakes vartotojas
// $date - uzsakymo data
function createOrder($name, $lname, $email, $adress, $postCode, $total, $userId = 0) {
  $sqlCommand = "INSERT INTO orders VALUES (NULL, '$name', '$lname', '$email', '$adress', '$postCode', '$total', '$userId', CURRENT_TIMESTAMP)";
  $create = mysqli_query(getConnection(), $sqlCommand);
  if ($create == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to create order";
  }
}

// istrina uzsakyma kurio id = $nr
function deleteOrder($nr) {
  $sqlCommand = "DELETE FROM orders WHERE id = '$nr' ";
  $delete = mysqli_query(getConnection(), $sqlCommand);
  if ($delete == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to delete order";
  }
}

// redaguoja uzsakyma kurio id = $nr
// atnaujina kintamuosius:
// $name - vardas
// $lname - pavarde
// $email - el pastas
// $adress - adresas
// postCode - pasto kodas
// $date - uzsakymo data
// $total = suma
// $userId - uzsake vartotojas
function updateOrder($nr, $name, $lname, $email, $adress, $postCode, $total, $userId) {
  $sqlCommand = " UPDATE orders
                  SET name = '$name', lname = '$lname', email = '$email', adress = '$adress', post_code = '$postCode', total_price = '$total', user_id = '$userId', order_date = CURRENT_TIMESTAMP
                  WHERE id = '$nr'
                  LIMIT 1 ";
  $update = mysqli_query(getConnection(), $sqlCommand);
  if ($update == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to update order";
  }
}
