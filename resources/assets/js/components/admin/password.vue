<!-- src/components/Login.vue -->
  <template>
    <div class="col-md-8 col-md-offset-2">
      <h2>Change password</h2>
      <p>Change password.</p>
      <div class="alert alert-danger" v-if="error">
        <p>{{ error }}</p>
      </div>
      <div class="form-group">
      </div>
      <div class="form-group">
        <input
          type="password"
          class="form-control"
          placeholder="Enter your old password"
          v-model="credentials.oldpassword"
        >
        <input
          type="password"
          class="form-control"
          placeholder="Enter your new password"
          v-model="credentials.newpassword"
        >
        <input
          type="password"
          class="form-control"
          placeholder="Confirm your new password"
          v-model="confirmationPassword"
        >
      </div>
      <button class="btn btn-primary" @click="submit()">Change</button>
    </div>
  </template>

  <script>
  import auth from '../auth/index.js'
  export default {
    data() {
      return {
        // We need to initialize the component with any
        // properties that will be used in it
        credentials: {
          email: '',
          oldpassword: '',
          newpassword: ''
        },
        confirmationPassword: '',
        error: ''
      }
    },
   methods: {
      submit() {
        var credentials = {
          //email: this.credentials.email,
          oldpassword: this.credentials.oldpassword,
          newpassword: this.credentials.newpassword,
          confirmationPassword: this.confirmationPassword
        }
        auth.changePassword(credentials, '/')
      },
    }
  }
  </script>