<template>
  <div class="col-md-8 col-md-offset-2">
    <h2>Plataform Email</h2>
    <div class="form-group">
    </div>
    <div class="form-group">
      <input
      type="text"
      class="form-control"
      placeholder="Enter plataform email"
      v-model="credentials.email"
      >
    </div>
    <button class="btn btn-primary" @click="submit()">Submit</button>
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
        },
        error: ''
      }
    },
    methods: {
      submit() {
        var credentials = {
          email: this.credentials.email
        }
        auth.setPlatEmail(credentials, '/')
      }
    }
  }
</script>