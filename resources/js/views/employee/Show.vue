<template>

            <v-card>
            <v-card-title class="headline" >
                <span v-if="employee">{{ full_name}}   </span>
            </v-card-title>

            <v-card-text v-if="employee.id">

                 <v-layout wrap >
                    <v-flex xs12 sm6 md12>
                        <v-avatar
                            v-if="employee.employee_image_path"
                            size="88"

                        >
                            <v-img
                            :src="employee.employee_image_path?employee.employee_image_path.toString().substring(7,employee.employee_image_path.length):''"
                            class="mb-6"
                            ></v-img>
                        </v-avatar>
                    </v-flex>
                    <!-- <v-flex xs12 sm6 md12>
                        <h5> Nombre:  {{ }}</h5>

                    </v-flex> -->
                    <v-flex md12 >
                        Cargo: {{ employee.position.name }}
                    </v-flex>
                    <v-flex md12 >
                        Gerencia: {{ employee.management.name }}
                    </v-flex>
                    <!-- <v-flex md12 >
                        Telefono: {{ employee.position.phone }}
                    </v-flex> -->

                </v-layout>

            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <!-- <v-btn color="blue darken-1" flat @click="sendClose()">Cerrar</v-btn> -->

                <!-- <v-btn color="blue darken-1" flat @click="sendRequest()">Guardar</v-btn> -->
            </v-card-actions>
            </v-card>

</template>
<script>
export default
{

    data:()=>({
        employee:{},
    }),
    mounted(){
        // console.log(this.$root.themeColor);
        axios.get('/api/auth/employee_info')
            .then(response => {
                this.employee = response.data.employee;
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods:{


    },
    computed:{
        full_name(){
            let full_name = '';
            if(this.employee){
                full_name= this.employee.first_name+' '+this.employee.second_name+' '+this.employee.last_name+' '+this.employee.mother_last_name ;
            }
            return full_name;
        }
	}
}
</script>
