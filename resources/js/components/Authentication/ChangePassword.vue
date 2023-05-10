<template>
  <div class="forgot_password_layout">
    <div class="container">
      <div class="login_form">
        <h4 class="text-center text-light">
          Vui lòng nhập mật khẩu mới của bạn
        </h4>
        <div class="link text-center" v-if="hasExpired">
          <h5 class="text-center text-light">
            Yêu cầu đã hết hạn! Vui lòng quay trở lại đăng nhập
          </h5>
          <router-link to="/login">Return Login ?</router-link>
        </div>
        <form @submit.prevent="changePassword" v-else>
          <div class="control">
            <label for="">Password</label>
            <input type="password" v-model="dataPassword.password" />
          </div>
          <div class="control">
            <label for="">Password Confirm</label>
            <input
              type="password"
              v-model="dataPassword.password_confirmation"
            />
          </div>
          <div class="control">
            <button class="btn btn-info" type="submit">Change password</button>
          </div>
          <div v-if="hasError">
            <div class="text-danger">{{ messageErr.message }}</div>
            <div
              v-for="(err, index) in messageErr.errors?.password"
              class="text-danger"
              :key="index"
            >
              {{ err }}
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, inject, reactive } from "vue";
import { authStore } from "../../stores/modules/authStore";
import { useRouter, useRoute } from "vue-router";

const router = useRouter();
const hasExpired = ref(false);
const Toast = inject("$toast");
const hasError = ref("");
const messageErr = ref([]);
const dataPassword = reactive({
  resetpw: useRoute().query?.resetpw,
  password: "",
  password_confirmation: "",
});
const changePassword = async () => {
  const res = await authStore().changePass(dataPassword);

  if (res?.status) {
    Toast.fire({
      toast: false,
      position: "center",
      icon: "success",
      title: res?.data?.message,
    });
    hasError.value = false;
    messageErr.value = [];
    setTimeout(function () {
      router.push({ path: "/login" });
    }, 3000);
  } else {
    hasError.value = true;
    messageErr.value = res;
  }
};

//     const verifyRequest = async () => {
//     if (!useRoute().query.resetpw || useRoute().query?.resetpw.length !== 32)
//     {
//         hasExpired.value = true;
//     }

//     else {
//         const res = await authStore().verifyResetRequest({ resetpw: dataPassword.resetpw });
//         hasExpired.value = res?.status == 204 ? true : false;
//   }
// };

//     verifyRequest();
</script>

<style lang="scss" scoped>
.forgot_password_layout {
  background-image: url(../../uploads/pgss2.png);
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 100vh;
  background-position: center;
  color: white;
  .login_form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    width: 380px;
    padding: 50px 30px;
    border-radius: 10px;
    box-shadow: 7px 7px 60px #000;
  }
  h1 {
    text-transform: uppercase;
    font-size: 2em;
    text-align: center;
    margin-bottom: 2em;
    color: white;
  }

  .control {
    margin: 1em 0;

    input {
      width: 100%;
      display: block;
      padding: 10px;
      color: #000;
      border: none;
      outline: none;
      margin: 1em 0;
      border-radius: 5px;
    }

    button {
      width: 100%;
    }
  }
}
</style>