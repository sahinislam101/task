<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    todo: {
        id: string
        slug: string
        title: string
        description: string | null
        image: string | null
        is_completed: boolean
    }
}>()

// Form state
const form = useForm({
    title: props.todo.title,
    description: props.todo.description || '',
    is_completed: props.todo.is_completed,
});

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Todos', href: '/todos' },
    { title: 'Edit Todo', href: `/todos/${props.todo.slug}/edit` },
];

function submitForm() {
    form.put(`/todos/${props.todo.slug}`);
}
</script>

<template>
    <Head :title="`Edit - ${props.todo.title}`" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">
                Edit Todo
            </h1>

            <form @submit.prevent="submitForm" class="space-y-4">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Title</label>
                    <input v-model="form.title" type="text" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white"/>
                    <div v-if="form.errors.title" class="text-red-500 text-sm mt-1">{{ form.errors.title }}</div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Description</label>
                    <textarea v-model="form.description" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white"></textarea>
                    <div v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</div>
                </div>

                <!-- Status -->
                <div class="flex items-center space-x-2">
                    <input id="is_completed" type="checkbox" v-model="form.is_completed" />
                    <label for="is_completed" class="text-gray-700 dark:text-gray-300">Completed</label>
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700" :disabled="form.processing">
                        Update Todo
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
