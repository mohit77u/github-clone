import { createRouter, createWebHistory } from 'vue-router'
const Home = () => import ('../pages/Home.vue');
const RepositorySingle = () => import ('../pages/repository/RepoSingle.vue');
const CreateNewRepo = () => import ('../pages/repository/New.vue');
const ProfileLayout = () => import ('../pages/user/ProfileLayout.vue');
const ProfileTabs = () => import ('../pages/user/ProfileTabs.vue');
// import Home from '../pages/Home.vue'
// import RepositorySingle from '../pages/repository/RepoSingle.vue'
// import CreateNewRepo from '../pages/repository/New.vue'
// import ProfileLayout from '../pages/user/ProfileLayout.vue'
// import ProfileTabs from '../pages/user/ProfileTabs.vue'

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
    path: '/new',
    name: 'CreateNewRepo',
    component: CreateNewRepo,
  },
  {
    path: '/',
    name: 'ProfileLayout',
    component: ProfileLayout,
    children: [
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
