
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//load vuetify
window.Vuetify  = require('vuetify');

//Use vuetify
Vue.use(Vuetify);

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

Vue.component('task', require('./components/Task.vue'));
Vue.component('dash', require('./components/Dash.vue'));

const app = new Vue({
    el: '#app'
});
