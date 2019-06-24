import Home from './views/Home';
import Nav from './layout/Nav';
import Toolbar from './layout/Toolbar';
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
        }

    },
];
