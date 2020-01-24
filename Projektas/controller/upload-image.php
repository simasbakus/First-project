<?php

require_once('../models/connection.php');
require_once('../models/images-functions.php');
require_once('../models/items-functions.php');


if (!empty($_FILES['file']['name'][0])) {
  $files = $_FILES['file'];
  $allowed = ['jpg', 'jpeg', 'png', 'gif'];
  $i = 1;
  foreach ($files['name'] as $position => $file_name) {
    // $file_name = $files['name'][$position];    nerasomas nes jau nurodytas foreach salygoj
    $file_tmp = $files['tmp_name'][$position];
    $file_size = $files['size'][$position];
    $file_error = $files['error'][$position];

    $file_ext = explode('.', $file_name);
    $file_act_ext = strtolower(end($file_ext));
    if (file_exists('../images/'.$file_name) == false) {
      if (in_array($file_act_ext, $allowed)) {
        if ($file_error === 0) {
          if ($file_size < 100000) {
            $items = getItemsDescending(1);
            $item = mysqli_fetch_assoc($items);
            $fileDestination = '../images/'.$file_name;
            move_uploaded_file($file_tmp, $fileDestination);
            createImage($file_name, $i, $item['id']);
          } else {
            echo "failas per didelis";
          }
        } else {
          echo "Ivyko klaida ikeliant faila";
        }
      } else {
        echo "Netinkamas failo tipas";
      }
    } else {
      echo "toks failas jau yra";
    }
    $i++;
  }
  header('Location: ../view/admin-control-panel.php?page=checkItemImages');
}







// $fileName = $file['name'];
// $fileType = $file['type'];
// $fileTmp_name = $file['tmp_name'];
// $fileError = $file['error'];
// $fileSize = $file['size'];
//
// $fileExtension = explode('.', $fileName);                   //padalina failo pavadinima i dalis aplink '.'
// $fileActualExtansion = strtolower(end($fileExtension));     //paskutine failo dali pavercia i mazasias raodes
//
// $allowed = ['jpg', 'jpeg', 'png', 'gif'];
//  if (in_array($fileActualExtansion, $allowed)) {            //tikrina ar failo tipas yra leistinas
//    if ($fileError === 0) {                                  //tikrina ar ikeliant faila neivyko erroru
//      if ($fileSize < 100000) {                              //tikrina failo dydi
//        $fileDestination = '../images/'.$fileName;           //nurdo kur failas bus ikeltas (path)
//        move_uploaded_file($fileTmp_name, $fileDestination); //ikelia faila i nauja destonation
//        echo "Failas sekmingai ikeltas";
//      } else {
//        echo "Per didelis failas";
//      }
//    } else {
//      echo "ikeliant ivyko klaida";
//    }
//  } else {
//    echo "Netinkamas failo tipas";
//  }
