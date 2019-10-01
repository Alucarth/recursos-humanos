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
            <v-tab href="#tab-4">
                <!-- <v-icon>mdi-phone</v-icon> -->
                4. Formacion Academica
            </v-tab>
            <v-tab href="#tab-5">
                <!-- <v-icon>mdi-phone</v-icon> -->
                5. Cursos y/o Seminarios
            </v-tab>
            <v-tab href="#tab-6">
                <!-- <v-icon>mdi-phone</v-icon> -->
                6. Idiomas
            </v-tab>
            <v-tab href="#tab-7">
                <!-- <v-icon>mdi-phone</v-icon> -->
                7. Paquetes
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

            <v-tab-item
                value="tab-4"
            >
                <academic-edit :dialog="dialog_academic" :academic="academic" @close="close_academic"  @academic="update_academic"  ></academic-edit>
                <v-card flat>
                <v-card-title> Formacion Academica
                    <v-btn icon @click="create_academic()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr>
                            <td>Formacion Academica</td>
                            <td>Documentos</td>
                            <td>Estado</td>
                            <td>Insitucion</td>
                            <td>Grado</td>
                            <td>Titulo</td>
                            <td>Fecha de Emision</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(academic,index) in employee.academic_trainings" :key="index" >

                            <td>{{academic.name}}</td>
                            <td>{{academic.document}}</td>
                            <td>{{academic.state}}</td>
                            <td>{{academic.instituion}}</td>
                            <td>{{academic.grade}}</td>
                            <td>{{academic.has_title?'Si':'No'}}</td>
                            <td>{{academic.date}}</td>
                            <td> <v-btn icon  @click="delete_academic(index)"> <v-icon >delete</v-icon> </v-btn> </td>
                        </tr>
                    </tbody>
                </table>


                </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item
                value="tab-5"
            >
                <course-edit :dialog="dialog_course" :course="course" @close="close_course"  @course="update_course"  ></course-edit>
                <v-card flat>
                <v-card-title> Cursos y Seminarios
                    <v-btn icon @click="create_course()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr>
                            <td>Gesion</td>
                            <td>Insitucion</td>
                            <td>Nombre</td>
                            <td>Duracion</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(course,index) in employee.courses" :key="index" >

                            <td>{{course.date}}</td>
                            <td>{{course.name}}</td>
                            <td>{{course.instituion}}</td>
                            <td>{{course.hours}}</td>
                            <td> <v-btn icon  @click="delete_course(index)"> <v-icon >delete</v-icon> </v-btn> </td>
                        </tr>
                    </tbody>
                </table>


                </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item
                value="tab-6"
            >
                <language-edit :dialog="dialog_language" :language="language" @close="close_language"  @language="update_language"  ></language-edit>
                <v-card flat>
                <v-card-title> Idimas
                    <v-btn icon @click="create_language()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr>
                            <td>Gesion</td>
                            <td>Insitucion</td>
                            <td>Idioma</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(language,index) in employee.languages" :key="index" >

                            <td>{{language.date}}</td>
                            <td>{{language.instituion}}</td>
                            <td>{{language.name}}</td>
                            <td> <v-btn icon  @click="delete_language(index)"> <v-icon >delete</v-icon> </v-btn> </td>
                        </tr>
                    </tbody>
                </table>


                </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item
                value="tab-7"
            >
                <package-edit :dialog="dialog_package" :paquete="paquete" @close="close_package"  @package="update_package"  ></package-edit>
                <v-card flat>
                <v-card-title> Paquetes
                    <v-btn icon @click="create_package()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr>
                            <td>Gesion</td>
                            <td>Insitucion</td>
                            <td>Paquetes</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(paquete,index) in employee.packages" :key="index" >

                            <td>{{paquete.date}}</td>
                            <td>{{paquete.instituion}}</td>
                            <td>{{paquete.name}}</td>
                            <td> <v-btn icon  @click="delete_package(index)"> <v-icon >delete</v-icon> </v-btn> </td>
                        </tr>
                    </tbody>
                </table>


                </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs>

        <div class="text-xs-center mt-3">
        <v-btn @click="next">Siguiente</v-btn>
        <v-btn @click="save_employee()"> Registrar </v-btn>
        <v-btn @click="dialog_report=true"> Ver Reporte </v-btn>
        </div>
        <v-dialog
        v-model="dialog_report"
        width="500"
        >
        <v-card>
            <v-card-title
            class="headline grey lighten-2"
            primary-title
            >
            Reporte
            </v-card-title>

            <v-card-text>
                <iframe :src="'/api/ficha_personal/'+this.employee.id" frameborder="0" allowtransparency="true" style="width:100%;height:600px"></iframe>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
            <div class="flex-grow-1"></div>
            <v-btn
                color="primary"
                text
                @click="dialog_report = false"
            >
               Cerrar
            </v-btn>
            </v-card-actions>
        </v-card>
        </v-dialog>



    </v-card>



</template>
<script>
import PersonalData from './PersonalData.vue';
import FamilyEdit from './FamilyEdit.vue';
import ReferenceEdit from './ReferenceEdit.vue';
import AcademicEdit from './AcademicEdit.vue';
import CourseEdit from './CourseEdit.vue';
import LanguageEdit from './LanguageEdit.vue';
import PackageEdit from './PackageEdit.vue';
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
        dialog_academic:false,
        dialog_course:false,
        dialog_language:false,
        dialog_package:false,
        dialog_report:false,
        family:{},
        academic:{},
        course:{},
        language:{},
        paquete:{}
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
        },
        create_academic()
        {
            this.academic = {};
            this.dialog_academic = true;
        },
        update_academic(item){
            console.log(item);
            this.employee.academic_trainings.push(item);
            this.dialog_academic = false;
            //adicionar
        },
        close_academic(){
            this.dialog_academic = false;
        },
        delete_academic(index)
        {
            this.employee.academic_trainings.splice(index, 1)
        },
        create_course()
        {
            this.course = {};
            this.dialog_course = true;
        },
        update_course(item){
            console.log(item);
            this.employee.courses.push(item);
            this.dialog_course = false;
            //adicionar
        },
        close_course(){
            this.dialog_course = false;
        },
        delete_course(index)
        {
            this.employee.courses.splice(index, 1)
        },
        create_language()
        {
            this.language = {};
            this.dialog_language = true;
        },
        update_language(item){
            console.log(item);
            this.employee.languages.push(item);
            this.dialog_language = false;
            //adicionar
        },
        close_language(){
            this.dialog_language = false;
        },
        delete_language(index)
        {
            this.employee.languages.splice(index, 1)
        },
        create_package()
        {
            this.paquete = {};
            this.dialog_package = true;
        },
        update_package(item){
            console.log(item);
            this.employee.packages.push(item);
            this.dialog_package = false;
            //adicionar
        },
        close_package(){
            this.dialog_package = false;
        },
        delete_package(index)
        {
            this.employee.packages.splice(index, 1)
        },
        save_employee()
        {
            axios.post('/api/auth/employee',this.employee)
                 .then(response=>{
                     console.log(response.data);
                 });
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
        ReferenceEdit,
        AcademicEdit,
        CourseEdit,
        LanguageEdit,
        PackageEdit

    }
}
</script>
