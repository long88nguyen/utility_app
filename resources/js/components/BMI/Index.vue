<template>
  <div class="bmi_layout">
    <div class="button_return">
      <router-link to="/"
        ><i class="fa-solid fa-arrow-right-from-bracket"></i
      ></router-link>
    </div>
    <h1 class="text-center">The Body Mass Index (BMI) Calculator</h1>
      <router-view></router-view>
  </div>
</template>

<script>
export default {};
</script>

<style scoped lang="scss">
* {
}

h1 {
  color: white;
}
.button_return{
    width: 50px;
    height: 50px;
    border-radius: 30px;
    line-height: 50px;
    text-align: center;
    background:rgb(226, 225, 225);
    i{
        font-size: 20px;
    }
}
</style>