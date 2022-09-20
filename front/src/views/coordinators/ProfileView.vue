<template>
  <div class="w-full mt-24 m-auto px-8">
    <!-- component -->
    <div class="bg-gray-100">
      <div class="w-full text-white border-t-4 border-blue-300">
        <div
          x-data="{ open: false }"
          class="
            flex flex-col
            max-w-screen-xl
            px-4
            mx-auto
            md:items-center md:justify-between md:flex-row md:px-6
            lg:px-8
          "
        >
          <div class="p-4 flex flex-row items-center justify-between">
            <a
              href="#"
              class="
                text-[3rem]
                text-blue-500
                font-semibold
                tracking-widest
                uppercase
                rounded-lgc
              "
            >
              profile</a
            >
            <button
              class="
                md:hidden
                rounded-lg
                focus:outline-none focus:shadow-outline
              "
              @click="open = !open"
            >
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path
                  x-show="!open"
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
                <path
                  x-show="open"
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
          </div>
          <nav
            :class="{ flex: open, hidden: !open }"
            class="
              flex-col flex-grow
              pb-4
              md:pb-0
              hidden
              md:flex md:justify-end md:flex-row
            "
          >
            <div class="relative" x-data="{ open: false }"></div>
          </nav>
        </div>
      </div>
      <!-- End of Navbar -->
      <div class="container mx-auto p-5">
        <div class="md:flex no-wrap">
          <!-- Left Side -->
          <div class="w-full md:w-2/12 md:mx-8">
            <!-- Profile Card -->
            <div class="bg-white p-3 border-t-2 border-green-400">
              <div class="image overflow-hidden">
                <img
                  class="h-auto w-full mx-auto"
                  src="@/assets/samol.jpg"
                  alt=""
                />
              </div>
              <div class="flex justify-center  border-rounded">
                <div class="image">
                  <img
                    class="h-auto w-1/5 mx-auto cursor-pointer mt-[-20px]"
                    src="@/assets/cam.png"
                    alt=""
                  />
                </div>
              </div>
              <div
                class="
                  flex
                  items-center
                  space-x-2
                  font-semibold
                  text-gray-800
                  leading-8
                "
              >
                <span clas="text-green-500">
                  <svg
                    class="h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                  </svg>
                </span>
                <h1
                  class="
                    flex
                    justify-center
                    text-gray-900
                    font-bold
                    text-xl
                    my-4
                  "
                >
                  Samoul Vann
                </h1>
              </div>
            </div>
            <!-- End of friends card -->
          </div>
          <!-- Right Side -->
          <div  class="w-full md:w-9/12">
            <!-- Profile tab -->
            <!-- About Section -->
            <div class="bg-white p-4 shadow-sm rounded-sm">
              <div
                class="
                  flex
                  items-center
                  space-x-2
                  font-semibold
                  text-gray-800
                  leading-8
                "
              >
                <span clas="text-green-500">
                  <svg
                    class="h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                  </svg>
                </span>
                <span class="tracking-wide">About</span>
              </div>
              <div   class="text-gray-700 border-t-2 border-gray-300">
                <div class="grid md:grid-cols-2 text-sm">
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">First Name</div>
                    <div class="px-4 py-2">Smoul</div>
                  </div>
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Last Name</div>
                    <div class="px-4 py-2">Doe</div>
                  </div>
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Class</div>
                    <div class="px-4 py-2">WEB B</div>
                  </div>

                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Batch</div>
                    <div class="px-4 py-2">2022</div>
                  </div>
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Gender</div>
                    <div class="px-4 py-2">Female</div>
                  </div>
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Provence</div>
                    <div class="px-4 py-2">Banteay Mean Chey</div>
                  </div>
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">NGO_Name</div>
                    <div class="px-4 py-2">Banteay Mean Chey</div>
                  </div>
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Birthday</div>
                    <div class="px-4 py-2">Feb 06, 1998</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
    };
  },
 
};
</script>




<style>
:root {
  --main-color: #4a76a8;
}

.bg-main-color {
  background-color: var(--main-color);
}

.text-main-color {
  color: var(--main-color);
}

.border-main-color {
  border-color: var(--main-color);
}
</style>
<!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->

