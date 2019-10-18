<template>
 <v-card>
        <v-card-title>
            <h3>Mis Asistencias</h3>
        <v-spacer></v-spacer>
        <!-- <v-btn @click="create();" color="primary" dark class="mb-2">Nuevo</v-btn> -->
        </v-card-title>
        <v-card-text>
            <FullCalendar defaultView="dayGridMonth" :plugins="calendarPlugins"  locale='es' :events="attendances" />
        </v-card-text>
        <!-- <edit-biometric :dialog="dialog" :biometric="biometric" @close="close"  @biometric="update"></edit-biometric>
        <sync-biometric :dialog="dialog_sync" :biometric="biometric" @close="close_sync" ></sync-biometric> -->

    </v-card>
</template>
<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
export default {
    data:()=>({
        calendarPlugins: [ dayGridPlugin ],
        attendances:[],

    }),
    mounted()
    {
        console.log('Load Component Attendance');
        this.getAttendances();
    },
    methods:{
        getAttendances()
        {
            axios.get('/api/auth/attendance')
                 .then(response=>{
                        console.log(response.data);
                        response.data.attendances.forEach(attendance => {
                            let event = {title:''+attendance.time, date: attendance.date +' '+attendance.time }
                            this.attendances.push(event);
                        });
                 });
        },

    },
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
}
</script>
