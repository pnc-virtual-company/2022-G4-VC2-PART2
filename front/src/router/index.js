import { createRouter, createWebHistory } from "vue-router";
import ls from 'localstorage-slim'
ls.config.encrypt = true;

const routes = [

  {
    path: "/",
    name: "login",
    meta: {
      isHideNavigation:true,
      removeLocalStorage: true,
    },
    component: () => import("../views/login&logout/LoginView.vue"),
  },
 
  {
    path: "/profiles",
    name: "profiels",
    meta: {
      requiresAuth: true,
    },
    component: () => import("@/views/coordinators/ProfileView.vue"),
  },
  {
    path: "/studetnCommentview",
    name: "studetnCommentview",
    meta: {
      requiresAuth: true,
      isStudent:true,
    },
    component: () => import("@/views/students/StudentCommentView.vue"),
  },

  {
    path: "/teacherList",
    name: "teacherList",
    component: () => import("@/views/coordinators/TeacherView.vue"),
    meta: {
      requiresAuth: true,
      isAdmin:true,
    },
  },
  {
    path: "/listFollowUp",
    name: "listFollowUp",
    component: () =>import("@/views/coordinators/FollowUpView.vue"),
    meta: {
      requiresAuth: true,
      isAdmin:true,
      // isTeacher:true,
     
    },
  },
  {
    path: "/studentList",
    name: "studentList",
    component: () => import("@/views/coordinators/StudentView.vue"),
    meta: {
      requiresAuth: true,
      isAdmin:true,
      // isTeacher:true
    },
  },
  {
    path: "/pageNotFound",
    component: () => import("../views/NotFoundView.vue"),
    meta: {
      isHideNavigation:true,
    },
  },

  {
    path: "/:pathMatch(.*)*",
    component: () => import("../views/NotFoundView.vue"),
    meta: {
      isHideNavigation:true,
    },
  },
];

function authenticationGuard(to, from, next) {
  let requiresAuth = to.meta.requiresAuth;
  if (requiresAuth) {
    if(to.meta.isStudent){
      if(!localStorage.getItem('student_token')){
          // localStorage.removeItem(ls.get('role')+'_token');
          // localStorage.removeItem('role',)
          // localStorage.removeItem('user');
          // localStorage.removeItem('email');
          // next('/')
          next('/pageNotFound')
          
      }else{
        if(to.path == "/"){
          // localStorage.removeItem(ls.get('role')+'_token');
          // localStorage.removeItem('role',)
          // localStorage.removeItem('user');
          // localStorage.removeItem('email');
          // next('/')
          next('/pageNotFound')
        }else{
          next()
        }
      }
    }else if(to.meta.isTeacher){
      if(!localStorage.getItem('teacher_token')){
        //   localStorage.removeItem(ls.get('role')+'_token');
        //   localStorage.removeItem('role',)
        //   localStorage.removeItem('user');
        //   localStorage.removeItem('email');
        // next('/')
        next('/pageNotFound')
      }else{
        if(to.path == "/"){
          // localStorage.removeItem(ls.get('role')+'_token');
          // localStorage.removeItem('role',)
          // localStorage.removeItem('user');
          // localStorage.removeItem('email');
          // next('/')
          next('/pageNotFound')
        }else{
          next()
        }
      }
    }else if(to.meta.isAdmin){
        if(!localStorage.getItem('coordinator_token')){
          // localStorage.removeItem(ls.get('role')+'_token');
          // localStorage.removeItem('role',)
          // localStorage.removeItem('user');
          // localStorage.removeItem('email');
          // next('/')
          next('/pageNotFound')

        }else{
          if(to.path == "/"){
            // localStorage.removeItem(ls.get('role')+'_token');
            // localStorage.removeItem('role',)
            // localStorage.removeItem('user');
            // localStorage.removeItem('email');
            // next('/')
          next('/pageNotFound')

          }else{
            next()
          }
        }
      }else if(to.meta.removeLocalStorage){
            localStorage.removeItem(ls.get('role')+'_token');
            localStorage.removeItem('role',)
            localStorage.removeItem('user');
            localStorage.removeItem('email');
            next('/')

      }else{
        next('/pageNotFound')
      }
    
   
  }
  next();
}

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach(authenticationGuard);

export default router;
