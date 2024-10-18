<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  postId: Number,
});

const form = useForm({
  comment: '',
});

const submitComment = () => {
  form.post(route('comments.store', props.postId), {
    preserveScroll: true,
    onSuccess: () => form.reset('comment'),
  });
};
</script>

<template>
  <form @submit.prevent="submitComment" class="mb-6">
    <div class="mb-4">
      <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Your Comment</label>
      <textarea
        id="comment"
        v-model="form.comment"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        rows="4"
        placeholder="Add a comment..."
        required
      ></textarea>
    </div>
    <div class="flex items-center justify-between">
      <button
        type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        :disabled="form.processing"
      >
        Post Comment
      </button>
    </div>
  </form>
</template>