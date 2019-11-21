<template>
 <v-card>
        <v-card-title>
            <h3>Asignacion de Horario Eventual</h3>
        <v-spacer></v-spacer>

        <v-btn @click="create();" color="primary" dark class="mb-2">Asignar</v-btn>
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
                    <v-icon @click="show_kardex(props.row)">
                        insert_drive_file
                    </v-icon>
                </template>
            </vue-bootstrap4-table>
        </v-card-text>
 </v-card>
</template>
<script>
import VueBootstrap4Table from 'vue-bootstrap4-table';
export default
{
    data:()=>({
        employees:[],
        type_hours:[],
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
        console.log('cargando componente')
        this.getTypeHours();
        this.search();
    },
    methods:{
        getTypeHours()
        {
            axios.get(`type_hour`)
                 .then(response=>{
                     console.log(response.data);
                 });
        },
        search(){
            axios.get('api/auth/employee')
                 .then((response)=>{
                    this.employees = response.data;
                    console.log(response.data);
                });
        },
    },
    components: {
        VueBootstrap4Table,
    }
}
</script>
