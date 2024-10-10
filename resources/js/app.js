import './bootstrap';
import Vue from 'vue';
import '../css/app.css';
import router from './router'; // Import the router correctly

/**
 * Vue Components
 */
Vue.component('BookListing', () => import('./components/BookListing.vue'));
Vue.component('EditBook', () => import('./components/EditBook.vue'));

/**
 * Bootstrapping
 */
const app = new Vue({
    el: '#app',
    router, // Register the router with the Vue instance
});
