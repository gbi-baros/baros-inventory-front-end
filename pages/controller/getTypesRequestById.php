<?php
include 'apiEndPointUrl.php';

$getTypesRequestUrlById = $getTypesRequestUrl . $barang['type_id'];

// Inisialisasi cURL
$chGetTypesRequestById = curl_init($getTypesRequestUrlById);

// Set opsi cURL
curl_setopt($chGetTypesRequestById, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chGetTypesRequestById, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Eksekusi dan ambil hasilnya
$responseGetTypesRequestById = curl_exec($chGetTypesRequestById);

// Cek apakah ada error
if(curl_errno($chGetTypesRequestById)){
    echo 'Error:' . curl_error($chGetTypesRequestById);
}

// Tutup koneksi cURL
curl_close($chGetTypesRequestById);

// Decode JSON menjadi array PHP
$dataTipeById = json_decode($responseGetTypesRequestById, true);

// echo "<script>console.log('Test Response Get Type Request ById: " . $responseGetTypesRequestById . "');</script>";
?>