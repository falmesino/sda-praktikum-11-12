<?php

  /**
   * 11-k-nearest-neighbor.php
   * 231232028 - Falmesino Abdul Hamid
   */

  class KNN {
    private $data;
    private $k;

    public function __construct($data, $k) {
      $this->data = $data;
      $this->k = $k;
    }

    public function calculateDistance($point1, $point2) {
      return sqrt(pow($point1['rating'] - $point2['rating'], 2) + pow($point1['harga'] - $point2['harga'], 2));
    }

    public function findKNN($input) {
      $distances = array();

      foreach ($this->data as $index => $product) {
        $distance = $this->calculateDistance($input, $product);
        $distances[] = array('index' => $index, 'distance' => $distance);
      }

      usort($distances, function($a, $b) {
        return $a['distance'] - $b['distance'];
      });

      return array_slice($distances, 0, $this->k);
    }

    public function predict($input) {
      $knn = $this->findKNN($input);
      $sumRating = 0;

      foreach ($knn as $neighbor) {
        $sumRating += $this->data[$neighbor['index']]['rating'];
      }

      return $sumRating / $this->k;
    }
  }

  // Contoh data produk
  $data = [
    ['nama' => 'Produk A', 'rating' => 4.5, 'harga' => 100],
    ['nama' => 'Produk B', 'rating' => 4.2, 'harga' => 80],
    ['nama' => 'Produk C', 'rating' => 4.8, 'harga' => 120],
    ['nama' => 'Produk D', 'rating' => 4.1, 'harga' => 90],
    ['nama' => 'Produk E', 'rating' => 4.6, 'harga' => 110],
  ];

  // Input pengguna
  $input = ['rating' => 4.3, 'harga' => 105];

  $k = 3;

  $knn = new KNN($data, $k);
  $rekomendasi = $knn->predict($input);

  echo "Rekomendasi Produk:\n";

  foreach ($knn->findKNN($input) as $neighbor) {
    echo $data[$neighbor['index']]['nama'] . " \n";
  }

  echo "Rating Prediksi: " . $rekomendasi . "\n";

?>