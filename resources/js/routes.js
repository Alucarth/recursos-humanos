import Home from './views/Home';
import Nav from './layout/Nav';
import Toolbar from './layout/Toolbar';
import Login from './views/auth/Login';
import Employee from './views/employee/Index';
import Position from './views/position/Index';
import City from './views/city/Index';
import Country from './views/country/Index';

export const routes= [
    {
        path: '/',
        name: 'home',
        components:{
            default:Home,
            toolbar:Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        },
    },
    {
        path: '/employee',
        name: 'employee',
        components:{
            default:Employee,
            toolbar:Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        },
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/position',
        name: '/position',
        components: {
            default: Position,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/city',
        name: '/city',
        components: {
            default: City,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/country',
        name: '/country',
        components: {
            default: Country,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        }
    },
];
