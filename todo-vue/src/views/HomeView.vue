<script setup>
import { computed, onMounted, reactive, ref } from 'vue';
import FormInput from '@/components/FormInput.vue';
import TodoList from '@/components/TodoList.vue';
import { useTodoStore } from '@/stores/todoStore';
import { storeToRefs } from 'pinia';

const { store, index } = useTodoStore();
const { todos } = storeToRefs(useTodoStore());
const formData = reactive({
  title: ''
})

const activeFilter = ref('all');
const updateData = reactive({
  id: null,
  icon: false,
});

const filteredTodos = computed(() => {
  if(activeFilter.value === 'favorite') {
    return todos.value.filter(todo => todo.favorite)
  }else if(activeFilter.value === 'completed') {
    return todos.value.filter(todo => todo.completed)
  }else if(activeFilter.value === 'all') {
    return todos.value.filter(todo => todo.completed === 0 && todo.favorite === 0)
  }
});

const getIdHandler = ([id, title]) => {
  formData.title = title;
  updateData.id = id;
  updateData.icon = true;
}

const clearFieldHandler = () => formData.title = '';

onMounted(() =>{ index() });
</script>

<template>
  <div class="container mx-auto">
    <div class="w-[500px] text-center mx-auto">
      <div class="flex justify-between items-center">
          <h1 class="text-2xl my-4 font-semibold">Todo</h1>
          <ul class="flex gap-2 text-sm text-gray-600">
            <li><a href="#" :class="{'font-bold text-black': activeFilter === 'all'}" @click.prevent="activeFilter = 'all'">All</a></li>
            <li><a href="#" :class="{'font-bold text-black': activeFilter === 'favorite'}" @click.prevent="activeFilter = 'favorite'">Favorite</a></li>
            <li><a href="#" :class="{'font-bold text-black': activeFilter === 'completed'}" @click.prevent="activeFilter = 'completed'">Completed</a></li>
          </ul>
      </div>
      <form @submit.prevent="store(formData)">
        <FormInput v-model="formData.title" :updateData="updateData" :clearFieldHandler="clearFieldHandler" :newTitle="formData.title" />
      </form>
      <ul v-for="todo in filteredTodos" :key="todo.id" class="mt-4 text-left">
        <TodoList :todo="todo" @get-ID="getIdHandler" :activeFilter="activeFilter"/>
      </ul>
  </div>
    </div>
</template>
