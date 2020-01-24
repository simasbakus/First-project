<?php

define( 'DB_NAME',          'eshop');
define( 'DB_TYPE',          'localhost');
define( 'MYSQL_USER_NAME',  'root');
define( 'MYSQL_USER_PASS',  'root');
define( 'DEBUG_MODE',       '0');

// mysqli_connect( [$host, $user, $password, $database, $port, $socket])
$connect = mysqli_connect( DB_TYPE, MYSQL_USER_NAME, MYSQL_USER_PASS, DB_NAME );
mysqli_set_charset($connect, "UTF8");

function getConnection() {
  global $connect;
  if ($connect == false) {
    if (DEBUG_MODE > 0) {
      echo "ERROR === connection failed";
      echo mysqli_connect_error($connect);
    }
    return NULL;
  } else {
    if (DEBUG_MODE > 1) {
      echo "connection successful";
    }
    return $connect;
  }
}
