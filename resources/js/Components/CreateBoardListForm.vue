<script setup>
import { useForm } from "@inertiajs/vue3";
import {ref,nextTick} from "vue";
const props = defineProps({
  board:Object
});

const form = useForm({
  name:''
})

const isShowingForm = ref(false);
const inputNameRef  = ref();
const formRef  = ref();

  async function showForm(){
    isShowingForm.value = true;
    await nextTick();
    inputNameRef.value.focus();
  }

  function onSubmit(){
    form.post(route("boardLists.store",{board:props.board.id}),{
      onSuccess:() => {
        form.reset();
        inputNameRef.value.focus();
        formRef.value.scrollIntoView();
      }
    });
  }
</script>

<template>
  <form
    ref="formRef"
    v-if="isShowingForm"
    @submit.prevent="onSubmit()"
    class="p-3 bg-gray-200 rounded-md">
    <input
      v-model="form.name"
      ref="inputNameRef"
      type="text"
      class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400"
      placeholder="Enter list name...">

    <div class="mt-2 space-x-2">
      <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none">Add List</button>
      <button
      type="button"
      @click="isShowingForm = false"
      class="px-4 py-2 text-sm font-medium  hover:text-black rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none">Cancel</button>
    </div>
  </form>
  <button
    v-if="!isShowingForm"
    @click="showForm()"
    class="flex items-center bg-white/10 w-full hover:bg-white/20 text-white p-2 text-sm font-medium rounded-md">
    <svg class="w-5 h-5 size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
    </svg>
    <span class="ml-1">Add Another List</span>
  </button>
</template>
