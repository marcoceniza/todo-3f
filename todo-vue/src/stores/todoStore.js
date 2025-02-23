import { defineStore } from 'pinia';
import axios from 'axios';
import { ref } from 'vue';

export const useTodoStore = defineStore('todo', () => {
  const todos = ref([]);

  const index = async () => {
    try {
      const res = await axios.get('/api/todos');

      todos.value = res.data.result
    }catch(error) {
      console.error(error);
    }
  }

  const store = async (formData) => {
    try {
      await axios.post('/api/todos', formData);

      formData.title = '';
      await index();
    }catch(error) {
      console.error(error);
    }
  }

  const update = async (id, title) => {
    try {
      await axios.put(`/api/todos/${id}`, { title: title });

      title = '';
      await index();
    }catch(error) {
      console.log(error);
    }
  }

  const destroy = async (id) => {
    try {
      await axios.delete(`/api/todos/${id}`);
      await index();
    }catch(error) {
      console.log(error);
    }
  }

  const isFavorite = async (id) => {
    try {
      await axios.post(`/api/favorite/${id}`);
      await index();
    }catch(error) {
      console.error(error);
    }
  }

  const isCompleted = async (id) => {
    try {
      await axios.post(`/api/completed/${id}`);
      index();
    }catch(error) {
      console.error(error);
    }
  }

  return { store, index, update, destroy, todos, isFavorite, isCompleted }
})
