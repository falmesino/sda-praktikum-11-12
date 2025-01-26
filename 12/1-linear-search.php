<?php

  /**
   * 1-linear-search.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function linearSearch($arr, $target) {
    for ($i = 0; $i < count($arr); $i++) {
      if ($arr[$i] == $target) {
        return $i;
      }
    }

    return -1;
  }

  // Contoh
  $arr = [15, 3, 45, 9, 7, 22, 1];
  $search = 7;

  echo "Array:\n";
  print_r($arr);
  
  $result = linearSearch($arr, $search);
  
  if ($result != -1) {
    echo "\n$search ditemukan pada indeks: $result\n";
  } else {
    echo "\n$search tidak ditemukan\n";
  }

?>