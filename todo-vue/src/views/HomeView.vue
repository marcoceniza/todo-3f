<script setup>
import { StarIcon } from '@heroicons/vue/24/solid'

</script>

<template>
  <div class="container mx-auto">
    <div class="w-[500px] text-center mx-auto">
      <div class="flex justify-between items-center">
          <h1 class="text-2xl my-4 font-semibold">Todo</h1>
          <ul class="flex gap-2 text-sm text-gray-600">
            <li><a href="">All</a></li>
            <li><a href="">Favorite</a></li>
            <li><a href="">Completed</a></li>
          </ul>
      </div>
      <form @submit.prevent="addTodo">
          <input type="text" placeholder="Enter new todo" class="p-3 rounded-3xl w-full border border-gray-300">
      </form>
      <ul class="mt-4 text-left">
          <li class="p-3 mx-auto mb-2 border-b relative">
              test 1
              <StarIcon class="size-5 absolute right-7 top-[14px] text-yellow-500 hover:text-yellow-700" />
              <input type="checkbox" class="absolute right-2 top-[17px]">
          </li>
      </ul>
  </div>
    </div>
</template>
