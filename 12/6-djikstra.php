<?php

  /**
   * 6-djikstra.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function djikstra($graph, $start) {
    $distance = array_fill(0, count($graph), INF);
    $distance[$start] = 0;
    $queue = array($start);

    while (!empty($queue)) {
      $node = array_shift($queue);

      foreach($graph[$node] as $neighbor => $weight) {
        $newDistance = $distance[$node] + $weight;

        if ($newDistance < $distance[$neighbor]) {
          $distance[$neighbor] = $newDistance;
          $queue[] = $neighbor;
        }
      }
    }

    return $distance;
  }

?>