<template>
 <v-app dark id="inspire">

    <router-view name="toolbar"></router-view>
    <router-view name="nav"></router-view>
    <!--   -->
    <v-content>

       <v-container fluid fill-height>
          <v-layout fluid column fill-height>
                <router-view></router-view>
          </v-layout>
          <!-- <notivuecation /> -->
          <!-- para los mensajes tipo alert-->
          <!-- <v-snackbar
            v-model="show_message"
            :timeout="timeout"
            top='top'
            right='right'
            :color="color"
          >
            {{getMessage}}
            <v-btn
              color="white"
              flat
              @click="snackbar = false"
            >
              <v-icon>close</v-icon>
            </v-btn>
          </v-snackbar> -->
          <!-- para los mensajes tipo confirm   -->

        </v-container>
    </v-content>
  </v-app>

</template>
<script>

console.log("abriendo app vue");
export default {

    data: () => ({
      dialog: false,
      timeout: 6000,
    }),
    computed:{
      // currentUser(){
      //   return this.$store.getters.currentUser;
      // }

    //   getToken(){
    //     return this.$store.state.auth.token;
    //   },
    //   show_message:{
    //       get(){
    //         return this.$store.state.template.show_message;
    //       },
    //       set(value){
    //         this.$store.commit('template/updateShowMessage',value);
    //       }
    //   },
    //   getMessage(){
    //     return this.$store.state.template.message;
    //   },
    //   color(){
    //     return this.$store.state.template.color;
    //   },

    },
    created(){
    //   console.log(this.getToken);

      console.log("setteando token");
    //   axios.defaults.headers.common['Authorization'] = 'Bearer '+this.getToken;

    //   axios.interceptors.response.use(undefined,(err) => {
    //     return new Promise( (resolve, reject) => {
    //       console.log(err.response.status);
    //       if (err.response.status === 401) {
    //       // if you ever get an unauthorized, logout the user
    //         this.$store.dispatch('auth/logout')
    //         .then(() => this.$router.push('/login'))
    //         .catch(err => console.log(err))
    //       // you can also redirect to /login if needed !
    //       }
    //       throw err;
    //     });
    //   });


      },

    }
</script>
