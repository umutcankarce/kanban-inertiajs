<script setup>

import { useForm } from "@inertiajs/vue3";
import {ref,nextTick, computed} from "vue";
import {store} from "@/store";

const props = defineProps({
  card:Object
});

const isShowingForm = computed(() => props.card.id === store.value.editingCardId);
const inputTitleRef = ref();

const form = useForm({
  title : props.card.title,
});


  async function showForm(){
    store.value.editingCardId = props.card.id;
    await nextTick();
    inputTitleRef.value.focus();
  }

  function onSubmit(){
    form.put(route("cards.update",{card:props.card.id}),{
      onSuccess:() => store.value.editingCardId = null
    });
  }



</script>

<template>
  <li
    class="group relative bg-white p-2 shadow rounded-md border-b border-gray-300 hover:bg-gray-50"
  >
 <form
    v-if="isShowingForm"
    @keydown.esc="isShowingForm = false"
    @submit.prevent="onSubmit()">
    <textarea
      ref="inputTitleRef"
      v-model="form.title"
      rows="3"
      @keydown.enter.prevent="onSubmit()"
      class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400"
      placeholder="Enter Card Title"></textarea>

    <div class="mt-2 space-x-2">
      <button
        type="submit"
        class="px-4 py-2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
      >
        Edit Card
      </button>

      <button

        type="button"
        @click="store.editingCardId = null"
        class="px-4 py-2 text-sm font-medium  hover:text-black rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
        >
        Cancel
        </button>
    </div>
  </form>
    <template v-if="!isShowingForm">
        <a href="#" class="text-sm">{{ card.title }}</a>
      <button
        @click="showForm()"
        class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 text-gray-600 group-hover:grid hover:bg-gray-200 hover:text-black place-content-center rounded-md"
      >
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
      </svg>
      </button>
    </template>

  </li>
</template>
