<template>
    <v-navigation-drawer v-model="drawer" fixed app>
        <v-toolbar flat dark :color="$root.themeColor" class="toolbar">
            <router-link to="/">
                <img src="images/logo_eba_blanck.png" width="50px" />
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
                <v-list-tile v-for="(item, i) in inicio_items" :key="i" :to="item.link">
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
                <v-list-tile v-for="(item, i) in parameters" :key="i" :to="item.link">
                    <v-list-tile-action>
                        <v-icon v-text="item.icon"></v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title v-text="item.text"></v-list-tile-title>
                </v-list-tile>
            </v-list-group>
            <v-list-group prepend-icon="folder_shared" v-if="isAdmin || isRRHH">
                <template v-slot:activator>
                    <v-list-tile>
                        <v-list-tile-title>RRHH</v-list-tile-title>
                    </v-list-tile>
                </template>
                <v-list-tile v-for="(item, i) in rrhh_items" :key="i" :to="item.link">
                    <v-list-tile-action>
                        <v-icon v-text="item.icon"></v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title v-text="item.text"></v-list-tile-title>
                </v-list-tile>
            </v-list-group>
            <v-list-group prepend-icon="local_dining" v-if="isAdmin || isRefreshment">
                <template v-slot:activator>
                    <v-list-tile>
                        <v-list-tile-title>Refrigerios</v-list-tile-title>
                    </v-list-tile>
                </template>
                <v-list-tile v-for="(item, i) in refreshment" :key="i" :to="item.link">
                    <v-list-tile-action>
                        <v-icon v-text="item.icon"></v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title v-text="item.text"></v-list-tile-title>
                </v-list-tile>
            </v-list-group>
            <v-list-group prepend-icon="cached" v-if="isAdmin">
                <template v-slot:activator>
                    <v-list-tile>
                        <v-list-tile-title>Sincronizacion</v-list-tile-title>
                    </v-list-tile>
                </template>
                <v-list-tile v-for="(item, i) in syncronized" :key="i" :to="item.link">
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
                <v-list-tile v-for="(item, i) in employee_requests" :key="i" :to="item.link">
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
        data: () => ({

            selectedIndex: 1,
            admins: [
                ['Management', 'people_outline'],
                ['Settings', 'settings']
            ],
            inicio_items: [
                // { icon: 'dashboard', text: 'Inicio' , link: '/' },
                {
                    icon: 'person',
                    text: 'Información Personal',
                    link: '/employee_info'
                },
                // { icon: 'vpn_key', text: 'Cambio de Contraseña', link: '/buyout' },
                // { icon: 'cloud_upload', text: 'Importar Compras', link: '/import_purchases' },
                {
                    icon: 'calendar_today',
                    text: 'Mis Asistencias',
                    link: '/attendance'
                },
                {
                    icon: 'move_to_inbox',
                    text: 'Mis Boletas',
                    link: '/my_request'
                },
                {
                    icon: 'alarm',
                    text: 'Mis Horarios',
                    link: '/my_type_hour'
                },
            ],
            rrhh_items: [
                // { icon: 'dashboard', text: 'Inicio' , link: '/' },
                {
                    icon: 'people',
                    text: 'Funcionarios',
                    link: '/employee'
                },
                {
                    icon: 'face',
                    text: 'Usuarios',
                    link: '/user'
                },
                // { icon: 'assignment', text: 'Solicitudes', link: '/buyout' },

                // { icon: 'chrome_reader_mode', text: 'Planillas', link: '/import_purchases' },
                // { icon: 'move_to_inbox', text: 'Mis Boletas', link: '/employee' },
                {
                    icon: 'description',
                    text: 'Reporte de Asistencias',
                    link: '/report_attendance'
                },
                {
                    icon: 'av_timer',
                    text: 'Horarios',
                    link: '/type_hour'
                },
                {
                    icon: 'event',
                    text: 'Dias Festivos',
                    link: '/holyday'
                },
                {
                    icon: 'date_range',
                    text: 'Horarios Eventuales',
                    link: '/eventual_should'
                },
            ],
            parameters: [
                // { icon: 'devices', text: 'Biometricos' , link: '/biometric' },
                {
                    icon: 'work',
                    text: 'Cargos',
                    link: '/position'
                },
                {
                    icon: 'location_on',
                    text: 'Ciudades',
                    link: '/city'
                },
                {
                    icon: 'public',
                    text: 'Paises',
                    link: '/country'
                },
                {
                    icon: 'library_books',
                    text: 'Tipos de Documento',
                    link: '/document_type'
                },
                {
                    icon: 'chrome_reader_mode',
                    text: 'Tipos de Contrato',
                    link: '/contract_type'
                },
                {
                    icon: 'class',
                    text: 'Modalidades de Contrato',
                    link: '/contract_modality'
                },
                {
                    icon: 'account_balance',
                    text: 'Gerencias',
                    link: '/management'
                },
                {
                    icon: 'account_box',
                    text: 'Unidades',
                    link: '/unity'
                },
                {
                    icon: 'account_balance_wallet',
                    text: 'Tipos de Afp',
                    link: '/contribution'
                },
                {
                    icon: 'card_travel',
                    text: 'Categorias',
                    link: '/category'
                },
                {
                    icon: 'work',
                    text: 'Escala Salarial',
                    link: '/salary_scale'
                },
            ],
            employee_requests: [{
                    icon: 'inbox',
                    text: 'Recibidos',
                    link: '/employee_request'
                },
                {
                    icon: 'archive',
                    text: 'Archivados',
                    link: '/request_archive'
                },
            ],
            syncronized: [

                {
                    icon: 'devices',
                    text: 'Biometricos',
                    link: '/biometric'
                },

            ],
            refreshment: [{
                icon: 'local_dining',
                text: 'Refrigerios',
                link: '/refreshment'
            }, ]

        }),
        mounted() {
            console.log('Check Admin');
            console.log(this.isAdmin)
        },
        methods: {

        },
        computed: {
            drawer: {
                get() {
                    return this.$store.state.template.drawer;
                },
                set(value) {
                    this.$store.commit('template/updateDrawer', value);
                }
            },
            isAdmin() {
                return this.$store.getters['auth/isAdmin'];
            },
            isRefreshment() {
                return this.$store.getters['auth/isRefreshment'];
            },
            isRRHH() {
                return this.$store.getters['auth/isRRHH'];
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
