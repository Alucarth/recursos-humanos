// const user ;
// try {
//         user =  JSON.parse(localStorage.getItem('user'));
//     }
//     catch(error) {
//     console.error(error);
//     user = {};
//     // expected output: SyntaxError: unterminated string literal
//     // Note - error messages will vary depending on browser
//     }
    // console.log(localStorage.getItem('permissions'));

export const autentication = {
    namespaced: true,
    state:{
        status: '',
        token: localStorage.getItem('token') || '',
        user : JSON.parse(localStorage.getItem('user')) || {},
        permissions: JSON.parse(localStorage.getItem('permissions')) || [],
        roles: JSON.parse(localStorage.getItem('roles')) || [],
    },
    mutations: {
        auth_request(state){
          state.status = 'loading';
          console.log('cambiando estado');
        },
        auth_success(state, {token, user,permissions,roles}){
          state.status = 'success'
          state.token = token
          state.user = user
          state.permissions = permissions
          state.roles = roles

        },
        auth_error(state){
          state.status = 'error'
        },
        logout(state){
          state.status = ''
          state.token = ''
        },
    },
    actions:{
        login({commit}, user){
            return new Promise((resolve, reject) => {
              commit('auth_request')
              axios({url: 'api/login', data: user, method: 'POST' })
              .then(resp => {
                console.log(resp.data);
                const token = resp.data.token
                const user = resp.data.user
                const permissions = resp.data.permissions
                const roles = resp.data.roles

                localStorage.setItem('token', token)
                localStorage.setItem('user',JSON.stringify(user))
                localStorage.setItem('permissions',JSON.stringify(permissions))
                localStorage.setItem('roles',JSON.stringify(roles))

                axios.defaults.headers.common['Authorization'] = 'Bearer '+token // para todas las consultas axios XD
                commit('auth_success', {token, user,permissions,roles});
                resolve(resp)
              })
              .catch(err => {
                commit('auth_error')
                localStorage.removeItem('token')
                reject(err)
              })
            })
        },
        logout({commit}){
            return new Promise((resolve, reject) => {
                commit('logout')
                localStorage.removeItem('token')
                console.log('cerrando sesion')
                delete axios.defaults.headers.common['Authorization']
                resolve()
            })
        }
    },
    getters : {
        isLoggedIn: state => !!state.token,
        authStatus: state => state.status,
        userLoged: state=> state.user,
        isAdmin: state=> _.find(state.roles, (role)=> { return role.name == "Administrador"}),
        isRefreshment: state=> _.find(state.roles, (role)=> { return role.name == "Refrigerios"}),
        isRRHH: state=> _.find(state.roles, (role)=> { return role.name == "Recursos Humanos"}),
        // isOfficial: state=> _.find(state.roles, (role)=> { return role.name == "Funcionario"}),

    }

};
