<?php
include 'apiEndPointUrl.php';

$getBrandRequestUrlById = $getBrandRequestUrl . $barang['brand_id'];

// Inisialisasi cURL
$chGetBrandRequestById = curl_init($getBrandRequestUrlById);

// Set opsi cURL
curl_setopt($chGetBrandRequestById, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chGetBrandRequestById, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Eksekusi dan ambil hasilnya
$responseGetBrandRequestById = curl_exec($chGetBrandRequestById);

// Cek apakah ada error
if(curl_errno($chGetBrandRequestById)){
    echo 'Error:' . curl_error($chGetBrandRequestById);
}

// Tutup koneksi cURL
curl_close($chGetBrandRequestById);

// Decode JSON menjadi array PHP
$dataMerekById = json_decode($responseGetBrandRequestById, true);

//echo "<script>console.log('Test Response Get Brand Request ById: " . $responseGetBrandRequestById . "');</script>";
?>