<template>
  <div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <form v-on:submit.prevent="login">
              <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>

              <div class="form-group mb-3">
                <label for="email"> Email Address</label>
                <input type="email" v-model="email" class="form-control" name="email" placeholder="Email Address">
              </div>

              <div class="form-group mb-3">
                <label for="password"> Password</label>
                <input type="password" v-model="password" class="form-control" name="password" placeholder="Password">
              </div>

              <button class="btn btn-lg btn-primary btn-block">Sign in</button>
            </form>
      </div>
    </div>
  </div>

</template>


<script>
import axios from 'axios'
import router from '../router'
import EventBus from '../EventBus'

export default{
  data(){
    return {
      email: '',
      password: '',
    }
  },

    methods:{
      login() {
        axios.post('/api/login',
            {
              email:this.email,
              password:this.password,
            })
            .then((res) => {
                localStorage.setItem('usertoken', res.data.token)
                this.email = ''
                this.password = ''
                router.push({name: 'QRCode'})
                this.emitMethod()
            })
            .catch((err) => {
                console.log(err)
            })          
      },     

      emitMethod() {
          EventBus.$emit('logged-in', 'loggedin')
      }      
    },
    mounted() {
      if(localStorage.getItem('usertoken') != null) {
          this.auth = 'loggedin';
          router.push({name: 'QRCode'});
      }
    }
}
</script>