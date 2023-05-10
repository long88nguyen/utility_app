<template>
    <div class="forgot_password_layout">
      <div class="container">
        <div class="login_form">
          <h4 class="text-center text-light">Vui lòng nhập email khôi phục mật khẩu của bạn</h4>
          <form @submit.prevent="sendEmail">
              <div class="control">
                  <label for="">Email</label>
                  <input type="text" v-model="email">
              </div>
              <div class="control">
              <button class="btn btn-info" type="submit">Gửi Email</button>
              </div>
              <div v-if="hasError">
                    <div class="text-danger">{{ messageErr.message }}</div>
                    <div
                      v-for="(err,index) in messageErr.errors?.email"
                      class="text-danger" :key="index"
                    >
                      {{ err }}
                    </div>
                  </div>
          </form>
          <div class="link text-center">
           <router-link to="/login">Return Login ?</router-link>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref,inject } from "vue";
  import { authStore } from "../../stores/modules/authStore";
  import { useRouter } from "vue-router";
  
     const router = useRouter();
    const Toast = inject("$toast");
    const hasError = ref("");
    const messageErr = ref([]);
    const email = ref("");


  const sendEmail = async() => {
    const res = await authStore().resetPass({email : email.value});

    if (res?.status) {
        let timerInterval;
        Toast.fire({
        toast: false,
        position: "center",
        icon: "success",
        title: res?.data?.message,
        timer: 5000,
        html: "Chuyển hướng về trang đăng nhập sau <span class='text-danger'></span> giây",
        didOpen: () => {
            const content = Toast.getHtmlContainer();
            const $ = content.querySelector.bind(content);
            timerInterval = setInterval(() => {
            Toast.getHtmlContainer().querySelector("span").textContent = (
                Toast.getTimerLeft() / 1000
            ).toFixed(0);
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        },
        });
        hasError.value = false;
        messageErr.value = [];
        setTimeout(function () {
        router.push({ path: "/login" });
        }, 5000);
    } 
    else
    {
        hasError.value = true;
        messageErr.value = res;
    }
  }
  
  </script>
  
  <style lang="scss" scoped>
  .forgot_password_layout {
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