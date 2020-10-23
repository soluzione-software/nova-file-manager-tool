<template>
  <div>
    <card class="flex flex-col" style="min-height: 300px">
      <iframe :src="src" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
    </card>
  </div>
</template>

<script>
export default {
  computed: {
    src() {
      return Nova.config.filemanager.url;
    },
  },
}
</script>

<style>
/* Scoped Styles */
</style>
