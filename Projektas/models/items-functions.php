<?php


// iesko konkrecios eilutes kurios id = $nr
function getItem($nr) {
  $sqlCommand = "SELECT * FROM items WHERE id = '$nr' ";
  $resultsSqlObject = mysqli_query(getConnection(), $sqlCommand);
  if ($resultsSqlObject == false && DEBUG_MODE > 0) {
    echo "ERROR === item with this id not found";
  } else {
    $resultsArray = mysqli_fetch_assoc($resultsSqlObject);
    // test
    // print_r($resultsArray)
    return $resultsArray;
  }
}

function getItems($limit = 9999) {
  $sqlCommand = "SELECT * FROM items LIMIT $limit";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no users found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}



function getItemsDescending($limit = 9999) {
  $sqlCommand = "SELECT * FROM items ORDER BY id DESC LIMIT $limit";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no users found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}


// isveda visas prekes (arba kiek bus nurodyta vietoj $limit) kuriu id yra prie kategoriju id tarpineje items_in_categories lenteleje
function getItemsCat($catNr, $limit = 9999) {
  $sqlCommand = "SELECT * FROM items
                  INNER JOIN items_in_categories
                  ON items.id = items_in_categories.item_id
                  WHERE items_in_categories.categorie_id = '$catNr'
                  LIMIT $limit";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no items found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

// sukuria nauja  preke.
// $name - pavadinimas
// $about - aprasymas
// $maker - gamintojas
// $price - kaina
// $quantity - turimas kiekis
function createItem($name, $about, $maker, $price, $quantity) {
  $sqlCommand = "INSERT INTO items VALUES (NULL, '$name', '$about', '$maker', '$price', '$quantity')";
  $create = mysqli_query(getConnection(), $sqlCommand);
  if ($create == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to create item";
  }
}

// istrina preke kurios id = $nr
function deleteItem($nr) {
  $sqlCommand = "DELETE FROM items WHERE id = '$nr' ";
  $delete = mysqli_query(getConnection(), $sqlCommand);
  if ($delete == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to delete item";
  }
}

// redaguoja preke kurios id = $nr
// atnaujina kintamuosius:
// $name - pavadinimas
// $about - aprasymas
// $maker - gamintojas
// $price - kaina
// $quantity - turimas kiekis
function updateItem($nr, $name, $about, $maker, $price, $quantity) {
  $sqlCommand = " UPDATE items
                  SET name = '$name', about = '$about', maker = '$maker', price = '$price', quantity = '$quantity'
                  WHERE id = '$nr'
                  LIMIT 1 ";
  $update = mysqli_query(getConnection(), $sqlCommand);
  if ($update == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to update item";
  }
}
