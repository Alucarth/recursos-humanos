<template>
    <v-dialog v-model="dialog" persistent max-width="800px">
            <v-card>
            <v-card-title>
                <span class="headline">{{ title }} </span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
                    {{item.employee}}
                 <v-layout wrap>



                     <v-flex xs12 sm12 md3>
                        <v-select
                        label="AFP"
                        v-model="item.contribution_id"
                        :items="contributions"
                        item-text="afp_name"
                        item-value="id"
                        hint="AFP"
                        >
                        </v-select>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Nua/Cua" hint="Ingrese Nua Cua" v-model="item.cua_nua"></v-text-field>
                    </v-flex>

                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Banco" hint="Ingrese Banco" v-model="item.bank"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Nro Cuenta" hint="Ingrese Cuenta" v-model="item.account_number"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm12 md3>
                        <v-select
                        label="Caja de Seguro"
                        v-model="item.healh_box_id"
                        :items="health_boxes"
                        item-text="name"
                        item-value="id"
                        hint=""
                        persistent-hint>
                        </v-select>
                    </v-flex>
                     <v-flex xs6 sm6 md3>
                        <v-text-field label="Nro Matricula" hint="Ingrese Matricula" v-model="item.registration_number_medical"></v-text-field>
                    </v-flex>
                     <v-flex xs6 sm6 md3>
                        <v-text-field label="Tipo de Sangre" hint="Ingrese Tipo de Sangre" v-model="item.blood_type"></v-text-field>
                    </v-flex>
                     <v-flex xs6 sm6 md3>
                        <v-text-field label="Midico" hint="Ingrese Medico" v-model="item.doctor_name"></v-text-field>
                    </v-flex>



                </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cancel</v-btn>

                <v-btn color="blue darken-1" flat @click="sendEmployee()">Guardar</v-btn>
            </v-card-actions>
            </v-card>
        </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        employee: Object
	},
    data:()=>({

        civil_statuses:[{id:'C',name:'Casado(a)'},{id:'S',name:'Soltero(a)'},{id:'V',name:'Viudo(a)'},{id:'D',name:'Divorciado(a)'}],
        curriculum_name:'',
        curriculum_file:'',
        curriculum_url:'',
        genders:[{id:'M',name:'Masculino'} ,{id:'F',name:'Femenino'}],
        date: new Date().toISOString().substr(0, 10),
        date2: new Date().toISOString().substr(0, 10),
        menu: false,
        menu_birth_date:false,
        modal: false,
        menu2: false,
        imageData: "",
        health_boxes:[],
        contributions: [],

    }),
    mounted(){
        this.getHealthBoxes();
        this.getContributions();

    },
    methods:{

        getHealthBoxes (){
            axios.get('/api/auth/health_box')
            .then(response => {
                this.health_boxes = response.data.health_boxes;
                console.log(this.health_boxes);
            })
            .catch(error => {
                console.log(error);
            });
        },
        getContributions (){
            axios.get('/api/auth/contribution')
            .then(response => {
                this.contributions = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        sendEmployee() {
            this.$emit('employee',this.item)
        },
        sendClose() {
            this.$emit('close',false)
        },
        save (date) {
            console.log(date);
            this.item.birth_date = date;
            this.$refs.menu_birth_date.save(date)
        },
    },
    computed:{
        item(){
           let item = this.employee
           return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='Crear Empleado'
            if(this.item.id) {

                title = 'Editar Datos Personales'
            }
            return title
        },
    },
    watch: {
      menu_birth_date (val) {
        val && setTimeout(() => (this.$refs.picker.activePicker = 'YEAR'))
      },
    },

}
</script>
