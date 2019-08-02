/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
window.Vue = require('vue');

// import {routes} from './router';
import Vuex from 'vuex';
import App from './views/App';
import { setupComponents } from './config/setup-components';

// console.log(routes);
import {routes} from './routes';
import {storage} from './store_modules/storage';
// import {autentication} from './store_modules/autentication';
import swatches from 'vue-swatches';
import "vue-swatches/dist/vue-swatches.min.css"
Vue.component('swatches', swatches);
window.moment = require('moment');

setupComponents(Vue);

Vue.use(Vuetify, {
    theme: {
        light: {
            background: '#cccccc',
            primary: '#3f51b5',
            secondary: '#b0bec5',
            accent: '#8c9eff',
            error: '#b71c1c'
        },
        dark: {
        background: '#555555',
        primary: '#3f51b5',
        secondary: '#b0bec5',
        accent: '#8c9eff',
        error: '#b71c1c'
      }
    }
  })



Vue.use(VueRouter);
Vue.use(Vuex)

Vue.prototype.$http = axios;



const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const store = new Vuex.Store({
    modules:{
        template: storage,
        // auth: autentication,
        // dconfirm: confirm,
    }
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
    data: {
        themeColor: '#1D2939',
        userEmail: 'ltorrezs2008@gmail.com',
        userPassword: '123456'
    }
});
