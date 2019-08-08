<template>
    <v-dialog v-model="dialog" persistent max-width="800px">
            <v-card>
            <v-card-title>
                <span class="headline">{{ title }} </span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
                    {{item.employee}}
                 <v-layout wrap>

                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Primer Nombre" hint="Ingrese Primer Nombre" required v-model="item.first_name"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Segundo Nombre" hint="Ingrese Seugndo Nombre" required v-model="item.second_name"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Apellido Paterno" hint="Ingrese Apellido Paterno" v-model="item.last_name"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Apellido Materno" hint="Ingrese Apellido Materno" v-model="item.mother_last_name"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Cod. Biomentrico" hint="Ingrese Codigo de Biometrico" required v-model="item.biometric_code"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md2>
                        <v-text-field label="C.I." hint="Ingrese cedula de identidad" v-model="item.identity_card"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm12 md1>
                        <v-select
                        label="Ciudad"
                        v-model="item.city_identity_card_id"
                        :items="cities"
                        item-text="shortened"
                        item-value="id"
                        :hint="``"
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <v-flex xs12 sm12 md3>
                        <v-select
                        label="Tipo de Documento"
                        v-model="item.document_type_id"
                        :items="document_types"
                        item-text="name"
                        item-value="id"
                        hint=""
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-menu
                            ref="menu_birth_date"
                            v-model="menu_birth_date"
                            :close-on-content-click="false"
                            transition="scale-transition"
                            offset-y
                            full-width
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="item.birth_date"
                                label="Fecha de Nacimiento"
                                prepend-icon="event"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-date-picker
                            ref="picker"
                            v-model="item.menu_birth_date"
                            :max="new Date().toISOString().substr(0, 10)"
                            min="1950-01-01"
                            @change="save"
                            ></v-date-picker>
                        </v-menu>
                    </v-flex>
                    <v-flex xs12 sm12 md3>
                        <v-select
                        label="Pais"
                        v-model="item.country_id"
                        :items="countries"
                        item-text="name"
                        item-value="id"
                        hint="Seleccione Pais"
                        >
                        </v-select>
                    </v-flex>
                     <v-flex xs12 sm12 md3>
                        <v-select
                        label="Genero"
                        v-model="item.gender"
                        :items="genders"
                        hint="`Descripcion del tipo seleccionado`"
                        item-text="name"
                        item-value="id"
                        >
                        </v-select>
                    </v-flex>
                     <v-flex xs12 sm12 md3>
                        <v-select
                        label="AFP"
                        v-model="item.contribution_id"
                        :items="contributions"
                        item-text="afp_name"
                        item-value="id"
                        hint="AFP"
                        >
                        </v-select>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Nua/Cua" hint="Ingrese Nua Cua" v-model="item.cua_nua"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-menu
                            ref="menu1"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="date"
                            lazy
                            transition="scale-transition"
                            offset-y
                            full-width
                            min-width="290px"
                        >
                            <v-text-field
                            slot="activator"
                            v-model="item.entry_date"
                            label="Fecha de Ingreso"
                            readonly
                            ></v-text-field>
                            <v-date-picker v-model="item.entry_date" @input="$refs.menu1.save(date)"></v-date-picker>

                        </v-menu>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Telefono" hint="Ingrese Telefono" v-model="item.phone"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Celular" hint="Ingrese Celular" v-model="item.cellphone"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>

                        <v-text-field label="Curriculum" @click='pickFile' v-model="curriculum_name" prepend-icon='attach_file'></v-text-field>
                        <input
                            type="file"
                            style="display: none"
                            ref="curriculum"
                            accept="application/vnd.ms-excel"
                            @change="onFilePicked"
                        >
                    </v-flex>
                    <v-flex xs6 sm6 md6>
                        <v-text-field label="Profesion" hint="Ingrese Profesion" v-model="item.profession"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md6>
                        <v-text-field label="Direccion" hint="Ingrese Direccion" v-model="item.address"></v-text-field>
                    </v-flex>


                    <v-flex xs12 sm12 md3>
                        <v-select
                        label="Modalidad Contrato"
                        v-model="item.contract_modality_id"
                        :items="contract_modalities"
                        item-text="name"
                        item-value="id"
                        hint=""
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <v-flex xs12 sm12 md3>
                        <v-select
                        label="Tipo de Contrato"
                        v-model="item.contract_type_id"
                        :items="contract_types"
                        item-text="name"
                        item-value="id"
                        hint=""
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <v-flex xs12 sm12 md6>
                        <v-select
                        label="Gerencia"
                        v-model="item.management_id"
                        :items="managements"
                        item-text="name"
                        item-value="id"
                        hint=""
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <v-flex xs12 sm12 md6>
                        <v-select
                        label="Unidad"
                        v-model="item.unit_id"
                        :items="unities"
                        item-text="name"
                        item-value="id"
                        hint=""
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <v-flex xs12 sm12 md6>
                        <v-select
                        label="Cargo"
                        v-model="item.position_id"
                        :items="positions"
                        item-text="name"
                        item-value="id"
                        :hint="`Descripcion del tipo seleccionado`"
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Salario" hint="Ingrese total ganado" v-model="item.salary"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-switch v-model="item.disability" :label="`Discapasidad:${item.disability?'Si':'No'}`"></v-switch>
                    </v-flex>
                    <v-flex xs6 sm6 md3 v-if="item.disability">
                        <v-text-field label="Tutor" hint="Tutor del Descapacitado" v-model="item.tutor"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-select
                        label="Estado Civil"
                        v-model="item.civil_status"
                        :items="civil_statuses"
                        item-text="name"
                        item-value="id"
                        :hint="`Selecciones estado Civil`"
                        >
                        </v-select>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-menu
                            ref="menu2"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="date2"
                            lazy
                            transition="scale-transition"
                            offset-y
                            full-width
                            min-width="290px"
                        >
                            <v-text-field
                            slot="activator"
                            v-model="item.retirement_date"
                            label="Fecha de Salida"
                            readonly
                            ></v-text-field>
                            <v-date-picker v-model="item.retirement_date" @input="$refs.menu2.save(date2)"></v-date-picker>

                        </v-menu>
                    </v-flex>
                     <v-flex xs6 sm6 md6 v-if="item.retirement_date">
                        <v-text-field label="Motivo de Retiro" hint="" v-model="item.reason"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>

                        <v-img
                            :src="item.employee_image_path?item.employee_image_path.toString().substring(7,item.employee_image_path.length):''"
                            :lazy-src="item.employee_image_path?item.employee_image_path.toString().substring(7,item.employee_image_path.length):''"
                            aspect-ratio="1"
                            class="grey lighten-2"
                            >
                            <template v-slot:placeholder>
                                <v-layout
                                fill-height
                                align-center
                                justify-center
                                ma-0
                                >
                                <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                                </v-layout>
                            </template>
                        </v-img>
                        <v-btn @click="pickImage" >
                            <v-icon>file_upload</v-icon>
                            Subir Imagen
                        </v-btn>
                        <input
                            type="file"
                            style="display: none"
                            ref="image"
                            accept="image/*"
                            @change="previewImage"
                        >
                    </v-flex>

                </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cancel</v-btn>

                <v-btn color="blue darken-1" flat @click="sendEmployee()">Guardar</v-btn>
            </v-card-actions>
            </v-card>
        </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        employee: Object
	},
    data:()=>({
        areas: [],
        cities: [],
        countries: [],
        types: [],
        positions: [],
        contract_types: [],
        contract_modalities: [],
        document_types: [],
        managements: [],
        unities: [],
        contributions: [],
        civil_statuses:[{id:'C',name:'Casado(a)'},{id:'S',name:'Soltero(a)'},{id:'V',name:'Viudo(a)'},{id:'D',name:'Divorciado(a)'}],
        curriculum_name:'',
        curriculum_file:'',
        curriculum_url:'',
        genders:[{id:'M',name:'Masculino'} ,{id:'F',name:'Femenino'}],
        date: new Date().toISOString().substr(0, 10),
        date2: new Date().toISOString().substr(0, 10),
        menu: false,
        menu_birth_date:false,
        modal: false,
        menu2: false,
        imageData: ""

    }),
    mounted(){
        // this.getAreas();
        // this.getTypes();
        this.getPositions();
        this.getCities();
        this.getCountries();
        this.getDocumentTypes();
        this.getContractTypes();
        this.getContractModalities();
        this.getManagements();
        this.getUnities();
        this.getContributions();

    },
    methods:{
        pickFile () {
            this.$refs.curriculum.click ()
        },
        pickImage(){
             this.$refs.image.click ()
        },
        onFilePicked (e) {
            const files = e.target.files
            console.log(files);
			if(files[0] !== undefined) {
				this.curriculum_name = files[0].name
				if(this.curriculum_name.lastIndexOf('.') <= 0) {
					return
				}
				const fr = new FileReader ()
				fr.readAsDataURL(files[0])
				fr.addEventListener('load', () => {
					this.curriculum_url = fr.result
                    this.curriculum_file = files[0] // this is an excel file that can be sent to server...
                    this.item.curriculum_file = this.curriculum_file;
				})
			} else {
				this.curriculum_name = ''
				this.curriculum_file = ''
				this.curriculum_url = ''
			}
        },
        previewImage(event) {
            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.item.employee_image_path ='public/'+ e.target.result;
                    this.item.image_file =input.files[0];
                    // this.item.imageData = this.imageData;
                    // console.log(this.imageData);
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        },
        getPositions (){
            axios.get('/api/auth/position')
            .then(response => {
                this.positions = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        getCities (){
            axios.get('/api/auth/city')
            .then(response => {
                this.cities = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        getCountries (){
            axios.get('/api/auth/country')
            .then(response => {
                this.countries = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        getContributions (){
            axios.get('/api/auth/contribution')
            .then(response => {
                this.contributions = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        // getTypes() {
        //     axios.get('/api/auth/employee_type')
        //     .then(response => {
        //         this.types = response.data.types
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        getDocumentTypes() {
            axios.get('/api/auth/document_type')
            .then(response => {
                this.document_types = response.data
            })
            .catch(error => {
                console.log(error);
            });
        },
        getContractTypes() {
            axios.get('/api/auth/contract_type')
            .then(response => {
                this.contract_types = response.data
            })
            .catch(error => {
                console.log(error);
            });
        },
        getContractModalities() {
            axios.get('/api/auth/contract_modality')
            .then(response => {
                this.contract_modalities = response.data
            })
            .catch(error => {
                console.log(error);
            });
        },
        getManagements() {
            axios.get('/api/auth/management')
            .then(response => {
                this.managements = response.data
            })
            .catch(error => {
                console.log(error);
            });
        },
        getUnities() {
            axios.get('/api/auth/unity')
            .then(response => {
                this.unities = response.data
            })
            .catch(error => {
                console.log(error);
            });
        },
        // getAreas() {
        //     axios.get('/api/auth/area')
        //     .then(response => {
        //         this.areas = response.data.areas
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        // getContracTypes() {
        //     axios.get('/api/auth/employee_contract_type')
        //     .then(response => {
        //         this.contract_types = response.data.contract_types
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        sendEmployee() {
            this.$emit('employee',this.item)
        },
        sendClose() {
            this.$emit('close',false)
        },
        save (date) {
            console.log(date);
            this.item.birth_date = date;
            this.$refs.menu_birth_date.save(date)
        },
    },
    computed:{
        item(){
           let item = this.employee
           return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='Crear Empleado'
            if(this.item.id) {

                title = 'Editar Empleado'
            }
            return title
        },
    },
    watch: {
      menu_birth_date (val) {
        val && setTimeout(() => (this.$refs.picker.activePicker = 'YEAR'))
      },
    },

}
</script>
