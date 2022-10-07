<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
      <button class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbar1"
      aria-controls="navbar1"
      aria-expanded="false"
      aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse justify-content-md-center" id="navbar1">
        <ul class="navbar-nav">
          <li v-if="auth==''" class="nav-item">
            <router-link class="nav-link" to="/login">Login</router-link>
          </li>
          <li v-if="auth==''" class="nav-item">
            <router-link class="nav-link" to="/register">Register</router-link>
          </li>
          <li v-if="auth=='loggedin'" class="nav-item">
            <a lass="nav-link" v-on:click="logout" href="">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
</template>
  
  
<script>
    import EventBus from '../EventBus'
    import router from '../router'

    export default {
        data() {
            return {
                auth: '',
                user: '',
            }
        },

        methods:{
            logout() {
                console.log('ssss')
                this.auth = '';
                localStorage.removeItem('usertoken');                
                router.push({name: 'Login'});
            }            
        },

        mounted() {
            if(localStorage.getItem('usertoken') != null) {
                this.auth = 'loggedin';
            } else {
                this.auth = '';
            }

            EventBus.$on('logged-in', status => {
                this.auth = status;
            })
        }        
    }

</script>