import EmployeesIndex from "./components/employees/Index";
import EmployeesCreate from "./components/employees/Create";
import EmployeesEdit from "./components/employees/Edit";

export const routes = [
    {
        path: "/employees",
        name: "EmplyoeesIndex",
        component: EmployeesIndex,
    },
    {
        path: "/employees/create",
        name: "EmplyoeesCreate",
        component: EmployeesCreate,
    },
    {
        path: "/employees/:id",
        name: "EmplyoeesEdit",
        component: EmployeesEdit,
    },
];
