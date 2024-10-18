<script setup>
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';
import CommentList from '@/Components/Comment/List.vue';

const props = defineProps({
  post: Object,
  can: Object,
});

// Remove the form and submitComment function from here since they're now handled in CommentList
</script>

<template>
  <Layout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-3xl font-bold mb-4">{{ post.title }}</h1>
            <p class="text-gray-600 mb-4">
              By {{ post.user.name }} on {{ new Date(post.created_at).toLocaleDateString() }}
            </p>
            <div class="prose max-w-none">
              {{ post.content }}
            </div>

            <div v-if="can.update" class="mt-6">
              <Link
                :href="route('posts.edit', post.id)"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2"
              >
                Edit Post
              </Link>
              <Link
                :href="route('posts.destroy', post.id)"
                method="delete"
                as="button"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
              >
                Delete Post
              </Link>
            </div>

            <!-- Replace the existing comments section with the CommentList component -->
            <CommentList 
              :postId="post.id" 
              :comments="post.comments" 
              :canModerate="can.moderate_comments"
            />
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>