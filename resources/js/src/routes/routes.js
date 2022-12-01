import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
const SignUp = () => import('../pages/auth/SignUp.vue')
const Login = () => import('../pages/auth/Login.vue')

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      authRequired: true,
      guest: false,
    }
  },
  {
    path: '/signup',
    name: 'SignUp',
    component: SignUp,
    meta: {
      guest: true,
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    meta: {
      guest: true,
    }
  }
]

const router = createRouter({
  history: createWebHistory('/'),
  routes
})

router.beforeEach((to, from, next) => {
  var token = localStorage.getItem('token');
  // if meta required but not logged in
  if (to.meta.authRequired && !to.meta.guest && token === null) {
    next({ path: '/login' })
  }
  // if meta not required but logged in
  else if (!to.meta.authRequired && to.meta.guest && token) {
    next({ path: '/' })
  }
  else {
    next(true)
  }

})

export default router
