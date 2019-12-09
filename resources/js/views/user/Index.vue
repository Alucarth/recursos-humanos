<template>
    <v-card>
        <v-card-title>
            <h3>Usuarios</h3>
        <v-spacer></v-spacer>
        <!-- <v-btn @click="create();" color="primary" dark class="mb-2">Nuevo</v-btn> -->
        </v-card-title>
        <v-card-text>
            <vue-bootstrap4-table :rows="users" :columns="columns" :config="config" >
                <template slot="sort-asc-icon">
                    <i class="fa fa-sort-asc"></i>
                </template>
                <template slot="sort-desc-icon">
                    <i class="fa fa-sort-desc"></i>
                </template>
                <template slot="no-sort-icon">
                    <i class="fa fa-sort"></i>
                </template>
                <template slot="pagination-info" slot-scope="props">
                    De {{props.currentPageRowsLength}}
                    a {{props.filteredRowsLength}}
                    ({{props.originalRowsLength}} Total Registros)
                </template>

                <template slot="option" slot-scope="props">
                    <v-layout justify-space-around>

                        <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-icon @click="edit(props.row)" v-on="on">
                                edit
                            </v-icon>
                        </template>
                        <span>Editar Usuario </span>
                        </v-tooltip>


                    </v-layout>

                </template>
            </vue-bootstrap4-table>
        </v-card-text>
        <edit-user :dialog="dialog" :user="user" @close="close"  @user="update"></edit-user>


    </v-card>
</template>
<script>
import VueBootstrap4Table from 'vue-bootstrap4-table';
import EditUser from './Edit.vue';

export default {
    data:()=>({
        users:[],
        user:{},
        dialog:false,
        dialog_sync:false,
        columns: [
            {
                label: "CI",
                name: "employee.identity_card",
                filter: {
                    type: "simple",
                    placeholder: "Ingrese CI"
                },
                sort: true,
            },
            {
                label: "Usuario",
                name: "usr_usuario",
                filter: {
                    type: "simple",
                    placeholder: "Ingrese Usuario"
                },
                sort: true,
            },
            {
                label: "Primer Nombre",
                name: "employee.first_name",
                filter: {
                    type: "simple",
                    placeholder: "Primer Nombre"
                },
                sort: true,
            },
            {
                label: "Segundo Nombre",
                name: "employee.second_name",
                filter: {
                    type: "simple",
                    placeholder: "Segundo Nombre"
                },
                sort: true,
            },
            {
                label: "Apellido Paterno",
                name: "employee.last_name",
                filter: {
                    type: "simple",
                    placeholder: "Apellido Paterno"
                },
                sort: true,
            },
            {
                label: "Apellido Materno",
                name: "employee.mother_last_name",
                filter: {
                    type: "simple",
                    placeholder: "Apellido Materno"
                },
                sort: true,
            },

            {
                label: "Opciones",
                name: "option",
                sort: false,
            }],

        config: {
            checkbox_rows: false,
            rows_selectable: false,
            pagination: true,
            card_mode: false,
            show_refresh_button:  false,
            show_reset_button:  false,
            global_search:  {
                placeholder:  "Enter custom Search text",
                visibility:  false,
                case_sensitive:  false
            },
            per_page_options:  [5,  10,  20,  30],
            server_mode:  false,
        },


    }),
    mounted(){
        this.search();
    },
    methods:{
        search(){
            axios.get('/api/auth/user')
                    .then((response)=>{
                        // this.employees = response.data;
                        this.users = response.data.users;
                        // console.log(response.data);
                    });
        },
        create() {
            this.user ={};
            this.dialog = true;
        },
        sync(item){
            this.user = item;
            this.dialog_sync = true;
        },
        edit (item) {

            axios.get(`/api/auth/user/${item.usr_id}/edit`)
            .then(response => {
                this.user = response.data.user;
            })
            .catch(error => {
                console.log(error);
            });

            this.dialog = true
        },
        update (item) {
            console.log(item);
            axios.post('/api/auth/user', item)
                    .then(response => {
                        iziToast.success({
                            title: '',
                            message: 'Registro Satisfactorio',
                        });
                        this.search();
                    })
                    .catch(function (error) {

                        iziToast.error({
                            title: 'Error',
                            message: 'Contactese con el Administrador de la Pagina: '+error,
                        });
                    });
            this.dialog =false;

        },
        destroy (item) {

            axios.delete(`/api/auth/user/${item.id}`)
            .then((response)=>{

                this.search();
                iziToast.success({
                    title: 'Eliminacion Correcta',
                    message: 'Se elimino '+response.data.name,
                });
            })
            .catch(function (error) {
                iziToast.error({
                    title: 'Error',
                    message: 'Contactese con el Administrador de la Pagina: '+error,
                });
            });
        },

        close() {
            this.dialog = false;
        },
        close_sync()
        {
            this.dialog_sync = false;
        }
    },
    components: {
        VueBootstrap4Table,
        EditUser,
    }
}
</script>
