<template>
    <v-dialog v-model="dialog" max-width="700px">
        <v-card>
            <v-card-title class="rrhh-primary">
                <span class="headline">{{ title }}</span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
                    <v-layout wrap>
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

                <v-btn color="blue darken-1" flat @click="Sync()">Inciar Sincronizacion</v-btn>
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

    }),
    mounted(){

    },
    methods:
    {
        Sync()
        {
            console.log('ejectuando sincronizacion');
            axios.post('/api/auth/sync_biometric',this.item)
                 .then(response=>{
                     console.log(response.data);
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
