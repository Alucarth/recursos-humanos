<template>
    <v-dialog v-model="dialog" max-width="700px">
        <v-card>
            <v-card-title class="rrhh-primary">
                <span class="headline">{{ title }}</span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
                    <v-layout wrap>
                        <v-flex xs12 sm12 md4>
                            <v-text-field label="Nombre" hint="Ingrese Nombre" required v-model="item.name">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs12 sm12 md4>
                            <v-text-field label="Codigo" hint="Ingrese Codigo" required v-model="item.code">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs12 sm12 md4>
                            <v-select
                            label="Turno de Trabajo"
                            v-model="item.work_shift"
                            :items="work_shifts"
                            hint="Seleccione Turno de Trabajo"
                            >
                            </v-select>
                        </v-flex>
                        <v-flex xs6 sm4 md4 >
                        <v-menu
                            ref="menu2"
                            v-model="menu2"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="item.entry"
                            transition="scale-transition"
                            offset-y
                            full-width
                            max-width="290px"
                            min-width="290px"

                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="item.entry"
                                label="Entrada"
                                prepend-icon="access_time"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-time-picker
                            v-if="menu2"
                            v-model="item.entry"
                            format="24hr"
                            full-width
                            @click:minute="$refs.menu2.save(item.entry)"
                            ></v-time-picker>
                        </v-menu>
                    </v-flex>
                    <v-flex xs6 sm4 md4 >
                        <v-menu
                            ref="menu3"
                            v-model="menu3"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="item.output"
                            transition="scale-transition"
                            offset-y
                            full-width
                            max-width="290px"
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="item.output"
                                label="Salida"
                                prepend-icon="access_time"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-time-picker
                            v-if="menu3"
                            v-model="item.output"
                            format="24hr"
                            full-width
                            @click:minute="$refs.menu3.save(item.output)"
                            ></v-time-picker>
                        </v-menu>
                    </v-flex>
                    <v-flex xs6 sm4 md4 >
                        <v-menu
                            ref="menu4"
                            v-model="menu4"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="item.tolerance"
                            transition="scale-transition"
                            offset-y
                            full-width
                            max-width="290px"
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="item.tolerance"
                                label="Tolerancia"
                                prepend-icon="access_time"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-time-picker
                            v-if="menu4"
                            v-model="item.tolerance"
                            format="24hr"
                            full-width
                            @click:minute="$refs.menu4.save(item.tolerance)"
                            ></v-time-picker>
                        </v-menu>
                    </v-flex>
                    <v-flex xs3 sm3 md3>
                        <v-switch
                            v-model="item.monday"
                            label="Lunes" >
                        </v-switch>
                    </v-flex>
                    <v-flex xs3 sm3 md3>
                        <v-switch
                            v-model="item.tuesday"
                            label="Martes" >
                        </v-switch>
                    </v-flex>
                    <v-flex xs3 sm3 md3>
                        <v-switch
                            v-model="item.wednesday"
                            label="Miercoles" >
                        </v-switch>
                    </v-flex>
                    <v-flex xs3 sm3 md3>
                        <v-switch
                            v-model="item.thursday"
                            label="Jueves" >
                        </v-switch>
                    </v-flex>
                    <v-flex xs3 sm3 md3>
                         <v-switch
                            v-model="item.friday"
                            label="Viernes" >
                        </v-switch>
                    </v-flex>
                    <v-flex xs3 sm3 md3>
                        <v-switch
                            v-model="item.saturday"
                            label="Sabado" >
                        </v-switch>
                    </v-flex>
                    <v-flex xs3 sm3 md3>
                        <v-switch
                            v-model="item.sunday"
                            label="Domingo" >
                        </v-switch>
                    </v-flex>


                    </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cancelar</v-btn>

                <v-btn color="blue darken-1" flat @click="sendTypeHour()">Guardar</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        type_hour: Object
	},
    data:()=>({
        menu2:false,//entrada
        menu3:false,//salida
        menu4:false, //tolerancia
        work_shifts:['Mañana','Tarde','Noche'],
    }),
    mounted(){

    },
    methods:{
        sendTypeHour() {
            this.$emit('type_hour',this.item)
        },
        sendClose() {
            this.$emit('close',false)
        },

    },
    computed:{
        item(){
           let item = this.type_hour
           return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='Crear Horario'
            if(this.item.id)
            {
                title = 'Editar Horario'
            }
            return title
        },
	}
}
</script>
