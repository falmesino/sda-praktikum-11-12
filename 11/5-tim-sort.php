<?php

  /**
   * 5-tim-sort.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function insertionSort(&$arr, $left = 0, $right = null) {
    if ($right === null) {
      $right = count($arr) - 1;
    }
    for ($i = $left + 1; $i <= $right; $i++) {
      $key = $arr[$i];
      $j = $i - 1;
      while ($j >= $left && $arr[$j] > $key) {
        $arr[$j + 1] = $arr[$j];
        $j--;
      }
      $arr[$j + 1] = $key;
    }
  }

  function merge(&$arr, $left, $mid, $right) {
    $len1 = $mid - $left + 1;
    $len2 = $right - $mid;
    $leftArr = array_slice($arr, $left, $len1);
    $rightArr = array_slice($arr, $mid + 1, $len2);

    $i = 0;
    $j = 0;
    $k = $left;

    while ($i < $len1 && $j < $len2) {
      if ($leftArr[$i] <= $rightArr[$j]) {
        $arr[$k] = $leftArr[$i];
        $i++;
      } else {
        $arr[$k] = $rightArr[$j];
        $j++;
      }
      $k++;
    }

    while ($i < $len1) {
      $arr[$k] = $leftArr[$i];
      $i++;
      $k++;
    }

    while ($j < $len2) {
      $arr[$k] = $rightArr[$j];
      $j++;
      $k++;
    }
  }

  function timsort($arr) {
    $min_run = 32;
    $n = count($arr);

    for ($i = 0; $i < $n; $i += $min_run) {
      insertionSort($arr, $i, min($i + $min_run - 1, $n - 1));
    }

    $size = $min_run;
    while ($size < $n) {
      for ($left = 0; $left < $n; $left += 2 * $size) {
        $mid = $left + $size - 1;
        $right = min($left + 2 * $size - 1, $n - 1);
        if ($mid < $right) {
          merge($arr, $left, $mid, $right);
        }
      }
      $size *= 2;
    }

    return $arr;
  }

  // Contoh
  $arr = [38, 27, 43, 3, 9, 82, 10];
  $sort = timsort($arr);

  echo "Original";
  print_r($arr);

  echo "Sorted";
  print_r($sort);

?>