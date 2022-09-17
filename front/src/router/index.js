import { createRouter, createWebHistory } from "vue-router";

const routes = [


  {
    path: "/",
    name: "login",
    component: () =>
      import(
        /* webpackChunkName: "about" */ "../views/login&logout/LoginView.vue"
      ),
  },
  {
    path: "/login/password",
    name: "loginPassword",
    component: () =>
      import(
        /* webpackChunkName: "about" */ "@/components/login/PasswordForm.vue"
      ),
  },
  // {
  //   path: '/logout',
  //   name: 'logout',
  //   component: () => import(/* webpackChunkName: "about" */ '../coordinators/views/HomeView.vue')
  // },
  {
    path: "/profiles",
    name: "profiels",
    meta: {
      needLogin: true
    },
    component: () => import("../views/coordinators/ProfileView.vue"),
  },
  {
    path: "/coorNavigation",
    name: "coorNavigation",
    meta: {
      needLogin: true
    },
    component: () => import("../views/coordinators/CoorNavigationView.vue"),
    children: [
      {
        path: "/teacherList",
        name: "teacherList",
        meta: {
          needLogin: true
        },
        component: () => import("../views/coordinators/TeacherView.vue"),
      },
      {
        path: "/listFollowUp",
        name: "listFollowUp",
        meta: {
          needLogin: true
        },
        component: () =>
          import("../views/coordinators/ListOfStudentFollowUpView.vue"),
      },
      {
        path: "/studentList",
        name: "studentList",
        meta: {
          needLogin: true
        },
        component: () =>
          import(
            /* webpackChunkName: "about" */ "../views/coordinators/UsersView.vue"
          ),
      },
    ],
  },
  {
    path: "/:pathMatch(.*)*",
    component: () => import("../views/NotFoundView.vue"),
  },
];
function authenticationGuard (to, from, next) {
  let needLogin = to.meta.needLogin;
  if (needLogin) {
    if (!localStorage.coorId) {
      next('/login');
    }
    else {
      if (to.path === '/login') {
        next('/');
      }
      else {
        next();
      }
    }
  }
  else {
    if (localStorage.coorId) {
      if (to.path === '/login') {
        next('/');
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
