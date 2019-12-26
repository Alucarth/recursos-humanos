<template>
    <v-card>
        <v-card-title>
            <h3>Empleados</h3>
        <v-spacer></v-spacer>

        <v-btn @click="create();" color="primary" dark class="mb-2">Nuevo</v-btn>
        <v-btn @click="download();" color="success" dark class="mb-2">Roe</v-btn>
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
                <template slot="pagination-info" slot-scope="props">
                    De {{props.currentPageRowsLength}}
                    a {{props.filteredRowsLength}}
                    ({{props.originalRowsLength}} Total Registros)
                </template>
                <template slot="option" slot-scope="props">

                    <v-icon @click="disabled(props.row)" v-if="props.row.user_edit==true" >
                        check_box
                    </v-icon>
                    <v-icon @click="enabled(props.row)" v-if="props.row.user_edit==false" >
                        crop_square
                    </v-icon>
                    <v-icon @click="edit(props.row)" >
                        edit
                    </v-icon>
                    <v-icon @click="destroy(props.row)" >
                        delete
                    </v-icon>
                    <v-icon @click="edit_assing(props.row)">
                        add_alarm
                    </v-icon>
                    <!-- <v-icon @click="show_kardex(props.row)">
                        insert_drive_file
                    </v-icon> -->
                </template>
            </vue-bootstrap4-table>
        </v-card-text>
        <edit-employee :dialog="dialog" :employee="employee" @close="close"  @employee="update"></edit-employee>
        <assign-edit :dialog="dialog_assign" :employee="employee" @close="close_assign" @employee="update_assign">  </assign-edit>

        <v-dialog
        v-model="dialog_report"
        width="1000"
        >
        <v-card>
            <!-- <v-card-title
            class="headline grey lighten-2"
            primary-title
            >
            Reporte
            </v-card-title> -->

            <v-card-text>
                <iframe id='ireport' :src="'/api/attendance_employee/'+this.employee.id" frameborder="0" allowtransparency="true" style="width:100%;height:500px"></iframe>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
            <div class="flex-grow-1"></div>
            <v-btn
                color="primary"
                text
                @click="dialog_report = false"
            >
               Cerrar
            </v-btn>
            </v-card-actions>
        </v-card>
        </v-dialog>
    </v-card>
</template>
<script>
import VueBootstrap4Table from 'vue-bootstrap4-table';
import EditEmployee from './Edit.vue';
import AssignEdit from './AssignEdit';
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
                label: "Gerencia",
                name: "management.name",
                filter: {
                    type: "simple",
                    placeholder: "Gerencia"
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
        dialog_assign:false,
        dialog_report:false,

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

        enabled(item)
        {
            console.log('habilitando');
            axios.post('api/auth/enabled_employee',{id:item.id,user_edit:true})
                .then(response=>{
                    console.log(response.data);
                    this.search();
                })
        },
        disabled(item)
        {
            console.log('deshabilitado');
            axios.post('api/auth/enabled_employee',{id:item.id,user_edit:false})
                .then(response=>{
                    console.log(response.data);
                    this.search();
                })
        },

        search(){
            axios.get('api/auth/employee')
                .then((response)=>{
                    this.employees = response.data;
                    console.log(response.data);
                });
        },
        edit_assing(item)
        {
            axios.get(`api/auth/employee/${item.id}`)
                .then(response=>{
                    this.employee= response.data.employee;
                    this.dialog_assign = true;
                });
        },
        update_assign(item)
        {
            axios.post(`api/auth/assign_type_hour`,item)
                .then(response=>{
                    iziToast.success({
                                title: 'Se asigo horario a ',
                                message: `${response.data.name}`,
                            })
                        this.dialog_assign = false;
                });
            // console.log(item)
        },
        close_assign()
        {
            this.dialog_assign = false;
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
            formData.set('first_name',item.first_name|| '');
            formData.set('second_name',item.second_name|| '');
            formData.set('last_name',item.last_name|| '') ;
            formData.set('mother_last_name',item.mother_last_name|| '');
            formData.set('biometric_code',item.biometric_code || '' );
            formData.set('identity_card',item.identity_card || '');
            // formData.set('identity_card_id',item.identity_card_id);
            formData.set('birth_date',item.birth_date || '');
            formData.set('cellphone',item.cellphone || '');
            formData.set('city_identity_card_id',item.city_identity_card_id || '');
            formData.set('contract_type_id',item.contract_type_id || '');
            formData.set('civil_status',item.civil_status || '');
            formData.set('contract_modality_id',item.contract_modality_id || '');
            formData.set('contribution_id',item.contribution_id || '');
            formData.set('country_id',item.country_id || '' );
            formData.set('cua_nua',item.cua_nua || '');
            formData.set('disability',item.disability || '');
            formData.set('document_type_id',item.document_type_id || '');
            formData.set('entry_date',item.entry_date || '');
            formData.set('gender',item.gender || '');
            formData.set('management_id',item.management_id || '');
            formData.set('phone',item.phone || '');
            formData.set('position_id',item.position_id || '');
            formData.set('profession',item.profession || '');
            formData.set('reason',item.reason || '');
            formData.set('salary',item.salary || '');
            formData.set('tutor',item.tutor || '');
            formData.set('retirement_date',item.retirement_date || '');
            formData.set('unit_id',item.unit_id || '');
            formData.set('location_id',item.location_id || '');
            if(item.id)
            {
                formData.set('id',item.id);
            }

            formData.append("curriculum_file", item.curriculum_file || '');
            formData.append("image_file", item.image_file || '');
            console.log(formData);
            axios.post('/api/auth/employee', formData,{
                            headers: {
                                    'Content-Type': 'multipart/form-data'
                                    }
                        })
                    .then(response => {
                        //this.$store.dispatch('template/showMessage',{message:'Se Actualizó la lista de productos',color:'success'});
                        iziToast.success({
                            title: 'OK',
                            message: 'Se Actualizaron los datos del empleado!',
                        });
                        this.search();
                        console.log(response.data);
                        // this.search();
                    })
                    .catch(function (error) {
                        //this.$store.dispatch('template/showMessage',{message:error,color:'danger'});

                        iziToast.error({
                            title: 'Error',
                            message: 'No se pudo registrar, error contactase con el ',
                        });

                    });
            this.dialog =false;

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
        },
        show_kardex(employee)
        {
            this.employee = employee;
            this.dialog_report = true;
        },
        download: (event) => {
            // `this` inside methods point to the Vue instance

            //  self.dialog = true;
            //let parameters = this.getParams();
            //parameters.excel =true;
            //console.log(parameters);
            axios({
                url: '/api/roe',
                method: 'GET',
              //  params: parameters,
                responseType: 'blob', // important
            }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'Roe'+moment().format()+'.xls');
                document.body.appendChild(link);
                link.click();
                self.dialog = false;
            });
        },

    },
    components: {
        VueBootstrap4Table,
        EditEmployee,
        AssignEdit
    }
}
</script>
