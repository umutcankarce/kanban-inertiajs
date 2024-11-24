<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import CardListItemCreateForm from "@/Pages/Boards/CardListItemCreateForm.vue";
import { ref } from 'vue'
const props = defineProps({
  list:Object
});

const listRef = ref();

function onCardCreated(){
 listRef.value.scrollTop = listRef.value.scrollHeight;
}

</script>
<template>
  <div>
    <div class="flex items-center justify-between px-3 py-2">
      <h3 class="text-sm font-semibold text-gray-700">{{ list.name }}</h3>
      <!-- Dropdown Menu -->
      <Menu as="div" class="relative z-10">
        <MenuButton
          class="hover:bg-gray-300 w-8 h-8 rounded-md grid place-content-center"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
            />
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
          <MenuItems
            class="origin-top-left mt-2 focus:outline-none absolute left-0 bg-white overflow-hidden rounded-md shadow-lg border w-40"
          >
            <MenuItem>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                >Add Card</a
              >
            </MenuItem>
            <MenuItem>
              <a href="#" class="block px-4 py-2 text-sm text-red-600"
                >Delete List</a
              >
            </MenuItem>
          </MenuItems>
        </transition>
      </Menu>
      <!-- #Dropdown Menu -->
    </div>
    <div class="px-3 pb-3 flex flex-col overflow-hidden">
      <div
        class="px-3 flex-1 overflow-y-auto"
        ref="listRef">
        <ul class="space-y-3">
          <li
            v-for="card in list.cards"
            :key="card.id"
            :list="list"
            class="group relative bg-white p-3 shadow rounded-md border-b border-gray-300 hover:bg-gray-50"
          >
            <a href="#" class="text-sm">{{ card.title }}</a>
            <button
              class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 text-gray-600 group-hover:grid hover:bg-gray-200 hover:text-black place-content-center rounded-md"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4.867 19.125h.008v.008h-.008v-.008Z"
                />
              </svg>
            </button>
          </li>
        </ul>
      </div>

      <!-- Add Card Button -->
      <div class="mt-3 px-3">
        <!-- Card List Item Form -->
        <CardListItemCreateForm
         :list="list"
         @created="onCardCreated()"
         />
        <!-- Card List Item Form -->
      </div>
      <!-- #Add Card Button -->
    </div>
  </div>
</template>
