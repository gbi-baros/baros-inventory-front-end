      <nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-sm bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6 border">
        <?php
            if ($currentPage === "Dashboard") {
                $classDashboardText = "text-teal-500 hover:text-lightBlue-500";
                $classDashboardIcon = "opacity-75";
            } else {
                $classDashboardText = "text-blueGray-700 hover:text-blueGray-500";
                $classDashboardIcon = "text-blueGray-300";
            }
            
            if ($currentPage === "InputItem") {
                $classInputItemText = "text-teal-500 hover:text-lightBlue-500";
                $classInputItemIcon = "opacity-75";
            } else {
                $classInputItemText = "text-blueGray-700 hover:text-blueGray-500";
                $classInputItemIcon = "text-blueGray-300";
            }
            
            if ($currentPage === "Settings") {
                $classSettingsText = "text-teal-500 hover:text-lightBlue-500";
                $classSettingsIcon = "opacity-75";
            } else {
                $classSettingsText = "text-blueGray-700 hover:text-blueGray-500";
                $classSettingsIcon = "text-blueGray-300";
            }
        ?>
        <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
          <!--<button-->
          <!--  class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border-0 border-transparent"-->
          <!--  type="button"-->
          <!--  onclick="toggleNavbar('example-collapse-sidebar')"-->
          <!--  <i class="fas fa-bars"></i>-->
          <!--</button>-->
          <a
            class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="#"
          >
            Inventory GBI Baros
          </a>
          <ul class="md:hidden items-center flex flex-wrap list-none">
            <li class="inline-block relative">
              <a
                class="text-blueGray-500 block py-1 px-3"
                href="#pablo"
                onclick="openDropdown(event,'notification-dropdown')"
                ><i class="fas fa-bars"></i
              ></a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                id="notification-dropdown"
              >
                <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Another action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Something else here</a
                >
                <div
                  class="h-0 my-2 border border-solid border-blueGray-100"
                ></div>
                <a
                  href="../global/logout.php"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Logout</a
                >
              </div>
            </li>
          </ul>
          
        <!-- Bottom Navigation -->
            <nav class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 shadow-lg lg:hidden md:hidden">
                <div class="container px-4 mx-auto flex flex-wrap justify-around py-2">
                    <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
                        <!-- Dashboard -->
                        <a href="./dashboard.php" class="flex flex-col items-center <?php echo $classDashboardText; ?>">
                            <i class="fas fa-tv mr-2 text-lg <?php echo $classDashboardIcon; ?>" style="margin-left:5px;"></i>
                            <span class="text-xs">Dashboard</span>
                         </a>
                    </div>
                    <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
                        <!-- Input -->
                        <a href="./input-item.php" class="flex flex-col items-center <?php echo $classInputItemText; ?>">
                            <i class="fas fa-tools mr-2 text-lg <?php echo $classInputItemIcon; ?>" style="margin-left:5px;"></i>
                            <span class="text-xs">Input Item</span>
                        </a>
                    </div>
                    <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
                        <!-- Scan -->
                        <a href="./scan.php" class="flex flex-col items-center text-blueGray-700 hover:text-blueGray-500">
                            <i class="fas fa-qrcode mr-2 text-lg text-blueGray-300" style="margin-left:5px;"></i>
                            <span class="text-xs">Scan QR</span>
                        </a>
                    </div>
                    <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
                        <!-- Akun -->
                        <a href="./settings.php" class="flex flex-col items-center <?php echo $classSettingsText; ?>">
                            <i class="fas fa-cog mr-2 text-lg <?php echo $classSettingsIcon; ?>" style="margin-left:5px;"></i>
                            <span class="text-xs">Settings</span>
                        </a>
                    </div>
                </div>
            </nav>
        <!-- Bottom Navigation -->
          
          <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar"
          >
            <div
              class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
            >
              <div class="flex flex-wrap">
                <div class="w-6/12">
                  <a
                    class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                    href="../../index.html"
                  >
                    Notus Tailwind JS
                  </a>
                </div>
                <div class="w-6/12 flex justify-end">
                  <button
                    type="button"
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>
            <form class="mt-6 mb-4 md:hidden">
              <div class="mb-3 pt-0">
                <input
                  type="text"
                  placeholder="Search"
                  class="border-0 px-3 py-2 h-12 border border-solid border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
                />
              </div>
            </form>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <!--<h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">-->
            <!--  Admin Layout Pages-->
            <!--</h6>-->
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
              <li class="items-center">
                <a
                  href="./dashboard.php"
                  class="text-xs uppercase py-3 font-bold block <?php echo $classDashboardText; ?>"
                >
                  <i class="fas fa-tv mr-2 text-sm <?php echo $classDashboardIcon; ?>"></i>
                  Dashboard
                </a>
              </li>
              
              <li class="items-center">
                <a
                  href="./input-item.php"
                  class="text-xs uppercase py-3 font-bold block <?php echo $classInputItemText; ?>"
                >
                  <i class="fas fa-tools mr-2 text-sm <?php echo $classInputItemIcon; ?>"></i>
                  Input Item
                </a>
              </li>
              
              <li class="items-center">
                <a
                  href="./scan.php"
                  class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                  <i class="fas fa-qrcode mr-2 text-sm text-blueGray-300"></i>
                  Scan QR
                </a>
              </li>
              
              <!-- Divider -->
              <hr class="my-4 md:min-w-full" />
              
              <li class="items-center">
                <a
                  href="./settings.php"
                  class="text-xs uppercase py-3 font-bold block <?php echo $classSettingsText; ?>"
                >
                  <i class="fas fa-cog mr-2 text-sm <?php echo $classSettingsIcon; ?>"></i>
                  Settings
                </a>
              </li>

              <!--<li class="items-center">-->
              <!--  <a-->
              <!--    href="./tables.html"-->
              <!--    class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"-->
              <!--  >-->
              <!--    <i class="fas fa-table mr-2 text-sm text-blueGray-300"></i>-->
              <!--    Tables-->
              <!--  </a>-->
              <!--</li>-->

              <!--<li class="items-center">-->
              <!--  <a-->
              <!--    href="./maps.html"-->
              <!--    class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"-->
              <!--  >-->
              <!--    <i-->
              <!--      class="fas fa-map-marked mr-2 text-sm text-blueGray-300"-->
              <!--    ></i>-->
              <!--    Maps-->
              <!--  </a>-->
              <!--</li>-->
            </ul>

            <!-- Divider -->
            <!--<hr class="my-4 md:min-w-full" />-->
            <!-- Heading -->
            <!--<h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline" >-->
            <!--  Auth Layout Pages-->
            <!--</h6>-->
            <!-- Navigation -->

            <!--<ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">-->
            <!--  <li class="items-center">-->
            <!--    <a-->
            <!--      href="../auth/login.html"-->
            <!--      class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"-->
            <!--      <i-->
            <!--        class="fas fa-fingerprint text-blueGray-300 mr-2 text-sm"-->
            <!--      ></i>-->
            <!--      Login-->
            <!--    </a>-->
            <!--  </li>-->

            <!--  <li class="items-center">-->
            <!--    <a-->
            <!--      href="../auth/register.html"-->
            <!--      class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"-->
            <!--      <i-->
            <!--        class="fas fa-clipboard-list text-blueGray-300 mr-2 text-sm"-->
            <!--      ></i>-->
            <!--      Register-->
            <!--    </a>-->
            <!--  </li>-->
            <!--</ul>-->

            <!-- Divider -->
            <!--<hr class="my-4 md:min-w-full" />-->
            <!-- Heading -->
            <!--<h6-->
            <!--  class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"-->
            <!--  No Layout Pages-->
            <!--</h6>-->
            <!-- Navigation -->

            <!--<ul-->
            <!--  class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4"-->
            <!--  <li class="items-center">-->
            <!--    <a-->
            <!--      href="../landing.html"-->
            <!--      class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"-->
            <!--    >-->
            <!--      <i-->
            <!--        class="fas fa-newspaper text-blueGray-300 mr-2 text-sm"-->
            <!--      ></i>-->
            <!--      Landing Page-->
            <!--    </a>-->
            <!--  </li>-->

            <!--  <li class="items-center">-->
            <!--    <a-->
            <!--      href="../profile.html"-->
            <!--      class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"-->
            <!--    >-->
            <!--      <i-->
            <!--        class="fas fa-user-circle text-blueGray-300 mr-2 text-sm"-->
            <!--      ></i>-->
            <!--      Profile Page-->
            <!--    </a>-->
            <!--  </li>-->
            <!--</ul>-->

            <!-- Divider -->
            <!-- hr class="my-4 md:min-w-full" /-->
            <!-- Heading -->
            <!--h6
              class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
              Documentation
            </h6-->
            <!-- Navigation -->
            <!--ul
              class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4"
            >
              <li class="inline-flex">
                <a
                  href="https://www.creative-tim.com/learning-lab/tailwind/js/colors/notus"
                  target="_blank"
                  class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold"
                >
                  <i
                    class="fas fa-paint-brush mr-2 text-blueGray-300 text-base"
                  ></i>
                  Styles
                </a>
              </li>

              <li class="inline-flex">
                <a
                  href="https://www.creative-tim.com/learning-lab/tailwind/js/alerts/notus"
                  target="_blank"
                  class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold"
                >
                  <i
                    class="fab fa-css3-alt mr-2 text-blueGray-300 text-base"
                  ></i>
                  CSS Components
                </a>
              </li>

              <li class="inline-flex">
                <a
                  href="https://www.creative-tim.com/learning-lab/tailwind/angular/overview/notus"
                  target="_blank"
                  class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold"
                >
                  <i
                    class="fab fa-angular mr-2 text-blueGray-300 text-base"
                  ></i>
                  Angular
                </a>
              </li>

              <li class="inline-flex">
                <a
                  href="https://www.creative-tim.com/learning-lab/tailwind/js/overview/notus"
                  target="_blank"
                  class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold"
                >
                  <i
                    class="fab fa-js-square mr-2 text-blueGray-300 text-base"
                  ></i>
                  Javascript
                </a>
              </li>

              <li class="inline-flex">
                <a
                  href="https://www.creative-tim.com/learning-lab/tailwind/nextjs/overview/notus"
                  target="_blank"
                  class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold"
                >
                  <i class="fab fa-react mr-2 text-blueGray-300 text-base"></i>
                  NextJS
                </a>
              </li>

              <li class="inline-flex">
                <a
                  href="https://www.creative-tim.com/learning-lab/tailwind/react/overview/notus"
                  target="_blank"
                  class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold"
                >
                  <i class="fab fa-react mr-2 text-blueGray-300 text-base"></i>
                  React
                </a>
              </li>

              <li class="inline-flex">
                <a
                  href="https://www.creative-tim.com/learning-lab/tailwind/svelte/overview/notus"
                  target="_blank"
                  class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold"
                >
                  <i class="fas fa-link mr-2 text-blueGray-300 text-base"></i>
                  Svelte
                </a>
              </li>

              <li class="inline-flex">
                <a
                  href="https://www.creative-tim.com/learning-lab/tailwind/vue/overview/notus"
                  target="_blank"
                  class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold"
                >
                  <i class="fab fa-vuejs mr-2 text-blueGray-300 text-base"></i>
                  VueJS
                </a>
              </li>
            </ul-->
          </div>
        </div>
      </nav>
      <div class="relative md:ml-64 bg-blueGray-50">
        <nav
          class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
        >
          <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
          >
            <a
              class="text-blueGray-600 text-sm uppercase hidden lg:inline-block font-semibold"
              href="./index.html"
              >Dashboard</a
            >
            <form
              class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
            >
              <div class="relative flex w-full flex-wrap items-stretch">
                <span
                  class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"
                  ><i class="fas fa-search"></i
                ></span>
                <input
                  type="text"
                  placeholder="Cari"
                  style="border-color: #d1d5d7 !important;"
                  class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm shadow-sm outline-none focus:outline-none focus:ring w-full pl-10"
                />
              </div>
            </form>
            <ul
              class="flex-col md:flex-row list-none items-center hidden md:flex"
            >
              <a
                class="text-blueGray-500 block"
                href="#pablo"
                onclick="openDropdown(event,'user-dropdown')"
              >
                <div class="items-center flex">
                  <span class="w-12 h-12 text-3xl text-blueGray-900 bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                    <!--<img alt="..." class="w-full rounded-full align-middle border-none shadow-lg" src="#" />-->
                    <i class="fas fa-user-circle"></i>
              </span>
                </div>
              </a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                id="user-dropdown"
              >
                <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Another action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Something else here</a
                >
                <div
                  class="h-0 my-2 border border-solid border-blueGray-100"
                ></div>
                <a
                  href="../global/logout.php"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Keluar</a
                >
              </div>
            </ul>
          </div>
        </nav>