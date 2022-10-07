import Vue from "vue";
import VueRouter from 'vue-router'
import QRCode from './components/QRCode'
import Login from './components/Login'
import Register from './components/Register'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'QRCode',
            component: QRCode
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/register',
            name: 'Register',
            component: Register
        }
    ]
})