<?php
if (isset($_GET['type_id'])) {
    $type_id = $_GET['type_id']; // Ambil type_id dari URL

    // Buat URL endpoint dengan menyisipkan type_id
    $api_url = "http://54.254.130.73:8000/types/" . $type_id;

    // Inisialisasi cURL
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Set metode DELETE
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Agar mendapatkan respons dari server
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200 || $http_code == 204) {
        echo "Tipe berhasil dihapus!";
    } else {
        echo "Gagal menghapus tipe. Kode HTTP: " . $http_code;
    }

    // Redirect kembali ke halaman utama setelah proses
    header('Location: ../admin/settings.php');
    exit();
} else {
    echo "Brand ID tidak ditemukan!";
}
?>