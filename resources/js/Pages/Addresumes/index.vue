<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import Addresume from "@/Components/Addresume.vue";

defineProps(['addresumes']);
const form = useForm({
    add_job_title: '',
    add_job_description: '',
});

</script>

<template>
    <Head title="Addresumes" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('addresumes.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.add_job_title"
                    placeholder="Укажите название должности"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.add_job_title" class="mt-2" />
            </form>
            <form @submit.prevent="form.post(route('addresumes.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.add_job_description"
                    placeholder="Укажите обязанности и достижения"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.add_job_description" class="mt-2" />
                <PrimaryButton class="mt-4">Обновить</PrimaryButton>
            </form>
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

                <ul id="example-1">
                    <li v-for="item in items" :key="item.message">
                        {{ item.message }}
                    </li>
                </ul>
                <Addresume
                    v-for="addresume in addresumes"
                    :key="addresume.id"
                    :addresume="addresume"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

