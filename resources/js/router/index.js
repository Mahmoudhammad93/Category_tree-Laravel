import Vue from 'vue'
import Router from 'vue-router';
import Categories from '../components/categories/index.vue';

Vue.use(Router)

const routes = [
    {
        path: '/categories',
        name: 'categories',
        component: Categories

    }
]


const router = new Router({
    mode: 'history',
    routes
})

export default router;
