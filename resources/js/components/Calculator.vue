<template>
    <div class="p-3">
        <!-- result -->
        <div class="result w-full rounded m-1 p-3 lead font-weight-bold text-white bg-dark">
            {{ calculatorValue || 0 }}
        </div>

        <!-- buttons -->
        <div class="row no-gutters">
            <div class="col-3" v-for="n in calculatorElements" :key="n">
                <div class="lead text-white text-center m-1 py-3 bg-dark rounded hover-class"
                    @click="action(n)">
                    {{ n }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Calculator',
    props: {
        msg: String
    },

    data() {
        return {
            calculatorValue: '',
            calculatorElements: ['C', '*', '/', '-', 7, 8, 9, '+', 4,5,6, '=', 3,2,1,0],
            operator: null,
            previousCalculatorValue: ''
        }
    },

    methods: {
        action(n){
            if(!isNaN(n)){
                this.calculatorValue += n + '';
            }

            // clear
            if(n === 'C'){
                this.calculatorValue = '';
            }

            // clear
            if(['/', '-','+', '*'].includes(n)){
                this.operator = n;
                this.previousCalculatorValue = this.calculatorValue;
                this.calculatorValue = '';
            }

            if(n === '='){
                this.calculatorValue = eval(
                    this.previousCalculatorValue + this.operator + this.calculatorValue
                );

                this.previousCalculatorValue = '';
                this.operator = null;
            }
        }
    }
}
</script>

<style>

    .hover-class:hover {
        cursor: pointer;
        background-color: #6c757d!important;
    }

</style>