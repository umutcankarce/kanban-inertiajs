<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';
import { Popover , PopoverButton,PopoverPanel,PopoverOverlay } from '@headlessui/vue';
const props = defineProps(['boards']);


const form = useForm({
  name: '',
});

function onSubmit(closePopover)
{
  form.post(route('boards.store'),{
       onSuccess: () => {
        form.reset();
        closePopover
      }
  })
}

</script>

<template>
    <Head title="Boards" />
    <AuthenticatedLayout>
      <div class="h-full bg-gray-50 px-4 py-6 overflow-y-auto">
        <!-- Content -->
        <div class="max-w-5xl mx-auto">
          <div class="px-3 flex items-center mb-4">
            <h3 class="font-black text-gray-700">My Boards</h3>

           <Popover
            v-slot="{ open }"
            class="relative">
            <PopoverButton
              :class="open ? 'bg-blue-50 text-blue-600' : ''"
              class="inline-flex items-center px-3 py-2 ml-4 font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

              <span class="ml-1">Create Board</span>
            </PopoverButton>
            <PopoverOverlay class="z-10 bg-black opacity-30 fixed inset-0"/>
            <transition
              enter-active-class="transition duration-200 ease-out"
              enter-from-class="translate-y-1 opacity-0"
              enter-to-class="translate-y-0 opacity-100"
              leave-active-class="transition duration-150 ease-in"
              leave-from-class="translate-y-0 opacity-100"
              leave-to-class="translate-y-1 opacity-0"
            >
              <PopoverPanel
                :focus="true"
                v-slot="{close}"
                class="absolute z-10 w-72 px-4 mt-3 -translate-x-1/2 left-1/2 sm:px-0"
              >
                <div
                  class="p-3 bg-white overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                >
                  <form @submit.prevent="onSubmit(close)">
                    <label
                      class="block text-sm text-gray-600 font-medium mb-1"
                      for="name">Board Name</label>
                    <input
                      id="name"
                      v-model="form.name"
                      class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400"
                      name="name"
                      placeholder="Board Name"
                      type="text">
                    <p
                      v-if="form.errors.name"
                      class="text-sm text-red-600">{{ form.errors.name }}</p>

                    <div class="flex justify-end mt-2">
                      <button class="px-4 py-2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none">Create Board</button>
                    </div>
                  </form>
                </div>
              </PopoverPanel>
            </transition>
          </Popover>


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
