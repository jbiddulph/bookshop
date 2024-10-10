import Vue from 'vue';
import Router from 'vue-router';
import BookListing from './components/BookListing.vue';
import EditBook from './components/EditBook.vue';

Vue.use(Router); // Use Router as a plugin

const routes = [
    { path: '/', component: BookListing, name: 'home' },
    { path: '/books/:id/edit', component: EditBook, name: 'editBook' }
];

const router = new Router({
    mode: 'history', // Use history mode for cleaner URLs
    routes
});

export default router;
