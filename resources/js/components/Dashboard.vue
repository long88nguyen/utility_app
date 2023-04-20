<template>
  <div class="dashboard_app">
    <div class="container">
      <HeaderVue />
        <ContentVue>
        </ContentVue>
      <FooterVue />
    </div>
  </div>
</template>

<script>
import HeaderVue from "./commons/Header.vue";
import ContentVue from "./commons/Content.vue";
import FooterVue from "./commons/Footer.vue";

export default {
  components: {
    HeaderVue,
    ContentVue,
    FooterVue,
  },
};
</script>

<style lang="scss" scoped>
.dashboard_app {
  background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
    url(../uploads/pgss.png);
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 100vh;
  background-position: center;
}
</style>