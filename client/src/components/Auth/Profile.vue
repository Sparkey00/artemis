  <template>
    <v-card>
      <v-toolbar
          color="primary"
      >
        <v-toolbar-title>User Profile</v-toolbar-title>
      </v-toolbar>
      <div class="d-flex flex-row">
        <v-tabs
            v-model="tab"
            direction="vertical"
            color="primary"
        >
          <v-tab value="profile">
            <v-icon start>
              mdi-account
            </v-icon>
            Profile
          </v-tab>
          <v-tab value="settings" @click="getSettings">
            <v-icon start>
              mdi-lock
            </v-icon>
              Settings
          </v-tab>
          <v-tab value="something">
            <v-icon start>
              mdi-access-point
            </v-icon>
            Something
          </v-tab>
        </v-tabs>
        <v-window v-model="tab">
          <v-window-item value="profile">
            <v-card flat>
              <v-card-text>
                {{currentUser.user.name}}
              </v-card-text>
            </v-card>
          </v-window-item>
          <v-window-item value="settings">
            <v-card flat>
              <v-card-text>
                <v-range-slider
                    v-model="age"
                    step="1"
                    strict
                    thumb-label="always"
                ></v-range-slider>
              </v-card-text>
            </v-card>
          </v-window-item>
          <v-window-item value="option-3">
            <v-card flat>
              <v-card-text>
                <p>
                  Fusce a quam. Phasellus nec sem in justo pellentesque facilisis. Nam eget dui. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien, a accumsan nisi mauris ac eros. In dui magna, posuere eget, vestibulum et, tempor auctor, justo.
                </p>

                <p class="mb-0">
                  Cras sagittis. Phasellus nec sem in justo pellentesque facilisis. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nam at tortor in tellus interdum sagittis.
                </p>
              </v-card-text>
            </v-card>
          </v-window-item>
        </v-window>
      </div>
    </v-card>
  </template>
<script>
import Store from "@/store";
export default {
  name: 'Profile',
  data: () => {
    return {
      tab: 'profile',
      age: [0,0]
    }
  },
  methods: {
    getSettings() {
      const { dispatch } = Store;
      dispatch('userSettings/getModel', this.currentUser.user.id);
      this.age = [this.userSettings.age_from, this.userSettings.age_to]
    }
  },
  computed: {
    currentUser() {
      return Store.state.auth.user;
    },
    userSettings() {
      return Store.state.userSettings.model;
    }
  },
  watch: {
    age: (newValue) => {
      console.log(newValue);
    }
  },
  mounted() {
    if (!this.currentUser) {
      this.$router.push('/login');
    }
  }
};
</script>
