<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <script src="https://unpkg.com/html5-qrcode@2.2.1/html5-qrcode.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-xl p-6 w-80 text-center">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Scan QR Code</h2>
        
        <button id="startScanBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            Mulai Scan
        </button>

        <div id="reader" class="border-2 border-gray-300 rounded-lg overflow-hidden mt-4 hidden"></div>
        
        <p id="result" class="mt-4 text-gray-600 text-sm"></p>

        <button id="resetBtn" class="mt-4 bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-700 transition hidden">
            Reset Scanner
        </button>
    </div>

    <script>
        let html5QrcodeScanner;

        function onScanSuccess(decodedText) {
            console.log("QR Code berhasil dibaca: ", decodedText);
            document.getElementById("result").innerHTML = "✅ QR Terdeteksi: <br><strong>" + decodedText + "</strong>";
            document.getElementById("result").classList.add("text-green-600", "font-semibold");

            setTimeout(() => {
                window.location.href = decodedText;
            }, 1500);
        }

        function onScanFailure(error) {
            console.warn("Gagal membaca QR: ", error);
        }

        document.getElementById("startScanBtn").addEventListener("click", function () {
            // Tampilkan scanner
            document.getElementById("reader").classList.remove("hidden");
            document.getElementById("startScanBtn").classList.add("hidden");
            document.getElementById("resetBtn").classList.remove("hidden");

            // Mulai scanner
            html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        });

        document.getElementById("resetBtn").addEventListener("click", function () {
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear();
            }
            document.getElementById("reader").classList.add("hidden");
            document.getElementById("startScanBtn").classList.remove("hidden");
            document.getElementById("resetBtn").classList.add("hidden");
            document.getElementById("result").innerHTML = "";
        });
    </script>

</body>
</html>
