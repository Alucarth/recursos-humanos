<template>
  <div>
    <template v-if="!$route.meta.allowAnonymous">
      <v-app id="inspire">
        <div class="app-container">
          <toolbar @toggleNavigationBar="drawer = !drawer"/>
          <navigation :toggle="drawer"/>
          <v-content>
            <breadcrumbs />
            <router-view/>
            <!-- <page-footer /> -->
          </v-content>
        </div>
      </v-app>
    </template>
    <template v-else>
      <transition>
        <keep-alive>
          <router-view></router-view>
        </keep-alive>
      </transition>
    </template>
  </div>
</template>

<script>
export default {
  name: 'App',
  data:()=>({
        drawer: true
  }),
  computed:{
      // currentUser(){
      //   return this.$store.getters.currentUser;
      // }
      getToken(){
        return this.$store.state.auth.token;
      }
    },
  created(){
    axios.defaults.headers.common['Authorization'] = 'Bearer '+this.getToken;
    axios.interceptors.response.use(undefined,(err) => {
    return new Promise( (resolve, reject) => {
        console.log(err.response.status);
        if (err.response.status === 401) {
        // if you ever get an unauthorized, logout the user
        this.$store.dispatch('auth/logout')
        .then(() => this.$router.push('/login'))
        .catch(err => console.log(err))
        // you can also redirect to /login if needed !
        }
        throw err;
    });
    });
  }


}
</script>

<style>
</style>
