<template>

</template>
<script>
import VueBootstrap4Table from 'vue-bootstrap4-table';
export default {
    data:()=>({
        type_hours:[]
    }),
    mounted(){
        this.getTypeHours();
    },
    methods:{
        getTypeHours()
        {
            axios.get(`api/auth/type_hour`)
                 .then(response =>{
                     this.type_hours = response.data.type_hours;
                 });
        }
    },
    components: {
        VueBootstrap4Table,

    }
}
</script>
