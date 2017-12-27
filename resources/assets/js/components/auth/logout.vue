<!-- src/components/Logout.vue -->
  <template>
    <div>
    <div class="col-sm-4">
      <h2>Log out of your account?</h2>
      <div class="alert alert-danger" v-if="error">
        <p>{{ error }}</p>
      </div>
      <button class="btn btn-primary" @click="logoutAuthorized()">Yes</button>
      <button class="btn btn-primary" @click="logoutNotAuthorized()">No</button>
    </div>
    </div>
  </template>

  <script>
  import auth from '../auth/index.js'
  export default {
    data(){
      return {
        title: 'Logout',
        credentials: {
          email: '',
          password: ''
        },
        error: ''
      }
    },
    methods: {
      logoutAuthorized(){
        auth.logout('/')
      },
      logoutNotAuthorized(){
        auth.redirect('/users')
      }
    }
  }
  </script>