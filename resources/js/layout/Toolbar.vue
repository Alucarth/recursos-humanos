<template>

    <v-toolbar
      color="red"
      dark
      app
      :clipped-left="$vuetify.breakpoint.mdAndUp"
      fixed
      dense
    >
      <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <span class="hidden-sm-and-down">EBA</span>
      </v-toolbar-title>

      <v-spacer></v-spacer>


     <v-menu
        v-model="menu"
        :close-on-content-click="false"
        :nudge-width="100"
        offset-x
        v-if="user"
      >
         <v-btn
          slot="activator"
          icon
          large

        >

        <v-icon>person</v-icon>

      </v-btn>

      <v-card   light>
        <v-list>
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
            </v-list-tile-avatar>

            <v-list-tile-content >
              <v-list-tile-title>{{user.username}}</v-list-tile-title>
              <v-list-tile-sub-title>Administrador</v-list-tile-sub-title>

            </v-list-tile-content>

          </v-list-tile>
        </v-list>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-tooltip bottom>
            <v-btn
              slot="activator"
              color="primary"
              dark
              flat @click="menu = false"
            >
             <v-icon>reply</v-icon>
            </v-btn>
            <span>Regresar</span>
          </v-tooltip>
           <v-tooltip bottom>
            <v-btn
              slot="activator"
              color="primary"
              dark
              flat @click="logout"
            >
             <v-icon>exit_to_app</v-icon>
            </v-btn>
            <span>Cerrar Sesion</span>
          </v-tooltip>
        </v-card-actions>
      </v-card>
    </v-menu>
    </v-toolbar>
</template>
<script>
console.log("toolbar XD");
import { mapState } from 'vuex';
export default {
    data: () => ({
      menu: false,
    }),
    computed:{
        drawer:{
          get(){
            return this.$store.state.template.drawer;
          },
          set(value){
            this.$store.commit('template/updateDrawer',value);
          }
        },

        ...mapState({
          user: state => state.auth.user,
        })
        // user(){
        //   console.log("IMPRIMIENDO STORE AUTH  USER ");
        //   // console.log(this.$store.getters(['auth/authStatus']) );
        //    return this.$store.state.auth.user;
        // }

    },
    methods:{
      logout()
      {
        this.$store.dispatch('auth/logout')
          .then(() => this.$router.push('/login'))
          .catch(err => console.log(err))
      },
      show_user(){
        console.log('open dialog ');
        this.menu=true;
      }
    }

}
</script>
