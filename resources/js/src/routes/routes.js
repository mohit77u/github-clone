import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import RepositorySingle from '../pages/repository/RepoSingle.vue'
import ProfileLayout from '../pages/user/ProfileLayout.vue'
import Profile from '../pages/user/Profile.vue'
import ProfileTabs from '../pages/user/ProfileTabs.vue'

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
    name: 'RepositorySingle',
    component: RepositorySingle,
  },
  {
    path: '/',
    name: 'ProfileLayout',
    component: ProfileLayout,
    children: [
      // {
      //   path: ':username',
      //   name: 'Profile',
      //   component: Profile,
      // },
      {
        path: '/:username',
        name: 'Profile',
        component: ProfileTabs,
      },
    ],
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
