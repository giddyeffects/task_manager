import VueRouter from 'vue-router';

let routes = [
	{ path: '/', component: require('./components/Home')},
	{ path: '/tasks', component: require('./components/Tasks')},
	{ path: '/tasks/create', component: require('./components/CreateTask')},
	{ path: '/users', component: require('./components/Account')},
	{ path: '/category', component: require('./components/Categories')},
	{ path: '/category/create', component: require('./components/CreateCategory')},
];

export default new VueRouter({
	linkActiveClass: 'list__tile--active',
	routes
});