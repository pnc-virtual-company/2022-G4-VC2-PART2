import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "login",
    component: () => import("../views/login&logout/LoginView.vue"),
  },
  {
    path: "/login/password",
    name: "loginPassword",
    component: () => import("@/components/login/PasswordForm.vue"),
  
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
    path: "/coorNavigation",
    name: "coorNavigation",
    meta: {
      requiresAuth: true,
    },
    component: () => import("../views/coordinators/CoorNavigationView.vue"),
    children: [
      {
        path: "/teacherList",
        name: "teacherList",
        meta: {
          requiresAuth: true,
        },
        component: () => import("../views/coordinators/TeacherView.vue"),
      },
      {
        path: "/listFollowUp",
        name: "listFollowUp",
        meta: {
          requiresAuth: true,
      
        },
        component: () =>
          import("../views/coordinators/ListOfStudentFollowUpView.vue"),
      },
      {
        path: "/studentList",
        name: "studentList",
        meta: {
          requiresAuth: true,
        },
        component: () => import("../views/coordinators/UsersView.vue"),
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
    if (!localStorage.coorId) {
      next("/");
    } else {
      if (to.path === "/") {
        next("/");
      } else {
        next();
      }
    }
  } else {
    if (localStorage.coorId) {
      if (to.path === "/") {
        next("/");
      }
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
