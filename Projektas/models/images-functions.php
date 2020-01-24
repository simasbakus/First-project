<?php


// iesko konkrecios nuotraukos kurios id = $nr
function getImageById($nr) {
  $sqlCommand = "SELECT * FROM images WHERE id = '$nr' ";
  $resultsSqlObject = mysqli_query(getConnection(), $sqlCommand);
  if ($resultsSqlObject == false && DEBUG_MODE > 0) {
    echo "ERROR === image with this id not found";
  } else {
    $resultsArray = mysqli_fetch_assoc($resultsSqlObject);
    // test
    // print_r($resultsArray)
    return $resultsArray;
  }
}




// isveda visas nuotraukas (arba kiek bus nurodyta vietoj $limit) kurios priklauso prekei kurio id yra $itemNr
function getImages($itemNr, $limit = 9999) {
  $sqlCommand = "SELECT * FROM images
                  WHERE item_id = '$itemNr'
                  ORDER BY position ASC
                  LIMIT $limit";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no images found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

// sukuria nauja nuotrauka db (tik pavadinima be failo).
// $name - img pavadinimas
// $position - pozicija
// $item - kuriai prekei priklauso
function createImage($name, $position, $item) {
  $sqlCommand = "INSERT INTO images VALUES (NULL, '$name', '$position', '$item')";
  $create = mysqli_query(getConnection(), $sqlCommand);
  if ($create == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to create image";
  }
}

// istrina nuotrauka kurios id = $nr
function deleteImage($nr) {
  $sqlCommand = "DELETE FROM images WHERE id = '$nr' ";
  $delete = mysqli_query(getConnection(), $sqlCommand);
  if ($delete == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to delete image";
  }
}

// redaguoja nuotrauka kurios id = $nr
// atnaujina kintamuosius:
// $name - pavadinimas
// $position - pozicija
// $item - kuriai prekei priklausp
function updateImage($nr, $name, $position, $item) {
  $sqlCommand = " UPDATE images
                  SET img_name = '$name', position = '$position', item_id = '$item'
                  WHERE id = '$nr'
                  LIMIT 1 ";
  $update = mysqli_query(getConnection(), $sqlCommand);
  if ($update == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to update images";
  }
}
