<template>
 <v-card>
        <v-card-title>
            <h3>Asignacion de Horario Eventual</h3>
        <v-spacer></v-spacer>

        <v-btn @click="create();" color="primary" dark class="mb-2">Asignar</v-btn>
        {{JSON.stringify(items)}}
        </v-card-title>
        <v-card-text>

             <vue-bootstrap4-table :rows="employees" :columns="columns" :config="config" >
                 <!-- <template slot="selected-rows-info" slot-scope="props">
                    Total Numero de Empleados Seleccionados : {{props.selectedItemsCount}}
                </template> -->
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
                <!-- <template slot="option" slot-scope="props">

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
                </template> -->
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
        managements:[],
        items:[],

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
            // {
            //     label: "Gerencia",
            //     name: "management.name",
            //     filter: {
            //         type: "select",
            //         placeholder: "Gerencia",
            //         mode: "multi",
            //         options: [],
            //     },
            //     sort: true,
            // },
            // {
            //     label: "Cargo",
            //     name: "position.name",
            //     filter: {
            //         type: "simple",
            //         placeholder: "Ingrese Cargo"
            //     },
            //     sort: true,
            // },
            // {
            //     label: "Opciones",
            //     name: "option",
            //     sort: false,
            // }
        ],
        config: {
            checkbox_rows: false,
            highlight_row_hover: true,
            rows_selectable: true,
            multi_column_sort: false,
            // selected_rows_info:  true,
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
        this.getManagements()
        // this.columns[5].filter.options = [
        //           {
        //             "name" : "Irwin",
        //             "value" : "Irwin"
        //           },
        //           {
        //             "name" : "Don",
        //             "value" : "Don"
        //           },
        //           {
        //             "name" : "Lolita Paris",
        //             "value" : "Lolita"
        //           }
        //         ];
        // console.log(this.columns[5].filter.options);
    },
    methods:{
        getTypeHours()
        {
            axios.get(`api/auth/type_hour`)
                 .then(response=>{
                     console.log(response.data);
                 });
        },
        search(){
            axios.get(`api/auth/employee`)
                 .then((response)=>{
                    this.employees = response.data;
                    console.log(response.data);
                });
        },
        getManagements()
        {
            axios.get(`api/auth/management`)
                 .then((response)=>{
                        this.managements = response.data;
                        let m =[];
                        this.managements.forEach(item=>{
                            m.push({name:item.name,value:item.name})
                        });
                        this.columns[5].filter.options =m;
                        console.log(m);
                 })
        },
        selected_items(selected_items)
        {
            // console.log('ingresando')
            console.log(selected_items)
        }
    },
    computed:{
        management_list()
        {
            let managements = [];
            this.managements.forEach( item => {
                managements.push({name:item.name,value:item.name})
            });
            return managements;
        }
    },
    components: {
        VueBootstrap4Table,
    }
}
</script>
