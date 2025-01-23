<?php

  /**
   * 4-depth-first-search.php
   * 231232028 - Falmesino Abdul Hamid
   */

  function dfs($graph, $target) {
    $visited = array();
    $stack = array($graph[0]);

    while (!empty($stack)) {
      $node = array_pop($stack);
      
      if ($node == $target) {
        return true;
      }

      if (!in_array($node, $visited)) {
        $visited[] = $node;
        
        foreach($graph[$node] as $neighbor) {
          $stack[] = $neighbor;
        }
      }
    }
    
    return false;
  }

?>