<template>
    <GuestLayout>
        <Head title="Резюме"/>

        <div
            v-for="row in props.resumeRows"
        >
            <div class="font-bold mx-3 my-5">{{ moment( row.date_start , "YYYY-MM-DD HH:mm:ss").format('MMMM YYYY') }}-{{ moment( row.date_end , "YYYY-MM-DD HH:mm:ss").format('MMMM YYYY') }}</div>
            <div class="font-bold my-5 mx-3">{{ row.job_title }}</div>
            <div class="mx-3">
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
