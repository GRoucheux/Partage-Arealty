import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import PostView from "../views/PostView.vue";
import registerPage from "../views/registerPage.vue";
import userPage from "../views/userPage.vue";
import userPostsView from "../views/userPostsView.vue";
import userEdit from "../views/userEdit.vue";
import CreatePost from "../views/CreatePost.vue";
import adminView from "../views/adminView.vue";
import manageUsers from "../views/manageUsers.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/post/:postId",
      name: "post",
      component: PostView,
    },
    {
      path: "/login",
      name: "login",
      component: () => import("../views/LoginView.vue"),
    },
    {
      path: "/register",
      name: "registerPage",
      component: registerPage,
    },
    {
      path: "/user",
      name: "userPage",
      component: userPage,
    },
    {
      path: "/userPosts",
      name: "userPostsView",
      component: userPostsView,
    },
    {
      path: "/userEdit",
      name: "userEdit",
      component: userEdit,
    },
    {
      path: "/createpost",
      name: "CreatePost",
      component: CreatePost,
    },
    {
      path: "/commandant",
      name: "adminView",
      component: adminView,
    },
    {
      path: "/manageUsers",
      name: "manageUsers",
      component: manageUsers,
    },
  ],
});

export default router;
