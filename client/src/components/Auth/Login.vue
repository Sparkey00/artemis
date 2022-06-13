<template>
  <v-row align-content="center" justify="center" align-self="center">
    <v-col md="3" align-self="center">
      <p class="text-h4">Greetings!</p>
    </v-col>
    <v-col md="3" align-self="center" class="pa-5" color="background"
    >
      <v-card class="pa-5">
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
        >
          <v-text-field
              label="Email"
              variant="outlined"
              type="email"
              v-model="email"
              required
          ></v-text-field>
          <v-text-field
              label="Password"
              variant="outlined"
              type="password"
              v-model="password"
              required
          ></v-text-field>

          <v-btn
              color="primary"
              @click="handleLogin"
          >
            Login
          </v-btn>
          <p class="text-medium-emphasis"> Or
            <router-link to="register">register</router-link>
          </p>
        </v-form>

      </v-card>
    </v-col>
  </v-row>
</template>
<script setup>

import {computed, ref} from "vue";
import {useRouter} from 'vue-router'
import Store from "@/store";

const name = "Login";
const email = ref('');
const password = ref('');
const valid = ref(true);
const router = useRouter();

const loggedIn = computed(
    () => {
      return Store.state.auth.status.loggedIn;
    }
)

function onCreated() {
  if (this.loggedIn) {
    router.push("/profile");
  }
}

function handleLogin() {
  const { dispatch } = Store;
  dispatch('auth/login', {username: email.value, password: password.value});
  router.push("/profile");

  // axios.post('/login', {email: email.value, password: password.value})
  //     .then(response => {
  //       if (response.status == 201) {
  //         let d = new Date();
  //         d.setTime(d.getTime() + 1 * 24 * 60 * 60 * 1000);
  //         let expires = "expires=" + d.toUTCString();
  //         document.cookie =
  //             "arToken=" + response.data.token + ";" + expires + ";path=/";
  //       }
  //       console.log(router.getRoutes());
  //       router.push({path: '/profile'}).then(() => {
  //         console.log('Updated route')
  //       });
  //     }).catch(function (error) {
  //         console.log(error);
  // });

}

</script>
<style scoped>
</style>
