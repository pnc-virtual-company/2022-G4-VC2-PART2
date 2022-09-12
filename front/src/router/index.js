import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    // path: '/',
    // name: 'home',
    // component: import('../views/NavView.vue')
  },

  {
    path: '/users',
    name: 'users',
    component: () => import(/* webpackChunkName: "about" */ '../views/UsersView.vue')
  },
  {
    path: '/logout',
    name: 'logout',
    component: () => import(/* webpackChunkName: "about" */ '../views/HomeView.vue')
  },
  {
    path: '/profiles',
    name: 'profiels',
    component: () => import('@/components/profiles/ProfileComponent.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
