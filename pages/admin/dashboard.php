<?php
include '../global/session.php';
$currentPage = "Dashboard";

//call api
include '../controller/getInventoriesRequest.php';
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
    <title>Dashboard</title>
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
          <!--<div class="flex flex-wrap">-->
            <!--<div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">-->
            <!--  <div-->
            <!--    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-sm rounded bg-blueGray-700"-->
            <!--  >-->
            <!--    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">-->
            <!--      <div class="flex flex-wrap items-center">-->
            <!--        <div class="relative w-full max-w-full flex-grow flex-1">-->
            <!--          <h6-->
            <!--            class="uppercase text-blueGray-100 mb-1 text-xs font-semibold"-->
            <!--          >-->
            <!--            Overview-->
            <!--          </h6>-->
            <!--          <h2 class="text-white text-xl font-semibold">-->
            <!--            Sales value-->
            <!--          </h2>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--    <div class="p-4 flex-auto">-->
                  <!-- Chart -->
            <!--      <div class="relative h-350-px">-->
            <!--        <canvas id="line-chart"></canvas>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="w-full xl:w-4/12 px-4">-->
            <!--  <div-->
            <!--    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-sm rounded"-->
            <!--  >-->
            <!--    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">-->
            <!--      <div class="flex flex-wrap items-center">-->
            <!--        <div class="relative w-full max-w-full flex-grow flex-1">-->
            <!--          <h6-->
            <!--            class="uppercase text-blueGray-400 mb-1 text-xs font-semibold"-->
            <!--          >-->
            <!--            Performance-->
            <!--          </h6>-->
            <!--          <h2 class="text-blueGray-700 text-xl font-semibold">-->
            <!--            Total orders-->
            <!--          </h2>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--    <div class="p-4 flex-auto">-->
                  <!-- Chart -->
            <!--      <div class="relative h-350-px">-->
            <!--        <canvas id="bar-chart"></canvas>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
          <!--</div>-->
          <div class="flex flex-wrap">
            <div class="w-full xl:w-12/12 mb-0 xl:mb-0 px-4">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-sm rounded-lg border bg-white ">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                  <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                      <h3 class="font-semibold text-base text-blueGray-700">
                        Inventory List
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                  <!-- Projects table -->
                  <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                      <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Nama Barang
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Merek Barang
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Tipe Barang
                        </th>
                        <!--<th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">-->
                        <!--</th>-->
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Cek apakah data berhasil diambil
                    if(is_array($dataBarang)) {
                        // Looping data merek dengan foreach
                        foreach($dataBarang as $barang) {
                            include '../controller/getBrandRequestById.php';
                            include '../controller/getTypesRequestById.php';
                            
                            echo '<tr>';
                            //Id Barang
                            // echo "<th class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . htmlspecialchars($barang['id']) . "</th>";
                            //Nama Barang
                            echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . htmlspecialchars($barang['name']) . "</td>";
                            //Merek Barang
                            echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . htmlspecialchars($dataMerekById['name']) . "</td>";
                            //Tipe Barang
                            echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . htmlspecialchars($dataTipeById['name']) . "</td>";
                            // echo "<td class='border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right'>";
                            // echo '<a href="#pablo" class="text-blueGray-500 block py-1 px-3" onclick="openDropdown(event,\'table-light-2-dropdown\')"><i class="fas fa-ellipsis-v"></i></a>';
                            // echo '<div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="table-light-2-dropdown">';
                            // echo '<a href="#pablo" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Add Log</a>';
                            // echo '<a href="#pablo" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Edit</a>';
                            // echo '<div class="h-0 my-2 border border-solid border-blueGray-100">';
                            // echo '</div>';
                            // echo '<a href="#pablo" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Delete</a>';
                            // echo '</div>';
                            // echo '</td>';
                            // echo '</tr>';
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
          <!--<div class="flex flex-wrap mt-3">-->
          <!--  <div class="w-full xl:w-12/12 px-4">-->
          <!--    <div-->
          <!--      class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-sm rounded-lg border"-->
          <!--    >-->
          <!--      <div class="rounded-t mb-0 px-4 py-3 border-0">-->
          <!--        <div class="flex flex-wrap items-center">-->
          <!--          <div-->
          <!--            class="relative w-full px-4 max-w-full flex-grow flex-1"-->
          <!--          >-->
          <!--            <h3 class="font-semibold text-base text-blueGray-700">-->
          <!--              Social traffic-->
          <!--            </h3>-->
          <!--          </div>-->
          <!--          <div-->
          <!--            class="relative w-full px-4 max-w-full flex-grow flex-1 text-right"-->
          <!--          >-->
          <!--            <button-->
          <!--              class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"-->
          <!--              type="button"-->
          <!--            >-->
          <!--              See all-->
          <!--            </button>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--      </div>-->
          <!--      <div class="block w-full overflow-x-auto">-->
                  <!-- Projects table -->
          <!--        <table-->
          <!--          class="items-center w-full bg-transparent border-collapse"-->
          <!--        >-->
          <!--          <thead class="thead-light">-->
          <!--            <tr>-->
          <!--              <th-->
          <!--                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"-->
          <!--              >-->
          <!--                Referral-->
          <!--              </th>-->
          <!--              <th-->
          <!--                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"-->
          <!--              >-->
          <!--                Visitors-->
          <!--              </th>-->
          <!--              <th-->
          <!--                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"-->
          <!--              ></th>-->
          <!--            </tr>-->
          <!--          </thead>-->
          <!--          <tbody>-->
          <!--            <tr>-->
          <!--              <th-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"-->
          <!--              >-->
          <!--                Facebook-->
          <!--              </th>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                1,480-->
          <!--              </td>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                <div class="flex items-center">-->
          <!--                  <span class="mr-2">60%</span>-->
          <!--                  <div class="relative w-full">-->
          <!--                    <div-->
          <!--                      class="overflow-hidden h-2 text-xs flex rounded bg-red-200"-->
          <!--                    >-->
          <!--                      <div-->
          <!--                        style="width: 60%"-->
          <!--                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"-->
          <!--                      ></div>-->
          <!--                    </div>-->
          <!--                  </div>-->
          <!--                </div>-->
          <!--              </td>-->
          <!--            </tr>-->
          <!--            <tr>-->
          <!--              <th-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"-->
          <!--              >-->
          <!--                Facebook-->
          <!--              </th>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                5,480-->
          <!--              </td>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                <div class="flex items-center">-->
          <!--                  <span class="mr-2">70%</span>-->
          <!--                  <div class="relative w-full">-->
          <!--                    <div-->
          <!--                      class="overflow-hidden h-2 text-xs flex rounded bg-emerald-200"-->
          <!--                    >-->
          <!--                      <div-->
          <!--                        style="width: 70%"-->
          <!--                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500"-->
          <!--                      ></div>-->
          <!--                    </div>-->
          <!--                  </div>-->
          <!--                </div>-->
          <!--              </td>-->
          <!--            </tr>-->
          <!--            <tr>-->
          <!--              <th-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"-->
          <!--              >-->
          <!--                Google-->
          <!--              </th>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                4,807-->
          <!--              </td>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                <div class="flex items-center">-->
          <!--                  <span class="mr-2">80%</span>-->
          <!--                  <div class="relative w-full">-->
          <!--                    <div-->
          <!--                      class="overflow-hidden h-2 text-xs flex rounded bg-purple-200"-->
          <!--                    >-->
          <!--                      <div-->
          <!--                        style="width: 80%"-->
          <!--                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500"-->
          <!--                      ></div>-->
          <!--                    </div>-->
          <!--                  </div>-->
          <!--                </div>-->
          <!--              </td>-->
          <!--            </tr>-->
          <!--            <tr>-->
          <!--              <th-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"-->
          <!--              >-->
          <!--                Instagram-->
          <!--              </th>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                3,678-->
          <!--              </td>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                <div class="flex items-center">-->
          <!--                  <span class="mr-2">75%</span>-->
          <!--                  <div class="relative w-full">-->
          <!--                    <div-->
          <!--                      class="overflow-hidden h-2 text-xs flex rounded bg-lightBlue-200"-->
          <!--                    >-->
          <!--                      <div-->
          <!--                        style="width: 75%"-->
          <!--                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-lightBlue-500"-->
          <!--                      ></div>-->
          <!--                    </div>-->
          <!--                  </div>-->
          <!--                </div>-->
          <!--              </td>-->
          <!--            </tr>-->
          <!--            <tr>-->
          <!--              <th-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"-->
          <!--              >-->
          <!--                twitter-->
          <!--              </th>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                2,645-->
          <!--              </td>-->
          <!--              <td-->
          <!--                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"-->
          <!--              >-->
          <!--                <div class="flex items-center">-->
          <!--                  <span class="mr-2">30%</span>-->
          <!--                  <div class="relative w-full">-->
          <!--                    <div-->
          <!--                      class="overflow-hidden h-2 text-xs flex rounded bg-orange-200"-->
          <!--                    >-->
          <!--                      <div-->
          <!--                        style="width: 30%"-->
          <!--                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500"-->
          <!--                      ></div>-->
          <!--                    </div>-->
          <!--                  </div>-->
          <!--                </div>-->
          <!--              </td>-->
          <!--            </tr>-->
          <!--          </tbody>-->
          <!--        </table>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <?php
          include '../global/footer.php';
          ?>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
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

      (function () {
        /* Chart initialisations */
        /* Line Chart */
        var config = {
          type: "line",
          data: {
            labels: [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July"
            ],
            datasets: [
              {
                label: new Date().getFullYear(),
                backgroundColor: "#4c51bf",
                borderColor: "#4c51bf",
                data: [65, 78, 66, 44, 56, 67, 75],
                fill: false
              },
              {
                label: new Date().getFullYear() - 1,
                fill: false,
                backgroundColor: "#fff",
                borderColor: "#fff",
                data: [40, 68, 86, 74, 56, 60, 87]
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
              display: false,
              text: "Sales Charts",
              fontColor: "white"
            },
            legend: {
              labels: {
                fontColor: "white"
              },
              align: "end",
              position: "bottom"
            },
            tooltips: {
              mode: "index",
              intersect: false
            },
            hover: {
              mode: "nearest",
              intersect: true
            },
            scales: {
              xAxes: [
                {
                  ticks: {
                    fontColor: "rgba(255,255,255,.7)"
                  },
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Month",
                    fontColor: "white"
                  },
                  gridLines: {
                    display: false,
                    borderDash: [2],
                    borderDashOffset: [2],
                    color: "rgba(33, 37, 41, 0.3)",
                    zeroLineColor: "rgba(0, 0, 0, 0)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ],
              yAxes: [
                {
                  ticks: {
                    fontColor: "rgba(255,255,255,.7)"
                  },
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Value",
                    fontColor: "white"
                  },
                  gridLines: {
                    borderDash: [3],
                    borderDashOffset: [3],
                    drawBorder: false,
                    color: "rgba(255, 255, 255, 0.15)",
                    zeroLineColor: "rgba(33, 37, 41, 0)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ]
            }
          }
        };
        var ctx = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(ctx, config);

        /* Bar Chart */
        config = {
          type: "bar",
          data: {
            labels: [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July"
            ],
            datasets: [
              {
                label: new Date().getFullYear(),
                backgroundColor: "#ed64a6",
                borderColor: "#ed64a6",
                data: [30, 78, 56, 34, 100, 45, 13],
                fill: false,
                barThickness: 8
              },
              {
                label: new Date().getFullYear() - 1,
                fill: false,
                backgroundColor: "#4c51bf",
                borderColor: "#4c51bf",
                data: [27, 68, 86, 74, 10, 4, 87],
                barThickness: 8
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
              display: false,
              text: "Orders Chart"
            },
            tooltips: {
              mode: "index",
              intersect: false
            },
            hover: {
              mode: "nearest",
              intersect: true
            },
            legend: {
              labels: {
                fontColor: "rgba(0,0,0,.4)"
              },
              align: "end",
              position: "bottom"
            },
            scales: {
              xAxes: [
                {
                  display: false,
                  scaleLabel: {
                    display: true,
                    labelString: "Month"
                  },
                  gridLines: {
                    borderDash: [2],
                    borderDashOffset: [2],
                    color: "rgba(33, 37, 41, 0.3)",
                    zeroLineColor: "rgba(33, 37, 41, 0.3)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ],
              yAxes: [
                {
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Value"
                  },
                  gridLines: {
                    borderDash: [2],
                    drawBorder: false,
                    borderDashOffset: [2],
                    color: "rgba(33, 37, 41, 0.2)",
                    zeroLineColor: "rgba(33, 37, 41, 0.15)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ]
            }
          }
        };
        ctx = document.getElementById("bar-chart").getContext("2d");
        window.myBar = new Chart(ctx, config);
      })();
    </script>
  </body>
</html>