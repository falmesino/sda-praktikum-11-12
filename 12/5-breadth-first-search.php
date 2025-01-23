<?php

  /**
   * 5-breadth-first-search.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function bfs($graph, $target) {
    $visited = array();
    $queue = array($graph[0]);

    while (!empty($queue)) {
      $node = array_shift($queue);

      if ($node == $target) {
        return true;
      }

      if (!in_array($node, $visited)) {
        $visited[] = $node;

        foreach($graph[$node] as $neighbor) {
          $queue[] = $neighbor;
        }
      }
    }

    return false;
  }

?>