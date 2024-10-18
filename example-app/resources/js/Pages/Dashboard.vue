<script setup>
import { computed } from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const layout = computed(() => {
    return usePage().props.auth.user
        ? AuthenticatedLayout
        : GuestLayout;
});
</script>

   <template>
    <Head title="Dashboard" />
    <component :is="layout">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <template v-if="usePage().props.auth.user">
                            You're logged in!
                        </template>
                        <template v-else>
                            Please log in to create content.
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </component>
</template>
