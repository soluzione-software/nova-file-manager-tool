<template>
    <div :class="`text-${field.textAlign}`">
        <template v-if="field.value">
            <a
                slot="value"
                class="text-primary dim font-bold no-underline"
                :href="field.value"
                target="_blank"
            >{{ field.value }}</a>
        </template>
        <p v-else>&mdash;</p>
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
