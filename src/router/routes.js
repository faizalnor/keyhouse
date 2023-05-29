const routes = [
  {
    path: "/",
    children: [{ path: "/", redirect: "/admin" }],
  },
  {
    path: "/admin",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [
      {
        path: "/admin",
        redirect: "/admin/newRating",
      },
      {
        path: "newRating",
        name: "Create New Rating",
        component: () => import("src/pages/MainLayout/newRating.vue"),
      },
      {
        path: "RatingList",
        name: "Customer Rating List",
        component: () => import("src/pages/MainLayout/RatingList.vue"),
      },
    ],
  },
  {
    path: "/MainRate",
    component: () => import("src/layouts/MainRate.vue"),
    children: [
      {
        path: "/MainRate",
        redirect: "/MainRate/submitRate",
      },
      {
        path: "submitRate",
        name: "Rate Submission",
        component: () => import("src/pages/MainRate/submitRate.vue"),
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
