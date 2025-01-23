<?php

  /**
   * 2-quick-sort.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function quickSort($arr) {
    $n = count($arr);
    if ($n <= 1) return $arr;
    $pivot = $arr[0];
    $smaller = array();
    $greater = array();
    
    for ($i = 1; $i < $n; $i++) {
      if ($arr[$i] <= $pivot) {
        $smaller[] = $arr[$i];
      } else {
        $greater[] = $arr[$i];
      }
    }

    $smaller = quickSort($smaller);
    $greater = quickSort($greater);

    return array_merge($smaller, array($pivot), $greater);
  }

?>