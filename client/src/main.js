import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import axios from 'axios';
import VueAxios from 'vue-axios';
import {getCookie} from "@/services/cookies";

loadFonts()

axios.defaults.baseURL = 'http://127.0.0.1:8000/api';

// Important: If axios is used with multiple domains, the AUTH_TOKEN will be sent to all of them.
// See below for an example using Custom instance defaults instead.

axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
axios.defaults.headers.common['Authorization'] = 'Bearer ' + getCookie('arToken')
createApp(App)
  .use(router)
  .use(store)
  .use(VueAxios, axios)
  .use(vuetify)
  .mount('#app')
