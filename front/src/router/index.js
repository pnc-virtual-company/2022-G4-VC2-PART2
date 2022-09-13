import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    // path: '/',
    // name: 'home',
    // component: import('../views/NavView.vue')
  },

  {
    path: '/teacherList',
    name: 'teacherList',
    component:() => import(/* webpackChunkName: "about" */ '../views/UsersView.vue')
  },
  {
    path: '/',
    name: 'HomeView',
    component: HomeView
  },

  {
    path: '/studentList',
    name: 'studentList',
    component: () =>  import(/* webpackChunkName: "about" */ '../views/UsersView.vue')
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
  {
    path: '/signup',
    name: 'signup',
    component: () => import('@/components/users/CardUser/UserCard.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
