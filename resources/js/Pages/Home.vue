<template>
    <GuestLayout>
        <Head title="Резюме"/>

        <div
            class="border rounded-md mb-3 border-blue-600 p-3"
            v-for="row in props.resumeRows"
        >
            <div class="font-bold px-3 py-5">{{ moment( row.date_start , "YYYY-MM-DD HH:mm:ss").format('MM.YYYY') }}-{{ moment( row.date_end , "YYYY-MM-DD HH:mm:ss").format('MM.YYYY') }}</div>
            <div class="font-bold py-5 px-3">{{ row.company?.name }}</div>
            <div class="font-bold py-5 px-3">{{ row.job_title }}</div>
            <div class="px-3">
                <div v-html="row.job_description"></div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Head} from "@inertiajs/vue3";
import moment from 'moment';
moment.locale("ru") //установка русской локали


const
    props = defineProps({
        resumeRows: Object
    })
console.log(props.resumeRows)
</script>
