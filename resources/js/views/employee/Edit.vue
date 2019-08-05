<template>
    <v-dialog v-model="dialog" persistent max-width="700px">
            <v-card>
            <v-card-title>
                <span class="headline">{{ title }}</span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
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
                        v-model="item.country"
                        :items="countries"
                        item-text="name"
                        item-value="id"
                        hint="Seleccione Pais"
                        >
                        </v-select>
                    </v-flex>
                     <v-flex xs12 sm12 md4>
                        <v-select
                        label="Genero"
                        v-model="item.gender"
                        :items="genders"
                        hint="`Descripcion del tipo seleccionado`"
                        >
                        </v-select>
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
                    <v-flex xs6 sm6 md2>
                        <v-text-field label="Salario" hint="Ingrese total ganado" v-model="item.salary"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md2>
                        <v-text-field label="Bono" hint="Ingrese bono" v-model="item.bonus"></v-text-field>
                    </v-flex>
                    <v-flex xs6 sm6 md3>
                        <v-text-field label="Hora extra" hint="Ingrese pago por hora extra" v-model="item.extra_hour"></v-text-field>
                    </v-flex>

                    <v-flex xs12 sm12 md4>
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
                    <!-- <v-flex xs12 sm12 md4>
                        <v-select
                        label="Area Oficial"
                        v-model="item.official_area_id"
                        :items="areas"
                        item-text="name"
                        item-value="id"
                        :hint="`Descripcion del tipo seleccionado`"
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <v-flex xs12 sm12 md4>
                        <v-select
                        label="Area Temporal"
                        v-model="item.temporal_area_id"
                        :items="areas"
                        item-text="name"
                        item-value="id"
                        :hint="`Descripcion del tipo seleccionado`"
                        persistent-hint>
                        </v-select>
                    </v-flex> -->
                    <v-flex xs12 sm12 md5>
                        <v-select
                        label="Tipo"
                        v-model="item.employee_type_id"
                        :items="types"
                        item-text="name"
                        item-value="id"
                        :hint="`Descripcion del tipo seleccionado`"
                        persistent-hint>
                        </v-select>
                    </v-flex>
                    <!-- <v-flex xs12 sm12 md5>
                        <v-select
                        label="Tipo de Contrato"
                        v-model="item.employee_contract_type_id"
                        :items="contract_types"
                        item-text="name"
                        item-value="id"
                        :hint="`Descripcion del tipo de contrato`"
                        persistent-hint>
                        </v-select>
                    </v-flex> -->
                    <!-- <v-flex xs12 sm12 md2>
                        <v-checkbox
                        :label="`Activo`"
                        v-model="item.active"
                        ></v-checkbox>
                    </v-flex> -->
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
        genders:['Masculino','Femenino'],
        date: new Date().toISOString().substr(0, 10),
        menu: false,
        menu_birth_date:false,
        modal: false,
        menu2: false,
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

    },
    methods:{
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
