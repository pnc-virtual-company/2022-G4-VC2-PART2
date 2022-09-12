import { createRouter, createWebHistory } from 'vue-router'
import TeacherList from '../views/TeacherList.vue'
import StudentList from '../views/StudentList.vue'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/teacherList',
    name: 'teacherList',
    component: TeacherList
  },
  {
    path: '/',
    name: 'HomeView',
    component: HomeView
  },

  {
    path: '/studentList',
    name: 'studentList',
    component: StudentList
  },
  {
    path: '/logout',
    name: 'logout',
    component: () => import(/* webpackChunkName: "about" */ '../views/HomeView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
