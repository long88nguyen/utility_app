<template>
  <div class="calculate_page">
    <router-link to="/" class="back_icon"
      ><i class="fa-solid fa-arrow-right-from-bracket"></i
    ></router-link>

    <div
      class="steps-content step_one"
      v-if="steps[current].content == 'First-content'"
    >
      <h1>Enter Your Height</h1>
      <input type="text" v-model="YourHeight" /><span> cm</span>
      <br />
      <img src="../../uploads/sticker/sticker2.png" alt="" srcset="" />
    </div>
    <div
      class="steps-content step_two"
      v-if="steps[current].content == 'Second-content'"
    >
      <h1>Enter my Weight</h1>
      <input type="text" v-model="YourWeight" /> <span>kg</span>
      <br />
      <img src="../../uploads/sticker/sticker1.png" alt="" srcset="" />
    </div>
    <div class="steps-action">
      <a-button v-if="current < steps.length - 1" type="primary" @click="next">
        Next
      </a-button>
      <a-button
        v-if="current == steps.length - 1"
        type="primary"
        @click="CalculateValue"
      >
        Done
      </a-button>
      <a-button v-if="current > 0" style="margin-left: 8px" @click="prev">
        Previous
      </a-button>
    </div>
  </div>
    <a-modal
      title="Title"
      :visible="visible"
      @ok="handleOk"
      @cancel="handleCancel"
      :footer=true
    >
    {{ YourHeight }}
    {{ 
YourWeight
    }}
    </a-modal>
  <!-- $message.success('Processing complete!') -->
</template>

<script>
export default {
  data() {
    return {
      YourHeight: null,
      YourWeight: null,
      visible: false,
      current: 0,
      steps: [
        {
          title: "First",
          content: "First-content",
        },
        {
          title: "Second",
          content: "Second-content",
        },
      ],
    };
  },
  methods: {
    next() {
      this.current++;
    },
    prev() {
      this.current--;
    },
    CalculateValue() {
      console.log(this.YourHeight, this.MyWeight);
      this.visible = true;
    },
    handleOk(){
      this.visible = false;
    },
    handleCancel(){
      this.visible = false;
    }

  },
};
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

@media (max-width: 500px) {
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