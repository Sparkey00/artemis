import { createStore } from 'vuex'
import { auth } from "./auth.module";
import { userSettings } from "./user-settings";
const store = createStore({
  modules: {
    auth,
    userSettings
  },
});
export default store;
