require('./bootstrap');
import Vue from 'vue';

window.Vue = require('vue');
import App from './App.vue';
import router from './router/index';

Vue.use('VueRouter');

import Test from './components/ExampleComponent.vue';



Vue.component('example', Test);
Vue.component('App', App);


const app = new Vue({
    render: h => h(App),
    router
}).$mount('#app');
