<template>
  <v-row align-content="center" justify="center" align-self="center">
    <v-col md="3"  align-self="center">
      <p class="text-h4">Greetings!</p>
    </v-col>
    <v-col md="3" align-self="center" class="pa-5"     color="background"
    >
      <v-card class="pa-5">
        <v-form
          ref="form"
          v-model="valid"
          lazy-validation
        >
          <v-text-field
            label="Login"
            variant="outlined"
            required
          ></v-text-field>
          <v-text-field
            label="Password"
            variant="outlined"
            type="password"
            required
          ></v-text-field>

          <v-btn
            color="primary"
          >
            Login
          </v-btn>
        </v-form>

      </v-card>
    </v-col>
  </v-row>
</template>
<script setup>

import {computed, ref} from "vue";

const name = "Login";
const login = ref('');
const password = ref('');
const repeatPassword = ref('');
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
  this.loading = true;
  this.$store.dispatch("auth/login", user).then(
    () => {
      this.$router.push("/profile");
    },
    (error) => {
      this.loading = false;
      this.message =
        (error.response &&
          error.response.data &&
          error.response.data.message) ||
        error.message ||
        error.toString();
    });
}

</script>
<style scoped>
</style>