<template>
    <v-card>
        <v-card-title>
            <h3>Empleados</h3>
        <v-spacer></v-spacer>




        <v-btn @click="create();" color="primary" dark class="mb-2">Nuevo</v-btn>
        </v-card-title>
        <v-card-text>
             <vue-bootstrap4-table :rows="employees" :columns="columns" :config="config" >
                <template slot="sort-asc-icon">
                    <i class="fa fa-sort-asc"></i>
                </template>
                <template slot="sort-desc-icon">
                    <i class="fa fa-sort-desc"></i>
                </template>
                <template slot="no-sort-icon">
                    <i class="fa fa-sort"></i>
                </template>
                <template slot="active" slot-scope="props">
                   <div class="text-xs-center">
                    <v-chip :color="props.row.active?'success':'danger'" :text-color="props.row.active?'white':'danger'" small>{{props.row.active?'Activo':'Inactivo'}}</v-chip>
                    </div>
                </template>
                <template slot="option" slot-scope="props">
                    <!-- <v-icon  small>
                        remove_red_eye
                    </v-icon> -->
                    <v-icon @click="edit(props.row)" >
                        edit
                    </v-icon>
                    <v-icon @click="destroy(props.row)" >
                        delete
                    </v-icon>
                </template>
            </vue-bootstrap4-table>
        </v-card-text>
        <edit-employee :dialog="dialog" :employee="employee" @close="close"  @employee="update"></edit-employee>

    </v-card>
</template>
<script>
import VueBootstrap4Table from 'vue-bootstrap4-table';
import EditEmployee from './Edit.vue';
export default {
    data:()=>({

       columns: [
            // {
            //     label: "Item",
            //     name: "item",
            //     filter: {
            //         type: "simple",
            //         placeholder: "Ingrese item"
            //     },
            //     sort: true,
            // },
            {
                label: "C.I.",
                name: "identity_card",
                filter: {
                    type: "simple",
                    placeholder: "C.I."
                },
                sort: true,
            },
            {
                label: "Primer Nombre",
                name: "first_name",
                filter: {
                    type: "simple",
                    placeholder: "Primer Nombre"
                },
                sort: true,
            },
            {
                label: "Segundo Nombre",
                name: "second_name",
                filter: {
                    type: "simple",
                    placeholder: "Segundo Nombre"
                },
                sort: true,
            },
            {
                label: "Apellido Paterno",
                name: "last_name",
                filter: {
                    type: "simple",
                    placeholder: "Apellido Paterno"
                },
                sort: true,
            },
            {
                label: "Apellido Materno",
                name: "mother_last_name",
                filter: {
                    type: "simple",
                    placeholder: "Apellido Materno"
                },
                sort: true,
            },
            {
                label: "Cargo",
                name: "position.name",
                filter: {
                    type: "simple",
                    placeholder: "Ingrese Cargo"
                },
                sort: true,
            },
            {
                label: "Cod. Biometrico",
                name: "biometric_code",
                filter: {
                    type: "simple",
                    placeholder: "Cod. Biometrico"
                },
                sort: true,
            },
            // {
            //     label: "Estado",
            //     name: "active",
            //     sort: true,
            // },
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

        employees: [],
        employee: {},
        dialog: false,

    }),
    computed: {
        formTitle () {
                return this.editedIndex === -1 ? 'Nuevo' : 'Editar'
            }
    },
    mounted()
    {
        this.search();
    },
    methods:{

        search(){
            axios.get('api/auth/employee')
                 .then((response)=>{
                    this.employees = response.data;
                    console.log(response.data);
                });
        },
        create() {
            this.employee ={};
            this.dialog = true;
        },

        edit (item) {
            this.editedIndex = this.employees.indexOf(item)
            axios.get(`/api/auth/employee/${item.id}/edit`)
            .then(response => {
                this.employee = response.data.employee
            })
            .catch(error => {
                console.log(error);
            });

            this.dialog = true
        },
        update (item) {
            console.log(item)
            let formData = new FormData();
            formData.set('first_name',item.first_name);
            formData.set('second_name',item.second_name);
            formData.set('last_name',item.last_name);
            formData.set('second_last_name',item.second_last_name);
            formData.append("curriculum_file", item.curriculum_file);
            console.log(formData);
            axios.post('/api/auth/employee', formData,{
                            headers: {
                                    'Content-Type': 'multipart/form-data'
                                    }
                        })
                  .then(response => {
                        this.$store.dispatch('template/showMessage',{message:'Se Actualizó la lista de productos',color:'success'});
                        console.log(response.data);
                        // this.search();
                    })
                    .catch(function (error) {
                        this.$store.dispatch('template/showMessage',{message:error,color:'danger'});
                    });
            // this.dialog =false;

        },
        destroy (item) {

            let success_delete = false;
            axios.delete(`/api/auth/employee/${item.id}`)
            .then(function (response) {
                success_delete = true;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        close() {
            this.dialog = false;
        }

    },
    components: {
        VueBootstrap4Table,
        EditEmployee
    }
}
</script>
