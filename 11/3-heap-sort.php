<?php

  /**
   * 3-heap-sort.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function heapSort($arr) {
    $n = count($arr);

    for ($i = floor($n / 2) - 1; $i >= 0; $i--) {
      heapify($arr, $n, $i);
    }

    for ($i = $n - 1; $i >= 0; $i--) {
      $temp = $arr[0];
      $arr[0] = $arr[$i];
      $arr[$i] = $temp;
      heapify($arr, $i, 0);
    }
    
    return $arr;
  }

  function heapify($arr, $n, $i) {
    $largest = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;

    if ($left < $n && $arr[$i] < $arr[$left]) {
      $largest = $left;
    }

    if ($right < $n && $arr[$largest] < $arr[$right]) {
      $largest = $right;
    }

    if ($largest != $i) {
      $temp = $arr[$i];
      $arr[$i] = $arr[$largest];
      $arr[$largest] = $temp;
      heapify($arr, $n, $largest);
    }
  }

?>