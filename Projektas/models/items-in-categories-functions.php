<?php


function getCategorieSubTable($itemId) {
  $sqlCommand = "SELECT * FROM items_in_categories WHERE item_id = '$itemId' ";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no categories found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

function getItemSubTable($catId) {
  $sqlCommand = "SELECT * FROM items_in_categories WHERE categorie_id = '$catId' ";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no categories found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

// trina jungti tarp prekes ir kategorijos tarpineje lenteleje
// trina visas eilutes kur yra prekes id
function deleteItemConnectionToCategory($itemId) {
  $sqlCommand = "DELETE FROM items_in_categories WHERE item_id = '$itemId' ";
  $delete = mysqli_query(getConnection(), $sqlCommand);
  if ($delete == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to delete a category";
  }
}


// kuria jungti tarp prekes ir kategorijos id tarpineje lenteleje
function createItemConnectionToCat($itemId, $catId) {
  $sqlCommand = "INSERT INTO items_in_categories VALUES ('$itemId', '$catId')";
  $create = mysqli_query(getConnection(), $sqlCommand);
  if ($create == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to create a category";
  }
}


function updateItemConnectionToCat($itemId, $catId) {
  $sqlCommand = " UPDATE items_in_categories
                  SET categorie_id = '$catId'
                  WHERE item_id = '$itemId'
                  LIMIT 1 ";
  $update = mysqli_query(getConnection(), $sqlCommand);
  if ($update == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to update category";
  }
}
