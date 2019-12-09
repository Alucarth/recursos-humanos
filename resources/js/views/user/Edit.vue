<template>
    <v-dialog v-model="dialog" max-width="700px">
        <v-card>
            <v-card-title class="rrhh-primary">
                <span class="headline">{{ title }}</span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
                    <v-layout wrap>
                        <!-- <v-flex xs6 sm6 md6>
                            <v-text-field label="Usuario" hint="Ingrese Usuario" required v-model="item.usr_usuario" readonly>
                            </v-text-field>
                        </v-flex> -->
                        <v-flex xs12 sm12 md12>
                            <label for="">Roles Asignados: {{item.usr_usuario}} </label>
                            <table>
                                <tbody>
                                    <tr v-for="(rol,index) in item.roles_assignados" :key="index">
                                        <td>
                                            <v-switch
                                            v-model="rol.selected"
                                            :label="`${rol.name}`"
                                            ></v-switch>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cancelar</v-btn>

                <v-btn color="blue darken-1" flat @click="sendUser()">Guardar</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        user: Object
	},
    data:()=>({
        roles:[]
    }),
    mounted(){
        // this.getRoles();
    },
    methods:{
        sendUser() {
            // this.item.roles = this.roles;
            this.$emit('user',this.item)
        },
        sendClose() {
            this.$emit('close',false)
        },
        getRoles()
        {
            axios.get(`api/auth/roles`)
                .then(response =>{
                    this.roles = response.data.roles;
                });
        },

    },
    computed:{
        item(){
            let item = this.user
            this.getRoles();
            return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='Crear Usuario'
            if(this.item.usr_id)
            {
                title = 'Editar Usuario'
            }
            return title
        },
	}
}
</script>
