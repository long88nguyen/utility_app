<template>
   <div class="register_layout">
    <div class="container">
      <div class="login_form">
        <h1>login form</h1>
        <form action="" @submit.prevent="register">
          <div class="row">
            <div class="control col-xl-6 col-12 col-12">
                <label for="">Email</label>
                <input type="text" v-model="form.email">
            </div>
            <div class="control col-xl-6 col-12">
                <label for="">Password</label>
                <input type="password" v-model="form.password">
            </div>
            <div class="control col-xl-6 col-12">
                <label for="">Confirm Password</label>
                <input type="password" v-model="form.password_confirmation">
            </div>
            <div class="control col-xl-6 col-12">
                <label for="">Name</label>
                <input type="text" v-model="form.name">
            </div>
            <div class="control col-xl-6 col-12">
                <label for="">Gender</label>
                <select v-model="form.gender">
                  <option v-for="(item,index) in gender" :key="index" :value="item.key">{{item.value}}</option>  
                </select>

            </div>
            <div class="control col-xl-6 col-12">
                <label for="">Date of Birth</label>
                <a-date-picker
                class="date-picker"
                format="DD-MM-YYYY"
                @change="changeDate"
                v-model:value="form.birthday"
                />
            </div>
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

<script setup>
import { ref,reactive } from 'vue';
import moment from 'moment';

const gender = reactive([
  {
    key:"1",
    value:"Male",
  },
  {
    key:"2",
    value:"Female",
  },
  {
    key:"3",
    value:"Other",
  },  
]);

const form = reactive({
  email:'',
  password:'',
  password_confirmation:'',
  name:'',
  gender: 0,
  birthday:''
})

const changeDate = () => {
  console.log(moment(form.birthday).format('YYYY-MM-DD'));
  form.birthday = moment(form.birthday).format('YYYY-MM-DD');
}

const register = () => {
  console.log(form);
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
        width: 700px;
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
    
    select{
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
        margin: 1em 0;
        padding: 10px;
        border-radius: 5px;
    }
    button{
        width: 100%;
    }
  }
}

@media (max-width:576px){
  .register_layout {
    
    .login_form{
      width: 380px;
      .control{
      }
    }
  }
}
</style>