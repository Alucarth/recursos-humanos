<template>
    <v-navigation-drawer
      fixed
      :clipped="$vuetify.breakpoint.mdAndUp"
      app
      dark
      v-model="drawer"
    >
      <v-list dense >
        <v-list-tile to="/" >
            <v-list-tile-action>
                <v-icon>home</v-icon>
            </v-list-tile-action>
            <v-list-tile-title >Inicio</v-list-tile-title>
        </v-list-tile>
        <!-- <v-list-group prepend-icon="group_work">
            <template v-slot:activator>
                <v-list-tile>
                    <v-list-tile-title>Modulo de Madera</v-list-tile-title>
                </v-list-tile>
            </template>
            <v-list-tile
              v-for="(lumber, i) in lumbers"
              :key="i"
              :to="lumber.link"
            >
              <v-list-tile-title v-text="lumber.text"></v-list-tile-title>
              <v-list-tile-action>
                <v-icon v-text="lumber.icon"></v-icon>
              </v-list-tile-action>
            </v-list-tile>
        </v-list-group> -->

        <v-list-group prepend-icon="person_pin">
            <template v-slot:activator>
                <v-list-tile>
                    <v-list-tile-title>Mis datos</v-list-tile-title>
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
        <!-- <template v-for="item in items">
          <v-layout
            row
            v-if="item.heading"
            align-center
            :key="item.heading"
          >
            <v-flex xs6>
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-flex>
            <v-flex xs6 class="text-xs-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-flex>
          </v-layout>
          <v-list-group
            v-else-if="item.children"
            v-model="item.model"
            :key="item.text"
            :to="item.link"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon=""
          >
            <v-list-tile slot="activator">
              <v-list-tile-content>
                <v-list-tile-title>
                  {{ item.text }}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            <v-list-tile
              v-for="(child, i) in item.children"
              :key="i"

            >
              <v-list-tile-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title>
                  {{ child.text }}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list-group>
          <v-list-tile v-else  :key="item.text"  :to="item.link">
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>
                {{ item.text }}
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template> -->
      </v-list>
    </v-navigation-drawer>
</template>
<script>
export default {
    data(){
        return {
            // drawer:null,
           inicio_items: [
                // { icon: 'dashboard', text: 'Inicio' , link: '/' },
                { icon: 'person', text: 'Informacion Personal' , link: '/inventory' },
                { icon: 'vpn_key', text: 'Cambio de Contraseña', link: '/buyout' },
                // { icon: 'cloud_upload', text: 'Importar Compras', link: '/import_purchases' },
                { icon: 'calendar_today', text: 'Mis Asistencias', link: '/employee' },
                { icon: 'move_to_inbox', text: 'Mis Boletas', link: '/employee' },
                { icon: 'av_timer', text: 'Mis Horarios', link: '/employee' },
            ],
        //   lumbers:[
        //         { icon: 'store', text: 'Almacenes' , link: '/storage' },
        //         { icon: 'local_florist', text: 'Especies' , link: '/specie' },
        //         { icon: 'group', text: 'Proveedores' , link: '/provider' },
        //         { icon: 'shopping_cart', text: 'Compra de madera', link: '/purchase' },
        //         { icon: 'group_work', text: 'Madera' , link: '/lumber' },
        //         { icon: 'repeat', text: 'Transferencia de Madera', link: '/lumber_transaction' },
        //         { icon: 'view_agenda', text: 'Paquetes', link: '/package' },
        //         { icon: 'repeat', text: 'Transferencia de Paquetes', link: '/package/transfer' },
        //         { icon: 'cloud_upload', text: 'Importar Paquetes', link: '/import_package' },
        //         { icon: 'attach_money', text: 'Gastos', link: '/expenses' },
        //         { icon: 'shop_two', text: 'Tipos de Origen', link: '/origin_types' },
        //         { icon: 'widgets', text: 'Tipos de Oferta', link: '/offer_types' },
        //   ]
        }
    },
    computed:{
        drawer:{
          get(){
            return this.$store.state.template.drawer;
          },
          set(value){
            this.$store.commit('template/updateDrawer',value);
          }
        }
    }
}
</script>
