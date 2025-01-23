<?php

  /**
   * 2-binary-search.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function binarySearch($arr, $target) {
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
      $mid = floor(($low + $high) / 2);
      
      if ($arr[$mid] == $target) {
        return $mid;
      } elseif ($arr[$mid] < $target) {
        $low = $mid + 1;
      } else {
        $high = $mid - 1;
      }
    }

    return -1;
  }

?>