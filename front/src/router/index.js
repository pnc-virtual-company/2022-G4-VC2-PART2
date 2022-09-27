import { createRouter, createWebHistory } from "vue-router";
import ls from 'localstorage-slim'
ls.config.encrypt = true;

const routes = [
  {
    path: "/",
    name: "login",
    component: () => import("../views/login&logout/LoginView.vue"),
  },
  {
    path: "/logout",
    name: "logout",
    component: () => import("../views/login&logout/LogoutView.vue"),
  
  },
  {
    path: "/profiles",
    name: "profiels",
    meta: {
      requiresAuth: true,
    },
    component: () => import("../views/coordinators/ProfileView.vue"),
  },
  {
    path: "/studetnCommentview",
    name: "studetnCommentview",
    meta: {
      requiresAuth: true,
    },
    component: () => import("../views/students/StudentCommentView.vue"),
  },

  {
    path: "/navigation",
    name: "navigation",
    component: () => import("../components/navigation/NavigationComponent.vue"),
    children: [
      {
        path: "/teacherList",
        name: "teacherList",
        meta: {
          requiresAuth: true,
          isAdmin:true,
          isTeacher:true
        },
        component: () => import("../views/coordinators/TeacherView.vue"),
      },
      {
        path: "/listFollowUp",
        name: "listFollowUp",
        meta: {
          requiresAuth: true,
          isAdmin:true,
          isTeacher:true,
          isStudent:true,

        },
        component: () =>import("../views/coordinators/FollowUpView.vue"),
      },
      {
        path: "/studentList",
        name: "studentList",
        meta: {
          requiresAuth: true,
          isAdmin:true,
          isTeacher:true
        },
        component: () => import("../views/coordinators/StudentView.vue"),
      },
    ],
  },
  {
    path: "/:pathMatch(.*)*",
    component: () => import("../views/NotFoundView.vue"),
  },
];

function authenticationGuard(to, from, next) {
  let requiresAuth = to.meta.requiresAuth;
  if (requiresAuth) {
    if(to.meta.isStudent){
      if(!localStorage.student_token){
          localStorage.removeItem(ls.get('role')+'_token');
          localStorage.removeItem('role',)
          localStorage.removeItem('user');
          localStorage.removeItem('email');
        next('/')
      }else{
        if(to.path == "/"){
          localStorage.removeItem(ls.get('role')+'_token');
          localStorage.removeItem('role',)
          localStorage.removeItem('user');
          localStorage.removeItem('email');
          next('/')
        }else{
          next()
        }
      }
    }else if(to.meta.isTeacher){
      if(!localStorage.teacher_token){
          localStorage.removeItem(ls.get('role')+'_token');
          localStorage.removeItem('role',)
          localStorage.removeItem('user');
          localStorage.removeItem('email');
        next('/')
      }else{
        if(to.path == "/"){
          localStorage.removeItem(ls.get('role')+'_token');
          localStorage.removeItem('role',)
          localStorage.removeItem('user');
          localStorage.removeItem('email');
          // next('/')
        }else{
          next()
        }
      }
    }else{
      if(to.meta.isAdmin){
        if(!localStorage.coordinator_token){
          localStorage.removeItem(ls.get('role')+'_token');
          localStorage.removeItem('role',)
          localStorage.removeItem('user');
          localStorage.removeItem('email');
          // next('/')
        }else{
          if(to.path == "/"){
            localStorage.removeItem(ls.get('role')+'_token');
            localStorage.removeItem('role',)
            localStorage.removeItem('user');
            localStorage.removeItem('email');
            // next('/')
          }else{
            next()
          }
        }
      }
    }
  }
  next();
}
//manage route of coordinator
// router.beforeEach((to, from, next) => {
//   if (!localStorage.getItem("coordinator_token")) {
//     if (!to.meta.requiresAuth) {
//       next();
//     } else {
//       next("/");
//     }
//   }

//   if (localStorage.getItem("coordinator_token")) {
//     if (to.meta.requiresAuth) {
//       next();
//     } else {
//       next("/");
//     }
//   }
//   next();
// });
// router.beforeEach(async (to, from) => {
//   let isAuthenticated = to.meta.requiresAuth;
//   if (
//     !isAuthenticated &&
//     to.name !== 'Login'
//   ) {
//     return { name: 'Login' }
//   }
// })

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach(authenticationGuard);

export default router;
