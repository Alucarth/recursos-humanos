<template>
 <v-card>
        <v-card-title>
            <h3>Mis Asistencias XD</h3>
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
import esLocale from '@fullcalendar/core/locales/ar.js';
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
    methods:
    {
        getAttendances()
        {
            axios.get('/api/auth/attendance')
                 .then(response=>{
                        console.log(response.data);

                        let days=[];
                        response.data.attendances.forEach(attendance => {
                            let event = {   title:attendance.title_entry,
                                            date: `${attendance.date} ${attendance.attendance_entry!='00:00:00'?attendance.attendance_entry:attendance.entry}`,
                                            backgroundColor: this.getColor(attendance.state_entry),
                                            textColor: attendance.state_entry=='success'?'#FFFFFF':'#000000'  }
                            this.attendances.push(event);
                                event = {   title:attendance.title_output,
                                            date: `${attendance.date} ${attendance.attendance_output!='00:00:00'?attendance.attendance_output:attendance.output}`,
                                            backgroundColor: this.getColor(attendance.state_output),
                                            textColor: attendance.state_output=='success'?'#FFFFFF':'#000000'  }
                            this.attendances.push(event);
                        });

                 });
        },

        getColor(state)
        {
            let color = '#FFFFFF'
            switch (state) {
                case 'success':
                    color='#4CAF50';
                    break;
                case 'warning':
                    color='#FFEA00';
                    break;
                case 'danger':
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
