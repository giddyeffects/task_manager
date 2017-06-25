
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//load vuetify
window.Vuetify  = require('vuetify');
//import VueRouter
import VueRouter from 'vue-router';

//Use vuetify, VueRouter
Vue.use(Vuetify);
//Use vue-router
Vue.use(VueRouter);

//import router using ES6 syntax
import router from './routes';
// let routes = [
// 	{ path: '/', component: require('./components/Home')},
// 	{ path: '/tasks', component: require('./components/Task')}
// ];

// const router = new VueRouter({
// 	//base: __dirname,
// 	//base: window.location.href,
// 	//base: '/home/',
// 	routes //or just routes if using ES6
// });

//custom error class
class Errors {
	constructor(){
		this.errors = {};
	}
	get(field){
		if(this.errors[field]){
			return this.errors[field][0];
		}
	}
	record(errors){
		this.errors = errors;
	}
}

window.swal = require('sweetalert');
//console.log('username in app.js is '+window.username);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//Vue.component('app-nav', require('./components/Header.vue'));
//Vue.component('app-sidebar', require('./components/Sidebar.vue'));
Vue.component('app-topbar', require('./components/Topbar.vue'));
Vue.component('task', require('./components/Tasks.vue'));
Vue.component('dash', require('./components/Dash.vue'));

const app = new Vue({
    el: '#app',
    router //or just router if using ES6
});
