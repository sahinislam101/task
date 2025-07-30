<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Todos', href: '/todos' },
  { title: 'Create', href: '/todos/create' },
];

const form = useForm({
  title: '',
  description: '',
  is_completed: false,
});

const submitForm = () => {
  form.post('/todos');
};
</script>

<template>
  <Head title="Create Todo" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
      <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Create a New Todo</h2>

      <form @submit.prevent="submitForm" class="space-y-4">
        <!-- Title -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
          <input
            v-model="form.title"
            type="text"
            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm"
          />
          <span v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</span>
        </div>

        <!-- Description -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
          <textarea
            v-model="form.description"
            rows="3"
            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm"
          ></textarea>
          <span v-if="form.errors.description" class="text-red-500 text-sm">{{ form.errors.description }}</span>
        </div>

        <!-- Status -->
        <div class="flex items-center">
          <input
            type="checkbox"
            v-model="form.is_completed"
            class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
          />
          <label class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Mark as Completed</label>
        </div>

        <!-- Submit -->
        <div class="flex justify-end space-x-2">
          <button
            type="submit"
            :disabled="form.processing"
            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 disabled:opacity-50"
          >
            Create
          </button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
