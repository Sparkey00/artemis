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
import axios from "axios";

const name = "Login";
const email = ref('');
const password = ref('');
const valid = ref(true);

const loggedIn = computed(
    () => {
      return this.$store.state.auth.status.loggedIn;
    }
)

function onCreated() {
  if (this.loggedIn) {
    this.$router.push("/profile");
  }
}

function handleLogin(user) {
  axios.post('/login', {email: email.value, password: password.value})
      .then(response => {
        console.log(response);
        if (response.status == 201) {
          let d = new Date();
          d.setTime(d.getTime() + 1 * 24 * 60 * 60 * 1000);
          let expires = "expires=" + d.toUTCString();
          document.cookie =
              "Token=" + response.data.token + ";" + expires + ";path=/";
        }
        this.$router.push('/profile');
      }).catch(function (error) {
    console.log(error);
  });

}

</script>
<style scoped>
</style>