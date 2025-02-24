<?php
include 'apiEndPointUrl.php';

// Inisialisasi cURL
$chGetBrandRequest = curl_init($getBrandRequestUrl);

// Set opsi cURL
curl_setopt($chGetBrandRequest, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chGetBrandRequest, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Eksekusi dan ambil hasilnya
$responseGetBrandRequest = curl_exec($chGetBrandRequest);

// Cek apakah ada error
if(curl_errno($chGetBrandRequest)){
    echo 'Error:' . curl_error($chGetBrandRequest);
}

// Tutup koneksi cURL
curl_close($chGetBrandRequest);

// Decode JSON menjadi array PHP
$dataMerek = json_decode($responseGetBrandRequest, true);

//echo "<script>console.log('Test Response Get Brand Request: " . $responseGetBrandRequest . "');</script>";
?>