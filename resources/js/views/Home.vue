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
                        <div><v-icon color="secondary">work</v-icon>{{employee.position?employee.position.name:''}}</div>
                        <div><v-icon color="secondary">home_work</v-icon>{{employee.management?employee.management.name:''}}</div>
                        <div class="primary--text"> <v-icon color="primary">location_on</v-icon> {{employee.location?employee.location.name:''}}</div>
                        </div>
                    </v-card-title>
                    </v-flex>
                    <v-flex xs5>
                    <v-img
                        src="https://avataaars.io/?avatarStyle=Circle&topType=Hat&accessoriesType=Kurt&facialHairType=BeardMagestic&facialHairColor=Black&clotheType=BlazerShirt&eyeType=Default&eyebrowType=AngryNatural&mouthType=Serious&skinColor=Pale"
                        height="125px"
                        contain
                    ></v-img>
                    </v-flex>
                </v-layout>
                <v-divider light></v-divider>

                <v-card-actions class="pa-3">
                    <v-layout row>
                    <v-flex xs3 md3 sm3>
                        <v-card color="success" hover="true" >
                            <v-card-title>
                                Vacaciones {{vacation.year}}
                            </v-card-title>
                            <v-card-text>
                                <v-icon>date_range</v-icon>
                                {{vacation.days}} dias
                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex xs3 md3 sm3>
                        <v-card color="secondary" hover="true" dark>
                            <v-card-title>
                                Omisiones
                            </v-card-title>
                            <v-card-text>
                                <v-icon>calendar_today</v-icon>
                                {{omisiones}}
                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex xs3 md3 sm3>
                        <v-card color="warning" hover="true">
                            <v-card-title>
                                Minutos Atrasos
                            </v-card-title>
                            <v-card-text>
                                <v-icon>snooze</v-icon>
                                {{atrasos||0}}
                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex xs3 md3 sm3>

                        <v-card color="error" hover="true">
                            <v-card-title>
                                Faltas
                            </v-card-title>
                            <v-card-text>
                                <v-icon>work_off</v-icon>
                                {{faltas}}
                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <!-- <v-spacer></v-spacer> -->
                    </v-layout>
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
        faltas:0,
        omisiones:0,
        atrasos:0,
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
                     this.omisiones = response.data.omisiones;
                     this.atrasos = response.data.atrasos;
                     this.faltas = response.data.faltas;
                 });
        }
    }

}
</script>
