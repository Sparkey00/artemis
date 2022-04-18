<template>
  <v-footer
    class="text-center d-flex flex-column"
    max-height="150px"
    width="100%"
    bottom
    fixed
    app
  >
    <div>
      <v-btn
        v-for="icon in icons"
        :key="icon"
        color="info"
        class="mx-4"
        :icon="icon"
        variant="text"
      ></v-btn>
    </div>
    <div class="">
      {{ new Date().getFullYear() }} — <strong>Artemis</strong> by Zhenia Moisieiev
    </div>
  </v-footer>
</template>

<script setup>
const name = "ArtemisFooter";
const icons = [
  'mdi-facebook',
  'mdi-twitter',
  'mdi-linkedin',
  'mdi-instagram'
];
</script>

<style scoped>

</style>