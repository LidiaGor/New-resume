<template>
    <GuestLayout>
        <Head title="Резюме"/>

        <div
            class="border rounded-md mb-3 border-blue-600 p-3"
            v-for="row in props.resumeRows"
        >
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-end-2">
                    <div class="font-bold px-3 py-5 text-xl">{{
                            moment(row.date_start, "YYYY-MM-DD HH:mm:ss").format('MM.YYYY')
                        }}-{{ moment(row.date_end, "YYYY-MM-DD HH:mm:ss").format('MM.YYYY') }}
                    </div>
                </div>
                <div class="col-start-3 col-end-12">
                    <div class="font-bold py-5 px-3 text-3xl">{{ row.company?.name }}</div>
                    <div class="font-italian py-5 px-3 text-2xl">{{ row.job_title }}</div>
                    <div class="px-3">
                        <div v-html="row.job_description"></div>
                    </div>
                </div>
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
