<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  comment: Object,
  canModerate: Boolean,
});

const deleteComment = () => {
  if (confirm('Are you sure you want to delete this comment?')) {
    useForm().delete(route('comments.destroy', props.comment.id), {
      preserveScroll: true,
    });
  }
};
</script>

<template>
  <div class="bg-gray-100 p-4 rounded-lg mb-4">
    <div class="flex justify-between items-start">
      <div>
        <p class="text-gray-800">{{ comment.comment }}</p>
        <p class="text-sm text-gray-600 mt-1">
          By {{ comment.user.name }} on {{ new Date(comment.created_at).toLocaleString() }}
        </p>
      </div>
      <button 
        v-if="canModerate || comment.user_id === $page.props.auth.user.id"
        @click="deleteComment"
        class="text-red-600 hover:text-red-800 text-sm"
      >
        Delete
      </button>
    </div>
  </div>
</template>