<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import BoardNameForm from "../Components/BoardNameForm.vue";

const props = defineProps({
  board : Object
});

</script>
<template>
 <AuthenticatedLayout>
      <div class="flex flex-col h-full bg-blue-600">
        <div class="shrink-0 flex flex-wrap justify-between items-center p-4">
          <BoardNameForm :board="board" />
          <div>
            <button class="inline-flex items-center bg-white/10 hover:bg-white/20 px-3 py-2 font-medium text-sm text-white rounded-md">
                <!-- Dropdown Menu -->
                  <Menu as="div" class="relative z-10">

                      <MenuButton class="hover:bg-gray-300 w-8 h-8 rounded-md grid place-content-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                      </MenuButton>

                      <transition
                        enter-active-class="transition transform duration-100 ease-out"
                        enter-from-class="opacity-0 scale-90"
                        enter-to-class="opacity-100 scale-100"
                        leave-active-class="transition transform duration-100 ease-in"
                        leave-from-class="opacity-100 scale-100"
                        leave-to-class="opacity-0 scale-90"
                      >
                        <MenuItems class="origin-top-right mt-2 focus:outline-none absolute right-0 bg-white overflow-hidden rounded-md shadow-lg border w-48">
                          <MenuItem>
                            <a href="#" class="block px-4 py-2 text-sm text-left text-gray-700">Add Card</a>
                          </MenuItem>
                          <MenuItem>
                            <a href="#" class="block px-4 py-2 text-sm text-left text-gray-700">Delete List</a>
                          </MenuItem>
                        </MenuItems>
                      </transition>
                  </Menu>
                <!-- Dropdown Menu -->

           <span class="ml-1">Settings</span>
            </button>
          </div>
        </div>
        <div class="flex-1 overflow-x-auto">
          <div class="inline-flex h-full items-start px-4 pb-4 space-x-4">
            <div
            v-for="item in Array.from({length:3})" :key="item"
            class="w-72 max-h-full  bg-gray-200 flex flex-col rounded-md">
              <div class="flex items-center justify-between px-3 py-2">
                <h3 class="text-sm font-semibold text-gray-700">Backlog</h3>
                <!-- Dropdown Menu -->
                  <Menu as="div" class="relative z-10">

                      <MenuButton class="hover:bg-gray-300 w-8 h-8 rounded-md grid place-content-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                      </MenuButton>

                      <transition
                        enter-active-class="transition transform duration-100 ease-out"
                        enter-from-class="opacity-0 scale-90"
                        enter-to-class="opacity-100 scale-100"
                        leave-active-class="transition transform duration-100 ease-in"
                        leave-from-class="opacity-100 scale-100"
                        leave-to-class="opacity-0 scale-90"
                      >
                        <MenuItems class="origin-top-left mt-2 focus:outline-none absolute left-0 bg-white overflow-hidden rounded-md shadow-lg border w-40">
                          <MenuItem>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Add Card</a>
                          </MenuItem>
                          <MenuItem>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600">Delete List</a>
                          </MenuItem>
                        </MenuItems>
                      </transition>
                  </Menu>
                <!-- #Dropdown Menu -->
              </div>
              <div class="px-3 pb-3 flex flex-col overflow-hidden">
                <div class="px-3 flex-1 overflow-y-auto">
                  <ul class="space-y-3">
                    <li
                    v-for="item in Array.from({length:100})" :key="item"
                    class="group relative bg-white p-3  shadow rounded-md border-b border-gray-300 hover:bg-gray-50">
                      <a href="#" class="text-sm">card items</a>
                        <button class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 text-gray-600 group-hover:grid hover:bg-gray-200 hover:text-black place-content-center rounded-md">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
                          </svg>
                        </button>
                    </li>
                    <li class="group relative bg-white p-3  shadow rounded-md border-b border-gray-300 hover:bg-gray-50">
                      <a href="#" class="text-sm">card items</a>

                      <button class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 text-gray-600 group-hover:grid hover:bg-gray-200 hover:text-black place-content-center rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
                        </svg>
                      </button>

                      <Menu as="div" class="relative">
                      <MenuButton class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black rounded-full">
                        <img class="w-10 h-10 inline rounded-full" src="https://pbs.twimg.com/profile_images/1333896976602193922/MtWztkxt_400x400.jpg" alt="">
                      </MenuButton>

                      <transition
                        enter-active-class="transition transform duration-100 ease-out"
                        enter-from-class="opacity-0 scale-90"
                        enter-to-class="opacity-100 scale-100"
                        leave-active-class="transition transform duration-100 ease-in"
                        leave-from-class="opacity-100 scale-100"
                        leave-to-class="opacity-0 scale-90"
                      >
                        <MenuItems class="origin-top-right mt-2 focus:outline-none absolute right-0 bg-white overflow-hidden rounded-md shadow-lg border w-48">
                          <MenuItem>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">My Profile</a>
                          </MenuItem>
                          <MenuItem disabled>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
                          </MenuItem>
                        </MenuItems>
                      </transition>
                      </Menu>
                    </li>
                  </ul>
                </div>

              <!-- Add Card Button -->
                <div class="mt-3 px-3">
                  <button class="flex items-center p-2 text-sm font-medium text-gray-600 hover:text-black hover:bg-gray-300 w-full rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span class="ml-1">Add Card</span>
                  </button>
                </div>
               <!-- #Add Card Button -->
            </div>
            </div>
            <!-- Another Button -->
            <div class="w-72">
              <button class="flex items-center bg-white/10 w-full hover:bg-white/20 text-white p-2 text-sm font-medium rounded-md">
                <svg class="w-5 h-5 size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="ml-1">Add Another List</span>
              </button>
            </div>
             <!-- #Another Button -->


          </div>
        </div>
      </div>
 </AuthenticatedLayout>
</template>


