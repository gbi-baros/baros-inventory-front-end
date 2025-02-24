<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bottom Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 pb-16"> 
    <!-- Konten halaman -->
    <div class="p-4 text-center">
        <h1 class="text-lg font-semibold">Halaman Utama</h1>
        <p class="text-gray-600">Geser ke bawah untuk melihat efek navigasi tetap.</p>
    </div>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 shadow-lg">
        <div class="flex justify-around py-2">
            <!-- Home -->
            <a href="#" class="flex flex-col items-center text-gray-500 hover:text-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V10z"></path>
                </svg>
                <span class="text-xs">Home</span>
            </a>

            <!-- Pesanan -->
            <a href="#" class="flex flex-col items-center text-gray-500 hover:text-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m9 9h3m-3 0v9m0-9l-3-3m3 3l3-3"></path>
                </svg>
                <span class="text-xs">Pesanan</span>
            </a>

            <!-- Wallet -->
            <a href="#" class="flex flex-col items-center text-gray-500 hover:text-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a4 4 0 0 0-8 0v2m-2 0a6 6 0 0 1 12 0v2a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2v-2z"></path>
                </svg>
                <span class="text-xs">Wallet</span>
            </a>

            <!-- Akun -->
            <a href="#" class="flex flex-col items-center text-gray-500 hover:text-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A5.5 5.5 0 0 1 12 13.5c3.034 0 5.5 2.466 5.5 5.5v2.5h-11V19z"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span class="text-xs">Akun</span>
            </a>
        </div>
    </nav>
</body>
</html>
