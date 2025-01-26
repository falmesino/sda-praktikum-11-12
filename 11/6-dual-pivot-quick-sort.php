<?php

  /**
   * 6-dual-pivot-quick-sort.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function dualPivotQuickSort($arr) {
    if (count($arr) <= 1) {
      return $arr;
    }

    $pivot1 = $arr[0];
    $pivot2 = $arr[count($arr) - 1];
    if ($pivot1 > $pivot2) {
      list($pivot1, $pivot2) = array($pivot2, $pivot1);
    }

    $less = array();
    $between = array();
    $equal1 = array();
    $equal2 = array(); 
    $greater = array();

    foreach ($arr as $num) {
      if ($num < $pivot1) {
        $less[] = $num;
      } elseif ($num == $pivot1) {
        $equal1[] = $num;
      } elseif ($num < $pivot2) {
        $between[] = $num;
      } elseif ($num == $pivot2) {
        $equal2[] = $num;
      } else {
        $greater[] = $num;
      }
    }

    $less = dualPivotQuickSort($less);
    $between = dualPivotQuickSort($between);
    $greater = dualPivotQuickSort($greater);

    return array_merge($less, $equal1, $between, $equal2, $greater);
  }

  // Contoh
  $arr = [38, 27, 43, 3, 9, 82, 10];
  $sort = dualPivotQuickSort($arr);

  echo "Original";
  print_r($arr);

  echo "Sorted";
  print_r($sort);

?>