<template>
  <div class="calculate_page">
   
      <div class="text-center">
        <h4 class="text-light">Kiểm tra chỉ số BMI</h4>
      </div>
    <div
      class="steps-content step_one"
      v-if="steps[current].content == 'First-content'"
    >
      <h1>Nhập chiều cao của bạn</h1>
      <input type="text" v-model="YourHeight" /><span> cm</span>
      <br />
      <div class="content_alert" v-if="errorHeightMessage">
        Vui lòng nhập chiều cao của bạn từ <span class="validation">20cm</span> đến <span  class="validation">250cm</span>
      </div>
      <img src="../../../uploads/sticker/sticker2.png" alt="" srcset="" />
    </div>
    <div
      class="steps-content step_two"
      v-if="steps[current].content == 'Second-content'"
    >
      <h1>Nhập cân nặng của bạn</h1>
      <input type="text" v-model="YourWeight" /> <span>kg</span>
      <br />
      <div class="content_alert" v-if="errorWeightMessage">
        Vui lòng nhập cân nặng của bạn từ <span  class="validation">20kg</span> đến <span  class="validation">500kg</span>
      </div>
      <img src="../../../uploads/sticker/sticker1.png" alt="" srcset="" />
    </div>
    <div class="steps-action">
      <a-button v-if="current < steps.length - 1" type="primary" @click="next">
        Tiếp theo
      </a-button>
      <a-button
        v-if="current == steps.length - 1"
        type="primary"
        @click="CalculateValue"
      >
        Hoàn thành
      </a-button>
      <a-button v-if="current > 0" style="margin-left: 8px" @click="prev">
        Quay lại
      </a-button>
    </div>
  </div>
  <a-modal
    title="Kết quả"
    :visible="visible"
    @ok="handleOk"
    @cancel="handleCancel"
    :footer="true"
    class="modal-result"
  >
    <span>Chỉ số BMI của bạn là : <span class="bmi_value">{{ calculateBMI }}</span></span>
    <h6>Tình trạng cơ thể của bạn : 
      <span v-if="calculateBMI < 18.5" style="color:blue" >Thiếu cân</span>
      <span v-if="calculateBMI > 18.5 && calculateBMI < 24.9" style="color:green" >Cân đối</span>
      <span v-if="calculateBMI > 25 && calculateBMI < 29.9" style="color:orange" >Thừa cân</span>
      <span v-if="calculateBMI > 30 && calculateBMI < 34.9" style="color:red" >Béo phì</span>
      <span v-if="calculateBMI > 35" style="color:purple" >Béo phì nguy hiểm</span>

    </h6>
    <img src="../../../uploads/sticker/sticker3.png" alt="" srcset="" >

  </a-modal>
  <!-- $message.success('Processing complete!') -->
</template>

<script setup>
  import { ref,reactive,computed } from 'vue';
  import { message } from 'ant-design-vue'

  let current = ref(0);
  const YourHeight = ref(null);
  const YourWeight = ref(null);
  const errorHeightMessage = ref(false);
  const errorWeightMessage = ref(false);
  const visible = ref(false);
  const steps = reactive([

          {
            title: "First",
            content: "First-content",
          },
          {
            title: "Second",
            content: "Second-content",
          },  
  ])
  const valid = () => 
  {
      errorHeightMessage.value = false
      errorWeightMessage.value = false
      let isValid = true;
      if(!YourHeight.value || YourHeight.value < 20 || YourHeight.value > 250)
      {
        errorHeightMessage.value = true,
        isValid = false;
      }

      if(steps[current.value].content == 'Second-content' && (!YourWeight.value || YourWeight.value < 20 || YourWeight.value > 500))
      {
        errorWeightMessage.value = true,
        isValid = false;
      }

      return isValid;  
  }

  const CalculateValue = () => {
    if(valid())
    {
      visible.value = true;
    }
  }

  const calculateBMI = computed(() => {
          let result = YourWeight.value / (YourHeight.value / 100 * 2 )
          return Math.round(result * 100) / 100;
  });

  const handleOk = () => {
    visible.value = false
  }

  const handleCancel = () => {
    visible.value = false
  }

  const next = () => {
    if(valid())
    {
      current.value++;

    }
  }

  const prev = () => {
    current.value--
  }

</script>

<style lang="scss" scoped>
.calculate_page {
  width: 100%;
  .back_icon {
    i {
      font-size: 25px;

      color: white;
    }
  }
}
.steps-content {
  margin-top: 16px;
  border: 1px solid #e9e9e9;
  border-radius: 6px;
  min-height: 300px;
  text-align: center;
  padding-top: 80px;
  h1 {
    color: white;
  }
  input {
    width: 100px;
    height: 60px;
    background: none;
    font-size: 50px;
    outline: none;
    border: none;
    border-bottom: 2px solid #190242;
    color: white;
  }
  span {
    font-size: 50px;
    color: white;
  }
  .content_alert {
    width: 200px;
    height: 100px;
    background: white;
    margin-left: 80%;
    border-radius: 50%;
    position: relative;
    color:red;
    z-index: 3;
    padding: 15px;
    font-weight: bold;
    transition: 0.3;
    .validation{
        font-size: 20px;
        color:blue;
    }
  }
  .content_alert::after {
    content: "";
    width: 0;
    height: 0;
    border-left: 25px solid transparent;
    border-right: 25px solid transparent;
    border-top: 50px solid white;
    position: absolute;
    top: 60px;
    right: 25px;
    z-index: -1;
  }
}

.step_one {
  img {
    height: 100px;
    margin-left: 90%;
  }
}

.step_two {
  img {
    height: 100px;
    margin-left: 90%;
  }
}

.steps-action {
  margin-top: 24px;
}

.modal-result{
  img{
    height: 100px;
    margin-left:70%;
  }
  h6{
    span{
      font-weight: bold;
      font-size: 20px;
    }
  }
  .bmi_value{
    font-size: 18px;
    font-weight: bold;
    color:#440aa9;
  }
}
@media (max-width: 500px) {
  .steps-content {
    .content_alert {
      margin-left: 10px;
    }
  }
  .step_one {
    img {
      height: 100px;
      margin-left: 0;
    }
  }

  .step_two {
    img {
      height: 100px;
      margin-left: 0;
    }
  }
}
</style>