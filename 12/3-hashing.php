<?php

  /**
   * 3-hashing.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function hashing($arr, $target) {
    $hashTable = array();

    foreach ($arr as $value) {
      $hashTable[hash('sha256', $value)] = $value;
    }

    return $hashTable[hash('sha256', $target)] ?? null;
  }

  // Contoh
  $arr = [15, 3, 45, 9, 7, 22, 1];
  $target = 7;

  echo "Array:\n";
  print_r($arr);

  $result = hashing($arr, $target);

  if ($result !== null) {
    echo "\n$target ditemukan dalam array.\n";
  } else {
    echo "\n$target tidak ditemukan dalam array.\n";
  }

?>