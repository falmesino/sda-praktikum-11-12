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

?>