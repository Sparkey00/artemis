<template>
  <v-row align-content="center" justify="center" align-self="center">
    <v-col md="3" align-self="center">
      <p class="text-h4">Greetings!</p>
    </v-col> <v-col md="3" align-self="center" class="pa-5" color="background"
  >
      <v-form @submit="handleRegister">

        <v-text-field
            v-model="userData.name"
            label="Name"
            variant="outlined"
            density="compact"
            hide-details
        ></v-text-field>
        <v-text-field
            v-model="userData.email"
            label="Email"
            variant="outlined"
            density="compact"
            hide-details
        ></v-text-field>
        <v-text-field
            v-model="userData.password"
            label="Password"
            variant="outlined"
            type="password"
            density="compact"
            hide-details
        ></v-text-field>
        <v-text-field
            v-model="userData.c_password"
            label="Repeat password"
            variant="outlined"
            type="password"
            density="compact"
            hide-details
        ></v-text-field>
        <v-autocomplete
            v-model="userData.gender"
            :items="genders"
            label="Gender"
            variant="outlined"
            density="compact"
            hide-details
            item-text="name"
        ></v-autocomplete>
        <Datepicker
            v-model="dateOfBirthObject"
            label="Date of birth"
            variant="outlined"
            density="compact"
            hide-details
        ></Datepicker>

        <v-btn type="submit" color="success" class="btn btn-success">Register</v-btn>

      </v-form> </v-col>
  </v-row>
</template>
<script setup>
import {computed, reactive, ref, watch} from "vue";
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import axios from 'axios'

const name = "Register";
const dateOfBirthObject = new Date();
const userData = reactive({
  name: '',
  email: '',
  password: '',
  c_password: '',
  gender: '',
  date_of_birth: ''
});

const genders = [
  {
    name: 'Female',
    value: 0
  },
  {
    name: 'Male',
    value: 1
  },
  {
    name: 'Other',
    value: 2
  }
];

const handleRegister = () => {
  userData.date_of_birth = dateOfBirthObject.toISOString().split('T')[0];

  axios.post('/register', userData).then(response => {
    console.log(response);
  }).catch(function (error) {
    console.log(error.response.data.errors);
  });

}
</script>
<style scoped>
</style>