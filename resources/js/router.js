import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import SinglePost from './pages/SinglePost.vue';
import SingleTag from './pages/SingleTag.vue';
import TagsPage from './pages/TagsPage.vue';
import PageNotFount from './pages/errors/PageNotFound.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/posts/:id',
            name: 'singlePost',
            component: SinglePost
        },
        {
            path: '/tags',
            name: 'tags',
            component: TagsPage
        },
        {
            path: '/tags/:id',
            name: 'singleTag',
            component: SingleTag
        },
        {
            path: '*',
            name: 'pageNotFound',
            component: PageNotFount
        }
    ]
});

export default router;