<template>
  <div class="login_layout">
    <div class="container">
      <div class="login_form">
        <h1>login form</h1>
        <form action="" @submit.prevent="login">
            <div class="control">
                <label for="">Name</label>
                <input type="text" v-model="email">
            </div>
            <div class="control">
                <label for="">Password</label>
                <input type="password" v-model="password">
            </div>
            <span>
                <input type="checkbox" class=""> Remember me
            </span>
            <div class="control">
            <button class="btn btn-info" type="submit">Login</button>
            </div>
        </form>
        <div class="link text-center">
         Do you have account? <router-link to="/register">Sign up</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { authStore } from '../../stores/auth';
import { storeToRefs } from 'pinia';
export default {
    setup(){
      const { email,password } = storeToRefs(authStore());

      const { login } = authStore();
      return {
        email,
        password,
        login
      }
    }
};
</script>

<style lang="scss" scoped>
.login_layout {
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

    button{
        width: 100%;
    }
  }
}
</style>