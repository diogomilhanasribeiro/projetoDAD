require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const user = Vue.component('user', require('./components/admin/user.vue'));
const login = Vue.component('login', require('./components/auth/login.vue'));
const logout = Vue.component('logout', require('./components/auth/logout.vue'));
const profile = Vue.component('profile', require('./components/admin/profile.vue'));
const changePassword = Vue.component('changePassword', require('./components/admin/changePassword.vue'));
const forgotPassword = Vue.component('forgotPassword', require('./components/admin/forgotPassword.vue'));
const adminEmail = Vue.component('adminEmail', require('./components/admin/adminEmail.vue'));
const platEmail = Vue.component('platEmail', require('./components/admin/platEmail.vue'));


const routes = [
{ path: '/', component: login },
{ path: '/users', component: user },
{ path: '/logout', component: logout },
{ path: '/profile', component: profile },
{ path: '/changePassword', component: changePassword },
{ path: '/forgotPassword', component: forgotPassword },
{ path: '/adminEmail', component: adminEmail },
{ path: '/platEmail', component: platEmail }
];

export var router = new VueRouter({
	routes:routes
});

const app = new Vue({
	router,
	data:{
	}
}).$mount('#app');