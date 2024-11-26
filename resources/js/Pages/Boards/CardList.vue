<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import CardListItemCreateForm from "@/Pages/Boards/CardListItemCreateForm.vue";
import CardListItem from "@/Pages/Boards/CardListItem.vue";
import { ref } from 'vue';
import Draggable from 'vuedraggable';

const props = defineProps({
  list:Object,
});

const listRef = ref();
const cards   = ref(props.list.cards);

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
        <!-- Vue Draggable -->

      <Draggable
      v-model="cards"
      group="cards"
      item-key="id"
      class="space-y-3"
      tag="ul">

      <!-- #item slot -->
      <template #item="{ element }">
        <CardListItem
          :card="element"
          class="group relative bg-white p-3 shadow rounded-md border-b border-gray-300 hover:bg-gray-50"
        />
      </template>
      </Draggable>
        <!-- #Vue Draggable -->
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
