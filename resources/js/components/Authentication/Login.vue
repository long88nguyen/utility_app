<template>
  <div class="login_layout">
    <OptionTop/>
    <div class="container">
      <div class="login_form">
        <h1>{{ $t('authentication.login.login_title') }}</h1>
        <form @submit.prevent="login">
          <div class="control">
            <label for="">{{ $t('authentication.login.email') }}</label>
            <input type="text" v-model="user.email" />
            <div v-if="hasError">
              <div
                v-for="(err, index) in messageErr.errors?.email"
                class="text-danger"
                :key="index"
              >
                {{ err }}
              </div>
            </div>
          </div>
          <div class="control">
            <label for="">{{ $t('authentication.login.password')}}</label>
            <input type="password" v-model="user.password" />
            <div v-if="hasError">
              <div
                v-for="(err, index) in messageErr.errors?.password"
                class="text-danger"
                :key="index"
              >
                {{ err }}
              </div>
            </div>
          </div>
          <span> <input type="checkbox" class="" /> {{ $t('authentication.login.remember_me')}} </span>
          <div class="control">
            <button class="btn btn-info" type="submit">{{ $t('authentication.login.signin')}}</button>
          </div>
        </form>
        <div class="link text-center">
         {{ $t('authentication.login.account_none')}} <router-link to="/register">{{ $t('authentication.login.sign_up')}}</router-link>
        </div>
        <div class="link text-center">
          <router-link to="/forgot-password">{{ $t('authentication.login.forgot_password')}}</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Toast from "../../helpers/toast.js";
import { ref } from "vue";
import { authStore } from "../../stores/modules/authStore";
import { useRouter } from "vue-router";
import i18n from "../../i18n";


const auth = authStore();
const router = useRouter();
const hasError = ref("");
const messageErr = ref([]);
const user = ref({
  email: "",
  password: "",
});

const login = async () => {
  const response = await auth.login(user.value);

  console.log(response);
  if (response.data?.success) {
    await router.push({ path: "/" });
    Toast.fire({
      icon: "success",
      title: i18n.global.t('login_success'),
    });
    (hasError.value = ""), (messageErr.value = []);
  } else {
    console.log(response);
    hasError.value = true;
    messageErr.value = response;
    if(response.message)
    {
      Toast.fire({
      icon: "error",
      title: i18n.global.t(response.message),
    });
    }
  }
};
</script>

<style lang="scss" scoped>
.login_layout {
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