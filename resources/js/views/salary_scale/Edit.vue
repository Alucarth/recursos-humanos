<template>
    <v-dialog v-model="dialog" max-width="700px">
        <v-card>
            <v-card-title class="rrhh-primary">
                <span class="headline">{{ title }}</span>
            </v-card-title>

            <v-card-text v-if="item">
                <v-container grid-list-md>
                    <v-layout wrap>
                        <v-flex xs12 sm12 md6>
                            <v-text-field label="Nombre del Cargo" hint="Ingrese Nombre del Cargo" required v-model="item.name">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs6 sm6 md6>
                            <v-combobox
                            v-model="item.category"
                            :items="categories"
                            item-text="name"
                            label="Seleccione una Categoria"
                            ></v-combobox>
                        </v-flex>
                        <v-flex xs3 sm3 md3>
                            <v-text-field label="Clase" hint="Ingrese Clase" required v-model="item.class">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs3 sm3 md3>
                            <v-text-field label="Nivel" hint="Ingrese Nivel" required v-model="item.level">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs3 sm3 md3>
                            <v-text-field label="Nro. Casos" hint="Ingrese Nro. Casos" required v-model="item.number">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs3 sm3 md3>
                            <v-text-field label="Salario" hint="Ingrese Salario" required v-model="item.salary">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs3 sm3 md3>
                            <v-text-field label="Costo" hint="Ingrese Costo" required v-model="item.cost">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs3 sm3 md3>
                            <v-text-field label="Colateral" hint="Ingrese Colateral" required v-model="item.colateral">
                            </v-text-field>
                        </v-flex>
                        <v-flex xs3 sm3 md3>
                            <v-text-field label="Total" hint="Ingrese Colateral" required v-model="getTotal">
                            </v-text-field>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="sendClose()">Cancelar</v-btn>

                <v-btn color="blue darken-1" flat @click="sendSalary()">Guardar</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
export default
{
    props:{
        dialog: Boolean,
        salary: Object
	},
    data:()=>({
        categories:[]
    }),
    mounted(){
        this.getCategories();
    },
    methods:{
        sendSalary() {
            this.$emit('salary',this.item)
        },
        sendClose() {
            this.$emit('close',false)
        },
        getCategories()
        {
            axios.get(`api/auth/category`)
                .then(response=>{
                    this.categories = response.data.categories;
                });
        }

    },
    computed:{
        item(){
            let item = this.salary
            return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='Crear Escala Salarial'
            if(this.item.id)
            {
                title = 'Editar Escala Salarial'
            }
            return title
        },
        getTotal()
        {
            this.item.total = parseFloat(this.item.cost||0) +parseFloat (this.item.colateral ||0);
            return this.item.total;
        }
	}
}
</script>
