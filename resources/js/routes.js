import { createWebHistory, createRouter } from "vue-router";
import Welcome from "./components/Welcome.vue";
import ArticleList from "./components/Article/List.vue";
import ArticleEdit from "./components/Article/Edit.vue";
import ArticleCreate from "./components/Article/Add.vue";
import Login from "./components/Login.vue";
import Register from "./components/Register.vue";
import CommentList from "./components/Comment/List.vue";
import CommentEdit from "./components/Comment/Edit.vue";
import CommentCreate from "./components/Comment/Add.vue";
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'articleList',
        path: '/article',
        component: ArticleList
    },
    {
        name: 'articleEdit',
        path: '/article/:id/edit',
        component: ArticleEdit
    },
    {
        name: 'articleAdd',
        path: '/article/add',
        component: ArticleCreate
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: { guestOnly: true }
    },
    {
        name: 'register',
        path: '/register',
        component: Register,
        meta: { guestOnly: true }
    },
    {
        name: 'commentList',
        path: '/Allcomment/:id',
        component: CommentList
    },
    {
        name: 'commentEdit',
        path: '/comment/:id/edit',
        component: CommentEdit
    },
    {
        name: 'commentAdd',
        path: '/comment/add/:id',
        component: CommentCreate
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
  });
  
  export default router;