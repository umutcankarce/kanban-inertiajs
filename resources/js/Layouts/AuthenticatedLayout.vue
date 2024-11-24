<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
</script>

<template>
    <div>
        <div class="flex flex-col h-screen ">
          <!-- Header -->
            <nav class="shrink-0 flex justify-between bg-white px-4 py-3 border-b">
              <!-- Logo -->
              <a class="text-2xl font-black tracking-tight" :href="route('boards')">kanboard</a>
              <!-- #Logo -->
              <!-- Nav -->
              <div class="flex items-center">
                <NavLink class="text-sm font-medium px-3 py-2 rounded-md hover:bg-gray-100" href="#">My Boards</NavLink>
                <!-- Dropdown Menu -->
                        <Menu as="div" class="relative ml-3 z-10">
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
                                <MenuItem v-slot="{active}">
                                  <a
                                    href="#"
                                    :class="{'bg-gray-100':active}"
                                    class="block px-4 py-2 text-sm text-gray-700">My Account</a>
                                </MenuItem>
                                <MenuItem v-slot="{active}">

                                  <a
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                    :class="{'bg-gray-100':active}"
                                  class="block px-4 py-2 text-sm text-gray-700">Logout</a>
                                </MenuItem>
                              </MenuItems>
                            </transition>
                        </Menu>
                      <!-- #Dropdown Menu -->
              </div>
              <!-- #Nav -->
            </nav>
          <!-- #Header -->
          <!-- Main -->
            <main class="flex-1 overflow-hidden">
                <slot />
            </main>
          <!-- #Main -->
        </div>
    </div>
</template>
