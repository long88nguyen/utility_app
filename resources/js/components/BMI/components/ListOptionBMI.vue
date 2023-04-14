<template>
    <div class="list_option">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-xs-6">
                <div class="item_option option_1">
                    <router-link to="/bmi/calculator-bmi"><h4>BMI Introduction</h4></router-link>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-xs-6">
                <div class="item_option option_2">
                    <h4>BMI Calculator</h4>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-xs-6">
                <div class="item_option option_3">
                    <h4>
                        Compare with other people
                    </h4>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-xs-6">
                <div class="item_option option_4">
                    <h4>
                    Suggest
                    </h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped lang="scss">
.list_option{
    .item_option{
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-position: center;
        background-size: cover;
        border-radius:10px;
        margin:10px 0;
        transition: ease-in 0.3s;
        h4{
            padding: 5px;
            transition: ease-in 0.3s;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
    }

    .item_option:hover{
        transform: translateY(-10px);
        h4{
            background: rgb(235, 230, 230);
            color:red;
            font-weight: bold;
            font-size: 20px;
        }
    }

    .option_1{
        background-image: url(../../../uploads/images/heathy1.png);
    }

    .option_2{
        background-image: url(../../../uploads/images/calculator.png);

    }

    .option_3{
        background-image: url(../../../uploads/images/comparition.png);

    }

    .option_4{
        background-image: url(../../../uploads/images/suggestbmi.png);

    }


}
</style>