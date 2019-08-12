<template>

    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-form @submit.prevent="login">
            <v-card >
              <v-toolbar dark color="primary">
                <v-toolbar-title>Recursos Humanos</v-toolbar-title>
                <v-spacer></v-spacer>

              </v-toolbar>
              <v-card-text>
                <div class="owl">
                      <div :class="owl_hide?'hand password':'hand'"></div>
                      <div :class="owl_hide?'hand hand-r password':'hand hand-r'"></div>
                      <div class="arms">
                        <div :class="owl_hide?'arm password':'arm'"></div>
                        <div :class="owl_hide?'arm arm-r password':'arm arm-r'"></div>
                      </div>
                </div>

                  <v-text-field prepend-icon="person" v-model="usr_usuario" label="Usuario" type="text"></v-text-field>
                  <v-text-field prepend-icon="lock" v-model="password" label="Contraseña" type="password" @focus="owl_hide = true"  @blur="owl_hide = false" ></v-text-field>

              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn dark color="primary" type="submit">Inciar Sesion</v-btn>
              </v-card-actions>
            </v-card>
            </v-form>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
</template>
<script>
export default {
  data:()=>({
        owl_hide: false,
        usr_usuario : "",
        password : ""
    }),
    methods:{
        login() {
         console.log('enviando datos auth');
         let usr_usuario = this.usr_usuario
          let password = this.password
          this.$store.dispatch('auth/login', { usr_usuario, password })
          .then(() => {
              console.log("autenticado")
              this.$router.push('/')
              })
          .catch(err => console.log(err))
        }
    }
}
</script>
