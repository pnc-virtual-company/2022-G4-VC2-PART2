import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  // {
  //   path: '/',
  //   name: 'home',
  //   component:() => import('../views/coordinators/HomeView.vue')
  // },

  {
    path: '/teacherList',
    name: 'teacherList',
    component:() => import('../views/coordinators/TeacherView.vue')
  },
  {
    path: '/listFollowUp',
    name: 'listFollowUp',
    component: () => import('../views/coordinators/ListOfStudentFollowUpView.vue')
  },

  {
    path: '/studentList',
    name: 'studentList',
    component: () =>  import(/* webpackChunkName: "about" */ '../views/coordinators/UsersView.vue')
  },
  // {
  //   path: '/logout',
  //   name: 'logout',
  //   component: () => import(/* webpackChunkName: "about" */ '../coordinators/views/HomeView.vue')
  // },
  {
    path: '/profiles',
    name: 'profiels',
    component: () => import('../views/coordinators/ProfileView.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
