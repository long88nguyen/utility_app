<template>
  <div class="content_layout">
    <a-row>
      <a-col :xxl="12" :xl="12" :lg="12" :md="12" :xs="24">
        <div class="content_layout-introduce">
          <div class="content_layout-introduce-panel">
            <div class="content_title">Explorer</div>
            <div class="content_description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt
              commodi perferendis consequatur. Similique deserunt esse nulla
              illum! At praesentium porro optio distinctio, incidunt perferendis
              pariatur labore eligendi, aliquam, totam dolores!
            </div>
            <div class="content_button">
              <button class="btn btn-outline-info">Explorer</button>
            </div>
          </div>
        </div>
      </a-col>

      <a-col :xxl="12" :xl="12" :lg="12" :md="12" :xs="24">
        <div class="content_layout-product">
          <div class="row">
            <div class="content_card card1">
              <h5>Japan</h5>
              
            </div>
            <div class="content_card card2">
              <h5>Asean</h5>
             
            </div>
            <div class="content_card card3">
              <h5>Turkey</h5>
            </div>
            <div class="content_card card4">
              <h5>Ballon</h5>
            </div>
          </div>
        </div>
      </a-col>
    </a-row>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.content_layout {
  width: 100%;
  height: calc(100vh - 120px);
  .content_layout-introduce {
    height: calc(100vh - 120px);
    display: flex;
    align-items: center;
    .content_layout-introduce-panel {
      .content_title {
        color: white;
        font-size: 50px;
        font-weight: bold;
        padding: 10px 0;
      }

      .content_description {
        font-size: 16px;
        color: white;
        line-height: 29px;
      }

      .content_button {
        padding: 20px 0;
      }
    }
  }
  .content_layout-product {
    height: calc(100vh - 120px);
    .content_card {
      width: 280px;
      height: 310px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 15px 25px;
      box-sizing: border-box;
      cursor: pointer;
      margin: 10px 15px;
      background-position: center;
      background-size: cover;
      border-radius: 15px;
      transition: ease-in 0.5s;
      h5 {
        color: white;
        font-size: 30px;
        font-weight: bold;

      }
    }
    .content_card:hover {
      transform: translateY(-10px);
    }
    .card1 {
      background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
        url(../../uploads/images/japan.png);
    }

    .card2 {
      background-image: url(../../uploads/images/asean.png);
    }
    .card3 {
      background-image: url(../../uploads/images/tukey.png);
    }
    .card4 {
      background-image: url(../../uploads/images/ballon.png);
    }
  }
}
@media (max-width: 500px) {
  .content_layout {
    .content_layout-introduce {
      display: none;
    }

    .content_layout-product{
        display: flex;
        .content_card{
            width: 45%;
            margin:10px;
            height: 250px;
        }
    }
  }
}
</style>