<template>
    <v-card>
        <v-card-title>
            <h3>Biometricos</h3>
        <v-spacer></v-spacer>
        <v-btn @click="create();" color="primary" dark class="mb-2">Nuevo</v-btn>
        </v-card-title>
        <v-card-text>
            <vue-bootstrap4-table :rows="biometrics" :columns="columns" :config="config" >
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
                                <v-icon @click="sync(props.row)" v-on="on">
                                    sync
                                </v-icon>
                        </template>
                        <span>Sincronizar Asistencias</span>
                        </v-tooltip>
                        <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-icon @click="edit(props.row)" v-on="on">
                                edit
                            </v-icon>
                        </template>
                        <span>Editar Biometrico </span>
                        </v-tooltip>
                        <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-icon @click="destroy(props.row)" v-on="on">
                                delete
                            </v-icon>
                        </template>
                        <span>Eliminar Biometrico </span>
                        </v-tooltip>

                    </v-layout>

                </template>
            </vue-bootstrap4-table>
        </v-card-text>
        <edit-biometric :dialog="dialog" :biometric="biometric" @close="close"  @biometric="update"></edit-biometric>
        <sync-biometric :dialog="dialog_sync" :biometric="biometric" @close="close_sync" ></sync-biometric>

    </v-card>
</template>
<script>
import VueBootstrap4Table from 'vue-bootstrap4-table';
import EditBiometric from './Edit.vue';
import SyncBiometric from './Sync.vue';
export default {
    data:()=>({
        biometrics:[],
        biometric:{},
        dialog:false,
        dialog_sync:false,
        columns: [
            {
                label: "Codigo",
                name: "id",
                filter: {
                    type: "simple",
                    placeholder: "Ingrese Codigo"
                },
                sort: true,
            },
            {
                label: "Nombre",
                name: "name",
                filter: {
                    type: "simple",
                    placeholder: "Ingrese Nombre"
                },
                sort: true,
            },
            {
                label: "Direccion",
                name: "address",
                filter: {
                    type: "simple",
                    placeholder: "Ingrese Direccion"
                },
                sort: true,
            },
            {
                label: "IP",
                name: "ip",
                filter: {
                    type: "simple",
                    placeholder: "Ingrese ip"
                },
                sort: true,
            },
            {
                label: "Puerto",
                name: "port",
                filter: {
                    type: "simple",
                    placeholder: "Ingrese port"
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
            axios.get('/api/auth/biometric')
                 .then((response)=>{
                    // this.employees = response.data;
                    this.biometrics = response.data.biometrics;
                    // console.log(response.data);
                });
        },
        create() {
            this.biometric ={};
            this.dialog = true;
        },
        sync(item){
            this.biometric = item;
            this.dialog_sync = true;
        },
        edit (item) {

            axios.get(`/api/auth/biometric/${item.id}/edit`)
            .then(response => {
                this.biometric = response.data.biometric;
            })
            .catch(error => {
                console.log(error);
            });

            this.dialog = true
        },
        update (item) {
            console.log(item);
            axios.post('/api/auth/biometric', item)
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

            axios.delete(`/api/auth/biometric/${item.id}`)
            .then((response)=>{

                this.search();
                iziToast.success({
                    title: 'Eliminacion Correcta',
                    message: 'Se elimino '+response.data.name,
                });
            })
            .catch( (error)=> {
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
        EditBiometric,
        SyncBiometric
    }
}
</script>
