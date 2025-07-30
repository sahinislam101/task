<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';


const props = defineProps<{
    todos: {
        data: Array<{
            id: string,
            slug: string;
            title: string,
            description: string,
            image: string,
            is_completed: boolean,
        }>,
        current_page: number,
        last_page: number,
        total: number,
        from: number,
        to: number,
    },
}>()

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'todo',
        href: '/todos',
    },
];
function confirmDelete(slug: string) {
  if (confirm('Are you sure you want to delete this todo?')) {
    router.delete(`/todos/${slug}`);
  }
}
</script>


<template>

    <Head title="Todos" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Link :href="route('todos.create')" type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">+Create A New Todo</Link>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="todo in props.todos.data" :key="todo.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ todo.title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ todo.description ?? 'No description' }}
                        </td>
                        <td class="px-6 py-4">
                            <span :class="[
                                'inline-flex items-center px-2 py-0.5 rounded text-sm font-semibold',
                                todo.is_completed
                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
                                    : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300'
                            ]">
                                {{ todo.is_completed ? 'Completed' : 'Incomplete' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <!-- Edit -->
                            <Link :href="`/todos/${todo.slug}/edit`"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Edit
                            </Link>

                            <!-- Delete -->
                            <button @click="confirmDelete(todo.slug)"
                                class="font-medium text-red-600 dark:text-red-400 hover:underline">
                                Delete
                            </button>
                        </td>

                    </tr>

                    <!-- No data state -->
                    <tr v-if="props.todos.data.length === 0">
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No todos found
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
