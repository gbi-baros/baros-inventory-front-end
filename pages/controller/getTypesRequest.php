<?php
include 'apiEndPointUrl.php';

// Inisialisasi cURL
$chGetTypesRequest = curl_init($getTypesRequestUrl);

// Set opsi cURL
curl_setopt($chGetTypesRequest, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chGetTypesRequest, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Eksekusi dan ambil hasilnya
$responseGetTypesRequest = curl_exec($chGetTypesRequest);

// Cek apakah ada error
if(curl_errno($chGetTypesRequest)){
    echo 'Error:' . curl_error($chGetTypesRequest);
}

// Tutup koneksi cURL
curl_close($chGetTypesRequest);

// Decode JSON menjadi array PHP
$dataTipe = json_decode($responseGetTypesRequest, true);

// echo "<script>console.log('Test Response Get Type Request: " . $responseGetTypesRequest . "');</script>";
?>