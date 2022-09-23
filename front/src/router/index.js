import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/listFollowUp', 
    name: 'listFollowUp',
    component:() => import('../views/coordinators/FollowUpView.vue')
  },
  {
    path: '/studentList',
    name: 'studentList',
    component: () =>  import('../views/coordinators/StudentView.vue')
  },
  {
    path: '/teacherList',
    name: 'teacherList',
    component: () =>  import('../views/coordinators/TeacherView.vue')
  },
  {
    path: '/',
    name: 'home',
    component: () => import('../views/coordinators/HomeView.vue')
  },
  {
    path: '/profiles',
    name: 'profiels',
    component: () => import('../views/coordinators/ProfileView.vue')
  },
  {
    path: '/studetnCommentview',
    name: 'studetnCommentview',
    component: () => import('../views/students/StudentCommentView.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
