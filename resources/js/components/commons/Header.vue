<template>
  <div class="header_layout">
    <div class="row">
      <div class="header_logo col-xl-3 col-lg-3 col-md-3 col-3">
        <div class="header_logo-image">
          <img src="../../uploads/logo/logo_web.png" alt="" srcset="" />
        </div>
      </div>
      <div class="header_option col-xl-6 col-lg-6 col-md-6 col-6"></div>

      <div class=" col-xl-3 col-lg-3 col-md-3 col-3 header_account">
          <img src="../../uploads/logo/user_icon_logo.png" alt="" srcset="" />
       
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped >
.header_layout {
  width: 100%;
  height: 120px;
  .header_logo {
    text-align: center;
    display: flex;
    align-items: center;
    height: 120px;
    .header_logo-image {
      img {
        width: 80px;
      }
    }
  }

  .header_account {
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    img {
      width: 50px;
    }
  }
}
</style>