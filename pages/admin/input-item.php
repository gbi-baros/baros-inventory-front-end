<?php
include '../global/session.php';
$currentPage = "InputItem";

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
    <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="../../assets/styles/tailwind.css" />
    <title>Input Item</title>
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
                //include '../global/cardstat.php';
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
                        Input Barang
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form id="inventoryForm" autocomplete="off">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Input Barang</h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Nama Barang
                          </label>
                          <input
                            type="text"
                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Nama Barang"
                            id="nama_barang"
                            name="nama_barang"
                            style="border-color: #e4e4e7;"
                            required
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Merek Barang
                          </label>
                          <select
                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            id="merek_barang"
                            name="merek_barang"
                            style="border-color: #e4e4e7;"
                            required
                          />
                              <option value='' disabled selected>Merek Barang</option>
                              <?php
                              // Cek apakah data berhasil diambil
                              if(is_array($dataMerek)) {
                                    // Looping data merek dengan foreach
                                    foreach($dataMerek as $merek) {
                                        echo "<option value='" . $merek['name'] . "'>" . $merek['name'] . "</option>";
                                    }
                                } else {
                                    echo "<script>console.log('Warning: Data merek tidak ditemukan!');</script>";
                                }
                                ?>
                          </select>
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Harga Barang
                          </label>
                          <input
                            type="text"
                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Harga Barang"
                            id="harga_barang"
                            name="harga_barang"
                            style="border-color: #e4e4e7;"
                            onkeypress="return hanyaAngka(event)"
                            required
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Tanggal Pembelian
                          </label>
                          <input
                            type="date"
                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            id="tanggal_pembelian"
                            name="tanggal_pembelian"
                            style="border-color: #e4e4e7;"
                            required
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Tipe Barang
                          </label>
                          <select
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            id="tipe_barang"
                            name="tipe_barang"
                            style="border-color: #e4e4e7;"
                            required
                          />
                              <option value='' disabled selected>Tipe Barang</option>
                              <?php
                              // Cek apakah data berhasil diambil
                              if(is_array($dataTipe)) {
                                    // Looping data merek dengan foreach
                                    foreach($dataTipe as $tipe) {
                                        echo "<option value='" . $tipe['name'] . "'>" . $tipe['name'] . "</option>";
                                    }
                                } else {
                                    echo "<script>console.log('Warning: Data tipe tidak ditemukan!');</script>";
                                }
                                ?>
                          </select>
                        </div>
                      </div>
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <button
                            class="bg-teal-500 text-white active:bg-pink-600 font-bold uppercase text-base px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            type="button"
                            style="margin-top: 27px;"
                            onclick="submitForm(event)"
                          >
                           Tambahkan
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
            <!-- Modal Sukses -->
            <div
              class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
              id="small-modal-id"
              style="right: 16px; left: 16px;"
            >
              <div class="relative w-auto my-6 mx-auto" style="max-width: 30rem;">
                <!--content-->
                <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                  <!--header-->
                  <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-md font-semibold" style="margin-top: 4px;">
                      Input Barang Berhasil
                    </h3>
                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('small-modal-id')">
                      <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                        ×
                      </span>
                    </button>
                  </div>
                  <!--body-->
                  <div class="relative p-6 flex-auto">
                    <p class="my-4 text-blueGray-500 text-sm leading-relaxed" style="padding-left: 20px;">
                      Barang sudah berhasil ditambahkan
                    </p>
                  </div>
                  <!--footer-->
                  <div class="flex items-center justify p-6 border-t border-solid border-blueGray-200 rounded-b">
                    <button
                      class="bg-teal-500 text-white active:bg-amber-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" 
                      type="button"
                      onclick="redirectToPage()"
                      style="margin: 20px;"
                    >
                      Ke Dashboard
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="hidden fixed inset-0 z-40 bg-black flex" id="small-modal-id-backdrop" style="top: 0; right: 0; bottom: 0; left: 0; opacity: .25;"></div>
            
            <div class="hidden w-full lg:w-12/12 px-4 mt-0">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-sm rounded-lg border mt-0"
              >
                <div class="px-6">
                  <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 flex justify-center">
                      <div class="relative">
                        <!--<img-->
                        <!--  alt="..."-->
                        <!--  src="../../assets/img/team-2-800x800.jpg"-->
                        <!--  class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"-->
                        <!--/>-->
                      </div>
                    </div>
                    <div class="w-full px-4 text-center mt-20">
                      <div class="flex justify-center py-4 lg:pt-4 pt-8">
                        <div class="mr-4 p-3 text-center">
                          <span
                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                          >
                            22
                          </span>
                          <span class="text-sm text-blueGray-400">Friends</span>
                        </div>
                        <div class="mr-4 p-3 text-center">
                          <span
                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                          >
                            10
                          </span>
                          <span class="text-sm text-blueGray-400">Photos</span>
                        </div>
                        <div class="lg:mr-4 p-3 text-center">
                          <span
                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                          >
                            89
                          </span>
                          <span class="text-sm text-blueGray-400"
                            >Comments</span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-12">
                    <h3
                      class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2"
                    >
                      Jenna Stones
                    </h3>
                    <div
                      class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase"
                    >
                      <i
                        class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"
                      ></i>
                      Los Angeles, California
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-10">
                      <i
                        class="fas fa-briefcase mr-2 text-lg text-blueGray-400"
                      ></i>
                      Solution Manager - Creative Tim Officer
                    </div>
                    <div class="mb-2 text-blueGray-600">
                      <i
                        class="fas fa-university mr-2 text-lg text-blueGray-400"
                      ></i>
                      University of Computer Science
                    </div>
                  </div>
                  <div
                    class="mt-10 py-10 border-t border-blueGray-200 text-center"
                  >
                    <div class="flex flex-wrap justify-center">
                      <div class="w-full lg:w-9/12 px-4">
                        <p
                          class="mb-4 text-lg leading-relaxed text-blueGray-700"
                        >
                          An artist of considerable range, Jenna the name taken
                          by Melbourne-raised, Brooklyn-based Nick Murphy
                          writes, performs and records all of his own music,
                          giving it a warm, intimate feel with a solid.
                        </p>
                        <a
                          href="javascript:void(0);"
                          class="font-normal text-pink-500"
                        >
                          Show more
                        </a>
                      </div>
                    </div>
                  </div>
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
      /* Function for harga */
      function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
      }
      function submitForm(event) {
        event.preventDefault(); // Mencegah reload halaman
        
        let namaBarang = document.getElementById("nama_barang");
        let merekBarang = document.getElementById("merek_barang");
        let hargaBarang = document.getElementById("harga_barang");
        let tanggalPembelian = document.getElementById("tanggal_pembelian");
        let tipeBarang = document.getElementById("tipe_barang");
        // let status = document.getElementById("status");
        // let imageFilename = document.getElementById("image_filename");
        let status = "available";
        let imageFilename = "string";
    
        // Pastikan semua elemen ditemukan sebelum mengambil nilai
        if (!namaBarang || !merekBarang || !hargaBarang || !tanggalPembelian || !tipeBarang || !status || !imageFilename) {
            console.error("Salah satu elemen input tidak ditemukan!");
            return;
        }
    
        let formData = {
            nama_barang: namaBarang.value,
            merek_barang: merekBarang.value,
            harga_barang: parseInt(hargaBarang.value) || 0,
            tanggal_pembelian: tanggalPembelian.value + "T00:00:00Z", // Format ISO 8601
            tipe_barang: tipeBarang.value,
            status: status,
            image_filename: imageFilename
        };
    
        fetch("../controller/addInventoriesRequest.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ data: [formData] })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("small-modal-id").classList.toggle("hidden");
                document.getElementById("small-modal-id-backdrop").classList.toggle("hidden");
                document.getElementById("small-modal-id").classList.toggle("flex");
                document.getElementById("small-modal-id-backdrop").classList.toggle("flex");
            } else {
                alert("Gagal menambahkan item: " + data.message);
            }
        })
        .catch(error => console.error("Error:", error));
      }
      function redirectToPage() {
        window.location.href = "dashboard.php";
      }
    </script>
  </body>
</html>