<?php
include '../global/session.php';
$currentPage = "Settings";

//call api
include '../controller/getBrandRequest.php';
include '../controller/getTypesRequest.php';
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
        <div class="relative bg-blueGray-spc md:pt-32 pb-32 pt-3">
          <!--<div class="px-4 md:px-10 mx-auto w-full">-->
            <!--<div>-->
                <?php
                // include '../global/cardstat.php';
                ?>
            <!--</div>-->
          <!--</div>-->
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24 bg-blueGray-spc">
          <div class="flex flex-wrap">
            <div class="w-full xl:w-12/12 mb-0 xl:mb-0 px-4">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-sm rounded-lg border bg-blueGray-100">
                <div class="rounded-t mb-0 px-4 py-3 border-0 bg-white">
                  <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                      <h3 class="font-semibold text-base text-blueGray-700">
                        Settings
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form action="../controller/addBrandRequest.php" method="post" autocomplete="off">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Merek Barang</h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Tambahkan Merek Barang
                          </label>
                          <input
                            type="text"
                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Merek"
                            id="data"
                            name="data"
                            style="border-color: #e4e4e7;"
                            required
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <button
                            class="bg-teal-500 text-white active:bg-pink-600 font-bold uppercase text-base px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
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
                            List Merek Barang
                          </label>
                          <div class="block w-full overflow-x-auto border rounded-lg">
                          <table class="items-center w-full bg-white border-collapse">
                            <thead>
                              <tr>
                                <!--<th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">-->
                                <!--Id Merek-->
                                <!--</th>-->
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
                                  echo "<tr>";
                                  //Id Merek
                                  //echo "<th class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . htmlspecialchars($merek['id']) . "</th>";
                                  //Nama Merek
                                  echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . htmlspecialchars($merek['name']) . "</td>";
                                  //Options
                                  echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right'>";
                                  //Delete Button
                                  echo "<a href='../controller/deleteBrandRequest.php?brand_id=" . $merek['id'] . "' class='bg-red-600 text-white active:bg-amber-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150' type='button'><i class='fas fa-trash-alt'></i></a>";
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
                  <hr class="mt-6 border-b-1 border-blueGray-300" />
                  <form action="../controller/addTypesRequest.php" method="post" autocomplete="off">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Tipe Barang</h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Tambahkan Tipe Barang
                          </label>
                          <input
                            type="text"
                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Tipe"
                            id="data"
                            name="data"
                            style="border-color: #e4e4e7;"
                            required
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                          <button
                            class="bg-teal-500 text-white active:bg-pink-600 font-bold uppercase text-base px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
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
                            List Tipe Barang
                          </label>
                          <div class="block w-full overflow-x-auto border rounded-lg">
                          <table class="items-center w-full bg-white border-collapse">
                            <thead>
                              <tr>
                                <!--<th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">-->
                                <!--  Id Tipe-->
                                <!--</th>-->
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                  Nama Tipe
                                </th>
                                <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Cek apakah data berhasil diambil
                                if(is_array($dataTipe)) {
                                // Looping data dengan foreach
                                foreach($dataTipe as $tipe) {
                                  echo "<tr>";
                                  //Id Tipe
                                  //echo "<th class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . htmlspecialchars($tipe['id']) . "</th>";
                                  //Nama Tipe
                                  echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . htmlspecialchars($tipe['name']) . "</td>";
                                  //Options
                                  echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right'>";
                                  //Delete Button
                                  echo "<a href='../controller/deleteTypesRequest.php?type_id=" . $tipe['id'] . "' class='bg-red-600 text-white active:bg-amber-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150' type='button'><i class='fas fa-trash-alt'></i></a>";
                                  }
                                } else {
                                  echo "<script>console.log('Warning: Data TIPE BARANG tidak ditemukan!');</script>";
                                }
                                ?>
                            </tbody>
                          </table>
                          </div>
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
