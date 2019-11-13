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
        // console.log(moment);
        this.getAttendances();
    },
    methods:{
        getAttendances()
        {
            axios.get('/api/auth/attendance')
                 .then(response=>{
                        console.log(response.data);

                        let days=[];
                        response.data.attendances.forEach(attendance => {
                            let event = {title:attendance.time, date: `${attendance.date}`,backgroundColor: attendance.state=='success'?'#4CAF50':'#FFEA00', textColor: attendance.state=='success'?'#FFFFFF':'#000000'  }
                            this.attendances.push(event);
                            // days.push(attendance.date.toString().split('-')[2]);
                        });
                        // let day = moment().day();
                        // for (let i = 0; i < array.day; i++) 
                        // {
                            
                        // }
                 });
        },

    },
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
}
</script>
