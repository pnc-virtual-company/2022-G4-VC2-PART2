import { createRouter, createWebHistory } from 'vue-router'
import profileView from '../views/coordinators/ProfileView.vue'
// import TeacherView from '../views/coordinators/TeachersListView.vue'
// import StudentView from '../views/coordinators/StudentsListView.vue'
// import createUserView from '../views/coordinators/CreateUserView.vue'
// import studentsFollowUpView from '../views/coordinators/ListOfStudentFollowUpView.vue'

const routes = [
  {
    path: '/',
    name: 'profile',
    component: profileView
  },
  {
    path: '/about',
    name: 'about',
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
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
