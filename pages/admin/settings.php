<?php
include '../global/session.php';
$currentPage = "Settings";

// URL Endpoint API
$url = 'http://54.254.130.73:8000/api/v1/brands/';

// Inisialisasi cURL
$ch = curl_init($url);

// Set opsi cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Eksekusi dan ambil hasilnya
$response = curl_exec($ch);

// Cek apakah ada error
if(curl_errno($ch)){
    echo 'Error:' . curl_error($ch);
}

// Tutup koneksi cURL
curl_close($ch);

// Decode JSON menjadi array PHP
$dataMerek = json_decode($response, true);

// echo "<script>console.log('Test Response: " . $response . "');</script>";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="../../assets/styles/tailwind.css" />
    <title>Settings</title>
  </head>
  <body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        <?php
        include '../global/sidenav.php';
        ?>
        <!-- Header -->
        <div class="relative bg-blueGray-spc md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
                <?php
                include '../global/cardstat.php';
                ?>
            </div>
          </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24 bg-blueGray-spc">
          <div class="flex flex-wrap">
            <div class="w-full xl:w-12/12 mb-12 xl:mb-0 px-4">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-sm rounded-lg border bg-blueGray-100 ">
                <div class="rounded-t mb-0 px-4 py-3 border-0 bg-white">
                  <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                      <h3 class="font-semibold text-base text-blueGray-700">
                        Settings
                      </h6>
                    </div>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form action="updateBrandRequest.php" method="post">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Merek</h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Tambahkan Merek
                          </label>
                          <input
                            type="text"
                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="Merek"
                            id="data"
                            name="data"
                            style="border-color: #e4e4e7;"
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <button
                            class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-base px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            type="submit"
                            style="margin-top: 27px;"
                          >
                           Tambahkan
                          </button>
                        </div>
                      </div>
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            List Merek
                          </label>
                          <div class="block w-full overflow-x-auto border rounded-lg">
                          <table class="items-center w-full bg-white border-collapse">
                            <thead>
                              <tr>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                  Id Merek
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Nama Merek
                                </th>
                                <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Cek apakah data berhasil diambil
                                if(is_array($dataMerek)) {
                                // Looping data merek dengan foreach
                                foreach($dataMerek as $merek) {
                                  echo '<tr>';
                                  //Id Merek
                                  echo "<th class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . htmlspecialchars($merek['id']) . "</th>";
                                  //Nama Merek
                                  echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . htmlspecialchars($merek['brand']) . "</td>";
                                  //Options
                                  echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right'>";
                                  echo '<a href="#pablo" class="text-blueGray-500 block py-1 px-3" onclick="openDropdown(event,\'table-light-2-dropdown\')"><i class="fas fa-ellipsis-v"></i></a>';
                                  echo '<div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="table-light-2-dropdown">';
                                  echo '<a href="#pablo" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Delete</a>';
                                  echo '</div>';
                                  echo '</td>';
                                  echo '</tr>';
                                  }
                                } else {
                                  echo "<script>console.log('Warning: Data BARANG tidak ditemukan!');</script>";
                                }
                                ?>
                            </tbody>
                          </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <form>
                    <hr class="mt-6 border-b-1 border-blueGray-300" />
                    <h6
                      class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase"
                    >
                      Contact Information
                    </h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Address
                          </label>
                          <input
                            type="text"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            City
                          </label>
                          <input
                            type="email"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="New York"
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Country
                          </label>
                          <input
                            type="text"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="United States"
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Postal Code
                          </label>
                          <input
                            type="text"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="Postal Code"
                          />
                        </div>
                      </div>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300" />

                    <h6
                      class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase"
                    >
                      About Me
                    </h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            About me
                          </label>
                          <textarea
                            type="text"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            rows="4"
                          >
                                A beautiful UI Kit and Admin for JavaScript & Tailwind CSS. It is Free
                                and Open Source.
                              </textarea
                          >
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php
          include '../global/footer.php';
          ?>
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
      /* Make dynamic date appear */
      (function () {
        if (document.getElementById("get-current-year")) {
          document.getElementById("get-current-year").innerHTML =
            new Date().getFullYear();
        }
      })();
      /* Sidebar - Side navigation menu on mobile/responsive mode */
      function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("bg-white");
        document.getElementById(collapseID).classList.toggle("m-2");
        document.getElementById(collapseID).classList.toggle("py-3");
        document.getElementById(collapseID).classList.toggle("px-6");
      }
      /* Function for dropdowns */
      function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
          element = element.parentNode;
        }
        Popper.createPopper(element, document.getElementById(dropdownID), {
          placement: "bottom-start"
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
      }
    </script>
  </body>
</html>
