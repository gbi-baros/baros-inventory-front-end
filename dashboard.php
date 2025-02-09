<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

// Dummy data inventory
$inventory = [
    ['id' => 1, 'name' => 'Laptop', 'category' => 'Electronics', 'stock' => 10, 'price' => 15000000],
    ['id' => 2, 'name' => 'Smartphone', 'category' => 'Electronics', 'stock' => 25, 'price' => 8000000],
    ['id' => 3, 'name' => 'Printer', 'category' => 'Office', 'stock' => 5, 'price' => 3000000],
    ['id' => 4, 'name' => 'Chair', 'category' => 'Furniture', 'stock' => 20, 'price' => 500000],
    ['id' => 5, 'name' => 'Desk', 'category' => 'Furniture', 'stock' => 15, 'price' => 1200000]
];

// Generate ID otomatis
$new_id = count($inventory) + 1;

// Dummy Merek Barang
$brands = ['Samsung', 'Apple', 'Lenovo', 'Asus', 'HP', 'Canon', 'Sony'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col md:flex-row">
    
    <!-- Sidebar Navigation -->
    <aside class="w-full md:w-64 bg-gray-800 h-auto md:h-screen text-white p-6 sticky top-0 md:fixed md:left-0 md:top-0">
        <h2 class="text-2xl font-bold">Admin Panel</h2>
        <nav class="mt-6">
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Inventory</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Reports</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Settings</a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col md:ml-64">
        <!-- Top Navigation -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center w-full sticky top-0 z-10">
            <h1 class="text-xl font-bold">Inventory Dashboard</h1>
            <a href="logout.php" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Logout</a>
        </header>

        <!-- Main Content -->
        <main class="p-6 overflow-x-auto">
            <!-- Search Section -->
            <div class="mb-6">
                <input type="text" placeholder="Cari Barang..." class="w-full px-4 py-2 border rounded-lg">
            </div>

            <!-- Inventory Table -->
            <div class="bg-white p-6 rounded-lg shadow-lg w-full mb-6">
                <h2 class="text-2xl font-bold mb-4">Daftar Barang</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Nama Barang</th>
                            <th class="border border-gray-300 px-4 py-2">Kategori</th>
                            <th class="border border-gray-300 px-4 py-2">Stok</th>
                            <th class="border border-gray-300 px-4 py-2">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inventory as $item): ?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2"><?= $item['id'] ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= $item['name'] ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= $item['category'] ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= $item['stock'] ?></td>
                                <td class="border border-gray-300 px-4 py-2">Rp<?= number_format($item['price'], 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Add Inventory Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg w-full">
                <h2 class="text-2xl font-bold mb-4">Tambah Barang</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label class="block text-gray-700">ID Barang</label>
                        <input type="text" value="<?= $new_id ?>" readonly class="w-full px-4 py-2 border rounded-lg bg-gray-200">
                    </div>
                    <div>
                        <label class="block text-gray-700">Nama Barang</label>
                        <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-gray-700">Merek Barang</label>
                        <select name="brand" class="w-full px-4 py-2 border rounded-lg">
                            <?php foreach ($brands as $brand): ?>
                                <option value="<?= $brand ?>"><?= $brand ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700">Tipe Barang</label>
                        <input type="text" name="type" required class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-gray-700">Harga Barang</label>
                        <input type="number" name="price" required class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-gray-700">Tanggal Pembelian</label>
                        <input type="date" value="<?= date('Y-m-d') ?>" readonly class="w-full px-4 py-2 border rounded-lg bg-gray-200">
                    </div>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Simpan Barang</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>