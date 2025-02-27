<?php
include 'apiEndPointUrl.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari request body
    $jsonData = file_get_contents("php://input");
    $decodedData = json_decode($jsonData, true);

    if (!isset($decodedData['data']) || !is_array($decodedData['data'])) {
        echo "Data tidak ditemukan atau format salah.";
        exit;
    }

    // API URL
    $url = $addIventoriesRequestUrl;

    // Menyiapkan data untuk dikirim ke API
    $formattedData = [];
    foreach ($decodedData['data'] as $item) {
        $formattedData[] = [
            "name" => $item['nama_barang'] ?? "",
            "brand_id" => $item['merek_barang'] ?? "",
            "price" => $item['harga_barang'] ?? 0,
            "purchase_date" => $item['tanggal_pembelian'] ?? date('c'), // ISO 8601 format
            "type_id" => $item['tipe_barang'] ?? "",
            "status" => $item['status'] ?? "available",
            "image_filename" => $item['image_filename'] ?? ""
        ];
    }

    // Kirim data ke API menggunakan cURL
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
        CURLOPT_POSTFIELDS => json_encode($formattedData[0])
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);

    echo json_encode(["success" => true]);
    exit;
} else {
    echo json_encode(["success" => false, "message" => "Akses tidak diizinkan."]);
    exit;
}
?>
