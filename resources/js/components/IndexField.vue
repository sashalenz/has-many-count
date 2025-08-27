<template>
    <div class="text-center" v-if="field.value">
        <router-link
            :to="{
        name: 'detail',
            params: {
                resourceName: resourceName,
                resourceId: field.id,
            },
        }"
            class="border border-70 hover:border-primary rounded text-70 hover:text-primary no-underline px-2">
            {{ field.value }}
        </router-link>
    </div>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    props: ['resourceName', 'field'],
})
</script>
