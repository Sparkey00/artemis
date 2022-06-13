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
        v-for="social in socials"
        :key="social.icon"
        color="info"
        class="mx-4"
        :icon="social.icon"
        variant="text"
        :href="social.link"
      ></v-btn>
    </div>
    <div class="">
      {{ new Date().getFullYear() }} — <strong>Artemis</strong> by Zhenia Moisieiev
    </div>
  </v-footer>
</template>

<script setup>
const name = "ArtemisFooter";
const socials = [
  {
    icon: 'mdi-facebook',
    link: 'https://www.facebook.com/profile.php?id=100064911413970'
  },
  {
    icon: 'mdi-twitter',
    link: 'https://twitter.com/Zhenya_Moiseyew'
  },
  {
    icon: 'mdi-linkedin',
    link: 'https://www.linkedin.com/in/zhenia-moisieiev-7ba44019b'
  },
  {
    icon: 'mdi-instagram',
    link: 'https://www.instagram.com/zh.msw/'
  }
];
const icons = [
  {icon: 'mdi-facebook'},
  {icon: 'mdi-twitter'},
  {icon: 'mdi-linkedin'},
  {icon: 'mdi-instagram'}
];
</script>

<style scoped>

</style>
