<template>
  <v-navigation-drawer
    v-model="drawer"
    fixed app>
    <v-toolbar flat dark :color="$root.themeColor" class="toolbar">
      <router-link to="/">
        <img src="images/logo_eba_blanck.png" width="50px"/>
      </router-link>
      <router-link to="/" class="text">
         Recursos Humanos
      </router-link>
    </v-toolbar>
    <v-list>
        <v-list-tile to="/">
            <v-list-tile-action>
                <v-icon>dashboard</v-icon>
            </v-list-tile-action>
            <v-list-tile-title :class="[{'active': selectedIndex === 1}, 'item-title' ]">Inicio</v-list-tile-title>
        </v-list-tile>
       <v-list-group prepend-icon="person_pin">
            <template v-slot:activator>
                <v-list-tile>
                    <v-list-tile-title>Mis Datos</v-list-tile-title>
                </v-list-tile>
            </template>
            <v-list-tile
              v-for="(item, i) in inicio_items"
              :key="i"
              :to="item.link"
            >
              <v-list-tile-action>
                <v-icon v-text="item.icon"></v-icon>
              </v-list-tile-action>
              <v-list-tile-title v-text="item.text"></v-list-tile-title>
            </v-list-tile>
        </v-list-group>
        <v-list-group prepend-icon="personal_video" v-if="isAdmin">
            <template v-slot:activator>
                <v-list-tile>
                    <v-list-tile-title>Paramétricas</v-list-tile-title>
                </v-list-tile>
            </template>
            <v-list-tile
              v-for="(item, i) in parameters"
              :key="i"
              :to="item.link"
            >
              <v-list-tile-action>
                <v-icon v-text="item.icon"></v-icon>
              </v-list-tile-action>
              <v-list-tile-title v-text="item.text"></v-list-tile-title>
            </v-list-tile>
        </v-list-group>
        <v-list-group prepend-icon="folder_shared" v-if="isAdmin">
            <template v-slot:activator>
                <v-list-tile>
                    <v-list-tile-title>RRHH</v-list-tile-title>
                </v-list-tile>
            </template>
            <v-list-tile
              v-for="(item, i) in rrhh_items"
              :key="i"
              :to="item.link"
            >
              <v-list-tile-action>
                <v-icon v-text="item.icon"></v-icon>
              </v-list-tile-action>
              <v-list-tile-title v-text="item.text"></v-list-tile-title>
            </v-list-tile>
        </v-list-group>
        <v-list-group prepend-icon="mail" v-if="isAdmin">
            <template v-slot:activator>
                <v-list-tile>
                    <v-list-tile-title>Solicitudes de Permiso</v-list-tile-title>
                </v-list-tile>
            </template>
            <v-list-tile
              v-for="(item, i) in employee_requests"
              :key="i"
              :to="item.link"
            >
              <v-list-tile-action>
                <v-icon v-text="item.icon"></v-icon>
              </v-list-tile-action>
              <v-list-tile-title v-text="item.text"></v-list-tile-title>
            </v-list-tile>
        </v-list-group>

    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
    props: {
        toggle: {
            type: Boolean,
            required: false,
            default: true
        }
    },
    data:()=>({

        selectedIndex: 1,
        admins: [
        ['Management', 'people_outline'],
        ['Settings', 'settings']
        ],
        inicio_items: [
            // { icon: 'dashboard', text: 'Inicio' , link: '/' },
            { icon: 'person', text: 'Información Personal' , link: '/employee_info' },
            // { icon: 'vpn_key', text: 'Cambio de Contraseña', link: '/buyout' },
            // { icon: 'cloud_upload', text: 'Importar Compras', link: '/import_purchases' },
            // { icon: 'calendar_today', text: 'Mis Asistencias', link: '/attendance' },
            { icon: 'move_to_inbox', text: 'Mis Boletas', link: '/my_request' },
            // { icon: 'av_timer', text: 'Mis Horarios', link: '/hours' },
        ],
        rrhh_items: [
            // { icon: 'dashboard', text: 'Inicio' , link: '/' },
            { icon: 'people', text: 'Funcionarios' , link: '/employee' },
            { icon: 'assignment', text: 'Solicitudes', link: '/buyout' },
            { icon: 'local_dining', text: 'Refrigerios', link: '/food' },
            { icon: 'chrome_reader_mode', text: 'Planillas', link: '/import_purchases' },
            // { icon: 'move_to_inbox', text: 'Mis Boletas', link: '/employee' },
            // { icon: 'av_timer', text: 'Mis Horarios', link: '/employee' },
        ],
        parameters: [
            { icon: 'devices', text: 'Biometricos' , link: '/biometric' },
            { icon: 'work', text: 'Cargos' , link: '/position' },
            { icon: 'location_on', text: 'Ciudades' , link: '/city' },
            { icon: 'public', text: 'Paises' , link: '/country' },
            { icon: 'library_books', text: 'Tipos de Documento' , link: '/document_type' },
            { icon: 'chrome_reader_mode', text: 'Tipos de Contrato' , link: '/contract_type' },
            { icon: 'class', text: 'Modalidades de Contrato' , link: '/contract_modality' },
            { icon: 'account_balance', text: 'Gerencias' , link: '/management' },
            { icon: 'account_box', text: 'Unidades' , link: '/unity' },
            { icon: 'account_balance_wallet', text: 'Tipos de Afp' , link: '/contribution' },
        ],
        employee_requests:[
            { icon: 'inbox', text: 'Recibidos' , link: '/employee_request' },
            { icon: 'send', text: 'Enviados' , link: '/employee_request_send' },
        ]

    }),
    mounted(){
        console.log('Check Admin');
        console.log(this.isAdmin)
    },
    methods: {

    },
    computed:{
        drawer:{
            get(){
            return this.$store.state.template.drawer;
            },
            set(value){
            this.$store.commit('template/updateDrawer',value);
            }
        },
        isAdmin(){
            return this.$store.getters['auth/isAdmin'];
        }

    }
}
</script>

<style>
  /* .toolbar {
    font-weight: bold;
    font-size: 18px;
  }

  .toolbar .text {
    padding-left: 15px;
    color: white;
    text-decoration:none;
  }

  .item-title {
    font-size: 17px;
    font-weight: 500;
  }
  .item-sub-title {
    font-size: 15px;
    font-weight: 500;
  }

  .active {
    font-weight: bold;
  } */
</style>
