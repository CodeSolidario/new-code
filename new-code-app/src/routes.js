import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './components/HelloWorld'
import Login from './components/Login'
import Register from './components/Register'
import ForgotPass from './components/ForgotPass'
import ResetPass from './components/ResetPass'
import Dashboard from './components/Dashboard'
import ProjectPage from './components/project/ProjectPage'
import Contact from './components/Contact'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/login',
            component: Login,
            name: 'login'
        },
        {
            path: '/register',
            component: Register,
            name: 'register'
        },
        {
            path: '/forgot-password',
            component: ForgotPass,
            name: 'forgot-password'
        },
        {
            path: '/reset-password/:token',
            component: ResetPass,
            name: 'reset-password'
        },
        {
            path: '/user-page/:id',
            component: Dashboard,
            name: 'user-page'
        },
        {
            path: '/project/:id',
            component: ProjectPage,
            name: 'project-page'
        },
        {
            path: '/contact',
            component: Contact,
            name: 'contact'
        }
    ]
})
