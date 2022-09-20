import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "login",
    component: () => import("../views/login&logout/LoginView.vue"),
  },
  {
    path: "/logout",
    name: "logout",
    component: () => import("../views/login&logout/LogoutView"),
  
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
    path: "/navigation",
    name: "navigation",
    meta: {
      requiresAuth: true,
      isAdmin:true
    },
    component: () => import("../views/coordinators/CoorNavigationView.vue"),
    children: [
      {
        path: "/teacherList",
        name: "teacherList",
        meta: {
          requiresAuth: true,
          isAdmin:true,
        },
        component: () => import("../views/coordinators/TeacherView.vue"),
      },
      {
        path: "/listFollowUp",
        name: "listFollowUp",
        meta: {
          requiresAuth: true,
          isAdmin:true,
          isTeacher:true
        },
        component: () =>
          import("../views/coordinators/ListOfStudentFollowUpView.vue"),
      },
      {
        path: "/studentList",
        name: "studentList",
        meta: {
          requiresAuth: true,
          isAdmin:true,
          isTeacher:true
        },
        component: () => import("../views/coordinators/UsersView.vue"),
      },
// --------------------------Rout for Teacher-----------------------------------------------
// {
//   path: "/studentList/teacher",
//   name: "studentList",
//   meta: {
//     requiresAuth: true,
//     requireTeacher:true
//   },
//   component: () => import("../views/coordinators/UsersView.vue"),
// },
// {
//   path: "/listFollowUp/teacher",
//   name: "listFollowUp",
//   meta: {
//     requiresAuth: true,
//     requireTeacher:true
    
//   },
//   component: () =>
//     import("../views/coordinators/ListOfStudentFollowUpView.vue"),
// },

    ],
  },
  {
    path: "/:pathMatch(.*)*",
    component: () => import("../views/NotFoundView.vue"),
  },
];

// function authenticationGuard(to, from, next) {
//   let requiresAuth = to.meta.requiresAuth;
//   if (requiresAuth) {
//     if(to.meta.isAdmin && to.meta.isTeacher){
//       if(!localStorage.admin_token){
//         next('/')
//       }else{
//         if(to.path == "/navigation"){
//           next('/')
//         }else{
//           next()
//         }
//       }
//     }else{
//       if(to.meta.isTeacher){
//         if(!localStorage.teacher_token){
//           next('/')
//         }else{
//           if(to.path == "/"){
//             next('/navigation')
//           }else{
//             next()
//           }
//         }
//       }
//     }
//   }
//   next();
// }
//manage route of coordinator
router.beforeEach((to, from, next) => {
  if (!localStorage.getItem("coordinator_token")) {
    if (!to.meta.requiresAuth) {
      next();
    } else {
      next("/");
    }
  }

  if (localStorage.getItem("coordinator_token")) {
    if (to.meta.requiresAuth) {
      next();
    } else {
      next("/");
    }
  }
  next();
});
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

// router.beforeEach(authenticationGuard);

export default router;
