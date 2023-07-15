import LoginComponent from "./components/LoginComponent.vue";
import RegisterComponent from "./components/RegisterComponent.vue";
import CreateProduct from "./components/CreateProduct.vue";
import LoginView from "./components/admin/LoginView.vue";
import DashboardView from "./components/admin/DashboardView.vue";

/**
 * The folllowing block of code will define the Routes of this App
 * Each route should map to a component.
 */
const routes = [
    {
        path: "/",
        component: LoginComponent,
    },
    {
        path: "/login",
        component: LoginComponent,
        name: "/login",
    },
    {
        path: "/register",
        component: RegisterComponent,
        name: "/register",
    },
    {
        name:"/products",
        path:"/products",
        component: CreateProduct,
    },
    /**Admin Routes */
    {
        name:"/admin/login",
        path:"/admin/login",
        component: LoginView,
    },
    {
        name:"/dashboard",
        path:"/dashboard",
        component: DashboardView,
    }
];

export default routes;
