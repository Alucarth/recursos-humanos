<template>

    <v-card>

       <v-tabs
        v-model="tab"
        color="primary"
        dark
        slider-color="yellow"
        >
            <v-tab href="#tab-1">
                <!-- <v-icon>people</v-icon> -->
                Paso 1 : Datos Personales
            </v-tab>
            <v-tab href="#tab-2">
                <!-- <v-icon>peoples</v-icon> -->
                Paso 2 : Datos Parentesco
            </v-tab>
            <v-tab href="#tab-3">
                <!-- <v-icon>mdi-phone</v-icon> -->
                Paso 3 : Datos Referenciales
            </v-tab>

            <v-tab-item
                value="tab-1"
            >
                <v-card flat>
                    <v-card-title> Datos Personales </v-card-title>
                    <v-card-text>
                        <label for="">Nombres:</label> {{ full_name }} <br>
                        <label for="">Cedula de Identidad:</label> {{ employee.identity_card }}<br>
                        <label for="">Fecha de Nacimiento:</label> {{ employee.birth_date }}<br>
                        <label for="">Nacionalidad:</label> <br>
                        <label for="">Estado Civil:</label> <br>
                        <label for="">Libreta Militar:</label> <br>
                        <label for="">Sexo:</label> <br>
                        <label for="">Certificado de discapacidad:</label> <br>
                        <label for="">Direccion:</label> <br>
                        <label for="">Telefono:</label> <br>
                        <label for="">Email Personal:</label> <br>
                        <label for="">Celular:</label> <br>
                        <label for="">Correo Institucional:</label> <br>

                    <v-btn> <v-icon>edit</v-icon> Datos Personales </v-btn>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item
                value="tab-2"
            >
                <v-card flat>
                <v-card-title> Datos Parentesco </v-card-title>
                <v-card-text>

                <label for="">Estado Civil:</label> <br>
                <label for="">Nombre Conyuge:</label> <br>
                <label for="">Hijos:</label> Si <br>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Edad</td>
                            <td>Fecha de Nacimiento</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(children,index) in childrens" :key="index" >
                            <td>{{children.name}}</td>
                            <td>{{children.years}}</td>
                            <td>{{children.birth_date}}</td>
                        </tr>
                    </tbody>
                </table>

                <v-btn> <v-icon>edit</v-icon> Datos Parentesco </v-btn>
                </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item
                value="tab-3"
            >
                <v-card flat>
                    <v-card-title> Datos Referenciales <v-btn icon> <v-icon>edit</v-icon> </v-btn></v-card-title>
                    <v-card-text>
                        <label for="">AFP:</label> Prevision <br>
                        <label for="">Nro NUA/CUA</label> 00123456<br>
                    </v-card-text>
                </v-card>
                <v-card flat>
                    <v-card-title> Cuenta(s) Bancaria(s) <v-btn icon> <v-icon>edit</v-icon> </v-btn></v-card-title>
                    <v-card-text>
                        <label for="">AFP:</label> Prevision <br>
                        <label for="">Nro NUA/CUA</label> 00123456<br>
                    </v-card-text>
                </v-card>
                <v-card flat>
                    <v-card-title> Seguro Medico <v-btn icon> <v-icon>edit</v-icon> </v-btn></v-card-title>
                    <v-card-text>
                        <label for="">Seguro a Corto Plazo:</label> Caja de Caminos <br>
                        <label for="">Nro Matricula</label> 256<br>
                        <label for="">Tipo Sangre</label> ORH +<br>
                        <!-- <label for="">Doctor/Medico</label> ORH +<br> -->
                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs>

        <div class="text-xs-center mt-3">
        <v-btn @click="next">Siguiente</v-btn>
        </div>
    </v-card>

            <!-- <v-card>
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

                    <v-flex md12 >
                        Cargo: {{ employee.position.name }}
                    </v-flex>
                    <v-flex md12 >
                        Gerencia: {{ employee.management.name }}
                    </v-flex>


                </v-layout>

            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>

            </v-card-actions>
            </v-card> -->

</template>
<script>
export default
{

    data:()=>({
        employee:{},
        text:'hola',
        tab: null,
        childrens: [
            {name:'Luis Perez Perez', years:10,birth_date:"01-01-2009"},
            {name:'Luis Perez Perez', years:10,birth_date:"01-01-2009"},
            {name:'Luis Perez Perez', years:10,birth_date:"01-01-2009"}
        ]
    }),
    mounted()
    {
        axios.get('/api/auth/employee_info')
            .then(response => {
                this.employee = response.data.employee;
                console.log(this.employee);
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods:{
        next ()
        {
            this.tab = 'tab-2';
            console.log(this.tab)
            // const tab = parseInt(this.tab)
            // this.tab = (tab < 2 ? tab + 1 : 0)
        }

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
