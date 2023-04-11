<template>
  <div class="header_layout">
    <a-row>
      <a-col :xxl="4" :xl="4" :lg="4">
        <div class="header_logo">
          <div class="header_logo-image">
            <!-- <img src="../../uploads/logo/logo_web.png" alt="" srcset="" /> -->
          </div>
        </div>
      </a-col>
      <a-col :xxl="14" :xl="14" :lg="14">
        <div class="header_option">

        </div>
      </a-col>

      <a-col :xxl="6" :xl="6" :lg="6">
        <div class="header_account">
            <img src="../../uploads/logo/user_icon_logo.png" alt="" srcset="">
        </div>
      </a-col>
    </a-row>
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

  .header_account{
    height:100%;
    display: flex;
    text-align: center;
    align-items: center;
    img{
        width: 50px;
    }
  }
}
</style>