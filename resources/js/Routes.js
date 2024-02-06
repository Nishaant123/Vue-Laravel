import { createWebHistory, createRouter } from "vue-router";
import Home from './components/Home.vue';
import Form from './components/Form.vue';
import FormEdit from './components/FormEdit.vue';
import slot from './components/teacher.vue';
import allemployee from './components/AllEmployee.vue';
import formvalidate from './components/formvalidate.vue';
import FriendContact from './components/FriendContact.vue';
import view from './components/View.vue';
const routes = [
    {
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        name: 'Form',
        path: '/form',
        component: Form
    },

    {
        name: 'FormEdit',
        path: '/employees/:id/edit',
        component: FormEdit
    },
    {
        name: 'view',
        path: '/employees/:id/view',
        component: view
    },
    {
        name: 'slot',
        path: '/teacher',
        component: slot
    },
    {
        name: 'allemployee',
        path: '/allemployee',
        component: allemployee
    },
    {
        name: 'formvalidate',
        path: '/formvalidate',
        component: formvalidate
    },
    {
        name: 'FriendContact',
        path: '/FriendContact',
        component: FriendContact
    },
];
const router = createRouter({
  
    history: createWebHistory(),
    routes
});
export default router;