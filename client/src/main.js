import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import axios from 'axios';
import VueAxios from 'vue-axios';
loadFonts()

axios.defaults.baseURL = process.env.VUE_APP_API_URL;

// Important: If axios is used with multiple domains, the AUTH_TOKEN will be sent to all of them.
// See below for an example using Custom instance defaults instead.
axios.defaults.headers.common['Authorization'] = 'a';

axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

createApp(App)
  .use(router)
  .use(store)
  .use(VueAxios, axios)
  .use(vuetify)
  .mount('#app')
