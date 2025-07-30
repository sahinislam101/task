<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Home" />

  <header class="bg-black text-white shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
      
      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <span class="text-2xl font-bold">
          <span class="text-white">Task</span><span class="text-blue-500">.nest</span>
        </span>
      </div>

      <!-- Right Side Buttons -->
      <div class="flex items-center space-x-4">
        <!-- Login -->
        <Link
          :href="route('login')"
          class="text-blue-500 hover:text-blue-400 transition"
        >
          Login
        </Link>

        <!-- Register -->
        <Link
          :href="route('register')"
          class="border border-blue-500 text-blue-500 px-4 py-1.5 rounded-full hover:bg-blue-500 hover:text-white transition"
        >
          Register
        </Link>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <main class="text-center mt-20 text-white">
    <h1 class="text-4xl font-bold">Welcome to Task.Nest Clone</h1>
    <p class="mt-4 text-gray-400">Your tasks, organized beautifully</p>
  </main>
</template>
