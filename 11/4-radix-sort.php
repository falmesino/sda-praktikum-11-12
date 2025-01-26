<?php

  /**
   * 4-radix-sort.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function radixSort($arr) {
    $max = max($arr);
    $exp = 1;
    while (floor($max / $exp) > 0) {
      $bucket = array_fill(0, 10, array());
      
      foreach($arr as $value) {
        $bucket[floor($value / $exp) % 10][] = $value;
      }

      $arr = array();
      foreach($bucket as $values) {
        $arr = array_merge($arr, $values);
      }

      $exp *= 10;
    }
    return $arr;
  }

  // Contoh Penggunaan
  // Pengurutan data sensor suhu

  $arr = array(25, 30, 20, 35, 40);
  $sorted_arr = radixSort($arr);
  print_r($sorted_arr);

?>