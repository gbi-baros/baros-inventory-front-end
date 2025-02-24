<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['data'])) {
        $stringData = $_POST['data'];
        
        $url = 'http://54.254.130.73:8000/types/'; // Ganti dengan URL API Anda
        
        $data = ["name" => $stringData]; // Format data yang dikirim

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
            CURLOPT_POSTFIELDS => json_encode($data)
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        echo "Response dari API: " . $response;
    } else {
        echo "Silakan masukkan string terlebih dahulu.";
    }
} else {
    echo "Akses tidak diizinkan.";
}
header('Location: ../admin/settings.php');
?>