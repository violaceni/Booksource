require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './components/Homepage'
import Datasource from './components/Datasource'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/booksource',
            name: 'Homepage',
            component: Homepage,
            props: true
        },
        {
            path: '/booksource/index',
            name: 'datasource',
            component: Datasource,
            props: true
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
    components: { Homepage },
});