// src/auth/index.js
import {router} from '../../app';

// URL and endpoint constants
const API_URL = 'http://projetodad.dad/api/'
const LOGIN_URL = API_URL + 'login'
const SIGNUP_URL = API_URL + 'users/'
const PASSWORDCHANGE_URL = API_URL + 'changePassword'
const EMAILPASSWORDFORGOT_URL = API_URL + 'forgotPassword'
const ADMINEMAIL_URL = API_URL + 'adminEmail'
const PLATEMAIL_URL = API_URL + 'platEmail'


export default {
  // User object will let us check authentication status
  user: {
    authenticated: false
  },

  // Send a request to the login URL and save the returned JWT
  login(creds, redirect) {
    axios.post(LOGIN_URL, {
      email: creds.email,
      password: creds.password
    }).then((response) => {
      localStorage.setItem('access_token', response.access_token);
      //localStorage.setItem('scope', response.scope);
      console.log(response.data);
      this.user.authenticated = true;
      if(redirect) {
        router.push(redirect);
      }
    }).catch((error) => {
      console.log(error);
    });
  },

  // To log out, we just need to remove the token
  logout(redirect) {
    /*if (localStorage.removeItem('id_token') == null ||
     localStorage.removeItem('access_token') == null) {
      console.log("user não está logged in");
    }else{*/
      localStorage.removeItem('id_token')
      localStorage.removeItem('access_token')
      this.user.authenticated = false
      if(redirect) {
        router.push(redirect);
      }
    },

    redirect(redirect){
      if(redirect) {
        router.push(redirect);
      }
    },

    changePassword(creds, redirect){
      if(creds.oldpassword!=""&&creds.newpassword!=""&&creds.confirmationPassword!="")
      {
        if(creds.oldpassword!=creds.newpassword)
        {
          if(creds.newpassword==creds.confirmationPassword)
          {
            axios.post(PASSWORDCHANGE_URL,creds).then((response) => {
              localStorage.setItem('access_token', response.access_token);
              console.log(response.data);
              this.user.authenticated = true;
              if(redirect) {
                router.push(redirect);
              }
            }).catch((error) => {
              console.log(error);
            });
            return true;
          }
          else
          {
           console.log("Confirm password is not same as you new password.");
           return false;
         }
       }
       else
       {
        console.log("This Is Your Old Password,Please Provide A New Password");
        return false;
      }
    }
    else
    {
     console.log("All Fields Are Required");
     return false;
   }

 },

 setAdminEmail(creds, redirect){
  axios.post(ADMINEMAIL_URL, {
    email: creds.email
  }).then((response) => {
    if(redirect) {
      router.push(redirect);
    }
  }).catch((error) => {
    console.log(error);
  });
  console.log(creds.email);
},

setPlatEmail(creds, redirect){
 axios.post(PLATEMAIL_URL, {
  email: creds.email
}).then((response) => {
  if(redirect) {
    router.push(redirect);
  }
}).catch((error) => {
  console.log(error);
});
console.log(creds.email);
},

forgotPassword(creds, redirect) {
  axios.post(EMAILPASSWORDFORGOT_URL, {
    email: creds.email
  }).then((response) => {
    if(redirect) {
      router.push(redirect);
    }
  }).catch((error) => {
    console.log(error);
  });
  console.log(creds.email);
},

/////////////////////////////
signup(context, creds, redirect) {
  context.$http.post(SIGNUP_URL, creds, (data) => {
    localStorage.setItem('id_token', data.id_token)
    localStorage.setItem('access_token', data.access_token)

    this.user.authenticated = true

    if(redirect) {
      router.go(redirect)        
    }

  }).error((err) => {
    context.error = err
  })
},

checkAuth() {
  var jwt = localStorage.getItem('id_token')
  if(jwt) {
    this.user.authenticated = true
  }
  else {
    this.user.authenticated = false      
  }
},

  // The object to be passed as a header for authenticated requests
  getAuthHeader() {
    return {
      'Authorization': 'Bearer ' + localStorage.getItem('access_token')
    }
  }
}