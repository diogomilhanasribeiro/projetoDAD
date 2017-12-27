<!-- src/components/Login.vue -->
  <template>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Edit Profile</div>
            <div class="panel-body">
              <div class="form-group">
                <h5>Email</h5>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Email"
                  v-model="credentials.email"
                >
              </div>
              </div>
              <div class="panel-body">
                <h5>Password Management</h5>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Old Password"
                  v-model="credentials.password"
                >

                <input
                  type="text"
                  class="form-control"
                  placeholder="New Password"
                  v-model="credentials.password"
                >
              </div>
            </div>
        </div>
      </div>
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
          password: ''
        },
        error: ''
      }
    },
    methods: {
      submit() {
        var credentials = {
          email: this.credentials.email,
          password: this.credentials.password
        }
        auth.login(credentials, '/users')
      }
    }

  }
  </script>