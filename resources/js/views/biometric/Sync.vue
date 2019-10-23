<template>
    <v-dialog v-model="dialog" max-width="700px">
        <v-card>
            <v-card-title class="rrhh-primary">
                <span class="headline">{{ title }}</span>

            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
                    <v-layout wrap>
                        <v-flex md12 class="text-lg-right">
                             Ip: {{item.ip}} Puerto: {{item.port}} Nombre: {{name}} Hora: {{time}}

                        </v-flex>
                        <v-flex md12 v-if="show_progress">
                            <v-progress-circular
                                :size="25"
                                color="primary"
                                indeterminate
                            >
                            </v-progress-circular>
                            Estableciendo Conexion
                        </v-flex>


                        <!-- <v-flex xs12 sm12 md6>
                            <v-text-field label="Nombre" hint="Ingrese Nombre" required v-model="item.name">
                            </v-text-field>
                        </v-flex> -->


                    </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cerrar</v-btn>
                <v-btn color="blue darken-1" flat @click="getInfo()">Conectar</v-btn>
                <v-btn color="blue darken-1" flat @click="Sync()">Sincronizar</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        biometric: Object
	},
    data:()=>({
        show_progress: false,
        name: '',
        time:''
    }),
    mounted(){

    },
    methods:
    {
        Sync()
        {
            console.log('ejectuando sincronizacion');
            this.show_progress = true;

            axios.post('/api/auth/sync_biometric',this.item)
                 .then(response=>{
                    console.log(response.data);
                    this.show_progress = false;
                 })
                 .catch( (error) => {
                    // handle error
                    console.log(error);
                    this.show_progress = false;
                    iziToast.error({
                        title: 'Error',
                        message: 'No se pudo establecer conexion con el biometrico',
                    });
                  });
        },
        // connect(){

        // },
        getInfo()
        {
            this.show_progress = true;
            axios.get(`/api/auth/info_biometric/${this.item.id}`)
                 .then(response=>{
                     console.log(response.data);
                     this.name = response.data.name;
                     this.time = response.data.time;
                     this.show_progress = false;
                 })
                 .catch( (error) => {
                    // handle error
                    this.show_progress = false;
                    console.log(error);
                    iziToast.error({
                        title: 'Error',
                        message: 'No se pudo establecer conexion con el biometrico',
                    });
                  });
        },
        sendClose() {
            this.$emit('close',false)
        },


    },
    computed:{
        item(){
           let item = this.biometric
           return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title=''
            if(this.item.id)
            {
                title = 'Sincronizar '+this.item.name
            }
            return title
        },
	}
}
</script>
