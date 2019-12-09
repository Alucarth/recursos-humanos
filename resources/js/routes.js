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
import EmployeeRequest from './views/request/Index';
import EmployeeInfo from './views/employee/Show';
import Biometric from './views/biometric/Index';
import Attendance from './views/attendance/Index';
import RequestArchive from './views/request_archived/Index';
import TypeHour from './views/type_hour/Index';
import MyHourType from './views/employee/ShowTypeHours';
import Holyday from './views/holyday/Index';
import EventualShould from './views/eventual_should/Assign';
import Refreshment from './views/refreshment/Index';
import ReportAttendance from './views/attendance/Report';
import Category from './views/category/Index';
import SalaryScale from './views/salary_scale/Index';
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
    {
        path: '/employee_request',
        name: '/employee_request',
        components: {
            default: EmployeeRequest,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/employee_info',
        name: '/employee_info',
        components: {
            default: EmployeeInfo,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/biometric',
        name: '/biometric',
        components: {
            default: Biometric,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/attendance',
        name: '/attendance',
        components: {
            default: Attendance,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/request_archive',
        name: '/request_archive',
        components: {
            default: RequestArchive,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/type_hour',
        name: '/type_hour',
        components: {
            default: TypeHour,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/my_type_hour',
        name: '/my_type_hour',
        components: {
            default: MyHourType,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/holyday',
        name: '/holyday',
        components: {
            default: Holyday,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/eventual_should',
        name: '/eventual_should',
        components: {
            default: EventualShould,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/refreshment',
        name: '/refreshment',
        components: {
            default: Refreshment,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/refreshment',
        name: '/refreshment',
        components: {
            default: Refreshment,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/report_attendance',
        name: '/report_attendance',
        components: {
            default: ReportAttendance,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/category',
        name: '/category',
        components: {
            default: Category,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/salary_scale',
        name: '/salary_scale',
        components: {
            default: SalaryScale,
            toolbar: Toolbar,
            nav: Nav
        },
        meta: {
            requiresAuth: true,
        }
    },

];
