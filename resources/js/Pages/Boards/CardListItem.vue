<script setup>

import { useForm } from "@inertiajs/vue3";
import {ref,nextTick} from "vue";
const props = defineProps({
  card:Object
});

const form = useForm({
  title : props.card.title,
});

const isShowingForm = ref(false);
const inputTitleRef  = ref();

  async function showForm(){
    isShowingForm.value = true;
    await nextTick();
    inputTitleRef.value.focus();
  }

  function onSubmit(){
    form.put(route("cards.update",{card:props.card.id}),{
      onSuccess:() => isShowingForm.value = false
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
      placeholder="Enter card title..."></textarea>

    <div class="mt-2 space-x-2">
      <button
        type="submit"
        class="px-4 py-2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
      >
        Save Card
      </button>

      <button

        type="button"
        @click="isShowingForm = false"
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
    </template>

  </li>
</template>
