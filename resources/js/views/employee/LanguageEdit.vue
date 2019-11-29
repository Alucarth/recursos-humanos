<template>
    <v-dialog v-model="dialog" persistent max-width="800px">
            <v-card>
            <v-card-title class="rrhh-primary">
                <span class="headline">{{ title }} </span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>

                 <v-layout wrap>


                    <v-flex xs6 sm6 md4>
                        <v-text-field label="Insitución" hint="Ingrese Institución" v-model="item.institution"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md4>
                        <v-text-field label="Idioma" hint="Ingrese Idioma" v-model="item.name"></v-text-field>
                    </v-flex>

                    <v-flex xs6 sm6 md4>
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
                                v-model="item.date"
                                label="Gestión"
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



                </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cancelar</v-btn>

                <v-btn color="blue darken-1" flat @click="sendLanguage()">Guardar</v-btn>
            </v-card-actions>
            </v-card>
        </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        language: Object
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
        sendLanguage() {
            this.$emit('language',this.item)
        },
        sendClose() {
            this.$emit('close',false)
        },
        save (date) {
            console.log(date);
            this.item.date = date;
            this.$refs.menu_birth_date.save(date)
        },
    },
    computed:{
        item(){
           let item = this.language
           return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='Idioma'
            if(this.item.id) {

                title = 'Idioma'
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
