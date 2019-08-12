<template>
<v-dialog v-model="dialog" max-width="700px">
            <v-card>
            <v-card-title>
                <span class="headline">{{ title }}</span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
                 <v-layout wrap>
                    <v-flex xs12 sm6 md3>
                        <v-menu
                            ref="menu"
                            v-model="menu"
                            :close-on-content-click="false"
                            :return-value.sync="date"
                            transition="scale-transition"
                            offset-y
                            full-width
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="item.date"
                                label="Picker in menu"
                                prepend-icon="event"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-date-picker v-model="item.date" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu.save(date)">OK</v-btn>
                            </v-date-picker>
                        </v-menu>
                    </v-flex>

                    <v-flex xs6 sm6 md3>
                        <v-select
                        v-model="item.type"
                        :items="types"
                        label="Motivo"
                        ></v-select>
                    </v-flex>

                    <v-flex xs11 sm3>
                        <v-menu
                            ref="menu2"
                            v-model="menu2"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="item.hour_in"
                            transition="scale-transition"
                            offset-y
                            full-width
                            max-width="290px"
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="item.hour_in"
                                label="De horas"
                                prepend-icon="access_time"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-time-picker
                            v-if="menu2"
                            v-model="item.hour_in"
                            full-width
                            @click:minute="$refs.menu2.save(item.hour_in)"
                            ></v-time-picker>
                        </v-menu>
                    </v-flex>
                    <v-flex xs11 sm3>
                        <v-menu
                            ref="menu3"
                            v-model="menu3"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="item.hour_out"
                            transition="scale-transition"
                            offset-y
                            full-width
                            max-width="290px"
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="item.hour_out"
                                label="A horas"
                                prepend-icon="access_time"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-time-picker
                            v-if="menu3"
                            v-model="item.hour_out"
                            full-width
                            @click:minute="$refs.menu3.save(item.hour_out)"
                            ></v-time-picker>
                        </v-menu>
                    </v-flex>
                    <v-flex xs6 sm6 md6 v-if="item.type =='Comisión'">
                        <v-text-field label="Lugar" hint="Ingrese Lugar" required v-model="item.destiny_place"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md6 v-if="item.type =='Comisión'">
                        <v-text-field label="Justificación" hint="Ingrese Justificación" required v-model="item.reason"></v-text-field>
                    </v-flex>
                    <!-- {{JSON.stringify(item)}} -->
                    <!-- <v-flex xs12 sm12 md12>
                        <v-text-field label="Nombre Corto" hint="Ingrese Nombre Corto " v-model="item.shortened"></v-text-field>
                    </v-flex> -->

                </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cancel</v-btn>

                <v-btn color="blue darken-1" flat @click="sendRequest()">Guardar</v-btn>
            </v-card-actions>
            </v-card>
        </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        employee_request: Object
	},
    data:()=>({
        date: new Date().toISOString().substr(0, 10),
        menu: false,
        types: ['Personal','Comisión'],
        time: null,
        menu2: false,
        time2: null,
        menu3:false,
    }),
    methods:{
        sendRequest() {
            this.$emit('employee_request',this.item)
        },
        sendClose() {
            this.$emit('close',false)
        },
    },
    computed:{
        item(){
           let item = this.employee_request
           return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='Crear Boleta'
            if(this.item.id) {

                title = 'Editar Boleta'
            }
            return title
        },
	}
}
</script>
