<?php


// iesko konkrecios eilutes kurios id = $nr
function getUser($nr) {
  $sqlCommand = "SELECT * FROM users WHERE id = '$nr' ";
  $resultsSqlObject = mysqli_query(getConnection(), $sqlCommand);
  if ($resultsSqlObject == false && DEBUG_MODE > 0) {
    echo "ERROR === user id not found";
  } else {
    $resultsArray = mysqli_fetch_assoc($resultsSqlObject);
    // test
    // print_r($resultsArray)
    return $resultsArray;
  }
}


// iesko username
function getUserByUsername($username) {
  $sqlCommand = "SELECT * FROM users WHERE user_name = '$username' ";
  $resultsSqlObject = mysqli_query(getConnection(), $sqlCommand);
  if ($resultsSqlObject == false && DEBUG_MODE > 0) {
    echo "ERROR === user id not found";
  } else {
    $resultsArray = mysqli_fetch_assoc($resultsSqlObject);
    // test
    // print_r($resultsArray)
    return $resultsArray;
  }
}

// iesko emailo
function getUserByEmail($email) {
  $sqlCommand = "SELECT * FROM users WHERE email = '$email' ";
  $resultsSqlObject = mysqli_query(getConnection(), $sqlCommand);
  if ($resultsSqlObject == false && DEBUG_MODE > 0) {
    echo "ERROR === user id not found";
  } else {
    $resultsArray = mysqli_fetch_assoc($resultsSqlObject);
    // test
    // print_r($resultsArray)
    return $resultsArray;
  }
}


// isveda visus vartotojus (arba kiek bus nurodyta vietoj $limit)
function getUsers($limit = 9999) {
  $sqlCommand = "SELECT * FROM users LIMIT $limit";
  $results = mysqli_query(getConnection(), $sqlCommand);
  if ($results == false && DEBUG_MODE > 0) {
    echo "ERROR === no users found";
  } else {
    // test
    // print_r($results);
    return $results;
  }
}

// sukuria nauja vartotoja.
// $username -
// $pass slaptazodis
// $name - vardas
// $lname - pavarde
// $email - el pastas
// $adress - adresas
function createUser($username, $pass, $name, $lname, $email, $adress, $postCode, $privilliges = 0) {
  $sqlCommand = "INSERT INTO users VALUES (NULL, '$username', '$pass', '$name', '$lname', '$email', '$adress', '$postCode', '$privilliges', CURRENT_TIMESTAMP)";
  $create = mysqli_query(getConnection(), $sqlCommand);
  if ($create == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to create user";
  }
}

// istrina vartotojas kurio id = $nr
function deleteUser($nr) {
  $sqlCommand = "DELETE FROM users WHERE id = '$nr' ";
  $delete = mysqli_query(getConnection(), $sqlCommand);
  if ($delete == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to delete user";
  }
}

// redaguoja vartotoja kurio id = $nr
// atnaujina kintamuosius:
// $username -
// $pass - slaptazodis
// $name - vardas
// $lname - pavarde
// $email - el pastas
// $adress - adresas
// $postCode - pasto kodas
// $privilliges - administratoriaus privilegijos
function updateUser($nr, $username, $pass, $name, $lname, $email, $adress, $postCode, $privilliges = 0) {
  $sqlCommand = " UPDATE users
                  SET user_name = '$username', pass = '$pass', name = '$name', lname = '$lname', email = '$email', adress = '$adress', post_code = '$postCode', privilliges = '$privilliges', last_log_in = CURRENT_TIMESTAMP
                  WHERE id = '$nr'
                  LIMIT 1 ";
  $update = mysqli_query(getConnection(), $sqlCommand);
  if ($update == false && DEBUG_MODE > 0) {
    echo "ERROR === failed to update user";
  }
}
