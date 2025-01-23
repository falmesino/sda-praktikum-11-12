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

?>