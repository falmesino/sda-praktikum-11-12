<?php

  /**
   * 10-kmean-clustering.php
   * 231232028 - Falmesino Abdul Hamid
   */

  class KMeanClustering {
    private $data;
    private $centroid;
    private $cluster;
    private $k;

    public function __construct($data, $k) {
      $this->data = $data;
      $this->k = $k;
      $this->centroid = array();
      $this->cluster = array();
    }

    public function initCentroid() {
      for ($i = 0; $i < $this->k; $i++) {
        $this->centroid[] = $this->data[rand(0, count($this->data) - 1)];
      }
    }

    public function assignCluster() {
      foreach ($this->data as $point) {
        $minDistance = INF;
        $clusterIndex = -1;

        foreach ($this->centroid as $index => $centroid) {
          $distance = $this->calculateDistance($point, $centroid);

          if ($distance < $minDistance) {
            $minDistance = $distance;
            $clusterIndex = $index;
          }
        }

        $this->cluster[$clusterIndex][] = $point;
      }
    }

    public function updateCentroid() {
      foreach ($this->cluster as $index => $cluster) {
        $sumX = 0;
        $sumY = 0;

        foreach ($cluster as $point) {
          $sumX + $point[0];
          $sumY + $point[1];
        }

        $this->centroid[$index] = array($sumX / count($cluster), $sumY / count($cluster));
      }
    }

    public function calculateDistance($point1, $point2) {
      return sqrt(pow($point1[0] - $point2[0], 2) + pow($point1[1] - $point2[1], 2));
    }

    public function run() {
      $this->initCentroid();

      while (true) {
        $this->assignCluster();
        $oldCentroid = $this->centroid;
        $this->updateCentroid();

        if ($this->centroid == $oldCentroid) {
          break;
        }
      }

      return $this->cluster;
    }
  }

  // Contoh data
  $data = [
    [1, 2],
    [2, 1],
    [3, 3],
    [4, 4],
    [5, 5],
    [6, 6],
    [7, 7],
    [8, 8],
    [9, 9]
  ];

  $k = 3;

  $kMean = new KMeanClustering($data, $k);
  $cluster = $kMean->run();

  print_r($cluster);

?>