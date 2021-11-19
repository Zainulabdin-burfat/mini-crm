import AddCompany from "./components/AddCompany.vue";
import Company from "./components/Company.vue";
import AddEmployee from "./components/AddEmployee.vue";
import EditCompany from "./components/EditCompany.vue";
import Employee from "./components/Employee.vue";
import EditEmployee from "./components/EditEmployee.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: Company,
    },
    {
        name: "companies",
        path: "/companies",
        component: Company,
    },
    {
        name: "employees",
        path: "/employees",
        component: Employee,
    },
    {
        name: "company",
        path: "/company/add",
        component: AddCompany,
    },
    {
        name: "employee",
        path: "/employee/add",
        component: AddEmployee,
    },
    {
        name: "edit/company",
        path: "edit/company/:id",
        component: EditCompany,
    },
    {
        name: "edit/employee",
        path: "edit/employee/:id",
        component: EditEmployee,
    },
];
