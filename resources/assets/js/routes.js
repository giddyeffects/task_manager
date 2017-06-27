import VueRouter from 'vue-router';

let routes = [
	{ path: '/', component: require('./components/Home')},
	{ path: '/tasks', component: require('./components/Tasks')},
	{ path: '/tasks/create', component: require('./components/CreateTask')},
	{ path: '/users', component: require('./components/Account')}
];

export default new VueRouter({
	linkActiveClass: 'list__tile--active',
	routes
});