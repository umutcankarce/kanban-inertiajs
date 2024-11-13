<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
const props = defineProps(['boards']);

</script>

<template>
    <Head title="Boards" />
    <AuthenticatedLayout>
      <div class="h-full bg-gray-50 px-4 py-6">
        <!-- Content -->
        <div class="max-w-5xl mx-auto">
          <div class="px-3 flex items-center mb-4">
            <h3 class="font-black text-gray-700">My Boards</h3>
            <button class="inline-flex items-center ml-4 py-2 px-3 bg-gray-100 rounded font-medium hover:bg-gray-200">
              <!-- Plus Icon -->
              <svg class="-ml-1 w-4 h-4 size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
              <!-- #Plus Icon -->
              <span class="ml-1">Create Board</span>
            </button>
          </div>
          <!-- Card -->
            <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
              <li
                v-for="board in boards" :key="board.id"
                class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]">
                  <Link class="p-3 text-white text-lg font-bold absolute inset-0"
                  :href="route('boards.show',{board:board.id})">
                    {{ board.name }}
                  </Link>
              </li>
            </ul>
          <!-- #Card -->
        </div>
        <!-- #Content -->
      </div>
    </AuthenticatedLayout>
</template>
