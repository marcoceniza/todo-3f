<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header class="hidden">
    <nav>
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/about">About</RouterLink>
    </nav>
  </header>

  <RouterView />
</template>
