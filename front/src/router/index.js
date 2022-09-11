import { createRouter, createWebHistory } from 'vue-router'
import profileView from '../views/coordinators/ProfileView.vue'
import TeacherView from '../views/coordinators/TeachersListView.vue'
import StudentView from '../views/coordinators/StudentsListView.vue'
import createUserView from '../views/coordinators/CreateUserView.vue'
import studentsFollowUpView from '../views/coordinators/ListOfStudentFollowUpView.vue'

const routes = [
  {
    path: '/',
    name: 'profile',
    component: profileView
  },
  {
    path: '/teacher',
    name: 'teacher',
    component: TeacherView
  },
  {
    path: '/students',
    name: 'students',
    component: StudentView
  },
  {
    path: '/studentsFollowUp',
    name: 'studentsFollowUp',
    component: studentsFollowUpView
  },
  {
    path: '/createUser',
    name: 'createUser',
    component: createUserView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
