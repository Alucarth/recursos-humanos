<template>

    <v-layout align-center justify-center>
        <v-flex xs12 sm8 md4>
        <v-form @submit.prevent="login">
        <v-card light class="elevation-12">
            <v-toolbar dark color="red">
            <v-toolbar-title>Recursos Humanos</v-toolbar-title>
            </v-toolbar>
            <v-card-text>
                <v-text-field prepend-icon="person" label="Usuario" type="text" v-model="usr_usuario"></v-text-field>
                <v-text-field prepend-icon="lock" label="Password" id="password" type="password" v-model="password"></v-text-field>
            </v-card-text>
            <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="primary" type="submit">Iniciar Sesion</v-btn>
            </v-card-actions>
        </v-card>
        </v-form>
        </v-flex>
    </v-layout>

</template>
<script>
export default {
  data(){
      return {
        usr_usuario : "",
        password : ""
      }
    },
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
