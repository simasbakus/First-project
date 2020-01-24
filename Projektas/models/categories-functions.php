<?php


// iesko konkrecios eilutes kurios id = $nr
function getCategorie($nr) {
  $sqlCommand = " SELECT * FROM categories WHERE id = '$nr' ";
  $resultsSqlObject = mysqli_query(getConnection(), $sqlCommand);
  if ($resultsSqlObject == false && DEBUG_MODE > 0) {
    echo "ERROR === categorie with this id not found";
  } else {
    $resultsArray = mysqli_fetch_assoc($resultsSqlObject);
    // test
    // print_r($resultsArray);
    return $resultsArray;
  }
}


// isveda visas categories eilutes (arba kiek bus nurodyta vietoj $limit), kuriose main kategorija yra $mainCat
function getCategories($mainCat, $limit = 9999) {
  $sqlCommand = "SELECT * FROM categories WHERE main_cat_name = '$mainCat' LIMIT $limit ";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no categories found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

// iesko eiluciu kuriose yra tekstas $text
function getCategoriesSearch($text, $limit = 9999) {
  $sqlCommand = "SELECT * FROM categories WHERE main_cat_name OR sub_cat_name LIKE $text% LIMIT $limit ";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no categories found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

// sukuria nauja  sub ir main kategorija.
// $mainCat - pagrindine kategorija
// $subCat - pokategore
function createCategory($mainCat, $subCat) {
  $sqlCommand = "INSERT INTO categories VALUES (NULL, '$mainCat', '$subCat')";
  $create = mysqli_query(getConnection(), $sqlCommand);
  if ($create == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to create a category";
  }
}

// istrina kategorija kurios id = $nr
function deleteCategory($nr) {
  $sqlCommand = "DELETE FROM categories WHERE id = '$nr' ";
  $delete = mysqli_query(getConnection(), $sqlCommand);
  if ($delete == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to delete a category";
  }
}

// redaguoja kategorija kurios id = $nr
// $mainCat ir $subCat nauji kategoriju pavadinimai
function updateCategory($nr, $mainCat, $subCat) {
  $sqlCommand = " UPDATE categories
                  SET main_cat_name = '$mainCat', sub_cat_name = '$subCat'
                  WHERE id = '$nr'
                  LIMIT 1 ";
  $update = mysqli_query(getConnection(), $sqlCommand);
  if ($update == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to update category";
  }
}
