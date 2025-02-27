<?php
include 'apiEndPointUrl.php';

// Inisialisasi cURL
$chGetIventoriesRequest = curl_init($getIventoriesRequestUrl);

// Set opsi cURL
curl_setopt($chGetIventoriesRequest, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chGetIventoriesRequest, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Eksekusi dan ambil hasilnya
$responseGetIventoriesRequest = curl_exec($chGetIventoriesRequest);

// Cek apakah ada error
if(curl_errno($chGetIventoriesRequest)){
    echo "<script>console.log('Inventories Error: " . curl_error($chGetIventoriesRequest) . "');</script>";
}

// Tutup koneksi cURL
curl_close($chGetIventoriesRequest);

// Decode JSON menjadi array PHP
$dataBarang = json_decode($responseGetIventoriesRequest, true);

//echo "<script>console.log('Test Response Inventories: " . $responseGetIventoriesRequest . "');</script>";
?>