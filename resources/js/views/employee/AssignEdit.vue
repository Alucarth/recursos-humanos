<template>
   <v-dialog v-model="dialog" persistent max-width="800px">
    <v-card>
    <v-card-title class="rrhh-primary">
        <span class="headline">{{ title }} </span>
    </v-card-title>

    <v-card-text v-if="item">
        <v-container grid-list-md>
            {{item.employee}}
            <v-layout wrap>

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

    }),
    methods: {
        sendEmployee() {
            this.$emit('employee',this.item)
        },
        sendClose() {
            this.$emit('close',false)
        },
    },
    computed:
    {
        item(){
           let item = this.employee
           return item
        },
        parent_dialog(){
			return this.dialog
        },
        title(){
            let title='HORARIOS'
            if(this.item.id)
            {
                title = `HORARIOS ${this.employee.first_name} ${this.employee.second_name} ${this.employee.last_name} ${this.employee.mother_last_name}`
            }
            return title
        },
    },

}
</script>
