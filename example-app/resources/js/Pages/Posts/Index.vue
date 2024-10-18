<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
  posts: Array,
});
</script>

<template>
  <Layout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-2xl font-bold mb-4">Blog Posts</h1>
            <Link
              :href="route('posts.create')"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block"
            >
              Create New Post
            </Link>
            <div class="mt-6 space-y-6">
              <div v-for="post in posts" :key="post.id" class="bg-gray-100 p-4 rounded-lg">
                <Link :href="route('posts.show', post.id)" class="text-xl font-semibold text-blue-600 hover:text-blue-800">
                  {{ post.title }}
                </Link>
                <p class="text-gray-600 mt-2">{{ post.content.substring(0, 100) }}...</p>
                <div class="mt-2 text-sm text-gray-500">
                  By {{ post.user.name }} on {{ new Date(post.created_at).toLocaleDateString() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>