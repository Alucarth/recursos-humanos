import Home from './views/Home';
import Nav from './layout/Nav';
import Toolbar from './layout/Toolbar';
import Login from './views/auth/Login';
import Employee from './views/employee/Index';
import Position from './views/position/Index';
import City from './views/city/Index';
import Country from './views/country/Index';
import DocumentType from './views/document_type/Index';
import ContractType from './views/contract_type/Index';
import ContractModality from './views/contract_modality/Index';
import Management from './views/management/Index';
import Unity from './views/unity/Index';
import Contribution from './views/contribution/Index';
import MyRequest from './views/my_request/Index';

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
        component: Login,
        meta: {
            allowAnonymous: true
        }
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
    {
        path: '/document_type',
        name: '/document_type',
        components: {
            default: DocumentType,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/contract_type',
        name: '/contract_type',
        components: {
            default: ContractType,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/contract_modality',
        name: '/contract_modality',
        components: {
            default: ContractModality,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/management',
        name: '/management',
        components: {
            default: Management,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/unity',
        name: '/unity',
        components: {
            default: Unity,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/contribution',
        name: '/contribution',
        components: {
            default: Contribution,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/my_request',
        name: '/my_request',
        components: {
            default: MyRequest,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
];
