<template>
         <v-card>
        <v-card-title>
            <h3>Inicio</h3>
        <v-spacer></v-spacer>




        </v-card-title>
        <v-card-text>
             <v-container
                fluid
                grid-list-lg
            >
            <v-flex xs12>
                <v-card >
                <v-layout row>
                    <v-flex xs7>
                    <v-card-title primary-title>
                        <div>
                        <div class="headline">{{fullname}}</div>
                        <div>{{employee.position?employee.position.name:''}}</div>
                        <div>{{employee.management?employee.management.name:''}}</div>
                        </div>
                    </v-card-title>
                    </v-flex>
                    <v-flex xs5>
                    <v-img
                        src="https://cdn.vuetifyjs.com/images/cards/halcyon.png"
                        height="125px"
                        contain
                    ></v-img>
                    </v-flex>
                </v-layout>
                <v-divider light></v-divider>
                <v-card-actions class="pa-3">
                    Vacaciones {{vacation.year}} : {{vacation.days}} dias
                    <v-spacer></v-spacer>

                </v-card-actions>
                </v-card>
            </v-flex>
             </v-container>
        </v-card-text>

    </v-card>

</template>
<script>
export default {
    data:()=>({
        fullname:'',
        employee:{},
        vacation:{},
    }),
    mounted(){
        console.log('load dashboard component');
        this.getDashboard();
    },
    methods:{
        getDashboard()
        {
            axios.get(`api/auth/dashboard`)
                 .then(response=>{
                     console.log(response.data);
                     this.fullname = response.data.fullname;
                     this.employee = response.data.employee;
                     this.vacation = response.data.vacation;
                 });
        }
    }

}
</script>
