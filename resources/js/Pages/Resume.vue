<AppLayout>
<template>
    <div
    v-for="item in props.addresume"
    >
    <div>{{item.add_job_title}}</div>
</div>
</template>

</AppLayout>


<script setup>
import AppLayout from @/Layouts/AppLayout.vue
const props = defineProps(props: {resume:Object});
</script>
