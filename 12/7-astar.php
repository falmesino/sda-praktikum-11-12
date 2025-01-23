<?php

  /**
   * 7-astar.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function aStar($graph, $start, $goal, $heuristic) {
    $distance = array_fill(0, count($graph), INF);
    $distance[$start] = 0;
    $queue = array($start);

    while (!empty($queue)) {
      $node = array_shift($queue);

      if ($node == $goal) {
        return $distance[$node];
      }

      foreach ($graph[$node] as $neighbor => $weight) {
        $newDistance = $distance[$node] + $weight;

        if ($newDistance < $distance[$neighbor]) {
          $distance[$neighbor] = $newDistance;
          $queue[] = $neighbor;
        }
      }
    }

    return -1;
  }

?>