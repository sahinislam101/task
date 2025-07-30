<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Header from '@/components/layouts/Header.vue';
import Footer from '@/components/layouts/Footer.vue';
</script>

<template>

    <Head title="Home" />

    <div class="flex flex-col min-h-screen bg-gray-900">
        <!-- Header -->
        <Header />

        <!-- Main Content -->
        <main class="flex-1 flex items-center justify-center text-white">
            <p class="text-gray-300 text-center text-lg max-w-2xl leading-relaxed">
                👋 Welcome to my <span class="text-blue-400 font-semibold">Laravel + Vue.js</span> project!
                This simple Todo App demonstrates <span class="text-green-400 font-semibold">CRUD operations</span>
                with <span class="text-yellow-400 font-semibold">Inertia.js, TailwindCSS</span> and clean, reusable
                components.
                <br />
                <span class="text-gray-400 italic">Thanks for visiting my project — I hope you enjoy exploring
                    it!</span>
            </p>

        </main>

        <!-- Footer -->
        <Footer />
    </div>
</template>
