<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import BoardNameForm from '@/Pages/Boards/BoardNameForm.vue';
import CardListCreateForm from '@/Pages/Boards/CardListCreateForm.vue';
import CardList from '@/Pages/Boards/CardList.vue';

const props = defineProps({
  board : Object,
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
                <!-- #Dropdown Menu -->

            <span class="ml-1">Settings</span>
            </button>
          </div>
        </div>
        <div class="flex-1 overflow-x-auto">
          <div class="inline-flex h-full items-start px-4 pb-4 space-x-4">
            <!-- Card List -->
            <CardList
              v-for="list in board.lists"
              :key="list.id"
              :list="list"
              class="w-72 bg-gray-200 max-h-full flex flex-col rounded-md"
          >
          </CardList>
           <!-- #Card List -->

            <!-- Another Button -->
            <div class="w-72">
              <CardListCreateForm :board="board" />
            </div>
             <!-- #Another Button -->

          </div>
        </div>
      </div>
 </AuthenticatedLayout>
</template>


