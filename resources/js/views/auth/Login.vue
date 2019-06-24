<template>

    <v-layout align-center justify-center>
        <v-flex xs12 sm8 md4>
        <v-form @submit.prevent="login">
        <v-card light class="elevation-12">
            <v-toolbar light  color="primary">
            <v-toolbar-title>Recursos Humanos</v-toolbar-title>
            </v-toolbar>
            <v-card-text>

                <v-text-field prepend-icon="person" label="Usuario" type="text" v-model="username"></v-text-field>
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
        username : "",
        password : ""
      }
    },
    methods:{
        login() {
         console.log('enviando datos auth');
         let username = this.username
          let password = this.password
          this.$store.dispatch('auth/login', { username, password })
          .then(() => {
              console.log("autenticado")
              this.$router.push('/')
              })
          .catch(err => console.log(err))
        }
    }
}
</script>
