<template>
    <panel-item :field="field">
        <a
            slot="value"
            class="text-primary dim font-bold no-underline"
            :href="field.value"
            target="_blank"
        >{{ field.value }}</a>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
