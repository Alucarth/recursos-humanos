<template>
 <v-card>
        <v-card-title>
            <h3>Mis Asistencias</h3>
        <v-spacer></v-spacer>
        <!-- <v-btn @click="create();" color="primary" dark class="mb-2">Nuevo</v-btn> -->
        </v-card-title>
        <v-card-text>
            <FullCalendar defaultView="dayGridMonth" :header="{left: 'dayGridMonth'}" :plugins="calendarPlugins"  locale='es' :events="attendances" />
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
                            let event = {title:attendance.time, date: `${attendance.date}`,backgroundColor: this.getColor(attendance), textColor: attendance.state=='success'?'#FFFFFF':'#000000'  }
                            this.attendances.push(event);
                            // days.push(attendance.date.toString().split('-')[2]);
                        });
                        // let day = moment().day();
                        // for (let i = 0; i < array.day; i++)
                        // {

                        // }
                 });
        },

        getColor(attendance)
        {
            let color = '#FFFFFF'
            switch (attendance.state) {
                case 'success':
                    color='#4CAF50';
                    break;
                case 'warning':
                    color='#FFEA00';
                    break;
                case 'error':
                    color='#FF8A80';
                    break;
            }
            return color;
        }

    },
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
}
</script>
