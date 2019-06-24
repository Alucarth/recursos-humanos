import Home from './views/Home';
import Nav from './layout/Nav';
import Toolbar from './layout/Toolbar';
import Login from './views/auth/Login';
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
        path: '/login',
        name: 'Login',
        component: Login
    },
];
