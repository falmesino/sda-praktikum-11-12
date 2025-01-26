<?php

  /**
   * 12-support-vector-machine.php
   * 231232028 - Falmesino Abdul Hamid
   * 
   * composer require php-ai/php-ml
   */

  require 'vendor/autoload.php';

  use Phpml\Classification\SVC;
  use Phpml\SupportVectorMachine\Kernel;

  // Data pelanggan
  $data = [
    ['nama' => 'John', 'umur' => 25, 'penghasilan' => 5000000, 'label' => 1], // Pelanggan loyal
    ['nama' => 'Jane', 'umur' => 30, 'penghasilan' => 3000000, 'label' => 0], // Bukan pelanggan loyal
    ['nama' => 'Bob', 'umur' => 20, 'penghasilan' => 4000000, 'label' => 1],
    ['nama' => 'Alice', 'umur' => 35, 'penghasilan' => 6000000, 'label' => 1],
    ['nama' => 'Mike', 'umur' => 40, 'penghasilan' => 2000000, 'label' => 0]
  ];

  // Konversi data ke format SVM
  $samples = []; // Features (umur, penghasilan)
  $labels = [];  // Labels (1 = loyal, 0 = tidak loyal)

  foreach ($data as $pelanggan) {
    $samples[] = [$pelanggan['umur'], $pelanggan['penghasilan']];
    $labels[] = $pelanggan['label'];
  }

  // Pembagian data menjadi training dan testing
  $trainSamples = array_slice($samples, 0, 3); // First 3 samples for training
  $trainLabels = array_slice($labels, 0, 3);  // First 3 labels for training
  $testSample = [$samples[3][0], $samples[3][1]]; // Fourth sample for testing

  // Inisialisasi SVM
  $svm = new SVC(Kernel::RBF, 1000); // RBF kernel with cost = 1000
  $svm->train($trainSamples, $trainLabels);

  // Prediksi
  $prediksi = $svm->predict([$testSample]);

  // Hasil Prediksi
  echo "Prediksi: " . ($prediksi[0] == 1 ? "Pelanggan Loyal" : "Bukan Pelanggan Loyal");

?>