<?php

  /**
   * 12-support-vector-machine.php
   * 231232028 - Falmesino Abdul Hamid
   * 
   * composer require php-ai/php-ml
   */

  use Phpml\Classification\SupportVectorMachine;
  use Phpml\SupportVectorMachine\Kernel;

  // Data pelanggan
  $data = [
    ['nama' => 'John', 'umur' => '25', 'penghasilan' => '5000000', 'label' => 1], // Pelanggan loyal
    ['nama' => 'Jane', 'umur' => '30', 'penghasilan' => '3000000', 'label' => 0], // Bukan pelanggan loyal
    ['nama' => 'Bob', 'umur' => '20', 'penghasilan' => '4000000', 'label' => 1],
    ['nama' => 'Alice', 'umur' => '35', 'penghasilan' => '6000000', 'label' => 1],
    ['nama' => 'Mike', 'umur' => '40', 'penghasilan' => '2000000', 'label' => 0]
  ];

  // Konversi data ke format SVM
  $dataset = [];

  foreach ($data as $pelanggan) {
    $dataset[] = [$pelanggan['umur'], $pelanggan['penghasilan'], $pelanggan['label']];
  }

  // Pembagian data menjadi training dan testing
  $trainData = array_slice($dataset, 0, 3);
  $testData = array_slice($dataset, 3);

  // Inisialisasi SVM
  $sdk = new SupportVectorMachine(Kernel::RBF, 1000);
  $sdk->train($trainData);

  // Prediksi
  $prediksi = $sdk->predict($testData[0][0], $testData[0][1]);

  // Hasil Prediksi
  echo "Prediksi: " . ($prediksi == 1 ? "Pelanggan Loyal" : "Bukan Pelanggan Loyal");

?>