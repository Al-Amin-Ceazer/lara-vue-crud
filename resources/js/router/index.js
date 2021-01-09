import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import home from '../pages/home';
import categoryList from '../pages/category/index';
import createCategory from '../pages/category/create';
import editCategory from '../pages/category/edit';

const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: home,
            name: 'home',
        },
        {
            path: '/categories',
            component: categoryList,
            name: 'category-list',
        },
        {
            path: '/categories/create',
            component: createCategory,
            name: 'create-category',
        },
        {
            path: '/categories/edit/:id',
            component: editCategory,
            name: 'edit-category',
        },
    ]
});

export default routes;
