<template>
  <div class="w-full px-8 m-auto h-screen top-28 flex justify-end items-center">
    <ul class="w-3/4 px-4 divide-y bg-white">
      <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left">
          <thead class="text-xs dark:text-white uppercase bg-teal-700">
            <tr>
              <th scope="col" class="py-3 px-6">Name</th>
              <th scope="col" class="py-3 px-6">Batch</th>
              <th scope="col" class="py-3 px-6 flex justify-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-200"
            >
              <th
                scope="row"
                class="
                  flex
                  items-center
                  py-4
                  px-6
                  text-gray-900
                  whitespace-nowrap
                "
              >
                <img
                  class="w-10 h-10 rounded-full"
                  src="@/assets/teacher.png"
                  alt="Jese image"
                />
                <div class="pl-3">
                  <div class="text-base font-normal text-gray-500">
                    Samoul Vann
                  </div>
                  <div class="font-normal text-gray-500">
                    samoul.vann@gmail.com
                  </div>
                </div>
              </th>
              <td class="py-4 px-6">WEB 2023</td>
              <td class="py-4 px-6 flex justify-end">
                <button
                  type="button"
                  class="
                    mr-3
                    text-sm
                    bg-blue-500
                    hover:bg-blue-700
                    text-white
                    py-1
                    px-2
                    rounded
                    focus:outline-none focus:shadow-outline
                  "
                >
                  Edit</button
                ><button
                  type="button"
                  class="
                    text-sm
                    bg-red-500
                    hover:bg-red-700
                    text-white
                    py-1
                    px-2
                    rounded
                    focus:outline-none focus:shadow-outline
                  "
                >
                  Delete
                </button>
              </td>
            </tr>
            <tr
              class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-200"
            >
              <th
                scope="row"
                class="
                  flex
                  items-center
                  py-4
                  px-6
                  text-gray-900
                  whitespace-nowrap
                  dark:text-white
                "
              >
                <img
                  class="w-10 h-10 rounded-full"
                  src="@/assets/teacher.png"
                  alt="Jese image"
                />
                <div class="pl-3">
                  <div class="text-base font-normal text-gray-500">
                    Nga Houn
                  </div>
                  <div class="font-normal text-gray-500">
                    mag.houn@gmail.com
                  </div>
                </div>
              </th>
              <td class="py-4 px-6">WEB 2023</td>
              <td class="py-4 px-6 flex justify-end">
                <button
                  type="button"
                  class="
                    mr-3
                    text-sm
                    bg-blue-500
                    hover:bg-blue-700
                    text-white
                    py-1
                    px-2
                    rounded
                    focus:outline-none focus:shadow-outline
                  "
                >
                  Edit</button
                ><button
                  type="button"
                  class="
                    text-sm
                    bg-red-500
                    hover:bg-red-700
                    text-white
                    py-1
                    px-2
                    rounded
                    focus:outline-none focus:shadow-outline
                  "
                >
                  Delete
                </button>
              </td>
            </tr>

            <tr
              class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-200"
            >
              <th
                scope="row"
                class="
                  flex
                  items-center
                  py-4
                  px-6
                  text-gray-900
                  whitespace-nowrap
                  dark:text-white
                "
              >
                <img
                  class="w-10 h-10 rounded-full"
                  src="@/assets/teacher.png"
                  alt="Jese image"
                />
                <div class="pl-3">
                  <div class="text-base font-normal text-gray-500">
                    Veang Kroush
                  </div>
                  <div class="font-normal text-gray-500">
                    veang.kroush@gmail.com
                  </div>
                </div>
              </th>
              <td class="py-4 px-6">WEB 2022</td>

              <td class="py-4 px-6 flex justify-end">
                <button
                  type="button"
                  class="
                    mr-3
                    text-sm
                    bg-blue-500
                    hover:bg-blue-700
                    text-white
                    py-1
                    px-2
                    rounded
                    focus:outline-none focus:shadow-outline
                  "
                >
                  Edit</button
                ><button
                  type="button"
                  class="
                    text-sm
                    bg-red-500
                    hover:bg-red-700
                    text-white
                    py-1
                    px-2
                    rounded
                    focus:outline-none focus:shadow-outline
                  "
                >
                  Delete
                </button>
                
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </ul>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>