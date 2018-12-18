import VueRouter from 'vue-router'

let routes = [
	{
		path : '/',
		component : require('./components/Profile')
	}
];

export default new VueRouter({
	routes,
	mode:'history'
})