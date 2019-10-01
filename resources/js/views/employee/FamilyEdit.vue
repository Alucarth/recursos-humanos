<template>
    <v-dialog v-model="dialog" persistent max-width="800px">
            <v-card>
            <v-card-title>
                <span class="headline">{{ title }} </span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>

                 <v-layout wrap>

                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Primer Nombre" hint="Ingrese Primer Nombre" required v-model="item.first_name"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Segundo Nombre" hint="Ingrese Seugndo Nombre" required v-model="item.second_name"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Apellido Paterno" hint="Ingrese Apellido Paterno" v-model="item.last_name"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Apellido Materno" hint="Ingrese Apellido Materno" v-model="item.mother_last_name"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-select
                        label="Parentesco"
                        v-model="item.kinship_id"
                        :items="kinships"
                        item-text="name"

                        :hint="`Selecciones Parentesco`"
                        >
                        </v-select>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-menu
                            ref="menu_birth_date"
                            v-model="menu_birth_date"
                            :close-on-content-click="false"
                            transition="scale-transition"
                            offset-y
                            full-width
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="item.birth_date"
                                label="Fecha de Nacimiento"
                                prepend-icon="event"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-date-picker
                            ref="picker"
                            v-model="item.menu_birth_date"
                            :max="new Date().toISOString().substr(0, 10)"
                            min="1950-01-01"
                            @change="save"
                            ></v-date-picker>
                        </v-menu>
                    </v-flex>
                     <v-flex xs6 sm6 md3>
                        <v-text-field label="Edad" hint="Ingrese Edad" v-model="item.age"></v-text-field>
                    </v-flex>

                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Telefono" hint="Ingrese Telefono" v-model="item.phone"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Celular" hint="Ingrese Celular" v-model="item.cellphone"></v-text-field>
                    </v-flex>

                    <v-flex xs6 sm6 md6>
                        <v-text-field label="Direccion" hint="Ingrese Direccion" v-model="item.address"></v-text-field>
                    </v-flex>
                    <!-- <v-flex xs6 sm6 md3>
                        <v-switch v-model="item.disability" :label="`Certificado de Discapacidad:${item.disability?'Si':'No'}`"></v-switch>
                    </v-flex> -->
                    <v-flex xs6 sm6 md3>
                        <v-switch v-model="item.is_reference" :label="`Contacto de Emergencia:${item.is_reference?'Si':'No'}`"></v-switch>
                    </v-flex>
                </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cancel</v-btn>

                <v-btn color="blue darken-1" flat @click="sendFamily()">Guardar</v-btn>
            </v-card-actions>
            </v-card>
        </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        family: Object
	},
    data:()=>({
        kinships: [],
        contributions: [],
        civil_statuses:[{id:'C',name:'Casado(a)'},{id:'S',name:'Soltero(a)'},{id:'V',name:'Viudo(a)'},{id:'D',name:'Divorciado(a)'}],

        genders:[{id:'M',name:'Masculino'} ,{id:'F',name:'Femenino'}],
        date: new Date().toISOString().substr(0, 10),
        date2: new Date().toISOString().substr(0, 10),
        menu: false,
        menu_birth_date:false,
        modal: false,
        menu2: false,
        imageData: ""

    }),
    mounted(){


        this.getKinships();

    },
    methods:{

        getKinships (){
            axios.get('/api/auth/kinship')
            .then(response => {
                this.kinships = response.data.kinships;
                console.log(this.kinships);
            })
            .catch(error => {
                console.log(error);
            });
        },
        sendFamily() {
            this.$emit('family',this.item)
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
           let item = this.family
           return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='Adicionar Familiar'
            if(this.item.id) {

                title = 'Datos Familiar'
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
