<?php

  /**
   * 5-tim-sort.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function timsort($arr) {
    $min_run = 32;
    $n = count($arr);
    for ($i = 0; $i < $n; $i += $min_run) {
      insertionSort(array_slice($arr, $i, $min_run));
    }
    $size = $min_run;
    while($size < $n) {
      for ($i = 0; $i < $n; $i += $size * 2) {
        merge(array_slice($arr, $i, $size), array_slice($arr, $i + $size, $size));
      }
      $size *= 2;
    }
    return $arr;
  }

?>