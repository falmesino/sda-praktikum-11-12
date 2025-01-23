<?php

  /**
   * 8-floyd-warshall.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function floydWarshall($graph) {
    $n = count($graph);

    for ($k = 0; $i < $n; $k++) {
      for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
          $graph[$i][$j] = min($graph[$i][$j], $graph[$i][$k] + $graph[$k][$j]);
        }
      }
    }

    return $graph;
  }

?>