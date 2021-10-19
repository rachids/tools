import { createWebHistory, createRouter } from "vue-router";
import DaysBeforeDateComponent from "./components/DaysBeforeDateComponent";
import HomeComponent from "./components/HomeComponent";
import DifferenceBetweenDatesComponent from "./components/DifferenceBetweenDatesComponent";

const routes = [
    {
        path: "/",
        name: "Home",
        component: HomeComponent,
    },
    {
        path: "/days-before-date",
        name: "Days Before Date",
        component: DaysBeforeDateComponent,
    },
    {
        path: "/difference-between-dates",
        name: "Difference Between Dates",
        component: DifferenceBetweenDatesComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
