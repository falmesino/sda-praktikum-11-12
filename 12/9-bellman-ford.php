<?php

  /**
   * 9-bellman-ford.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function bellmanFord($graph, $start) {
    $n = count($graph);
    $distance = array_fill(0, $n, INF);
    $distance[$start] = 0;

    for ($i = 0; $i < $n - 1; $i++) {
      for ($j = 0; $j < $n; $j++) {
        foreach ($graph[$j] as $neighbor => $weight) {
          $distance[$neighbor] = min($distance[$neighbor], $distance[$j] + $weight);
        }
      }
    }

    return $distance;
  }

?>