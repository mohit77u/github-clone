import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import Repository from '../pages/repository/RepoSingle.vue'

const routes = [
  {
    path: '/',
    component: Home,
  },
  {
    path: '/:username/home',
    name: 'homeUser',
    component: Home,
  },
  {
    path: '/:username/:repository',
    name: 'Repository',
    component: Repository,
  },
]

const router = createRouter({
  history: createWebHistory('/'),
  routes
})

// router.beforeEach((to, from, next) => {
//   var token = localStorage.getItem('token');
//   // if meta required but not logged in
//   if (to.meta.authRequired && !to.meta.guest && token === null) {
//     next({ path: '/login' })
//   }
//   // if meta not required but logged in
//   else if (!to.meta.authRequired && to.meta.guest && token) {
//     next({ path: '/' })
//   }
//   else {
//     next(true)
//   }

// })

export default router
