<template>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
          <form v-on:submit.prevent="register">
            <h1 class="h3 mb-3 font-weight-normal text-center">Register</h1>
  
            <div class="form-group mb-3">
              <label for="name"> Name</label>
              <input type="text" v-model="name" class="form-control" name="name" placeholder="Name">
            </div>
  
            <div class="form-group mb-3">
              <label for="email"> Email Address</label>
              <input type="email" v-model="email" class="form-control" name="email" placeholder="Email Address">
            </div>
  
            <div class="form-group mb-3">
              <label for="password"> Password</label>
              <input type="password" v-model="password" class="form-control" name="password" placeholder="Password">
            </div>
  
            <button class="btn btn-lg btn-primary btn-block">Register</button>
          </form>
        </div>
      </div>
    </div>
  
  </template>
  
  
<script>
    import axios from 'axios'
    import router from '../router'

    export default{
        data(){
            return {
                name: '',
                email: '',
                password: '',
            }
        },

        methods:{
          register() {
            axios.post('/api/register',
                {
                    name:this.name,
                    email:this.email,
                    password:this.password,
                })
                .then((res) => {
                    router.push({name: 'Login'})
                })
                .catch((err) => {
                    console.log(err)
                })
          },
        },
        mounted() {
          if(localStorage.getItem('usertoken') != null) {
              this.auth = 'loggedin';
              router.push({name: 'QRCode'});
          }
        }        
    }
</script>