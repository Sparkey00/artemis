<template>
  <v-app>
      <v-layout>
        <v-app-bar
          prominent
          class="!bg-yellow-green !text-dark-purple"
        >
          <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

          <v-toolbar-title class="font-mono text-sky-400"><router-link to="/">Artemis</router-link></v-toolbar-title>

          <v-spacer></v-spacer>

          <v-btn variant="text" icon="mdi-magnify"></v-btn>

          <v-btn variant="text" icon="mdi-filter"></v-btn>

          <v-btn variant="text" icon="mdi-dots-vertical"></v-btn>
        </v-app-bar>

        <v-navigation-drawer
          v-model="drawer"
          bottom
        >
          <v-list
            :items="items"
          ></v-list>
        </v-navigation-drawer>

        <v-main class="!bg-alice">
          <router-view ></router-view>
        </v-main>
    <ArtemisFooter></ArtemisFooter>
    </v-layout>
  </v-app>
</template>

<script setup>
import ArtemisFooter from "@/components/Outlay/ArtemisFooter";

const name = 'App';
import {ref} from "vue";

const drawer = ref(false);
let group = null;
const items =
  [
    {
      title: 'Foo',
      value: 'foo',
    },
    {
      title: 'Bar',
      value: 'bar',
    },
    {
      title: 'Fizz',
      value: 'fizz',
    },
    {
      title: 'Buzz',
      value: 'buzz',
    },
  ];
</script>
