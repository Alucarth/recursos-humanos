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
                1. Datos Personales
            </v-tab>
            <v-tab href="#tab-2">
                <!-- <v-icon>peoples</v-icon> -->
                2. Datos Parentesco
            </v-tab>
            <v-tab href="#tab-3">
                <!-- <v-icon>mdi-phone</v-icon> -->
                3. Datos Referenciales
            </v-tab>

            <v-tab-item
                value="tab-1"
            >
                <v-card flat>
                    <v-card-title> Datos Personales <v-btn @click="edit_pd()" icon>  <v-icon>edit</v-icon> </v-btn> </v-card-title>
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


                    <personal-data :dialog="dialog_pd" :employee="employee" @close="close_pd"  @employee="update_pd"></personal-data>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item
                value="tab-2"
            >
                <family-edit :dialog="dialog_parentesco" :family="family" @close="close_parentesco"  @family="update_parentesco"  ></family-edit>
                <v-card flat>
                <v-card-title> Datos Parentesco
                    <v-btn icon @click="create_parentesco()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Parentesco</td>
                            <td>Edad</td>
                            <td>Fecha de Nacimiento</td>
                            <td>Telefono</td>
                            <td>Celular</td>
                            <td>Referencia de Emergencia</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(family,index) in employee.families" :key="index" >
                            <td>{{family.first_name+' '+family.second_name+' '+family.last_name+' '+family.mother_last_name}}</td>
                            <td>{{ family.kinship?family.kinship.name:'' }}</td>
                            <td>{{family.age}}</td>
                            <td>{{family.birth_date}}</td>
                            <td>{{family.phone}}</td>
                            <td>{{family.cellphone}}</td>
                            <td>{{family.is_reference?'Si':'No'}}</td>
                            <td> <v-btn icon  @click="delete_parentesco(index)"> <v-icon >delete</v-icon> </v-btn> </td>
                        </tr>
                    </tbody>
                </table>


                </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item
                value="tab-3"
            >
                <reference-edit :dialog="dialog_reference" :employee="employee" @close="close_reference"  @employee="update_reference"></reference-edit>
                <v-card flat>
                    <v-card-title> Datos Referenciales <v-btn icon @click="edit_reference()">  <v-icon>edit</v-icon> </v-btn></v-card-title>
                    <v-card-text>
                        <label for="">AFP:</label> {{employee.contribution?employee.contribution.name:''}} <br>
                        <label for="">NUA/CUA:</label> {{employee.cua_nua}}<br>
                        <label for="">Banco:</label> {{employee.bank}} <br>
                        <label for="">Nro Cuenta:</label> {{employee.account_number}}<br>
                        <label for="">Seguro a Corto Plazo:</label> {{employee.health_box?employee.health_box.name:''}}<br>
                        <label for="">Matricula:</label> {{employee.registration_number_medical}}<br>
                        <label for="">Tipo de Sangre:</label> {{employee.blood_type}}<br>
                        <label for="">Doctor/Medico:</label> {{employee.doctor_name}} <br>
                    </v-card-text>
                </v-card>


            </v-tab-item>
        </v-tabs>

        <div class="text-xs-center mt-3">
        <v-btn @click="next">Siguiente</v-btn>
        </div>
    </v-card>



</template>
<script>
import PersonalData from './PersonalData.vue';
import FamilyEdit from './FamilyEdit.vue';
import ReferenceEdit from './ReferenceEdit.vue';
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
        ],
        dialog_pd:false, //dialog personal data
        dialog_parentesco:false,
        dialog_reference:false,
        family:{}
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
        },
        edit_pd () {
            // this.editedIndex = this.employees.indexOf(item)
            // axios.get(`/api/auth/employee/${item.id}/edit`)
            // .then(response => {
            //     this.employee = response.data.employee
            // })
            // .catch(error => {
            //     console.log(error);
            // });

            this.dialog_pd = true
        },
        close_pd() {
            this.dialog_pd = false;
        },
        update_pd (item) {
            console.log(item);
            this.dialog_pd = false;
        },
        create_parentesco(){
            this.family = {};
            this.dialog_parentesco = true;
        },
        edit_parentesco(){
            // this.employee.families.push*
        },
        delete_parentesco(index)
        {
            this.employee.families.splice(index, 1)
        },
        close_parentesco(){
            this.dialog_parentesco = false;
        },
        update_parentesco(item)
        {
            // console.log(item);
            this.employee.families.push(item);
            this.dialog_parentesco = false;
        },
        close_reference(){
            this.dialog_reference = false;
        },
        update_reference(item)
        {
            console.log(item);
            this.dialog_reference = false;
        },
        edit_reference()
        {
            this.dialog_reference = true;
        }
    },
    computed:{
        full_name(){
            let full_name = '';
            if(this.employee){
                full_name= this.employee.first_name+' '+this.employee.second_name+' '+this.employee.last_name+' '+this.employee.mother_last_name ;
            }
            return full_name;
        },

    },
    components: {
        PersonalData,
        FamilyEdit,
        ReferenceEdit
    }
}
</script>
