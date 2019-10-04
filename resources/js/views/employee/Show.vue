<template>

    <v-card>

       <v-tabs
        v-model="tab"
        color="#AED6F1"
        light
        slider-color="#212121"
        >
            <v-tab href="#tab-1">
                <!-- <v-icon>people</v-icon> -->
               1 <br> Datos Personales
            </v-tab>
            <v-tab href="#tab-2">
                <!-- <v-icon>peoples</v-icon> -->
                2 <br> Datos Parentesco
            </v-tab>
            <v-tab href="#tab-3">
                <!-- <v-icon>mdi-phone</v-icon> -->
                3 <br> Datos Referenciales
            </v-tab>
            <v-tab href="#tab-4">
                <!-- <v-icon>mdi-phone</v-icon> -->
                4 <br> Formacion Academica
            </v-tab>
            <v-tab href="#tab-5">
                <!-- <v-icon>mdi-phone</v-icon> -->
                5 <br> Cursos y/o Seminarios
            </v-tab>
            <v-tab href="#tab-6">
                <!-- <v-icon>mdi-phone</v-icon> -->
                6 <br> Idiomas
            </v-tab>
            <v-tab href="#tab-7">
                <!-- <v-icon>mdi-phone</v-icon> -->
                7 <br> Paquetes
            </v-tab>
            <v-tab href="#tab-8">
                <!-- <v-icon>mdi-phone</v-icon> -->
                8 <br> Otros
            </v-tab>

            <v-tab-item
                value="tab-1"
            >
                <v-card flat>
                    <v-card-title> Datos Personales <v-btn v-if="employee.user_edit"  @click="edit_pd()" icon>  <v-icon>edit</v-icon> </v-btn> </v-card-title>
                    <v-card-text>
                        <label for="">Nombres:</label> {{ full_name }} <br>
                        <label for="">Cédula de Identidad:</label> {{ employee.identity_card }}<br>
                        <label for="">Fecha de Nacimiento:</label> {{ employee.birth_date }}<br>
                        <label for="">Nacionalidad:{{employee.country_id }}</label> <br>

                        <!-- <label for="">Nacionalidad:{{employee.country?employee.contry.name:''}}</label> <br> -->
                        <label for="">Estado Civil: {{employee.civil_status}}</label> <br>
                        <label for="">Libreta Militar: {{employee.has_military_card?'Si':'No'}}</label> <br>
                        <label for="">Numbero de Libreta: {{employee.military_serial_number}}</label> <br>
                        <label for="">Género:{{employee.gender }}</label> <br>
                        <label for="">Certificado de discapacidad: {{ employee.disability?'Si':'No'}}</label> <br>
                        <label for="">Dirección: {{employee.address}}</label> <br>
                        <label for="">Teléfono: {{employee.phone}} </label> <br>
                        <label for="">Email Personal: {{employee.personal_email}}</label> <br>
                        <label for="">Celular: {{employee.cellphone}}</label> <br>
                        <label for="">Celular Institucional: {{employee.corporate_cell}}</label> <br>
                        <label for="">Correo Institucional: {{employee.corporate_email}}</label> <br>


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
                    <v-btn v-if="employee.user_edit" icon @click="create_parentesco()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr style="background:#1B2938;color:#FFFFFF">
                            <td>Nombre</td>
                            <td>Parentesco</td>
                            <td>Edad</td>
                            <td>Fecha de Nacimiento</td>
                            <td>Teléfono</td>
                            <td>Celular</td>
                            <td>Referencia de Emergencia</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(family,index) in employee.families" :key="index" >
                            <!-- <td>{{family.first_name || ''+' '+family.second_name+' '+family.last_name+' '+family.mother_last_name}}</td> -->
                            <td>{{fullName(family) }}</td>
                            <td>{{ family.kinship_id }}</td>
                            <td>{{family.age}}</td>
                            <td>{{family.birth_date}}</td>
                            <td>{{family.phone}}</td>
                            <td>{{family.cellphone}}</td>
                            <td>
                                <!-- {{family.is_reference?'Si':'No'}} -->
                                 <v-chip
                                    class="ma-2"
                                    color="cyan"
                                    text-color="white"
                                    v-if='family.is_reference'
                                >

                                     {{family.is_reference?'Si':'No'}}
                                </v-chip>
                            </td>
                            <td> <v-btn v-if="employee.user_edit" icon  @click="delete_parentesco(index)"> <v-icon >delete</v-icon> </v-btn> </td>
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
                    <v-card-title> Datos Referenciales <v-btn v-if="employee.user_edit" icon @click="edit_reference()">  <v-icon>edit</v-icon> </v-btn></v-card-title>
                    <v-card-text>
                        <label for="">AFP:</label> {{employee.contribution_id}} <br>
                        <label for="">NUA/CUA:</label> {{employee.cua_nua}}<br>
                        <label for="">Banco:</label> {{employee.bank}} <br>
                        <label for="">Nro Cuenta:</label> {{employee.account_number}}<br>
                        <label for="">Seguro a Corto Plazo:</label> {{employee.healh_box_id}}<br>
                        <label for="">Matrícula:</label> {{employee.registration_number_medical}}<br>
                        <label for="">Tipo de Sangre:</label> {{employee.blood_type}}<br>
                        <label for="">Doctor/Médico:</label> {{employee.doctor_name}} <br>
                        <label for="">Numero de Dependencia:</label> {{employee.number_dependency}} <br>
                        <label for="">Declaracion Jurada:</label> {{employee.sworn_declaration?'Si':'No'}} <br>
                        <label for="">Fecha de Declaracion:</label> {{employee.date_sworn_declaration}} <br>
                        <label for="">Fecha de Recepcion en Recursos Humanos:</label> {{employee.date_reception}} <br>
                        <label for="">Numero de Declaracion:</label> {{employee.number_declaration}} <br>
                    </v-card-text>
                </v-card>


            </v-tab-item>

            <v-tab-item
                value="tab-4"
            >
                <academic-edit :dialog="dialog_academic" :academic="academic" @close="close_academic"  @academic="update_academic"  ></academic-edit>
                <v-card flat>
                <v-card-title> Formación Académica
                    <v-btn v-if="employee.user_edit" icon @click="create_academic()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr style="background:#1B2938;color:#FFFFFF">
                            <td>Formación Académica</td>
                            <td>Documentos</td>
                            <td>Estado</td>
                            <td>Insitución</td>
                            <td>Grado</td>
                            <td>Título</td>
                            <td>Fecha de Emisión</td>
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
                            <td> <v-btn v-if="employee.user_edit" icon  @click="delete_academic(index)"> <v-icon >delete</v-icon> </v-btn> </td>
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
                    <v-btn v-if="employee.user_edit" icon @click="create_course()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr style="background:#1B2938;color:#FFFFFF">
                            <td>Gestión</td>
                            <td>Insitución</td>
                            <td>Nombre</td>
                            <td>Duración</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(course,index) in employee.courses" :key="index" >

                            <td>{{course.date}}</td>
                            <td>{{course.name}}</td>
                            <td>{{course.institution}}</td>
                            <td>{{course.hours}}</td>
                            <td> <v-btn v-if="employee.user_edit" icon  @click="delete_course(index)"> <v-icon >delete</v-icon> </v-btn> </td>
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
                <v-card-title> Idiomas
                    <v-btn v-if="employee.user_edit" icon @click="create_language()"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr style="background:#1B2938;color:#FFFFFF">
                            <td>Gestión</td>
                            <td>Insitución</td>
                            <td>Idioma</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(language,index) in employee.languages" :key="index" >

                            <td>{{language.date}}</td>
                            <td>{{language.institutión}}</td>
                            <td>{{language.name}}</td>
                            <td> <v-btn v-if="employee.user_edit" icon  @click="delete_language(index)"> <v-icon >delete</v-icon> </v-btn> </td>
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
                    <v-btn icon @click="create_package()" v-if="employee.user_edit"> <v-icon>add</v-icon> </v-btn>
                </v-card-title>
                <v-card-text>


                <table class="table">
                    <thead>
                        <tr style="background:#1B2938;color:#FFFFFF">
                            <td>Gestión</td>
                            <td>Insitución</td>
                            <td>Paquetes</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(paquete,index) in employee.packages" :key="index" >

                            <td>{{paquete.date}}</td>
                            <td>{{paquete.institution}}</td>
                            <td>{{paquete.name}}</td>
                            <td> <v-btn v-if="employee.user_edit" icon  @click="delete_package(index)"> <v-icon >delete</v-icon> </v-btn> </td>
                        </tr>
                    </tbody>
                </table>


                </v-card-text>
                </v-card>
            </v-tab-item>
             <v-tab-item
                value="tab-8"
            >
                <size-edit :dialog="dialog_size" :employee="employee" @close="close_size"  @employee="update_zise"></size-edit>
                <v-card flat>
                    <v-card-title> Espeficicación de Tallas <v-btn v-if="employee.user_edit" icon @click="dialog_size=true">  <v-icon>edit</v-icon> </v-btn></v-card-title>
                    <v-card-text>
                        <label for="" v-if="employee.gender == 'F'" >Talla de Blusas:</label> {{employee.blouses}} <br>
                        <label for="">Talla de Camisas:</label> {{employee.shirt}}<br>
                        <label for="">Talla de Poleras:</label> {{employee.t_shirt}} <br>
                        <label for="">Talla de Chamarras:</label> {{employee.jacket}}<br>
                        <label for="">Nro de Bota:</label> {{employee.boots_number}}<br>

                        <v-btn color="success" v-if="employee.user_edit" @click="save_employee()"> Registrar Información </v-btn>
                    </v-card-text>
                </v-card>


            </v-tab-item>

        </v-tabs>

        <div class="text-xs-center mt-3">
        <v-btn @click="next">Siguiente</v-btn>

        <v-btn  v-if="!employee.user_edit" @click="dialog_report=true"  >  Ver Reporte <v-icon right dark >printer</v-icon> </v-btn>
        </div>
        <v-dialog
        v-model="dialog_report"
        width="1000"
        >
        <v-card>
            <!-- <v-card-title
            class="headline grey lighten-2"
            primary-title
            >
            Reporte
            </v-card-title> -->

            <v-card-text>
                <iframe :src="'/api/ficha_personal/'+this.employee.id" frameborder="0" allowtransparency="true" style="width:100%;height:500px"></iframe>
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
import SizeEdit from './SizeEdit.vue';
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
        dialog_size:false,
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
            let number = this.tab.toString().substr(4);
            number++;
            if(number>8){
                number =1;
            }
            this.tab = 'tab-'+number;
            // console.log(this.tab)
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
        close_size()
        {
            this.dialog_size = false;
        },

        update_zise(item){
            // console.log(item);
            // this.employee.packages.push(item);
            this.dialog_size = false;
            //adicionar
        },
        save_employee()
        {
            axios.post('/api/auth/save_employee',this.employee)
                 .then(response=>{
                    //  console.log(response.data);
                     this.employee = response.data.employee;
                     this.dialog_report = true;
                     console.log(this.employee);
                 });
        },
        fullName(item){
            let first_name = item.first_name || '';
            let second_name = item.second_name || '';
            let last_name = item.last_name || '';
            let mother_last_name = item.mother_last_name || '';
            return first_name + ' '+ second_name + ' '+ last_name + ' ' + mother_last_name;
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
        PackageEdit,
        SizeEdit

    }
}
</script>
