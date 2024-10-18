<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  postId: Number,
  comments: Array,
  canModerate: Boolean,
});

const form = useForm({
  comment: '',
});

const submitComment = () => {
  form.post(route('comments.store', { post: props.postId }), {
    preserveScroll: true,
    onSuccess: () => form.reset('comment'),
  });
};

const deleteComment = (commentId) => {
  if (confirm('Are you sure you want to delete this comment?')) {
    useForm().delete(route('comments.destroy', commentId), {
      preserveScroll: true,
    });
  }
};
</script>

<template>
  <div class="mt-8">
    <h2 class="text-2xl font-bold mb-4">Comments</h2>
    
    <!-- Comment Form -->
    <form @submit.prevent="submitComment" class="mb-6">
      <textarea
        v-model="form.comment"
        class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline"
        rows="4"
        placeholder="Add a comment..."
      ></textarea>
      <div class="mt-2">
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          :disabled="form.processing"
        >
          Post Comment
        </button>
      </div>
    </form>

    <!-- Comments List -->
    <div class="space-y-4">
      <div v-for="comment in comments" :key="comment.id" class="bg-gray-100 p-4 rounded-lg">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-gray-800">{{ comment.comment }}</p>
            <p class="text-sm text-gray-600 mt-1">
              By {{ comment.user.name }} on {{ new Date(comment.created_at).toLocaleString() }}
            </p>
          </div>
          <button 
            v-if="canModerate || comment.user_id === $page.props.auth.user.id"
            @click="deleteComment(comment.id)"
            class="text-red-600 hover:text-red-800"
          >
            Delete
          </button>
        </div>
      </div>
    </div>

    <!-- No Comments Message -->
    <p v-if="comments.length === 0" class="text-gray-600 italic">No comments yet. Be the first to comment!</p>
  </div>
</template>