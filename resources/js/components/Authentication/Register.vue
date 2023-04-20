<template>
   <div class="register_layout">
    <div class="container">
      <div class="login_form">
        <h1>login form</h1>
        <form action="" @submit.prevent="register">
            <div class="control">
                <label for="">Email</label>
                <input type="text" v-model="form.email">
            </div>
            <div class="control">
                <label for="">Password</label>
                <input type="password">
            </div>
            <div class="control">
                <label for="">Confirm Password</label>
                <input type="password">
            </div>
            <div class="control">
                <label for="">Name</label>
                <input type="password">
            </div>
            <div class="control">
                <label for="">Date of Birth</label>
                <a-date-picker
                class="date-picker"
                format="DD-MM-YYYY"
                @change="changeDate"
                />
            </div>
            <div class="control">
            <button class="btn btn-info mt-3" type="submit">Register</button>
            </div>
        </form>
        <div class="link text-center">
            <router-link to="/login">Return Login</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import { authStore } from '../../stores/auth';
import moment from 'moment';
import { ref } from 'vue';
export default {
    setup(){

        const getAuthStore = authStore();

        const form =  ref({
            email:'',
            birth:'',
        })

        const changeDate = (data) => {
            form.value.birth = moment(data).format('YYYY-MM-DD');
        }

       
        const register = async() => {
            getAuthStore.register(form.value);
        }

        return {
            changeDate,
            register,
            getAuthStore,
            form
        }
    }
}
</script>
<style lang="scss" scoped>
.register_layout {
  background-image: 
    url(../../uploads/pgss2.png);
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 100vh;
  background-position: center;
  color: white;
  .login_form{
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
        width: 380px;
        padding: 50px 30px;
        border-radius:10px;
        box-shadow: 7px 7px 60px #000;
  }
  h1{
    text-transform: uppercase;
    font-size: 2em;
    text-align: center;
    margin-bottom: 2em;
    color:white;
  }

  .control{
    margin: 1em 0;

    input{
        width: 100%;
        display: block;
        padding: 10px;
        color:#000;
        border:none;
        outline: none;
        margin: 1em 0;
        border-radius: 5px;
    }

    .date-picker{
        width: 100%;
        display: block;
        padding: 10px;
    }
    button{
        width: 100%;
    }
  }
}
</style>