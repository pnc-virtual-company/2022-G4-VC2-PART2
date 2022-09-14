import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'home',
    component:() => import('../views/HomeView.vue')
  },

  {
    path: '/teacherList',
    name: 'teacherList',
    component:() => import('../views/TeacherView.vue')
  },
  {
    path: '/listFollowUp',
    name: 'listFollowUp',
    component: () => import('../views/ListOfStudentFollowUpView.vue')
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
    component: () => import('../views/ProfileView.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
