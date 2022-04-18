<template>
  <v-app>
    <v-card>
      <v-layout>
        <v-app-bar
          color="primary"
          prominent
        >
          <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

          <v-toolbar-title>Artemis</v-toolbar-title>

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

        <v-main>
          <router-view></router-view>
        </v-main>
      </v-layout>
    </v-card>
    <ArtemisFooter></ArtemisFooter>
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
