require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const user = Vue.component('user', require('./components/admin/user.vue'));
const login = Vue.component('login', require('./components/auth/login.vue'));
const logout = Vue.component('logout', require('./components/auth/logout.vue'));
const profile = Vue.component('profile', require('./components/admin/profile.vue'));
const password = Vue.component('password', require('./components/admin/password.vue'));

const routes = [
  { path: '/', component: login },
  { path: '/users', component: user },
  { path: '/logout', component: logout },
  { path: '/profile', component: profile },
  { path: '/password', component: password }
 ];

export var router = new VueRouter({
  routes:routes
});

const app = new Vue({
  router,
  data:{
  }
}).$mount('#app');