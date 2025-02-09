<?php
session_start();

// Cek apakah user sudah login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = "";
$api_url = "http://54.254.130.73:8000/api/v1/auth/signin/"; // Ganti dengan API URL Anda

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    // Data login yang akan dikirim ke API
    $data = json_encode([
        "email" => $username,
        "password" => $password
    ]);

    // Inisialisasi cURL
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);

    // Eksekusi request
    $response = curl_exec($ch);

    // test apus aja
    if (curl_errno($ch)) {
        echo "<script>console.log('cURL Error: " . curl_error($ch) . "');</script>";
    }

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Tampilkan response API di console browser
    echo "<script>console.log('response: " . json_encode($response) . "');</script>";
    echo "<script>console.log('http_code: " . json_encode($http_code) . "');</script>";

    // Jika login berhasil
    if ($http_code == 200) {
        $result = json_decode($response, true);
        $token = $result['token']; // JWT token dari API

        // Simpan token dalam session
        $_SESSION['token'] = $token;
        $_SESSION['loggedin'] = true;

        // Jika "Remember Me" diaktifkan, simpan token dalam cookie
        if ($remember) {
            setcookie("jwt_token", $token, time() + (86400 * 30), "/"); // 30 hari
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Login gagal! Periksa kembali username dan password.";
    }
}
//var_dump($http_code, $response);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("togglePassword");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.textContent = "🙈";
            } else {
                passwordField.type = "password";
                toggleIcon.textContent = "👁️";
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <?php if (!empty($error)) : ?>
            <p class="text-red-500 text-sm mb-4"> <?= $error ?> </p>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700">Username</label>
                <input type="text" name="username" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="mb-4 relative">
                <label class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg">
                <span id="togglePassword" class="absolute right-3 top-9 cursor-pointer" onclick="togglePassword()">👁️</span>
            </div>
            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    Remember Me
                </label>
                <a href="#" class="text-blue-500 text-sm">Forgot Password?</a>
            </div>
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Login</button>
            <p class="text-center text-sm text-gray-600 mt-4">Don't have an account? <a href="register.php" class="text-blue-500">Sign up</a></p>
        </form>
    </div>
</body>
</html>